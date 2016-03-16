<?php


class BalanceController extends \yupe\components\controllers\FrontController
{

    public function actionShow()
    {


        $gavno = explode('-', $_GET['daterange']);
        $d1 = date('Y-m-d', strtotime($gavno[0]));
        $d2 = date('Y-m-d', strtotime($gavno[1]));
        $inflow = [];
        $outflow = [];
        $totalArr = [];

        ////////////////////////////////////////////////////////////////////

        // Формирование моделей

        $criteria = new CDbCriteria();
        $criteria->condition = 'date =:date1';
        $criteria->params = [":date1" => $d1];
        $arr = [];
        $in = 0;
        $out = 0;
        $total = 0;
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

            if ($inflowArr || $outflowArr) {
                $arr['date'] = $d1;
                $arr['inflow'] = $in;
                $arr['outflow'] = $out;
                $total += $in - $out;
                $arr['total'] = $total;
                array_push($totalArr, $arr);
            }
            $d1 = date('Y-m-d', strtotime("+1 day", strtotime($d1)));
            $in = 0;
            $out = 0;

        }

        $this->actionPrint($inflow,$outflow,$totalArr);

/*        $this->render('search', array('inflow' => $inflow, 'outflow' => $outflow, 'totalflow' => $totalArr));*/

    }

    public function actionIndex()
    {

        $this->render('index');

    }


    public function actionPrint($inflow,$outflow,$totalArr)
    {


    //////////////////////////////////////////////////////////////////////

        //Формирование файла exel

        $phpExcelPath = Yii::getPathOfAlias('application.components.phpexel');


        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Спасибоку")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Балансовая ведомость")
            ->setSubject("Спасибоку")
            ->setDescription("Балансовая ведомость, отражающая приход и расход")
            ->setKeywords("Приход,Расход,Итог")
            ->setCategory("Test result file");

        //Создание вкладок
        $sheet1 = $objPHPExcel->createSheet(0);
        $sheet2 = $objPHPExcel->createSheet(1);
        $sheet3 = $objPHPExcel->createSheet(2);

        $sheet1->setTitle("Приход");
        $sheet2->setTitle("Расход");
        $sheet3->setTitle("Итог");

        //Создание заголовков

        $sheet1->setCellValue("A1", "Дата")
            ->setCellValue("B1", "Код предмета")
            ->setCellValue("C1", "Получатель")
            ->setCellValue("D1", "Сумма")
            ->setCellValue("E1", "Основание")
            ->setCellValue("F1", "Комментарий");

        $sheet2->setCellValue("A1", "Дата")
            ->setCellValue("B1", "Шифр")
            ->setCellValue("C1", "Получатель")
            ->setCellValue("D1", "Сумма")
            ->setCellValue("E1", "Основание")
            ->setCellValue("F1", "Комментарий");

        $sheet3->setCellValue("A1", "Дата")
            ->setCellValue("B1", "Приход")
            ->setCellValue("C1", "Расход");


        //Inflow
        $i = 2;
        foreach ($inflow as $value) {
            $sheet1->setCellValue("A" . $i, $value->date)
                ->setCellValue("B" . $i, $value->subject->code)
                ->setCellValue("C" . $i, $value->receiver)
                ->setCellValue("D" . $i, $value->form->price)
                ->setCellValue("E" . $i, $value->based)
                ->setCellValue("F" . $i, $value->comment);

            $i++;
        }

        //Outflow
        $i = 2;
        foreach ($outflow as $value) {
            $sheet2->setCellValue("A" . $i, $value->date)
                ->setCellValue("B" . $i, $value->cost->name)
                ->setCellValue("C" . $i, $value->receiver)
                ->setCellValue("D" . $i, $value->price)
                ->setCellValue("E" . $i, $value->based)
                ->setCellValue("F" . $i, $value->note);
            $i++;
        }

        //Total
        $i = 2;
        foreach ($totalArr as $value) {
            $sheet3->setCellValue("A" . $i, $value['date'])
                ->setCellValue("B" . $i, $value['inflow'])
                ->setCellValue("C" . $i, $value['outflow']);
            $i++;
        }

        $x = array_pop($totalArr);

        $sheet3->setCellValue("A" . $i, "Итог");
        $sheet3->setCellValue("C" . $i, $x['total']);


        //////////////////////////////////////////////////////////////

        // Автоматическое скачивание файла
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="total.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        ////////////////////


    }


}