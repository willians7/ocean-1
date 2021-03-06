<?php
$this->breadcrumbs=array(
	'Droplets'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Sync Droplets','url'=>array('sync')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('droplet-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Droplets</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'droplet-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'droplet_id',
		'name',
		'memory',
		'vcpus',
		'disk',
		/*
		'status',
		'active',
		'created_at',
		'modified_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
