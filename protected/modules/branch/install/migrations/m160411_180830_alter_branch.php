<?php

class m160411_180830_alter_branch extends yupe\components\DbMigration
{
	public function safeUp()
	{   
            $table = '{{branch_branch}}';
            $type = 'INT(11) NULL';
            $this->addColumn($table, 'individual_counter', $type);
            $this->addColumn($table, 'group_counter', $type);
	}

	public function safeDown()
	{

	}
}