<?php

class m160409_085854_alter_group extends yupe\components\DbMigration
{
	public function safeUp()
	{
		$this->addColumn('{{listner_group}}','lvl','varchar(50) NULL');
		$this->addColumn('{{listner_group}}','note','varchar(255) NULL');
		$this->addColumn('{{listner_group}}','teacher_id','INT(11) NULL');
		$this->addForeignKey('FK1_group_teacher1','{{listner_group}}','teacher_id','{{user_teacher}}','id');
	}

	public function safeDown()
	{

	}
}