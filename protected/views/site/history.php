<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<div>
    <h1><span class="title"><?=CHtml::encode($model->title)?></span> </h1>

    <legend></legend>
    <?=CHtml::encode($model->desc)?>

</div>