<?php
/* @var $this SiteController */
/* @var $data Main */
$this->pageTitle = Yii::app()->name . ' - Գլխավոր էջ';
?>

<div class="col-lg-8">
    <span class="title"><?= $model->title ?></span>
    <legend></legend>
    <?= $model->desc ?></div>
<div class="content-history pull-right">
    <span class="title">ԾԱՆՈՒՑՈՒՄՆԵՐ</span>
    <legend></legend>
    <div class="history-index">
        <?php foreach ($history as $story): ?>
            <span style="font-size: 20px; color: #000000; font-weight: bold"><?= $story->title ?></span>
            <p><?= $story->text ?></p>
            <p style="font: 12px bold; text-align: right; border-bottom: 1px solid #ffffee"><?= $story->date ?></p>
        <?php endforeach; ?>
    </div>

</div>
<div class="clearfix"></div>


