<?php

class m160416_035007_alter_group_parent_position extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_group}}', 'parent_id', 'INT(11)');
	}

	public function safeDown()
	{

	}
}