<?php

class m160531_163832_alter_position_add_is_old extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_position}}', 'is_old', 'TINYINT(1)');
	}

	public function safeDown()
	{
            $this->dropColumn('{{listner_position}}', 'is_old');
	}
}