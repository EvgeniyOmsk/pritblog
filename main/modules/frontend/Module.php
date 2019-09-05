<?php
namespace main\modules\frontend;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'main\modules\frontend\controllers';

    public $layout = 'main';

    function init()
    {
        parent::init();
        \Yii::configure($this, require __DIR__ . '/config/main.php');
    }
}
