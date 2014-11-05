<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>


    <?php $list = CHtml::listData(User::model()->findAll(),'id','id');?>


<?php echo $form->select2Group($model,'parent_id',array(
                                'widgetOptions'=>array(
                                'data' => $list,
                                'htmlOptions'=>array('style'=>'width:100%','class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'lname',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textFieldGroup($model,'phone',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'passport',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

	<?php echo $form->textFieldGroup($model,'balance',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255, 'autocomplete'=>'off')))); ?>

	<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255, 'autocomplete'=>'off')))); ?>

    <?php echo $form->select2Group($model,'role',array('widgetOptions'=>array('data' => array(User::USER=>"User", User::MODER=>"Manager", User::ADMIN=>"Admin"),'htmlOptions'=>array('style'=>'width:100%','class'=>'span5')))); ?>

    <?php if(Yii::app()->user->role == User::ADMIN): ?>

        <?php echo $form->textFieldGroup($model,'moder_percent',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php endif; ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<br>
<br>
<br>
