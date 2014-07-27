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
<header id="header">
    <div class="container">
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-header">

                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                    <li><a href="#">Main</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</header><!--/#header-->

<section id="main-slider" >


</section><!--/#main-slider-->

<section id="services">
    <div class="container">
        <div class="box first">
            <?php echo $content; ?>
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#services-->


<footer id="footer">
    <div class="container">
        <div class="row">
                            &copy; 2013 <a target="_blank" href="http://onedayclub.com/" title="OneDay in Town Club">OneDayClub.com</a>. All Rights Reserved.<br>Site Developers : Harut Margaryan , MheR Paruyryan

                    </div>
    </div>
</footer><!--/#footer-->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/jquery.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/bootstrap.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/jquery.isotope.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/jquery.prettyPhoto.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/css/js/main.js');

?>


</body>
</html>
