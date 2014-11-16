<?php
/* @var $this SiteController */
/* @var $data Main */
$this->pageTitle = Yii::app()->name . ' - Գլխավոր էջ';
?>

    <div class="col-lg-8">
        <span class="title"><?= $model->title ?></span>
        <legend></legend>
        <?= $model->desc ?></div>
    <div class="col-lg-3 content-history pull-right">
        <span class="title">ՊԱՏՄՈՒԹՅՈՒՆ</span>
        <legend></legend>
        <?php foreach ( $history as $story ): ?>
        <div class="row">
            <div class="col-lg-12">
                <h4><?=$story->title?></h4>
                <p><?=$story->text?></p>
                <p><?=$story->date?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="clearfix"></div>


