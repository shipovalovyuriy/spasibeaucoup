<?php

class m160417_134024_alter_group_status_add extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_group}}', 'is_active', 'TINYINT(1)');
	}

	public function safeDown()
	{

	}
}