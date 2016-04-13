<?php

class m160413_104221_alter_subject extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->addColumn('{{subject_subject}}', 'alias', 'VARCHAR (50) NULL');
	}

	public function safeDown()
	{

	}
}