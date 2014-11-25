<?php
$this->breadcrumbs=array(
	'Histories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List History','url'=>array('index'), 'htmlOptions'=>array('class'=>'btn btn-danger')),
	array('label'=>'Create History','url'=>array('create')),
	array('label'=>'View History','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage History','url'=>array('admin')),
	);
	?>

	<h1>ՓՈՓՈԽԵԼ ԵՎ ԱՎԵԼԱՑՆԵԼ ԾԱՆՈՒՑՈՒՄՆԵՐ</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>