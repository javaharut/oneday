<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/ie.css" media="screen, projection" />
	<![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/admin.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/backend/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">



	<div id="header">

	</div><!-- header -->

	<div >
        <?php
        echo CHtml::openTag('div', array('class' => 'bs-navbar-top-example'));
        $this->widget(
            'booster.widgets.TbNavbar',
            array(
                'brand' => ' Arsen Panosyan Art Center',
                'brandUrl'=>array('/cms/main/index'),
                'brandOptions' => array('style' => 'width:auto;margin-left: 0px;') ,
                'fixed' => 'top',
                'fluid' => true,
                'htmlOptions' => array('style' => 'position:absolute','class'=>'mher'),

                'items' => array(
                    array(
                        'class' => 'booster.widgets.TbMenu',
                        'type' => 'navbar',
                        'items' => array(
                            array('label'=>'Home', 'url'=>array('/cms/main/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Main', 'url'=>array('/cms/main/mainform'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'About', 'url'=>array('/cms/main/about'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'products', 'url'=>array('/cms/product'), 'visible'=>!Yii::app()->user->isGuest),

                            array(
                                'label' => 'History',
                                'items' => array(
                                    array('label'=>'Painting', 'url'=>array('/cms/main/painting'), 'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>'Sculptur', 'url'=>array('/cms/main/sculptur'), 'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>'Carving', 'url'=>array('/cms/main/carving'), 'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>'Photography', 'url'=>array('/cms/main/photography'), 'visible'=>!Yii::app()->user->isGuest),
                                )
                            ),

                            array('label'=>'Banner', 'url'=>array('/cms/banner'), 'visible'=>!Yii::app()->user->isGuest),

                            array('label'=>'certificates', 'url'=>array('/cms/certificates'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Gallery', 'url'=>array('/cms/gallery'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Partners', 'url'=>array('/cms/partners'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Login', 'url'=>array('/cms/main/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Service', 'url'=>array('/cms/main/service'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/cms/main/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        )
                    )
                )
            )
        );
        echo CHtml::closeTag('div');

        ?>


	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'homeLink'=>CHtml::link('Home', array('/cms/main/index')),
            'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Panosyan Art Center &copy; <?php echo date('Y'); ?> All Rights Reserved<br/>
		Site Designer and Developer ` MheR Parurian<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
