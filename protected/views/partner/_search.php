<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

		<?php echo $form->textAreaGroup($model,'desc', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

		<?php echo $form->textFieldGroup($model,'img',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

		<?php echo $form->textFieldGroup($model,'url',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
