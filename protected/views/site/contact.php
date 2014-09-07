<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScriptFile("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places");
//Yii::app()->clientScript->registerScriptFile("http://maps.google.com/maps/api/js?sensor=false");
Yii::app()->clientScript->registerCssFile("http://code.google.com/apis/maps/documentation/javascript/examples/default.css");

$this->pageTitle=Yii::app()->name . ' - Հետադարձ կապ';
$this->breadcrumbs=array(
    'Contact',
);
?>
<h1><span class="title"> ՀԵՏԱԴԱՐՁ ԿԱՊ </span> </h1>


<?php if(Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>



<ul class="pull-left" id="contact_list">

    <li id="list_contact"><span class="glyphicon glyphicon-home"></span>  Հասցե : Հայաստանի Հանրապետություն , ք. Երևան</li>
    <li id="list_contact"><span class="glyphicon glyphicon-phone"></span>  Հեռախոս: +(374)90-93-14 </li>
    <!--<li id="list_contact"><span class="glyphicon glyphicon-eye-open"></span>  Skype : PanosyanArtCentre </li>-->
    <li id="list_contact"><span class="glyphicon glyphicon-envelope"></span>  Էլ.Հասցե  : PanosyanArtCentre@gmail.com</li>
</ul>

<div class="clearfix"></div>

<legend>Քարտեզ</legend>

<div id="map1" class="map">

</div>

<div class="clearfix"></div>


<div class="contact">

    <?php /** @var TbActiveForm $form */
    $form = $this->beginWidget(
        'booster.widgets.TbActiveForm',
        array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,

            ),
        )
    ); ?>

    <fieldset>


        <h4>
            Հարցերի եւ առաջարկների դեպքում դուք կարող եք գրել կամ զանգահարել մեզ նշված էլ. փոստի հասցեով և հեռախոսահամարներով:
        </h4>


        <?php echo $form->textFieldGroup(
            $model,
            'name',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'prepend' => '<i class="glyphicon glyphicon-user"></i>'
            )
        ); ?>
        <?php echo $form->datePickerGroup(
            $model,
            'dateField',
            array(
                'widgetOptions' => array(
                    'options' => array(
                        'language' => 'es',

                    ),
                ),
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'email',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'prepend' => '<i class="glyphicon glyphicon-envelope"></i>'
            )
        ); ?>

        <?php echo $form->textFieldGroup(
            $model,
            'subject',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'prepend' => '<i class="glyphicon glyphicon-tags"></i>'
            )
        ); ?>


        <?php echo $form->markdownEditorGroup(
            $model,
            'body',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-6',
                ),
                'widgetOptions' => array(
                    'htmlOptions' => array('style'=>'height: 200px;'),
                )
            )
        ); ?>
        <?php
        $this->widget(
            'booster.widgets.TbButton',
            array(

                'buttonType' => 'submit',
                'context' => 'primary',
                'label' => 'Ուղարկել'
            )
        ); ?>

        <?php $this->widget(
            'booster.widgets.TbButton',
            array('buttonType' => 'reset', 'label' => 'Ջնջել' , 'context' => 'danger',)
        );
        $this->endWidget();
        unset($form);

        ?>


        <?php endif; ?>
    </fieldset>






    <script type="text/javascript">
        jQuery(function ($) {

            function init_map1() {
                var myLocation = new google.maps.LatLng(40.190124, 44.514582);

                var mapOptions = {
                    center: myLocation,
                    zoom: 15,
                    mapTypeControlOptions: {
                        mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                    }
                };
                var marker = new google.maps.Marker({
                    position: myLocation,
                    animation:google.maps.Animation.BOUNCE,
                    title: "Property Location",

                    /*icon: '<?=Yii::app()->baseUrl?>/css/images/pin.png'*/
                });
                var map = new google.maps.Map(document.getElementById("map1"),
                    mapOptions);
                marker.setMap(map);
               // map.mapTypes.set('map_style', styledMap);
               // map.setMapTypeId('map_style');

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

            border-radius: 10px;
            border: 3px solid #67abb3;
        }

    </style>


</div>

