<?php
/**
 * Branch install migration
 * Класс миграций для модуля Branch:
 *
 * @category YupeMigration
 * @package  yupe.modules.branch.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     http://yupe.ru
 **/
class m000000_000000_branch_base extends yupe\components\DbMigration
{
    /**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->createTable(
            '{{branch}}',
            [
                'id'             => 'pk',
                //для удобства добавлены некоторые базовые поля, которые могут пригодиться.
                'create_user_id' => "integer NOT NULL",
                'update_user_id' => "integer NOT NULL",
                'create_time'    => 'datetime NOT NULL',
                'update_time'    => 'datetime NOT NULL',
            ],
            $this->getOptions()
        );

        //ix
        $this->createIndex("ix_{{branch}}_create_user", '{{branch}}', "create_user_id", false);
        $this->createIndex("ix_{{branch}}_update_user", '{{branch}}', "update_user_id", false);
        $this->createIndex("ix_{{branch}}_create_time", '{{branch}}', "create_time", false);
        $this->createIndex("ix_{{branch}}_update_time", '{{branch}}', "update_time", false);

    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropTableWithForeignKeys('{{branch}}');
    }
}
