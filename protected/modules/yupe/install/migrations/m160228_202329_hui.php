<?php

class m160228_202329_hui extends yupe\components\DbMigration
{
	public function safeUp()
	{
		$this->addForeignKey('FK_roomID','{{listner_schedule}}','room_id','{{branch_room}}','id');
	}

	public function safeDown()
	{

	}
}