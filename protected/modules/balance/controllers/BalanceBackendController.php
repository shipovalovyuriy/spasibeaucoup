<?php


class BalanceBackendController extends \yupe\components\controllers\BackController
{

    public function actionShow()
    {


        $gavno = explode('-', $_GET['daterange']);
        $d1 = date('Y-m-d', strtotime($gavno[0]));
        $d2 = date('Y-m-d', strtotime($gavno[1]));


////////////////////////////////////////////////////////////////////

        // Формирование моделей

        $criteria = new CDbCriteria();
        $criteria->condition = 'date =:date1';
        $criteria->params = [":date1" => $d1];
        $inflow = [];
        $outflow = [];
        $totalArr = [];
        $arr = [];
        $in = 0;
        $out = 0;
        $total=0;
        while ($d1 <= $d2) {
            $criteria->params = [":date1" => $d1];
            $inflowArr = Inflow::model()->findAll($criteria);
            if ($inflowArr) {
                foreach ($inflowArr as $value) {
                    array_push($inflow, $value);
                    $in += $value->form->price;
                }
            }
            $outflowArr = Outflow::model()->findAll($criteria);
            if ($outflowArr) {
                foreach ($outflowArr as $value) {
                    array_push($outflow, $value);
                    $out += (int)$value->price;
                }
            }

            if ($inflowArr||$outflowArr){
            $arr['date'] = $d1;
            $arr['inflow'] = $in;
            $arr['outflow'] = $out;
                $total+=$in - $out;
            $arr['total'] = $total;
            array_push($totalArr,$arr);
            }
            $d1 = date('Y-m-d', strtotime("+1 day", strtotime($d1)));
            $in = 0;
            $out = 0;

        }


//////////////////////////////////////////////////////////////////////


        $this->render('search', array('inflow' => $inflow, 'outflow' => $outflow,'totalflow'=>$totalArr));
    }

    public function actionIndex()
    {

        $this->render('index');

    }


}