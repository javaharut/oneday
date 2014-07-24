<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>

<?php

$this->widget(
    'ext.booster.widgets.TbButton',
    array(
        'label' => 'Top popover',
        'context' => 'primary',
        'htmlOptions' => array(
            'data-title' => 'A Title',
            'data-placement' => 'right',
            'data-content' => "And here's some amazing content. It's very engaging. right?",
            'data-toggle' => 'popover'
        ),
    )
);

?>
