<?php

class m160406_102431_alter_position_first_parent extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_position}}', 'first_parent', 'INT(11) NULL');
	}

	public function safeDown()
	{

	}
}