<?php
/* @var $this SiteController */
Yii::app()->clientScript->registerScriptFile("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places");

?>

<span class="title"><?= $partners->title ?></span>
<legend></legend>


<img class="img-thumbnail pull-left img" src="<?= Yii::app()->request->baseUrl ?>/css/images/partner/<?=$partners->id?>.png" alt="" width="300px">
<div class="part_desc"> <?= $partners->text ?>   </div>
<br>
<br>


<div class="row">
    <div class="col-lg-12">
        <div id="map1" class="map">
        </div>
        <br>
        <br>
    </div>
</div>

<a href="<?= $partners->url ?>" class="btn btn-success btn-lg pull-right" role="button" target="_blank">ԳՈՐԾԸՆԿԵՐՈՋ ԿԱՅՔ</a>
<br>
<br>
<br>
<a href="<?= Yii::app()->request->baseUrl ?>/site/partner" class="btn btn-primary pull-right" role="button">Գնալ հետ</a>


<div class="clearfix"></div>

<script type="text/javascript">
    jQuery(function ($) {
        function init_map1() {
            var myLocation = new google.maps.LatLng(<?=$partners->x?>, <?=$partners->y?>);

            var mapOptions = {
                center: myLocation,
                zoom: 12

            };
            var marker = new google.maps.Marker({
                position: myLocation,
                animation: google.maps.Animation.BOUNCE,
                title: "Property Location"
            });
            var map = new google.maps.Map(document.getElementById("map1"),
                mapOptions);
            marker.setMap(map);


        }

        init_map1();


    });
</script>

<style>
    .map {
        min-width: 100px;
        min-height: 300px;
        width: 100%;
        height: 100%;
        -webkit-box-shadow: 3px 3px 12px 0px rgba(50, 50, 50, 0.75);
        -moz-box-shadow: 3px 3px 12px 0px rgba(50, 50, 50, 0.75);
        box-shadow: 3px 3px 12px 0px rgba(50, 50, 50, 0.75);
        border-radius: 1px;
        border: 3px;
    }
</style>

<div class="clearfix"></div>