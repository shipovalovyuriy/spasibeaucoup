<?php

class m160228_054101_add_time extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{user_teacher}}', 'time', 'VARCHAR(50) NULL DEFAULT NULL');
            $this->addColumn('{{listner_position}}', 'time', 'VARCHAR(255) NULL DEFAULT NULL');
            $this->addColumn('{{listner_schedule}}', 'time', 'VARCHAR(50) NULL DEFAULT NULL');
	}

	public function safeDown()
	{

	}
}