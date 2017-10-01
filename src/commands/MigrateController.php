<?php

namespace stesi\modules\cms\commands;

class MigrateController extends \yii\console\controllers\MigrateController
{
    /**
     * @var string the name of the table for keeping applied migration information.
     */
    public $migrationTable = '{{%content_migration}}';

//    public $migrationPath = ['@vendor/stesi/yii2-google-maps/dist'];
//    public $migrationPath = ['@app/stesi-cms/src/migrations'];
    public $migrationPath = ['@stesi/modules/cms/migrations'];

    public $migrationNamespaces = [
        //'stesi\modules\cms\migrations'
    ];
}
