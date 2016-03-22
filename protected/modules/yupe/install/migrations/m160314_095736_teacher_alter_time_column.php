<?php

class m160314_095736_teacher_alter_time_column extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $table = '{{user_teacher}}';
        $this->dropColumn($table, 'time');
        $this->addColumn($table, 'start_time', 'VARCHAR (50)');
        $this->addColumn($table, 'end_time', 'VARCHAR (50)');
    }

    public function safeDown()
    {

    }
}