<?php

/* @var $model User */


$this->breadcrumbs=array(
    'Users'=>array('index'),
    $model->name,
);

/*$this->menu=array(
    array('label'=>'List User','url'=>array('index')),
    array('label'=>'Create User','url'=>array('create')),
    array('label'=>'Update User','url'=>array('update','id'=>$model->id)),
    array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage User','url'=>array('admin')),
);*/
?>

<h1>Your id number is <?php echo $model->id; ?></h1>
<div class="row">
    <div class="col-md-12">
        <?php $this->widget('booster.widgets.TbDetailView',array(
            'data'=>$model,
            'attributes'=>array(
                'id',
                'parent_id',
                'name',
                'lname',
                'phone',
                //'passport',
                'email',
                'reg_date',
                'balance',
                'username',
                'password',
                'crole',
            ),
        )); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Your Transactions vor Mher@ piti hayeren sarqi </h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12 user">
        <?php $this->renderPartial('../ajax/history', array('transactions'=>$model->transactions));?>
    </div>
</div>


<br>
<br>
<br>
<br>
