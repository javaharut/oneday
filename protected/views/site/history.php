<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
$this->pageTitle = Yii::app()->name . ' - Մեր Պատմությունը';
?>




    <?php foreach ($model as $models): ?>
<div class="col-md-6 blogShort ">
        <div class="article-content">
        <span class="title"><?= $models->title ?></span>
        <img src="http://www.kaczmarek-photo.com/wp-content/uploads/2012/06/guinnes-150x150.jpg" alt="post img"
             class="pull-left img-responsive thumb margin10 img-thumbnail">

        <p><?= $models->text ?></p>
        <p class="pull-right history-date marginBottom10">   <?= $models->date ?></p>
        <div class="clearfix"></div>
        </div>
    </div>


    <?php endforeach; ?>
<div class="clearfix"></div>
<div class="container">
    <br>
    <br>
    <div class="row">
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




















