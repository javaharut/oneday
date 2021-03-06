<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'main-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

<?php echo $form->ckEditorGroup(
    $model,
    'desc',
    array(
        'wrapperHtmlOptions' => array(
            /* 'class' => 'col-sm-5', */
        ),
        'widgetOptions' => array(
            'editorOptions' => array(
                'fullpage' => 'js:true',
                'height'=>'600px',
                /* 'width' => '640', */
                /* 'resize_maxWidth' => '640', */
                /* 'resize_minWidth' => '320'*/
            )
        )
    )
); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
