<?php

class m160409_060643_add_status_position extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_position}}', 'status', 'TINYINT(1) NULL');
	}

	public function safeDown()
	{

	}
}