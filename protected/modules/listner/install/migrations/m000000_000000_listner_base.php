<?php
/**
 * Listner install migration
 * Класс миграций для модуля Listner:
 *
 * @category YupeMigration
 * @package  yupe.modules.listner.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     http://yupe.ru
 **/
class m000000_000000_listner_base extends yupe\components\DbMigration
{
    /**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->createTable(
            '{{listner}}',
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
        $this->createIndex("ix_{{listner}}_create_user", '{{listner}}', "create_user_id", false);
        $this->createIndex("ix_{{listner}}_update_user", '{{listner}}', "update_user_id", false);
        $this->createIndex("ix_{{listner}}_create_time", '{{listner}}', "create_time", false);
        $this->createIndex("ix_{{listner}}_update_time", '{{listner}}', "update_time", false);

    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropTableWithForeignKeys('{{listner}}');
    }
}
