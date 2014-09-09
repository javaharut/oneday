<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->pageTitle=Yii::app()->name . ' - Մեր Պատմությունը';
?>


<div>
    <h1><span class="title"><?=$model->title?></span> </h1>

    <legend></legend>
    <?=$model->desc?>

</div>