<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'partner-form',
    'enableAjaxValidation' => false,
)); ?>


<?php echo $form->errorSummary($model); ?>
<?php /*$list = CHtml::listData(category::model()->findAll(),'id','title');*/?>

<?php /*echo $form->select2Group($model, 'category_id', array(
    'widgetOptions' => array(
        'data' => $list,
        'htmlOptions' => array('style' => 'width:100%', 'class' => 'span5')))); */?>

<!--	--><?php /*echo $form->textFieldGroup($model,'category_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); */ ?>

<?php /*echo $form->textFieldGroup($model, 'keyword', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); */?>

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

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
    array(
        'id'=>'uploadFile',
        'config'=>array(
            'action'=>Yii::app()->createUrl('/partner/upload'),
            'allowedExtensions'=>array("jpg", "jpeg", "png"),//array("jpg","jpeg","gif","exe","mov" and etc...
            'sizeLimit'=>2*1024*1024,// maximum file size in bytes
            'minSizeLimit'=>0*1024*1024,// minimum file size in bytes
            'onComplete'=>"js:function(id, fileName, responseJSON){ }",
            'messages'=>array(
                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                'emptyError'=>"{file} is empty, please select files again without it.",
                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
            ),
            'showMessage'=>"js:function(message){ //console.log(message);
                }"
        )
    )); ?>
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

