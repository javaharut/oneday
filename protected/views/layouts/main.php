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
            'brandUrl' => CHtml::normalizeUrl(array('site/tree')),
            'fixed' => false,
            'fluid' => true, // <-- This dysplays some title on the left
            //'type' => 'inverse',
            'items' => array(
                array(
                    'class' => 'booster.widgets.TbMenu',
                    'type' => 'navbar',
                    'items' => array(
                        array('label'=>'Օգտատերերի Ծառը', 'url'=>CHtml::normalizeUrl(array('site/tree')),
                            'visible'=>(Yii::app()->user->role == User::ADMIN ||Yii::app()->user->role == User::ADMIN )),

                        array('label'=>'Գործնկերներ', 'url'=>CHtml::normalizeUrl(array('partner/index')),
                        'visible'=>(Yii::app()->user->role == User::ADMIN )),

                        array('label'=>'Նոր Օգտատեր', 'url'=>CHtml::normalizeUrl(array('site/createuser')),
                            'visible'=>(Yii::app()->user->role == User::ADMIN ||Yii::app()->user->role == User::ADMIN )),

                        array('label'=>'Գլխավոր', 'url'=>CHtml::normalizeUrl(array('main/update/1')),
                        ),

                        array('label'=>'Պատմություն', 'url'=>CHtml::normalizeUrl(array('history/update/1')),
                            'visible'=>(Yii::app()->user->role == User::ADMIN )),

                        array('label'=>'Transactions', 'url'=>CHtml::normalizeUrl(array('transaction/admin')),
                            'visible'=>(Yii::app()->user->role == User::ADMIN ||Yii::app()->user->role == User::ADMIN )),

                        array('label'=>'Գործնկերներ', 'url'=>CHtml::normalizeUrl(array('partner/update/1')),
                            'visible'=>(Yii::app()->user->role == User::ADMIN )),

                        array('label'=>'Մուտք', 'url'=>CHtml::normalizeUrl(array('/site/login')),
                            'visible'=>Yii::app()->user->isGuest),

                        array('label'=>'Ելք ('.Yii::app()->user->name.')', 'url'=>CHtml::normalizeUrl(array('/site/logout')),
                            'visible'=>!Yii::app()->user->isGuest),

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
		&copy; <?php echo date('Y'); ?> Կայքի անունը՝ OneDay.org <br/>
		Բոլոր Իրավունքները Պաշտպանված Են.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
