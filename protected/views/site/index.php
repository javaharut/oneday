<?php
/* @var $this SiteController */
/* @var $data Main */
$this->pageTitle = Yii::app()->name . ' - Գլխավոր էջ';
?>

<div class="row">
    <div class="col-lg-8">
        <span class="title"><?= $model->title ?></span>
        <legend></legend>
        <?= $model->desc ?>
    </div>
    <div class="col-lg-4">
        <div class="content-history">
            <a href="<?=Yii::app()->request->baseUrl?>/site/history" ><span class="title">ԾԱՆՈՒՑՈՒՄՆԵՐ</span></a>
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




<div class="col-lg-8 col-xs-12 col-sm-12">



</div>


<div class="clearfix"></div>


