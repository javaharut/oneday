<?php
$this->breadcrumbs=array(
	'Histories',
);


?>

<h1>ՊՍՏՄՈՒԹՅՈՒՆ</h1>
<hr>

<a href="<?=Yii::app()->request->baseUrl?>/history/create" class="btn btn-success">Ավելացնել պատմություն</a>

<hr>


<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'history-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'title',
        'text',
        'date',
        'url',
        array(
            'class'=>'booster.widgets.TbButtonColumn',
        ),
    ),
)); ?>
