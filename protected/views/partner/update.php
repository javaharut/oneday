<?php
$this->breadcrumbs=array(
	'Partners'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Partner','url'=>array('index')),
	array('label'=>'Create Partner','url'=>array('create')),
	array('label'=>'View Partner','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Partner','url'=>array('admin')),
	);
	?>

	<h1>Update Partner <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>