<?php

class m160409_071137_alter_user_is_test extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{user_user}}', 'is_test', 'TINYINT(1) NULL DEFAULT 0');
	}

	public function safeDown()
	{

	}
}