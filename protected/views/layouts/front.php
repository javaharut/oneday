<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/x/main.css" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/x/font-awesome.min.css" type="text/css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!-------------------------------Header------------------------------>
<div class="head_wrapper">
<div class="" >
<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'brand' => false,
        'fixed' => true,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'items' => array(
                    array('label' => 'Главное', 'icon' => 'glyphicon glyphicon-home', 'url' => 'site/index', 'active' => false),
                    array('label' => 'Партнеры', 'icon' => 'glyphicon glyphicon-briefcase', 'url' => 'site/partners'),
                    array('label' => 'Наша история', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => 'site/history'),
                    array('label' => 'Контакты', 'icon' => 'glyphicon glyphicon-map-marker', 'url' => 'site/contact'),
                    array('label' => 'Логин', 'icon' => 'glyphicon glyphicon-lock', 'url' => 'site/login',  ),
                )
            )
        )
    )
);
?>

</div>

</div>
<!-------------------------------Slider------------------------------>
            <div class="slider_wrapper">
                <div class="" style="background-color: #006600">


                </div>
            </div>
<!-------------------------------Content------------------------------>
<div class="cont_wrapper">
        <div class="content">
                                    <?php echo $content; ?>
        </div>
</div>


<!-------------------------------Footer------------------------------>
<div class="footer_wrapper">
    <div id="footer">

    &copy; 2013 <a target="_blank" href="http://onedayclub.com/" title="OneDay in Town Club">OneDayClub.com</a>. All Rights Reserved.<br>Site Developers : Harut Margaryan , MheR Paruyryan

    </div>
</div>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/jquery.isotope.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/jquery.prettyPhoto.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/main.js');

?>


</body>
</html>
