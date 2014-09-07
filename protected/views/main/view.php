<?php
$this->breadcrumbs=array(
	'Mains'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Main','url'=>array('index')),
array('label'=>'Create Main','url'=>array('create')),
array('label'=>'Update Main','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Main','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Main','url'=>array('admin')),
);
?>

<h1>View Main #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'keyword',
		'title',
		'desc',
),
)); ?>
