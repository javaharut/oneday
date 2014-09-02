<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="">
    <h1><span class="title"> Аутентификация </span> </h1>

    <legend></legend>

</div>

<div class="clearfix"></div>

<div >
    <div class="col-lg-4 pull-left">
<?php
/** @var TbActiveForm $form */
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'verticalForm',
        'htmlOptions' => array('class' => 'well'), // for inset effect
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )
);

echo $form->textFieldGroup($model, 'username');
echo $form->passwordFieldGroup($model, 'password');
echo $form->checkboxGroup($model, 'rememberMe');
$this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => 'Log in',
        'context' => 'success',
        'buttonType' => 'submit',
    )

);
$this->endWidget();
unset($form);

?>

</div>
</div>

<div class="clearfix"></div>
