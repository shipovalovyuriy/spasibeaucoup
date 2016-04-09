<?php

class m160409_060212_alter_schedule extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_position}}', 'is_test', 'TINYINT(1) NULL');
	}

	public function safeDown()
	{

	}
}