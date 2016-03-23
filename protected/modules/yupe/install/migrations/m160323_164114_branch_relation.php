<?php

class m160323_164114_branch_relation extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->dropForeignKey('FK__spbp_user_user', '{{branch_branch}}');
            $this->dropColumn('{{branch_branch}}', 'parent_id');            
            $this->addColumn('{{user_user}}', 'branch_id', 'INT(11) NULL DEFAULT NULL');
            $this->addForeignKey('FK__spbp_user_branch', '{{user_user}}', 'branch_id', '{{branch_branch}}', 'id','SET NULL','CASCADE');
        }

	public function safeDown()
	{

	}
}