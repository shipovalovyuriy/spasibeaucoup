<?php


class BalanceController extends \yupe\components\controllers\FrontController
{

    public function actionShow()
    {
        $date = explode('-', $_GET['daterange']);
        $branch = $_GET['branch'];
        $d1 = date('Y-m-d', strtotime($date[0]));
        $d2 = date('Y-m-d', strtotime($date[1]));
        $inflow = [];
        $outflow = [];
        $totalArr = [];
        // Формирование моделей
        $criteria = new CDbCriteria();
        if($branch=="all"){$criteria->condition = 'date =:date1';}else{$criteria->condition = 'date =:date1 AND branch_id=:br';}
        $arr = [];
        $in = 0;
        $out = 0;
        $totalIn = 0;
        $totalOut = 0;
        $total = 0;
        while ($d1 <= $d2) {
            if($branch=="all"){$criteria->params = [":date1" => $d1];}else{$criteria->params = [":date1" => $d1,'br'=>$branch];}
            $inflowArr = Inflow::model()->findAll($criteria);
            if ($inflowArr) {
                foreach ($inflowArr as $value) {
                    array_push($inflow, $value);
                    $in += $value->price;
                    $totalIn+=$in;
                }
            }
            $outflowArr = Outflow::model()->findAll($criteria);
            if ($outflowArr) {
                foreach ($outflowArr as $value) {
                    array_push($outflow, $value);
                    $out += (int)$value->price;
                    $totalOut+=$out;
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

        //$this->render('search', array('inflow' => $inflow, 'outflow' => $outflow, 'totalflow' => $totalArr));
        $this->actionPrint($inflow,$outflow,$totalArr,$totalIn,$totalOut);

    }

    public function actionIndex()
    {

        $model = Branch::model()->findAll();
        $this->render('index',['model'=>$model]);

    }


    public function actionPrint($inflow,$outflow,$totalArr,$in,$out)
    {
        $costArr = Cost::model()->findAll();

        $codeArr = Subject::model()->findAll();
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
            ->setCellValue("B1", "Шифр")
            ->setCellValue("C1", "Основание")
            ->setCellValue("D1", "Исполнитель")
            ->setCellValue("E1", "Оплата")
            ->setCellValue("F1", "Другая информация")
            ->setCellValue("H1", "Наименование услуги")
            ->setCellValue("I1", "Шифр");

        $sheet2->setCellValue("A1", "Дата")
            ->setCellValue("B1", "Шифр")
            ->setCellValue("C1", "Получатель")
            ->setCellValue("D1", "Сумма")
            ->setCellValue("E1", "Основание")
            ->setCellValue("F1", "Комментарий")
            ->setCellValue("H1", "Наименование")
            ->setCellValue("I1", "Шифр");

        $sheet3->setCellValue("A1", "Дата")
            ->setCellValue("B1", "Приход")
            ->setCellValue("C1", "Расход");


        //Inflow
        $i = 2;
        foreach ($codeArr as $value) {
            $sheet1->setCellValue("H" . $i, $value->name)
                ->setCellValue("I" . $i, $value->code);


            $i++;
        }

        $i = 2;

        foreach ($inflow as $value) {
            $sheet1->setCellValue("A" .$i, $value->date)
                ->setCellValue("B" . $i, $value->subject->code)
                ->setCellValue("C" . $i, $value->based)
                ->setCellValue("D" . $i, $value->receiver)
                ->setCellValue("E" . $i, $value->form->price)
                ->setCellValue("F" . $i, $value->comment);

            $i++;
        }
        $sheet1->setCellValue('A'.$i,"Итог:");
        $sheet1->setCellValue('B'.$i,$in);

        //Outflow
        $i = 2;
        foreach ($costArr as $value) {
            $sheet2->setCellValue("H" . $i, $value->name)
                ->setCellValue("I" . $i, $value->code);


            $i++;
        }

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

                $sheet2->setCellValue('A'.$i,"Итог:");
        $sheet2->setCellValue('B'.$i,$out);

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