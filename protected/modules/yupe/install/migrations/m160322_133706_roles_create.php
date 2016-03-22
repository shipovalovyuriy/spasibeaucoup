<?php

class m160322_133706_roles_create extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->createTable(
                '{{user_role}}',
                [
                    'id'          => 'pk',
                    'name'        => 'varchar(50) NOT NULL',
                ]
        );
        $this->createTable(
                '{{user_role_to_user}}',
                [
                    'id'          => 'pk',
                    'user_id'     => 'integer(11) NOT NULL',
                    'role_id'     => 'integer(11) NOT NULL'
                ]
        );
        $this->addForeignKey(
                'FK_spbp_user_role_spbp_user_role',
                    '{{user_role_to_user}}','role_id','{{user_role}}','id'
        );
        $this->addForeignKey(
                'FK_spbp_user_role_spbp_user_user',
                    '{{user_role_to_user}}','user_id','{{user_user}}','id'
        );
    }

    public function safeDown()
    {

    }
}