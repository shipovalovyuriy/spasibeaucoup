<?php

class m160229_085743_number_in_week extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{form_form}}', 'number_in_week', 'TINYINT (2)');
	}

	public function safeDown()
	{

	}
}