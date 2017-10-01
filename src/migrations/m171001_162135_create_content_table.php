<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content`.
 */
class m171001_162135_create_content_table extends Migration
{
    protected $tableName = 'content';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey()->unsigned(),
            'content_type_id' => $this->string(64)->null()->defaultValue(null),
            'title' => $this->string(128)->null()->defaultValue(null),
            'summary' => $this->string(256)->null()->defaultValue(null),
            'body' => $this->text()->null()->defaultValue(null),
            'icon' => $this->string(128)->null()->defaultValue(null),
            'tip' => $this->string(128)->null()->defaultValue(null),
            'created_at' => $this->dateTime()->null()->defaultValue(null),
            'updated_at' => $this->dateTime()->null()->defaultValue(null),
            'created_by' => $this->integer()->null()->defaultValue(null),
            'updated_by' => $this->integer()->null()->defaultValue(null),
            'start_date' => $this->dateTime()->null()->defaultValue(null),
            'end_date' => $this->dateTime()->null()->defaultValue(null),
            'content_before' => $this->text()->null()->defaultValue(null),
            'content_after' => $this->text()->null()->defaultValue(null),
            'is_block_page' => $this->integer()->null()->defaultValue(0),
        ]);

        $this->createIndex(
            'idx_content_type_id',
            $this->tableName,
            'content_type_id'
        );

        $this->addForeignKey(
            'fk-content-content_type_id',
            $this->tableName,
            'content_type_id',
            'content_type',
            'id',
            'RESTRICT'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
