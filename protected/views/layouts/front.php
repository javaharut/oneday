<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/x/main.css" type="text/css" />


    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<!--<div class="head_wrapper">
    <div class="oneday">OneDay</div>
</div>-->
<!-----Navigation------>
<div class="nav_wrapper">
<div class="" >
<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'brand' => false,
        'fixed' => false,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'items' => array(
                    array('label' => 'Главное', 'icon' => 'glyphicon glyphicon-home', 'active'=> false, 'url' => Yii::app()->request->baseUrl, ),
                    array('label' => 'Партнеры', 'icon' => 'glyphicon glyphicon-briefcase', 'url' => 'site/partners'),
                    array('label' => 'Наша история', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => 'history'),
                    array('label' => 'Контакты', 'icon' => 'glyphicon glyphicon-map-marker', 'url' => 'site/contact'),
                    array('label' => 'Логин', 'icon' => 'glyphicon glyphicon-lock', 'url' => 'login',  ),
                )
            )
        )
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


<!---Footer----->
<div class="footer_wrapper">
    <div id="footer">


    &copy; <?php echo date('Y'); ?> « ODay.com — КОМПАНИЯ ПО ............................. » <br > Все права защищены.
    </div>
</div>

<?php

//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/main.js');

?>


</body>
</html>
