<?php

class m160323_191726_add_column_for_position_doc extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $table = '{{listner_position}}';
            $this->addColumn($table, 'start_period', 'DATE NOT NULL');
            $this->addColumn($table, 'end_period', 'DATE NOT NULL');
            $this->addColumn($table, 'parent_id', 'INT(11) NULL');
            $this->addForeignKey('FK_position_parent_position', $table, 'parent_id', $table, 'id');
	}

	public function safeDown()
	{

	}
}