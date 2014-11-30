<?php

class PartnerController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'create', 'update', 'delete'),
                'users' => array(User::ADMIN),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionUpload()
    {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder= 'css/images/partner/';// folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg", "png");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME

        echo $return;// it's array
        Yii::app()->end();
    }

    public function actionCreate()
    {
        $model=new Partner;

        // Uncomment the following line if AJAX validation is needed
      //  $this->performAjaxValidation($model);

        if(isset($_POST['Partner']))
        {
            $model->attributes=$_POST['Partner'];
            $model->save();


            /*echo('<pre>');
            print_r($model->id);
            exit;*/
            if(file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->baseUrl . 'css/images/partner/temp/uploaded.png')) {

                Yii::app()->ih->load($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . 'css/images/partner/temp/uploaded.png')
                    ->save($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . 'css/images/partner/' . $model->id . '.png');

                $model->img=1;
                unlink($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . 'css/images/partner/temp/uploaded.png');
            }
            else {
                $model->img=0;
            }
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
 /*   public function actionCreate()
    {
        $model = new Partner;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Partner'])) {
            $model->attributes = $_POST['Partner'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));

    }*/

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['Partner']))
        {
            $model->attributes=$_POST['Partner'];

            if(file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->baseUrl . 'css/images/partner/uploaded.png')) {
                Yii::app()->ih->load($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . 'css/images/partner/uploaded.png')
                    ->save($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . 'css/images/partner/' . $model->id . '.png');

                unlink($_SERVER['DOCUMENT_ROOT'] .Yii::app()->baseUrl . 'css/images/partner/uploaded.png');
                $model->img = 1;
            }

            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }


    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Partner('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Partner']))
            $model->attributes = $_GET['Partner'];

        $dataProvider = new CActiveDataProvider('Partner');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Partner('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Partner']))
            $model->attributes = $_GET['Partner'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Partner::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'partner-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*public function actionUpload()
    {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $folder= 'images/product/';// folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg", "png");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 5 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME

        echo $return;// it's array
        Yii::app()->end();
    }*/


}
