<?php

class m160228_050238_alter_user extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('user_user', 'salary', 'VARCHAR(50) NULL DEFAULT NULL');
            $this->addColumn('user_user', 'salary_date', 'DATE NULL DEFAULT NULL');
	}

	public function safeDown()
	{

	}
}