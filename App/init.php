<?php
use Illuminate\Database\Capsule\Manager as Capsule;

set_time_limit(0);
ignore_user_abort(true);

require __DIR__."/../vendor/autoload.php";

require __DIR__."/./Shuangseqiu.php";

$config = require __DIR__.'/config.php';

$capsule = new Capsule;

$capsule->addConnection($config['db']);

$capsule->setAsGlobal();

$capsule->bootEloquent();

