<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>

    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl ?>/css/x/main.css" type="text/css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

<!-----------Header------>

<div class="container">
    <div class="header">
        <div class="pull-left"><img src="<?= Yii::app()->request->baseUrl ?>/css/images/oneday.png"></div>
    </div>
</div>
<div class="clearfix"></div>

<!-----Navigation------>
<div class="container">
    <?php

    $this->widget(
        'booster.widgets.TbNavbar',
        array(
            'brand' => false,
            'collapse' => true,
            'fixed' => false,
            'fluid' => false,
            'items' => array(
                array(
                    'class' => 'booster.widgets.TbMenu',
                    'type' => 'navbar',
                    'items' => array(
                        array('label' => 'ԳԼԽԱՎՈՐ ԷՋ', 'url' => Yii::app()->request->baseUrl,),
                        array('label' => 'ԳՈՐԾԸՆԿԵՐՆԵՐ', 'url' => CHtml::normalizeUrl(array('site/partner'))),
                        array('label' => 'ՊԱՏՄՈՒԹՅՈՒՆ', 'url' => CHtml::normalizeUrl(array('site/history'))),
                        array('label' => 'ՀԵՏԱԴԱՐՁ ԿԱՊ', 'url' => CHtml::normalizeUrl(array('site/contact'))),
                        array('label' => 'ՄՈՒՏՔ', 'url' => CHtml::normalizeUrl(array('site/login')), 'visible' => Yii::app()->user->isGuest),
                        array('label' => ' ԿԱԲԻՆԵՏ', 'url' => CHtml::normalizeUrl(array('site/room')), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'ԵԼՔ ( '.Yii::app()->user->name.' ) ', 'url' => CHtml::normalizeUrl(array('site/logout')), 'visible' => !Yii::app()->user->isGuest),


                    ),

                ),
            ),
        )
    );
    ?>
</div>


<div class="clearfix"></div>
<!----Content------>
<div class="container">
    <div class="content">
        <?php echo $content; ?>
    </div>
</div>


<div class="clearfix"></div>
<!---Footer----->
<div class="container">
    <div class="footer"><span class="footer_title">www.OneDayClub.org </span> &copy; <?php echo date('Y'); ?> ԲՈԼՈՐ
        ԻՐԱՎՈՒՆՔՆԵՐԸ
        ՊԱՇՏՊԱՆՎԱԾ ԵՆ.
    </div>

</div>

</body>
</html>
