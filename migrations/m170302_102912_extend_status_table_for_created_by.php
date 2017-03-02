<?php

use yii\db\Migration;

class m170302_102912_extend_status_table_for_created_by extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->addColumn('{{%status}}', 'created_by', $this->integer()->notNull());
        $this->addForeignKey('fk_status_created_by', 'status', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_status_created_by', '{{%status}}');
        $this->dropColumn('status', 'created_by');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
