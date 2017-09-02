# caipiao

---

#### 采集 2010 - 2018 年之间的开奖历史记录


安装，下载源码包，然后执行：

    composer install
    
配置数据库，需配置2个文件：
    
    phinx.yml 文件    
    
    App\config.php 文件
    
生成数据表：

    ./vendor/bin/phinx migrate

直接运行（或在浏览器打开）：

    php ./index.php
    
使用以下 3 个开源组件，几十行代码即完成简单的采集功能

    phinx  
    
    Goutte  
    
    Eloquent i
