<?php

class m160415_064056_FK_lisnter_alter extends yupe\components\DbMigration
{
	public function safeUp()
	{
            $this->dropForeignKey('FK__spbp_listner_position', 'spbp_listner_schedule');
            $this->dropForeignKey('FK_roomID', 'spbp_listner_schedule');
            $this->dropForeignKey('FK_schedule_group', 'spbp_listner_schedule');
            $this->dropIndex('FK__spbp_listner_position', 'spbp_listner_schedule');
            $this->dropIndex('FK_roomID', 'spbp_listner_schedule');
            $this->dropIndex('FK_schedule_group', 'spbp_listner_schedule');
	}

	public function safeDown()
	{

	}
}