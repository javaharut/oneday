<?php
$this->breadcrumbs=array(
	'Partners',
);

?>

<h1>Partners</h1>

<a href="<?=Yii::app()->request->baseUrl?>/partner/create" class="btn btn-success">Ավելացնել գործընկեր</a>
<hr>

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'main-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'title',
        'desc',
        array(
            'class'=>'booster.widgets.TbButtonColumn',
        ),
    ),
)); ?>
