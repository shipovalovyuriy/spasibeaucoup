<?php

class m160229_063016_start_date extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_position}}', 'start_date', 'DATE NOT NULL');
	}

	public function safeDown()
	{

	}
}