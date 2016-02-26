<?php
/**
 * Teacher install migration
 * Класс миграций для модуля Teacher:
 *
 * @category YupeMigration
 * @package  yupe.modules.teacher.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     http://yupe.ru
 **/
class m000000_000000_teacher_base extends yupe\components\DbMigration
{
    /**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->createTable(
            '{{teacher}}',
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
        $this->createIndex("ix_{{teacher}}_create_user", '{{teacher}}', "create_user_id", false);
        $this->createIndex("ix_{{teacher}}_update_user", '{{teacher}}', "update_user_id", false);
        $this->createIndex("ix_{{teacher}}_create_time", '{{teacher}}', "create_time", false);
        $this->createIndex("ix_{{teacher}}_update_time", '{{teacher}}', "update_time", false);

    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropTableWithForeignKeys('{{teacher}}');
    }
}
