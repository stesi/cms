<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_type`.
 */
class m171001_162032_create_content_type_table extends Migration
{
    protected $tableName = 'content_type';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->string(64) . ' PRIMARY KEY',
            'description' => $this->text()->null()->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
