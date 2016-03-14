<?php


class BalanceBackendController extends \yupe\components\controllers\BackController {


    public function actionIndex(){

        $inflowArr = Inflow::model()->findAll();
        $outflowArr = Outflow::model()->findAll();

        $this->render('index',array('inflow'=>$inflowArr,'outflow'=>$outflowArr));
    }


}