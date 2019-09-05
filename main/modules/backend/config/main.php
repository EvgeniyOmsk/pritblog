<?php

use yii\helpers\ArrayHelper;

$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params.local.php'
);

$config = [
    'id' => 'backend',
    'aliases' => [
        '@backend' => '@main/modules/backend'
    ],
    'basePath' => dirname(__DIR__),
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
            'class' => 'yii\base\View'
        ],
    ],
    'params' => $params,
];

// локальные настройки
if (file_exists(__DIR__ . '/main.local.php')) {
    $config = ArrayHelper::merge($config, require __DIR__ . '/main.local.php');
}

return $config;
