<?php
/* @var $this SiteController */
/* @var $data Main */

$this->pageTitle=Yii::app()->name;
?>
<div class="cont_wrapper">

<h1><span class="title"><?=$model->title?></span> </h1>

<legend></legend>
    <?=CHtml::encode($model->desc)?>
</div>