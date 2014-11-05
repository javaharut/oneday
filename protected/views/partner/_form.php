<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'partner-form',
    'enableAjaxValidation' => false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php $list = CHtml::listData(category::model()->findAll(),'id','title');?>

<?php echo $form->select2Group($model, 'category_id', array(
    'widgetOptions' => array(
        'data' => $list,
        'htmlOptions' => array('style' => 'width:100%', 'class' => 'span5')))); ?>

<!--	--><?php /*echo $form->textFieldGroup($model,'category_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); */ ?>

<?php echo $form->textFieldGroup($model, 'keyword', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<?php echo $form->textFieldGroup($model, 'title', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>


<?php echo $form->ckEditorGroup(
    $model,
    'text',
    array(
        'wrapperHtmlOptions' => array(
            /* 'class' => 'col-sm-5', */
        ),
        'widgetOptions' => array(
            'editorOptions' => array(
                'fullpage' => 'js:true',
                /* 'width' => '640', */
                /* 'resize_maxWidth' => '640', */
                /* 'resize_minWidth' => '320'*/
            )
        )
    )
); ?>

<?php echo $form->textFieldGroup($model, 'img', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<?php echo $form->textFieldGroup($model, 'x', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<?php echo $form->textFieldGroup($model, 'y', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<?php echo $form->textFieldGroup($model, 'url', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget(); ?>
