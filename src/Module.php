<?php

namespace stesi\cms;

use stesi\core\events\MenuEvent;
use Yii;

/**
 * cms module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'stesi\cms\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::setAlias('@stesi/modules/cms', Yii::getAlias('@vendor/stesi-modules/cms/src'));

        if (Yii::$app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'stesi\cms\commands';
        }

        Yii::$app->view->on(MenuEvent::EVENT_BEFORE_RENDER, [$this, 'addMenuItems']);
    }

    /**
     * @param $menuEvent MenuEvent
     */

    public function addMenuItems($menuEvent)
    {
        require(__DIR__ . '/menu.php');
        $menuEvent->insertItems($menuItems);
    }
}
