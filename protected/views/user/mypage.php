<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Կաբինետ';
$history = History::model()->findAll();
?>
<div class="row">
    <div class="col-lg-8">

        <span class="title">ԿԱԲԻՆԵՏ</span>
        <legend></legend>
            <div class="col-lg-12">
                <div class="alert alert-success text-room-balance">Ձեր հաշվեկշիռը կազմում է՝  &nbsp;&nbsp;<?=$model->balance?>&nbsp;&nbsp; դրամ</div>


        </div>

        <?php
        if(Yii::app()->user->role == 3) {
            echo('<a href="'.Yii::app()->request->baseUrl.'/main/update/1" target="_blank" class="btn btn-warning">Admin</a>');
        }

        else {
            echo('');
        }



        ?>
        <h1>ՁԵՐ ID կոդն է՝ <?php echo $model->id; ?></h1>
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
                        //'password',
                        //'crole',
                    ),
                )); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3> Ձեր կատարած գործողությունները </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 user">
                <?php $this->renderPartial('../ajax/history', array('user'=>$model, 'transactions'=>$model->transactions));?>
            </div>
        </div>


        <br>
        <br>
        <br>
        <br>

    </div>

    <div class="col-lg-4">
            <div class="content-history">
                <span class="title">ԾԱՆՈՒՑՈՒՄՆԵՐ</span>
                <legend></legend>
                <div class="history-index">
                    <?php foreach ($history as $story): ?>
                        <a href="<?=$story->url?>" target="_blank"><span style="font-size: 20px; color: #000000; font-weight: bold"><?= $story->title ?></span></a>
                        <p><?= $story->text ?></p>
                        <p style="font: 12px bold; text-align: right; border-bottom: 1px solid #ffffee"><?= $story->date ?></p>
                    <?php endforeach; ?>
                </div>

        </div>

    </div>

</div>

