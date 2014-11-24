<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScriptFile("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places");
//Yii::app()->clientScript->registerScriptFile("http://maps.google.com/maps/api/js?sensor=false");
Yii::app()->clientScript->registerCssFile("http://code.google.com/apis/maps/documentation/javascript/examples/default.css");

$this->pageTitle = Yii::app()->name . ' - Հետադարձ կապ';

?>
    <span class="title"> ՀԵՏԱԴԱՐՁ ԿԱՊ </span>
<legend></legend>

<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>

  <div class="clearfix"></div>


    <div class="contact">

        <?php /** @var TbActiveForm $form */
        $form = $this->beginWidget(
            'booster.widgets.TbActiveForm',
            array(
                'id' => 'horizontalForm',
                'type' => 'horizontal',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,

                ),
            )
        ); ?>

        <fieldset>


            <h4>
                Հարցերի եւ առաջարկների դեպքում դուք կարող եք գրել կամ զանգահարել մեզ նշված էլ. փոստի հասցեով և
                հեռախոսահամարներով:
            </h4>


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
                        'htmlOptions' => array('style' => 'height: 200px;'),
                    )
                )
            ); ?>
            <div class="col-lg-6 pull-right">
                <?php
                $this->widget(
                    'booster.widgets.TbButton',
                    array(

                        'buttonType' => 'submit',
                        'context' => 'primary',
                        'label' => 'Ուղարկել'
                    )
                ); ?>

                <?php $this->widget(
                    'booster.widgets.TbButton',
                    array('buttonType' => 'reset', 'label' => 'Ջնջել', 'context' => 'danger',)
                );
                $this->endWidget();
                unset($form);

                ?>

            </div>


        </fieldset>

    </div>

<?php endif; ?>