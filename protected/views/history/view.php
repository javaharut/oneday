<?php
$this->breadcrumbs=array(
	'Histories'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List History','url'=>array('index')),
array('label'=>'Create History','url'=>array('create')),
array('label'=>'Update History','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete History','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage History','url'=>array('admin')),
);
?>

<h1>View History #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
		'text',
		'date',
		'url',
),
)); ?>
