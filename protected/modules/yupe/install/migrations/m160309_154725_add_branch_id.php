<?php

class m160309_154725_add_branch_id extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{user_teacher}}', 'branch_id', 'INT (11) NULL DEFAULT NULL');
            $this->addForeignKey('FK_spbp_user_teacher_spbp_branch_branch','{{user_teacher}}','branch_id','{{branch_branch}}','id');
	}

	public function safeDown()
	{

	}
}