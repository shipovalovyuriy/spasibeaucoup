<?php

class m160416_075441_alter_group_as_pos extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_group}}', 'parent_group', 'INT(11)');
            $this->addColumn('{{listner_group}}', 'first_parent_group', 'INT(11)');
	}

	public function safeDown()
	{

	}
}