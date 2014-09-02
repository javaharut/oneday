<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
    'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>

<p>
    If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

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

        <legend>Legend</legend>

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
                    'class' => 'col-sm-5',
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
                'context' => 'success',
                'label' => 'Отправить'
            )
        ); ?>

        <?php $this->widget(
            'booster.widgets.TbButton',
            array('buttonType' => 'reset', 'label' => 'Сброс' , 'context' => 'danger',)
        );
        $this->endWidget();
        unset($form);

        ?>


        <?php endif; ?>
    </fieldset>
</div>

