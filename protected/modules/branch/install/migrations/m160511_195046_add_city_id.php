<?php

class m160511_195046_add_city_id extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{branch_branch}}', 'city_id', 'INT(11)');
	}

	public function safeDown()
	{

	}
}