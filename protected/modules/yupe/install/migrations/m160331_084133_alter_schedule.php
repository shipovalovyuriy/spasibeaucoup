<?php

class m160331_084133_alter_schedule extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{listner_schedule}}', 'group_id', 'INT(11)');
            $this->addForeignKey('FK_schedule_group', '{{listner_schedule}}', 'group_id', '{{listner_group}}', 'id');
	}

	public function safeDown()
	{

	}
}