<?php

use yii\db\Migration;

class m170302_132716_extend_status_table_for_slugs extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->addColumn('status', 'slug', $this->string()->notNull());
    }

    public function down()
    {
        $this->dropColumn('status', 'slug');
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
