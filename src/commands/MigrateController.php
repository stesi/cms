<?php

namespace stesi\cms\commands;

class MigrateController extends \yii\console\controllers\MigrateController
{
    /**
     * @var string the name of the table for keeping applied migration information.
     */
    public $migrationTable = '{{%content_migration}}';

    public $migrationPath = ['@stesi/modules/cms/migrations'];

}
