<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Կաբինետ';
?>
<span class="title">ԿԱԲԻՆԵՏ</span>
<legend></legend>
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success text-room-balance">Ձեր հաշվեկշիռը կազմում է ՝ դրամ</div>
    </div>
</div>
<div class="col-lg-5 room-info">
    <?php $this->widget('booster.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            'parent_id',
            'name',
            'lname',
            'phone',
            //'passport',
            'email',
            'reg_date',
            // 'balance',
            'username',
            // 'password',
            //'crole',
        ),
    )); ?>
</div>

<?php $this->renderPartial('../ajax/history', array('user'=>$model, 'transactions'=>$model->transactions));?>

<div class="clearfix"></div>
