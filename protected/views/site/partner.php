<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Գործնկերներ';
?>
<span class="title">ՄԵՐ ԳՈՐԾԸՆԿԵՐՆԵՐԸ</span>
<legend></legend>


<div class="container">
    <?php foreach($partner as $partners):?>


        <div class="col-sm-3 col-md-3">
            <div class="thumbnail">
                <img data-src="holder.js/300x300" alt="...">
                <div class="caption">
                    <h3><?=$partners->title?></h3>
                    <p><?=$partners->desc?></p>
                    <p><a href="<?=Yii::app()->request->baseUrl?>/site/partners/<?=$partners->id?>" class="btn btn-warning" role="button">Ավելին</a></p>
                </div>
            </div>
        </div>

    <?php endforeach;?>
</div>

<div class="clearfix"></div>

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