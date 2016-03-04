<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontGridView
 *
 * @author Каиржан
 */
namespace yupe\widgets;
use CHtml;
use Yii;
use yupe\models\Settings;
use CClientScript;

class FrontGridView extends CustomGridView  
{   
    private $uid;
    /**
     *  model name variable
     * @access private
     * @see  CustomGridView()
     * @uses init, returnBootstrapStatusHtml, getUpDownButtons, _updatePageSize
     * @var string
     */
    private $_modelName;
    public function renderBulkActions()
    {
        \Booster::getBooster()->registerAssetJs('jquery.saveselection.gridview.js');
        $this->componentsAfterAjaxUpdate[] = "$.fn.yiiGridView.afterUpdateGrid('" . $this->id . "');";
        echo '<tr><td colspan="' . count($this->columns) . '" class="grid-toolbar">';
        if (!empty($this->bulk)) {
            $this->bulk->renderButtons();
        }
        if (!empty($this->actionsButtons)) {
            if (is_array($this->actionsButtons)) {
                foreach ($this->actionsButtons as $button) {
                    echo $button;
                }
            } else {
                echo CHtml::link(
                    Yii::t('YupeModule.yupe', 'Add'),
                    [
                        '/' . $this->getController()->getModule()->getId() . '/' . lcfirst(
                            $this->_modelName
                        ) . 'create'
                    ],
                    ['class' => 'btn btn-success pull-right btn-sm']
                );
            }
        }
        echo '</td></tr>';
    }
}
