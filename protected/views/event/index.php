<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs = array(
    'Events' => array('index')
);

$this->menu = array(
    array('label' => 'List Event', 'url' => array('index')),
    array('label' => 'Create Event', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.add-new-button').click(function(){
	$('.add-new-event-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#event-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.add-new-event-form form').submit(function(){
	$('#event-grid').yiiGridView('update');
        $('.add-new-event-form').toggle();
        return false;
});
$(function () {
        $('#datetimepicker4').datetimepicker({
            locale: 'ru',
            format: 'YYYY-MM-DD'
        });
        $('#datetimepicker1').datetimepicker({
            locale: 'ru',
            format: 'YYYY-MM-DD'
        });
});
");
?>

<h1>Events</h1>

<?php echo CHtml::link('Add new event', '#', array('class' => 'add-new-button')); ?>

<div class="add-new-event-form" style="display:none">
    <?php
    $this->renderPartial('create', array(
        'model' => $model,
    ));
    ?>
</div>

<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="search-form" style="display:block">
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div>
        </div>

    </div>
</div>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'event-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'ID',
        'DATE',
        'NAME',
        'DESCRIPTION',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
