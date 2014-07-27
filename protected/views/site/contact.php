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

<div class="span-5">

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
            'class' => 'col-sm-10',
        ),
            )
); ?>
<?php //echo $form->datePickerGroup(
//    $model,
//    'dateField',
//    array(
//        'widgetOptions' => array(
//            'options' => array(
//                'language' => 'es',
//            ),
//        ),
//        'wrapperHtmlOptions' => array(
//            'class' => 'col-sm-5',
//        ),
//        'hint' => 'Click inside! This is a super cool date field.',
//        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
//    )
//); ?>
<!---->

    <?php echo $form->textFieldGroup(
        $model,
        'email',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-10',
            ),
        )
    ); ?>

    <?php echo $form->textFieldGroup(
        $model,
        'subject',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-10',
            ),
        )
    ); ?>



    <?php echo $form->markdownEditorGroup(
        $model,
        'body',
        array(
            'widgetOptions' => array(
                'htmlOptions' => array('style'=>'height: 200px;')
            )
        )
    ); ?>

    <?php
          echo $form->textFieldGroup(
        $model,
        'verifyCode',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-10',
            ),
        )
    );


    $this->widget(
        'booster.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'label' => 'Submit'
        )
    ); ?>

    <?php $this->widget(
        'booster.widgets.TbButton',
        array('buttonType' => 'reset', 'label' => 'Reset')
    ); ?>

<?php
$this->endWidget();
unset($form);





















//$form=$this->beginWidget('CActiveForm', array(
//	'id'=>'contact-form',
//	'enableClientValidation'=>true,
//	'clientOptions'=>array(
//		'validateOnSubmit'=>true,
//	),
//)); ?>
<!---->
<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->
<!---->
<!--	--><?php //echo $form->errorSummary($model); ?>
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'name'); ?>
<!--		--><?php //echo $form->textField($model,'name'); ?>
<!--		--><?php //echo $form->error($model,'name'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'email'); ?>
<!--		--><?php //echo $form->textField($model,'email'); ?>
<!--		--><?php //echo $form->error($model,'email'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'subject'); ?>
<!--		--><?php //echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
<!--		--><?php //echo $form->error($model,'subject'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'body'); ?>
<!--		--><?php //echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
<!--		--><?php //echo $form->error($model,'body'); ?>
<!--	</div>-->
<!---->
<!--	--><?php //if(CCaptcha::checkRequirements()): ?>
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'verifyCode'); ?>
<!--		<div>-->
<!--		--><?php //$this->widget('CCaptcha'); ?>
<!--		--><?php //echo $form->textField($model,'verifyCode'); ?>
<!--		</div>-->
<!--		<div class="hint">Please enter the letters as they are shown in the image above.-->
<!--		<br/>Letters are not case-sensitive.</div>-->
<!--		--><?php //echo $form->error($model,'verifyCode'); ?>
<!--	</div>-->
<!--	--><?php //endif; ?>
<!---->
<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton('Submit'); ?>
<!--	</div>-->
<!---->
<?php //$this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>