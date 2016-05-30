<?php

class m160530_191125_add_teacher_to_schedule extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('spbp_listner_schedule', 'teacher_id', 'INT(11)');
	}

	public function safeDown()
	{
            $this->dropColumn('spbp_listner_schedule', 'teacher_id');
	}
}