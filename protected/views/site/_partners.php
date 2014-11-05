<?php

$models = Partner::model()->findAll();

?>


<div class="col-sm-3">
    <div class="thumbnail">
        <!--<img src="<? /*= Yii::app()->request->baseUrl */ ?>/" alt="">-->

        <div class="caption">
            <h3><?= $models->title ?></h3>

            <p><?= $models->text ?></p>

            <p><a href="<?= Yii::app()->request->baseUrl ?>/site/partners/<?=$models->category_id?>" class="btn btn-primary"
                  role="button">Ավելին</a>
                <a href="<?= $models->url ?>" target="_blank" class="btn btn-small btn-info" role="button">Հղում</a>
            </p>
        </div>
    </div>
</div>