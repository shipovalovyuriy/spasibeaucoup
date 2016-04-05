<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('SubjectModule.subject', 'Предметы') => ['/subject/subject/index'],
    Yii::t('SubjectModule.subject', 'Управление'),
];

$this->pageTitle = Yii::t('SubjectModule.subject', 'Предметы - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('SubjectModule.subject', 'Управление Предметами'), 'url' => ['/subject/subject/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('SubjectModule.subject', 'Добавить Предмет'), 'url' => ['/subject/subject/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('SubjectModule.subject', 'Предметы'); ?>
        <small><?php echo Yii::t('SubjectModule.subject', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('SubjectModule.subject', 'Поиск Предметов');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('subject-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('SubjectModule.subject', 'В данном разделе представлены средства управления Предметами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'subject-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'name',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
<script>
    $(function(){
        jQuery(document).on('click','#subject-grid a.delete',function() {
	if(!confirm('Вы уверены, что хотите удалить данный элемент?')) return false;
	var th = this,
		afterDelete = function(){};
	jQuery('#subject-grid').yiiGridView('update', {
		type: 'POST',
		url: jQuery(this).attr('href'),
		data:{ 'YUPE_TOKEN':'848a6ba2dde1353b60ce6994f55b11ff12274ec1' },
		success: function(data) {
			jQuery('#subject-grid').yiiGridView('update');
			afterDelete(th, true, data);
		},
		error: function(XHR) {
			return afterDelete(th, false, XHR);
		}
	});
	return false;
});
jQuery('#subject-grid').yiiGridView({'ajaxUpdate':['subject-grid'],'ajaxVar':'ajax','pagerClass':'pager-container','loadingClass':'grid-view-loading','filterClass':'filters','tableClass':'items table table-striped table-condensed','selectableRows':2,'enableHistory':false,'updateSelector':'{page}, {sort}','filterSelector':'{filter}','url':'/subject','pageVar':'Subject_page','afterAjaxUpdate':function() {
			jQuery('.popover').remove();
			jQuery('[data-toggle=popover]').popover();
			jQuery('.tooltip').remove();
			jQuery('[data-toggle=tooltip]').tooltip();
		},'selectionChanged':function(id) {
				$("#"+id+" input[type=checkbox]").change();
			}});
$.fn.yiiGridView.initBulkActions('subject-grid');

            $(document).on('click','#delete-subject', function() {
	            var checked = $.fn.yiiGridView.getCheckedRowsIds('subject-grid');
	            if (!checked.length) {
	                alert('No items are checked');
	                return false;
	            }
				var fn = function (values) { if(!confirm("Вы уверены, что хотите удалить выбранные элементы?")) return false; multiactionSubject5701fe2e9767c("delete", values); };
	            if ($.isFunction(fn)){ fn(checked); } 

	            return false;
        	}); 

            

			var $grid = $("#subject-grid");
			
			if ($(".extended-summary", $grid).length)
			{
				$(".extended-summary", $grid).html($("#subject-grid-extended-summary", $grid).html());
			}
			
			$.ajaxPrefilter(function (options, originalOptions, jqXHR) {
				var qs = $.deparam.querystring(options.url);
				if (qs.hasOwnProperty("ajax") && qs.ajax == "subject-grid")
				{
				    if (typeof (options.realsuccess) == "undefined" || options.realsuccess !== options.success)
				    {
                        options.realsuccess = options.success;
                        options.success = function(data)
                        {
                            if (options.realsuccess) {
                                options.realsuccess(data);
                                var $data = $("<div>" + data + "</div>");
                                // we need to get the grid again... as it has been updated
                                if ($(".extended-summary", $("#subject-grid")))
                                {
                                    $(".extended-summary", $("#subject-grid")).html($("#subject-grid-extended-summary", $data).html());
                                }
                                $.fn.yiiGridView.afterUpdateGrid('subject-grid');
                            }
                        }
				    }
				}
			});
    });
</script>