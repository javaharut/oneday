<?php
$this->breadcrumbs=array(
	'Mains'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

	<h1>ՓՈՓՈԽԵԼ ԳԼԽԱՎՈՐ ԷՋԸ</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<br>
<br>
<br>
<br>
<br>
