<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link rel="stylesheet" href="<?= Yii::app()->request->baseUrl ?>/css/x/main.css" type="text/css"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

<!-----------Header------>
<div class="head_wrapper">
    <div class="pull-left"><img src="<?= Yii::app()->request->baseUrl ?>/css/images/oneday.png"></div>

</div>

<!-----Navigation------>
<div class="nav_wrapper">
    <div class="">
        <?php

        $this->widget(
            'booster.widgets.TbNavbar',
            array(
                'brand' => false,
                'collapse' => true,
                'fixed' => false,
                'fluid' => true,
                'items' => array(
                    array(
                        'class' => 'booster.widgets.TbMenu',
                        'type' => 'navbar',

                        'items' => array(
                            array('label' => 'ԳԼԽԱՎՈՐ ԷՋ', 'url' => Yii::app()->request->baseUrl,),
                            array('label' => 'ԳՈՐԾԸՆԿԵՐՆԵՐ', 'url' => CHtml::normalizeUrl(array('site/partners'))),
                            array('label' => 'ՊԱՏՄՈՒԹՅՈՒՆ', 'url' => CHtml::normalizeUrl(array('site/history'))),
                            array('label' => 'ՀԵՏԱԴԱՐՁ ԿԱՊ', 'url' => CHtml::normalizeUrl(array('site/contact'))),
                            array('label' => 'ՄՈՒՏՔ', 'url' => CHtml::normalizeUrl(array('site/login')),),

                        ),
                    ),

                ),
            )
        );
        ?>
    </div>
</div>
<!----Content------>
<div class="cont_wrapper">
    <div class="content">
        <?php echo $content; ?>
    </div>
</div>

<div class="clearfix"></div>
<!---Footer----->
<div class="footer_wrapper">
    <div id="footer">
        <span class="footer_title">www.OneDayClub.org </span> &copy; <?php echo date('Y'); ?> ԲՈԼՈՐ ԻՐԱՎՈՒՆՔՆԵՐԸ
        ՊԱՇՏՊԱՆՎԱԾ ԵՆ.
    </div>
</div>

</body>
</html>
