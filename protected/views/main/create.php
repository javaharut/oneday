<?php
$this->breadcrumbs=array(
	'Mains'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Main','url'=>array('index')),
array('label'=>'Manage Main','url'=>array('admin')),
);
?>

<h1>Create Main</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>