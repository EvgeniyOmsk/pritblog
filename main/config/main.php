<?php
$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'app.main',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
//    'controllerNamespace' => 'frontend\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'csrfParam' => '_csrf-gad',
            'cookieValidationKey' => 'fzeqizbLovu2tLBZlporIBkFnDWlLS3Kgad',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'gad-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,

            'rules' => [
                '' => 'frontend/site/index',
                '<action:\w+>' => 'frontend/site/<action>',
                '<controller:\w+>/<action:\w+>' => 'frontend/<controller>/<action>',
                '<module:cabinet>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
                '<module:cabinet>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module:cabinet>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ]
         ],
    ],
    'modules' => [
        'frontend' => [
            'class' => \main\modules\frontend\Module::class
        ],
    ],
    'params' => $params,
];


// локальные настройки
if (file_exists(__DIR__ . '/main-local.php')) {
    $config = \yii\helpers\ArrayHelper::merge($config, require __DIR__ . '/main-local.php');
}

return $config;