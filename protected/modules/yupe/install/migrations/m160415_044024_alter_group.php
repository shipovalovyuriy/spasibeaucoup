<?php

class m160415_044024_alter_group extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_group}}', 'branch_id', 'INT(11) NOT NULL');
            $this->addColumn('{{listner_group}}', 'subject_id', 'INT(11) NOT NULL');
            $this->addColumn('{{listner_group}}', 'code', 'VARCHAR(50) NULL');
	}

	public function safeDown()
	{

	}
}