<?php

class m160409_061001_alter_listner_add_status extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_listner}}', 'is_test', 'TINYINT(1) NULL DEFAULT 0');
	}

	public function safeDown()
	{

	}
}