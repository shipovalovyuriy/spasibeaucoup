<?php

class m160531_170901_alter_schedule_add_status extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_schedule}}', 'is_active', 'TINYINT(1) DEFAULT 1');
	}

	public function safeDown()
	{

	}
}