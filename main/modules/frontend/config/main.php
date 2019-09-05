<?php

use yii\helpers\ArrayHelper;

$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params.local.php'
);

$config = [
    'id' => 'frontend',
    'aliases' => [
        '@frontend' => '@main/modules/frontend'
    ],
    'basePath' => dirname(__DIR__),
    'params' => $params,
];

// локальные настройки
if (file_exists(__DIR__ . '/main.local.php')) {
    $config = ArrayHelper::merge($config, require __DIR__ . '/main.local.php');
}

return $config;
