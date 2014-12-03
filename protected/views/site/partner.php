<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Գործնկերներ';
?>
<span class="title"><?=$edit->title?></span>
<legend></legend>

<div class="col-lg-12"><?=$edit->desc?></div>
<br>
<legend></legend>

    <?php foreach($partner as $partners):?>


        <div class="col-lg-3 col-xs-12 col-md-3">
            <div class="thumbnail">
                <img src="<?=Yii::app()->request->baseUrl?>/css/images/partner/<?=$partners->id?>.png" width="300p" alt="...">
                <div class="caption">
                    <h3><?=$partners->title?></h3>
                    <p><?=$partners->desc?></p>
                    <p><a href="<?=Yii::app()->request->baseUrl?>/site/partners/<?=$partners->id?>" class="btn btn-warning" role="button">Ավելին</a></p>
                </div>
            </div>
        </div>

    <?php endforeach;?>

<div class="clearfix"></div>

<br>
<br>
<div class="row">
    <div class="col-md-3 col-md-offset-4 col-xs-12 col-xs-offset-1 col-lg-3 col-lg-offset-4">
        <?php    $this->widget('CLinkPager', array(
            'pages' => $pages,
            'header'=>'',
            'firstPageLabel'=>'Առաջին էջ',
            'lastPageLabel'=>'Վերջին էջ',
            'prevPageLabel'=>'Հաջորդ',
            'nextPageLabel'=>'Նախորդ',
        ))?>
    </div>
</div>

