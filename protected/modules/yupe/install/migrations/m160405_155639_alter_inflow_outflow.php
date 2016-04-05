<?php

class m160405_155639_alter_inflow_outflow extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{balance_inflow}}', 'branch_id', 'INT (11) NULL DEFAULT NULL');
            $this->addForeignKey('FK_spbp_balance_inflow_spbp_branch_branch','{{balance_inflow}}','branch_id','{{branch_branch}}','id');
            $this->addColumn('{{balance_outflow}}', 'branch_id', 'INT (11) NULL DEFAULT NULL');
            $this->addForeignKey('FK_spbp_balance_outflow_spbp_branch_branch','{{balance_outflow}}','branch_id','{{branch_branch}}','id');
	}

	public function safeDown()
	{

	}
}