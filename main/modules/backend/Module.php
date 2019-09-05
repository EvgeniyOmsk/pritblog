<?php
namespace main\modules\backend;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'main\modules\backend\controllers';

    public $layout = 'main';

    function init()
    {
        parent::init();
        \Yii::configure($this, require __DIR__ . '/config/main.php');
    }
}
