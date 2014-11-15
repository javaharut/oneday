<?php
/* @var $this SiteController */


$this->pageTitle = Yii::app()->name . ' - Գործնկերներ';
?>
<span class="title"><h1>Մեր գործընկերները</h1></span>
<legend></legend>
<?php foreach ($cat as $cats): ?>
    <div><a href="<?= Yii::app()->request->baseUrl ?>/site/partners/<?=$cats->id?>"><?= $cats->title ?></a></div>
<?php endforeach; ?>

<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataprovider,
    'itemView' => '_partners',
));
?>

<div class="clearfix"></div>

