<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_relation_manager`.
 */
class m171001_162154_create_content_relation_manager_table extends Migration
{
    protected $tableName = 'content_relation_manager';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'contente_parent_id' => $this->integer()->unsigned()->null()->defaultValue(null),
            'content_child_id' => $this->integer()->unsigned()->null()->defaultValue(null),
            'position' => $this->integer()->null()->defaultValue(null),
        ]);

        $this->createIndex(
            'idx_contente_parent_id',
            $this->tableName,
            'contente_parent_id'
        );

        $this->addForeignKey(
            'fk-content_relation_manager-contente_parent_id',
            $this->tableName,
            'contente_parent_id',
            'content',
            'id',
            'RESTRICT'
        );

        $this->createIndex(
            'idx_content_child_id',
            $this->tableName,
            'content_child_id'
        );

        $this->addForeignKey(
            'fk-content_relation_manager-content_child_id',
            $this->tableName,
            'content_child_id',
            'content',
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
