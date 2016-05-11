<style>
    @media print {
        aside{
            display: none !important;
        }
        #content{
            line-height: 0.7;
            margin-top: 0;
            
        }
        
    }
    ol {
        list-style-type: none; /* Убираем исходные маркеры */
        margin-bottom: 0;
    }    
    #content{
        line-height: 0.7;
        margin-top: 0;
    }
</style>
<table dir="LTR" width="999" cellpadding="7" cellspacing="0">
		<colgroup><col width="484">
		<col width="484">
		</colgroup><tbody><tr valign="TOP">
			<td width="484" style="border-right: 1px solid #00000a; padding: 0in 0.08in">
				<p align="CENTER" style="margin-bottom: 0in"><font color="#548dd4">
                                <font face="Times New Roman, serif"><font size="4" style="font-size: 16pt">Компания
				«Спаси</font></font></font><font color="#548dd4"><font face="Times New Roman, serif"><font size="4" style="font-size: 16pt"><span lang="en-US">Beaucoup</span></font></font></font><font color="#548dd4"><font face="Times New Roman, serif"><font size="4" style="font-size: 16pt">»</font></font></font></p>
				<p align="CENTER" style="margin-bottom: 0in"><font color="#548dd4"><font face="Times New Roman, serif"><font size="1">Республика
				Казахстан, г.Алматы, ул.Толе би 72</font></font></font></p>
				<p style="margin-bottom: 0in"><br>
				</p>
				<p style="margin-bottom: 0in;"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">г.Алматы
				                                                                 
				                                                                 
				                                                       
                                    </font></font><font color="#ff0000" class="pull-right"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><?= date('d.m.Yг.', strtotime($model->start_date))?></font></font></font></p>
				<p style="margin-bottom: 0in; text-align: center;"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">		ПОЛОЖЕНИЕ
                                    </font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">№<?= sprintf("%'.06d", $model->id);?>/<?= substr($model->start_date, 2,2)?></font></font></font></p>
				<p style="margin-left: 0.15in;margin-bottom: 0in;"><font color="#ff0000">         <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Гр.</font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
				<?= $model->listner->lastname .' '.$model->listner->name.($model->listner->name == $model->listner->patronymic ? '' : ' '.$model->listner->patronymic)?> </font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">в
				</font></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">сфере
				дополнительного образования (далее
				«Положение») от ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»</font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">.
				</font></font></font>
				</p>
				<ul>
					<li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">УСЛОВИЯ
					ПОЛУЧЕНИЯ УСЛУГ:</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Получение
						услуг в сфере дополнительного
                                                образования производится </font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
                                                    <?= $model->form->type->name . ' по ' .$model->subject->alias.' по тарифу '. $model->form->name?>
                                                </font></font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">согласно
						расписани</font></font><font color="#000000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">ю</font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">:
						<?php 
                                                    $times = split(',',$model->time);
                                                    foreach($times as $time){
                                                        echo $model->days($time);
                                                    }
                                                ?>
                                                </font></font></font></p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>НАЧАЛО</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						расчетного периода</font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="kk-KZ">:
                                                    с <?= date('d.m.Yг.', strtotime($model->start_period))?></span></font></font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>КОНЕЦ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						расчетного периода: </font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="kk-KZ">до
						<?= date('d.m.Yг.', strtotime($model->end_period))?></span></font></font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Общее
						количество уроков в месяц-</font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><?= $model->form->number?></font></font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Длительность
						одного урока –</font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">1
						астрономический час.</font></font></font></p>
					</li></ul>
				</li></ul>
				<p style="margin-left: 0.64in; margin-bottom: 0in"><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Номер
				учета посещаемости студентов </font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>или
				</b></font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">номер
				индивидуального учета посещаемости
				(подчеркнуть): <?= $model->code?></font></font></font></p>
				<ul>
					<ul>
						<li><p style="margin-bottom: 0in"><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Контакты:
						<?= $model->listner->phone?></font></font></font></p>
					</li></ul>
					<li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">УСЛОВИЯ
					ПОЛУЧЕНИЯ СЕРТИФИКАТА, СВИДЕТЕЛЬСТВУЮЩИЕ
					ОБ УРОВНЕ ЗНАНИЯ ЯЗЫКА</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Получении
						услуг в сфере дополнительного
						образования в ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»
						на платной основе в течении 3-х
						расчетных месяцев</font></font></p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Срок
						прохождения образовательного курса
						может быть изменен согласно
						мотивационному заявлению от
						Преподавателя, обучающего данного
						Студента.</font></font></p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Высокий
						уровень посещаемости. Ежемесячное
						позволительное количество пропусков
						– 2 (два).</font></font></p>
						</li><li><p style="margin-bottom: 0in">  <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Сдача
						итогового экзамена. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Уровень
						знания языка указывается на сертификате
						согласно итоговому экзамену. </font></font>
						</p>
					</li></ul>
					</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">УСЛОВИЯ
					ПО ПЕРЕВОДУ ОПЛАЧЕННЫХ ДЕНЕЖНЫХ
					СРЕДСТВ НА РЕЗЕРВ</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Перевод
						денежных средств на резерв производится
						в первую неделю расчетного месяца
						исключительно в случаях помещения,
						по требованию Государственно
						Уполномоченных Медицинских Учреждений
						(ГУМУ), Студента в изоляционные
						пункты. При предъявлении Заявления,
						заверенного подписью Студента и
						официального подтверждения от ГУМУ
						 </font></font>
						</p>
					</li></ul>
					</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">УСЛОВИЯ
					ВОЗВРАТА ОПЛАЧЕННЫХ ДЕНЕЖНЫХ СРЕДСТВ</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Полный
						или частичный возврат денежных
						средств возможен в случае не
						предоставления услуг ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»
						в течение календарного месяца со
						дня произведения оплаты Студентом
						по причине того, что запрашиваемая
						группа и/или предмет не существуют.
						При этом Студент должен иметь
						подтверждающий данную информацию
						документ в виде справки от Компании.
						</font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Полный
						или частичный возврат денежных
						средств возможен в случае прекращения
						предоставления услуг по инициативе
						ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»
						в течении календарного месяца со
						дня прекращения предоставления
						услуг. При этом Студент должен иметь
						подтверждающий данную информацию
						документ в виде заявления от Компании.</font></font></p>
					</li></ul>
					</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">ПЕРЕНОС
					И/ИЛИ РЕГУЛЯЦИЯ РАСПИСАНИЯ</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>ПЕРЕНОС
						УРОКОВ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						возможен при уведомлении представителя
						</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>АДМИНИСТРАЦИИ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						в лице </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>
						<?= $admin->last_name . ' ' . $admin->first_name?> : 8&nbsp;<?= $admin->phone?></b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						и/или </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>ЗА
						24 ЧАСА</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						до начала урока на время, указываемое
						представителями администрации
						(п.п.5.1. действует при индивидуальном
						курсе согласно п.п.1.1.) </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Перенос
						урока </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>НЕ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						возможен </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>БОЛЕЕ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						чем </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>2
						РАЗА</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						в период, согласно п.п. 1.4, 1.5.</font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">При
						не уведомлении и/или уведомлении
						менее чем за 24 часа до начала урока,
						урок считается проведенным. (п.п.5.2.
						действует при индивидуальном курсе
						согласно п.п.1.1.)</font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Перенос
						уроков осуществляется на время в
						период с 10.00 до </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span style="background: #ffff00">16.00</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">,
						согласно п.п. 5.1. в случае указания –
						тариф «Утро» в п.п. 1.1. настоящего
						Положения. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Перенос
						уроков осуществляется на время в
						период с 13.00 до 16.00 в рабочие дни,
						согласно п.п. 5.1. в случае указания –
						тариф «Дневной» в п.п. 1.1. настоящего
						Положения. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">При
						согласии всего состава группы и
						официального представителя
						администрации (п.п. 5.3 действует при
						групповом курсе согласно п.п.1.1.) </font></font>
						</p>
					</li></ul>
					</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">ДРУГИЕ
					УСЛОВИЯ</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Приобретение
						услуг в середине/конце расчетного
						месяца дает право Студенту получать
						услуги от ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»
						до последнего дня (включительно)
						данного расчетного месяца, согласно
						п.п.1.2...</font></font></p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">При
						регуляции отношений между Студентом
						и Преподавателем, принятые ими
						решения могут считаться недействительными.
						Регуляция отношений в данном случаи
						должна производиться Студентом и
						Администрацией. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Компания
						имеет право производить отмену урока
						с дальнейшим его проведением по
						административным и/или техническим
						причинам. При этом данный урок
						переносится на конец расчетного
						месяца, тем самым сдвигая конец
						расчетного месяца или переносится
						на день занятия по расписанию согласно
						п.п. 1.2. тем самым увеличивая длительность
						урока на 1 астрономический час. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Настоящее
						Положение действительно при наличии
						абонемента с информацией о сроках
						прохождения курса и Печатью Компании</font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Положение
						составлено в двух экземплярах. </font></font>
						</p>
					</li></ul>
				</li></ul>
				<p style="margin-left: 0.64in; margin-bottom: 0in"><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><u>Студент:</u></font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
				                                                                 
				                                                                 
                </font></font></font><font face="Times New Roman, serif" class="pull-right" style="margin-right:0.3in;"><font size="1" style="font-size: 6pt"><u>Администратор</u></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">	</font></font></p>
				
                                <p style="margin-left: 0.64in; margin-bottom: 0in">
                                    <font color="#ff0000" face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="kk-KZ"><u>/______________/<?= $model->listner->lastname . ' ' . mb_substr($model->listner->name, 0, 1).'.'?>/</u></span></font></font>                                   
                                
				                                                                 
                                <font face="Times New Roman, serif" class="pull-right"><font size="1" style="font-size: 6pt"><span lang="kk-KZ"><u>/___________/<?= $admin->last_name . ' ' . mb_substr($admin->first_name, 0, 1)?>./</u></span></font></font>
                                </p>
			</td>
                        <td width="484" style="border: 0; padding: 0in 0.08in">
				<p align="CENTER" style="margin-bottom: 0in"><font color="#548dd4">
				    <font face="Times New Roman, serif"><font size="4" style="font-size: 16pt">Компания
				«Спаси</font></font></font><font color="#548dd4"><font face="Times New Roman, serif"><font size="4" style="font-size: 16pt"><span lang="en-US">Beaucoup</span></font></font></font><font color="#548dd4"><font face="Times New Roman, serif"><font size="4" style="font-size: 16pt">»</font></font></font></p>
				<p align="CENTER" style="margin-bottom: 0in"><font color="#548dd4"><font face="Times New Roman, serif"><font size="1">Республика
				Казахстан, г.Алматы, ул.Толе би 72</font></font></font></p>
				<p style="margin-bottom: 0in"><br>
				</p>
				<p style="margin-bottom: 0in;"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">г.Алматы
				                                                                 
				                                                                 
				                                                       
                                    </font></font><font color="#ff0000" class="pull-right"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><?= date('d.m.Yг.', strtotime($model->start_date))?></font></font></font></p>
				<p style="margin-bottom: 0in; text-align: center;"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">		ПОЛОЖЕНИЕ
                                    </font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">№<?= sprintf("%'.06d", $model->id);?>/<?= substr($model->start_date, 2,2)?></font></font></font></p>
				<p style="margin-left: 0.15in;margin-bottom: 0in;"><font color="#ff0000">         <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Гр.</font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
				<?= $model->listner->lastname .' '.$model->listner->name.($model->listner->name == $model->listner->patronymic ? '' : ' '.$model->listner->patronymic)?> </font></font></font><font color="#000000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">в
				</font></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">сфере
				дополнительного образования (далее
				«Положение») от ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»</font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">.
				</font></font></font>
				</p>
				<ul>
					<li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">УСЛОВИЯ
					ПОЛУЧЕНИЯ УСЛУГ:</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Получение
						услуг в сфере дополнительного
                                                образования производится </font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
                                                    <?= $model->form->type->name . ' по ' .$model->subject->alias.' по тарифу '. $model->form->name?>
                                                </font></font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">согласно
						расписани</font></font><font color="#000000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">ю</font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">:
						<?php 
                                                    $times = split(',',$model->time);
                                                    foreach($times as $time){
                                                        echo $model->days($time);
                                                    }
                                                ?>
                                                </font></font></font></p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>НАЧАЛО</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						расчетного периода</font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="kk-KZ">:
                                                    с <?= date('d.m.Yг.', strtotime($model->start_period))?></span></font></font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>КОНЕЦ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						расчетного периода: </font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="kk-KZ">до
						<?= date('d.m.Yг.', strtotime($model->end_period))?></span></font></font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Общее
						количество уроков в месяц-</font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><?= $model->form->number?></font></font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Длительность
						одного урока –</font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">1
						астрономический час.</font></font></font></p>
					</li></ul>
				</li></ul>
				<p style="margin-left: 0.64in; margin-bottom: 0in"><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Номер
				учета посещаемости студентов </font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>или
				</b></font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">номер
				индивидуального учета посещаемости
				(подчеркнуть): <?= $model->code?></font></font></font></p>
				<ul>
					<ul>
						<li><p style="margin-bottom: 0in"><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Контакты:
						<?= $model->listner->phone?></font></font></font></p>
					</li></ul>
					<li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">УСЛОВИЯ
					ПОЛУЧЕНИЯ СЕРТИФИКАТА, СВИДЕТЕЛЬСТВУЮЩИЕ
					ОБ УРОВНЕ ЗНАНИЯ ЯЗЫКА</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Получении
						услуг в сфере дополнительного
						образования в ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»
						на платной основе в течении 3-х
						расчетных месяцев</font></font></p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Срок
						прохождения образовательного курса
						может быть изменен согласно
						мотивационному заявлению от
						Преподавателя, обучающего данного
						Студента.</font></font></p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Высокий
						уровень посещаемости. Ежемесячное
						позволительное количество пропусков
						– 2 (два).</font></font></p>
						</li><li><p style="margin-bottom: 0in">  <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Сдача
						итогового экзамена. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Уровень
						знания языка указывается на сертификате
						согласно итоговому экзамену. </font></font>
						</p>
					</li></ul>
					</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">УСЛОВИЯ
					ПО ПЕРЕВОДУ ОПЛАЧЕННЫХ ДЕНЕЖНЫХ
					СРЕДСТВ НА РЕЗЕРВ</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Перевод
						денежных средств на резерв производится
						в первую неделю расчетного месяца
						исключительно в случаях помещения,
						по требованию Государственно
						Уполномоченных Медицинских Учреждений
						(ГУМУ), Студента в изоляционные
						пункты. При предъявлении Заявления,
						заверенного подписью Студента и
						официального подтверждения от ГУМУ
						 </font></font>
						</p>
					</li></ul>
					</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">УСЛОВИЯ
					ВОЗВРАТА ОПЛАЧЕННЫХ ДЕНЕЖНЫХ СРЕДСТВ</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Полный
						или частичный возврат денежных
						средств возможен в случае не
						предоставления услуг ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»
						в течение календарного месяца со
						дня произведения оплаты Студентом
						по причине того, что запрашиваемая
						группа и/или предмет не существуют.
						При этом Студент должен иметь
						подтверждающий данную информацию
						документ в виде справки от Компании.
						</font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Полный
						или частичный возврат денежных
						средств возможен в случае прекращения
						предоставления услуг по инициативе
						ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»
						в течении календарного месяца со
						дня прекращения предоставления
						услуг. При этом Студент должен иметь
						подтверждающий данную информацию
						документ в виде заявления от Компании.</font></font></p>
					</li></ul>
					</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">ПЕРЕНОС
					И/ИЛИ РЕГУЛЯЦИЯ РАСПИСАНИЯ</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>ПЕРЕНОС
						УРОКОВ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						возможен при уведомлении представителя
						</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>АДМИНИСТРАЦИИ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						в лице </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>
						<?= $admin->last_name . ' ' . $admin->first_name?> : 8&nbsp;<?= $admin->phone?></b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						и/или </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>ЗА
						24 ЧАСА</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						до начала урока на время, указываемое
						представителями администрации
						(п.п.5.1. действует при индивидуальном
						курсе согласно п.п.1.1.) </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Перенос
						урока </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>НЕ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						возможен </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>БОЛЕЕ</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						чем </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><b>2
						РАЗА</b></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
						в период, согласно п.п. 1.4, 1.5.</font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">При
						не уведомлении и/или уведомлении
						менее чем за 24 часа до начала урока,
						урок считается проведенным. (п.п.5.2.
						действует при индивидуальном курсе
						согласно п.п.1.1.)</font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Перенос
						уроков осуществляется на время в
						период с 10.00 до </font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span style="background: #ffff00">16.00</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">,
						согласно п.п. 5.1. в случае указания –
						тариф «Утро» в п.п. 1.1. настоящего
						Положения. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Перенос
						уроков осуществляется на время в
						период с 13.00 до 16.00 в рабочие дни,
						согласно п.п. 5.1. в случае указания –
						тариф «Дневной» в п.п. 1.1. настоящего
						Положения. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">При
						согласии всего состава группы и
						официального представителя
						администрации (п.п. 5.3 действует при
						групповом курсе согласно п.п.1.1.) </font></font>
						</p>
					</li></ul>
					</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">ДРУГИЕ
					УСЛОВИЯ</font></font></p>
					<ul>
						<li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Приобретение
						услуг в середине/конце расчетного
						месяца дает право Студенту получать
						услуги от ТОО «Спаси</font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="en-US">Beaucoup</span></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">»
						до последнего дня (включительно)
						данного расчетного месяца, согласно
						п.п.1.2...</font></font></p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">При
						регуляции отношений между Студентом
						и Преподавателем, принятые ими
						решения могут считаться недействительными.
						Регуляция отношений в данном случаи
						должна производиться Студентом и
						Администрацией. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"> <font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Компания
						имеет право производить отмену урока
						с дальнейшим его проведением по
						административным и/или техническим
						причинам. При этом данный урок
						переносится на конец расчетного
						месяца, тем самым сдвигая конец
						расчетного месяца или переносится
						на день занятия по расписанию согласно
						п.п. 1.2. тем самым увеличивая длительность
						урока на 1 астрономический час. </font></font>
						</p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Настоящее
						Положение действительно при наличии
						абонемента с информацией о сроках
						прохождения курса и Печатью Компании</font></font></p>
						</li><li><p style="margin-bottom: 0in"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">Положение
						составлено в двух экземплярах. </font></font>
						</p>
					</li></ul>
				</li></ul>
				<p style="margin-left: 0.64in; margin-bottom: 0in"><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><u>Студент:</u></font></font></font><font color="#ff0000"><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">
				                                                                 
				                                                                 
                </font></font></font><font face="Times New Roman, serif" class="pull-right" style="margin-right: 0.3in;"><font size="1" style="font-size: 6pt"><u>Администратор</u></font></font><font face="Times New Roman, serif"><font size="1" style="font-size: 6pt">	</font></font></p>
				
                                <p style="margin-left: 0.64in; margin-bottom: 0in">
                                    <font color="#ff0000" face="Times New Roman, serif"><font size="1" style="font-size: 6pt"><span lang="kk-KZ"><u>/______________/<?= $model->listner->lastname . ' ' . mb_substr($model->listner->name, 0, 1).'.'?>/</u></span></font></font>
                                
				                                                                 
                                    <font face="Times New Roman, serif" class="pull-right"><font size="1" style="font-size: 6pt"><span lang="kk-KZ"><u>/___________/<?= $admin->last_name . ' ' . mb_substr($admin->first_name, 0, 1)?>./</u></span></font></font>
                                </p>
			</td>
                        
		</tr>
	</tbody></table>