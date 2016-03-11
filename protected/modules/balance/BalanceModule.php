<?php
/**
 * BalanceModule основной класс модуля balance
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.balance
 * @since 0.1
 */

class BalanceModule  extends yupe\components\WebModule
{
    const VERSION = '0.9.8';

    /**
     * Массив с именами модулей, от которых зависит работа данного модуля
     *
     * @return array
     */
    public function getDependencies()
    {
        return parent::getDependencies();
    }

    /**
     * Работоспособность модуля может зависеть от разных факторов: версия php, версия Yii, наличие определенных модулей и т.д.
     * В этом методе необходимо выполнить все проверки.
     *
     * @return array или false
     */
    public function checkSelf()
    {
        return parent::checkSelf();
    }

    /**
     * Каждый модуль должен принадлежать одной категории, именно по категориям делятся модули в панели управления
     *
     * @return string
     */
    public function getCategory()
    {
        return Yii::t('BalanceModule.balance', 'Balance');
    }

    /**
     * массив лейблов для параметров (свойств) модуля. Используется на странице настроек модуля в панели управления.
     *
     * @return array
     */
    public function getParamsLabels()
    {
        return parent::getParamsLabels();
    }

    /**
     * массив параметров модуля, которые можно редактировать через панель управления (GUI)
     *
     * @return array
     */
    public function getEditableParams()
    {
        return parent::getEditableParams();
    }

    /**
     * массив групп параметров модуля, для группировки параметров на странице настроек
     *
     * @return array
     */
    public function getEditableParamsGroups()
    {
        return parent::getEditableParamsGroups();
    }

    /**
     * если модуль должен добавить несколько ссылок в панель управления - укажите массив
     *
     * @return array
     */
    public function getNavigation()
    {
        return [
            ['label' => Yii::t('BalanceModule.balance', 'balance')],
            [
                'icon' => 'fa fa-fw fa-list-alt',
                'label' => Yii::t('BalanceModule.balance', 'Index'),
                'url' => ['/balance/balanceBackend/index']
            ],
        ];
    }

    /**
     * текущая версия модуля
     *
     * @return string
     */
    public function getVersion()
    {
        return Yii::t('BalanceModule.balance', self::VERSION);
    }

    /**
     * веб-сайт разработчика модуля или страничка самого модуля
     *
     * @return string
     */
    public function getUrl()
    {
        return Yii::t('BalanceModule.balance', 'http://yupe.ru');
    }

    /**
     * Возвращает название модуля
     *
     * @return string.
     */
    public function getName()
    {
        return Yii::t('BalanceModule.balance', 'balance');
    }

    /**
     * Возвращает описание модуля
     *
     * @return string.
     */
    public function getDescription()
    {
        return Yii::t('BalanceModule.balance', 'Описание модуля "balance"');
    }

    /**
     * Имя автора модуля
     *
     * @return string
     */
    public function getAuthor()
    {
        return Yii::t('BalanceModule.balance', 'yupe team');
    }

    /**
     * Контактный email автора модуля
     *
     * @return string
     */
    public function getAuthorEmail()
    {
        return Yii::t('BalanceModule.balance', 'team@yupe.ru');
    }

    /**
     * Ссылка, которая будет отображена в панели управления
     * Как правило, ведет на страничку для администрирования модуля
     *
     * @return string
     */
    public function getAdminPageLink()
    {
        return '/balance/balanceBackend/index';
    }

    /**
     * Название иконки для меню админки, например 'user'
     *
     * @return string
     */
    public function getIcon()
    {
        return "fa fa-fw fa-pencil";
    }

    /**
      * Возвращаем статус, устанавливать ли галку для установки модуля в инсталяторе по умолчанию:
      *
      * @return bool
      **/
    public function getIsInstallDefault()
    {
        return parent::getIsInstallDefault();
    }

    /**
     * Инициализация модуля, считывание настроек из базы данных и их кэширование
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        $this->setImport(
            [
                'balance.models.*',
                'balance.components.*',
            ]
        );
    }

    /**
     * Массив правил модуля
     * @return array
     */
    public function getAuthItems()
    {
        return [
            [
                'name' => 'Balance.BalanceManager',
                'description' => Yii::t('BalanceModule.balance', 'Manage balance'),
                'type' => AuthItem::TYPE_TASK,
                'items' => [
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Balance.BalanceBackend.Index',
                        'description' => Yii::t('BalanceModule.balance', 'Index')
                    ],
                ]
            ]
        ];
    }
}
