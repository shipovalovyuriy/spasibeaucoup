<?php
/**
 * Subject install migration
 * Класс миграций для модуля Subject:
 *
 * @category YupeMigration
 * @package  yupe.modules.subject.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     http://yupe.ru
 **/
class m000000_000000_subject_base extends yupe\components\DbMigration
{
    /**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->createTable(
            '{{subject}}',
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
        $this->createIndex("ix_{{subject}}_create_user", '{{subject}}', "create_user_id", false);
        $this->createIndex("ix_{{subject}}_update_user", '{{subject}}', "update_user_id", false);
        $this->createIndex("ix_{{subject}}_create_time", '{{subject}}', "create_time", false);
        $this->createIndex("ix_{{subject}}_update_time", '{{subject}}', "update_time", false);

    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropTableWithForeignKeys('{{subject}}');
    }
}
