<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Մուտք';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="">
    <h1><span class="title"> Մուտք գործել կայք </span> </h1>

    <legend></legend>

</div>

<div class="clearfix"></div>

<div >
    <div class="col-lg-5 pull-left" style="text-align: left">
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
        'label' => 'Մուտք',
        'context' => 'success',
        'buttonType' => 'submit',
    )

);
$this->endWidget();
unset($form);

?>

</div>


    <div class="col-lg-6 pull-left" style="text-align: left">
      <strong>Ինչպե՞ս օգտվել կայքից</strong>
<legend></legend>
        In AppController.php, you will have a default public function (method) called actionIndex. The purpose of this default method is to call (render) the /protected/views/app/index.php file (also created by gii for you). index.php is the file your users will see once they log in. That is the file you will want to modify to build your app. Go back to SiteController.php and change the argument of redirect() in the actionLogin() method

    </div>


</div>

<div class="clearfix"></div>
