<?php

class m160324_154046_subject_to_branch_status extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{subject_to_branch}}', 'is_active', 'TINYINT(1) NULL DEFAULT 1');
	}

	public function safeDown()
	{

	}
}