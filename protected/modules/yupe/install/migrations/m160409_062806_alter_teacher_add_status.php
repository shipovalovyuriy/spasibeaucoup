<?php

class m160409_062806_alter_teacher_add_status extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{user_teacher}}', 'is_test', 'TINYINT(1) NULL DEFAULT 0');
	}

	public function safeDown()
	{

	}
}