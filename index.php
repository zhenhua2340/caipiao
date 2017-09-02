<?php
use Goutte\Client;
use App\Shuangseqiu;

require __DIR__.'/App/init.php';
$client = new Client();
$url = 'http://chart.cp.360.cn/kaijiang/ssq?lotId=220051&chartType=undefined&spanType=3&span=';
$nowDateTime = date('Y-m-d H:i:s');
for($i=2010; $i<2018; $i++){
    $start = $i;
    $end = $i + 1;
    $requestUrl = $url . $start . '001_' . $end . '001&r=' . mt_rand();
    $crawler = $client->request('GET', $requestUrl);
    $trLists = $crawler->filter('#data-tab')->children();
    foreach ($trLists as $key=>$item) {
        $tr = $crawler->filter('#data-tab > tr')->eq($key);
        $redArr = $tr->filter('td')->eq(2)->filter('span')->each(function ($node) {
            return $node->text();
        });
        $blue = $tr->filter('td')->eq(3)->filter('span')->eq(0)->text();
        $number = $tr->filter('td')->eq(0)->text();
        $hasSave = Shuangseqiu::where('number', $number)->count();
        if($hasSave == 0){
            $insertData = [
                'number' => $tr->filter('td')->eq(0)->text(),
                'red1'   => $redArr[0],
                'red2'   => $redArr[1],
                'red3'   => $redArr[2],
                'red4'   => $redArr[3],
                'red5'   => $redArr[4],
                'red6'   => $redArr[5],
                'blue'   => $blue,
                'created_at' => $nowDateTime
            ];
            Shuangseqiu::insert($insertData);
        }
    }
}
echo "SUCCESS";