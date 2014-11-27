<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
$this->pageTitle = Yii::app()->name . ' - Մեր Պատմությունը';
?>


<span class="title">ԾԱՆՈՒՑՈՒՄՆԵՐ</span>
<legend></legend>

    <?php foreach ($model as $models): ?>
<div class="col-md-6 blogShort ">
        <div class="article-content">
        <span class="title"><?= $models->title ?></span>
        <p><?= $models->text ?></p>
        <p class="pull-right history-date marginBottom10">   <?= $models->date ?></p>
        <div class="clearfix"></div>
        </div>
    </div>


    <?php endforeach; ?>
<div class="clearfix"></div>

    <br>
    <br>
    <div class="row">
        <div class="col-md-3 col-md-offset-4 col-xs-12 col-xs-offset-1 col-lg-3 col-lg-offset-4">
        <?php    $this->widget('CLinkPager', array(
            'pages' => $pages,
            'header'=>'',

            'selectedPageCssClass'=>'active',
            'firstPageCssClass'=>'previous',
            'lastPageCssClass'=>'next',
            'firstPageLabel'=>'Առաջին էջ',
            'lastPageLabel'=>'Վերջին էջ',
            'prevPageLabel'=>'Հաջորդ',
            'nextPageLabel'=>'Նախորդ',
        ))?>
    </div>
    </div>





















