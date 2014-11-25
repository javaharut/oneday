<?php
$this->breadcrumbs=array(
	'Mains'=>array('index'),
	'Create',
);

?>

<h1>Create Main</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>