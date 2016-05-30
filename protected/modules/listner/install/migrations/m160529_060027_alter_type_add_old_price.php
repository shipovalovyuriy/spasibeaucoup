<?php

class m160529_060027_alter_type_add_old_price extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{form_form}}', 'old_price', 'INT(11)');
	}

	public function safeDown()
	{

	}
}