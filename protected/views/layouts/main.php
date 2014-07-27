<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <?php  $this->widget('booster.widgets.TbNavbar', array(
            'brand' => 'One Day',
            'fixed' => false,
            'fluid' => true, // <-- This dysplays some title on the left
            //'type' => 'inverse',
            'items' => array(
                array(
                    'class' => 'booster.widgets.TbMenu',
                    'type' => 'navbar',
                    'items' => array(
                        array('label'=>'Users', 'url'=>array('/site/tree')),
                        array('label'=>'New User', 'url'=>array('/site/createuser')),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                        array(
                            'label' => 'Dropdown',
                            'items' => array(
                                array('label' => 'Item1', 'url'=>'#'))
                        )
                    ),// Typical Yii menu items config

                )
            )
        )

    ); ?>


<div class="container" >
    <?php
        // echo "<pre>";
         //var_dump(Yii::app()->user->role);
    ?>

	<?php echo $content; ?>

   	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
