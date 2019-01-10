<?php
require __DIR__ . '/../vendor/autoload.php';

use App\App;



$app = new App;

$container = $app->getContainer();

$container['config'] = function (){
    return[
        'db_driver' => 'mysql',
        'db_user' => 'root'
    ];
};

print_r($container['config']);
print_r($container->config);

