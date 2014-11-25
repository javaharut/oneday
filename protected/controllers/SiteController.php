<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            /*'page'=>array(
                'class'=>'CViewAction',
            ),*/
        );
    }

    public function filters()
    {
        return array(
            //<any other filters here>
            'accessControl',
            array('booster.filters.BoosterFilter - delete')
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'login', 'partners', 'about', 'contact','partner','history','room','changepassword','logout'),
                'users' => array("*"),
            ),
            array('allow',
                'actions' => array('contact', 'logout'),
                'roles' => array(User::USER),
            ),
            array('allow',
                'actions' => array(),
                'roles' => array(User::MODER),
            ),
            array('allow',
                'actions' => array(),
                'roles' => array(User::ADMIN),
            ),
            /* array('deny',
                 //'actions'=>array('*'),
                 'users'=>array('*'),
             ),*/
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex($id = 0)
    {
        $this->pageTitle = 'Գլխավոր էջ';
        $this->layout = '//layouts/front';

        $history = History::model()->findAll();
        $model = Main::model()->findByPk(1);

        /*echo "<pre>";
        print_r($model);
        exit;*/

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index', array('model' => $model,'history'=>$history ));
    }

    public function actionCreateuser($id = 0)
    {
        $model = new User;

        $model->parent_id = $id;

        $model->password = '';
        // Performing ajax validation
        $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

            var_dump( $model->password);
            $model->reg_date = new CDbExpression('NOW()');
            if ($model->save())
                $this->redirect('tree');
            Yii::app()->user->setFlash('user_added', 'User has been created successfully!');
        }

        $this->render('createuser', array(
            'model' => $model,
        ));
    }

    public function actionEdituser($id = 0)
    {
        $model = User::model()->findByPk($id);

        // Performing ajax validation
        $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('site/tree'));
            Yii::app()->user->setFlash('user_added', 'User has been created successfully!');
        }

        $this->render('edituser', array(
            'model' => $model,
        ));
    }

    public function actionTree()
    {
        $criteria = new CDbCriteria();
        $criteria->order = "parent_id asc";


        if(Yii::app()->user->role == User::ADMIN){
            $users = User::model()->findByPk(0);
        }
        else {
            $users = User::model()->findByPk(Yii::app()->user->id);
        }

        $this->render('tree', array('users' => $users));
    }

    public function actionUser()
    {
        $this->layout = '//layouts/main';
        $user = new User('search');
        $user->unsetAttributes(); // clear any default values
        if (isset($_GET['User']))
            $user->attributes = $_GET['User'];

        $this->render('user', array('user' => $user));
    }

    /*echo "<pre>";
                   print_r($model);
                   exit;*/
/*
    public function actionPartners(){




        $cat = Category::model()->findAll();
        $dataprovider = Partner::model()->search();
        $this->render('partners', array('partner' => $partner,'cat' => $cat, 'dataprovider'=>$dataprovider));

    }*/


/*    public function actionPartner($id)
    {
        $partner = Partner::model()->findByPk($id);
        $this->render('_partners', array('partner'=>$partner));
    }*/



    public function actionPartners($id)
    {
        $this->layout = '//layouts/front';
        $partners = Partner::model()->findByPk($id);
        $this->render('_partners', array('partners'=>$partners));
    }
    public function actionPartner(){
        $this->layout = '//layouts/front';
        $criteria=new CDbCriteria();
        $count=Partner::model()->count($criteria);
        $pages=new CPagination($count);
        // results per page
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $partner = Partner::model()->findAll($criteria);
        // renders the view file 'protected/views/site/index.php'
        // using the default layouts 'protected/views/layouts/main.php'
        $this->render('partner', array('partner'=>$partner,'pages' => $pages));
    }

    public function actionHistory()
    {

        $this->layout = '//layouts/front';
        $criteria=new CDbCriteria();
        $count=History::model()->count($criteria);
        $pages=new CPagination($count);
        // results per page
        $pages->pageSize=6;
        $pages->applyLimit($criteria);
        $model = History::model()->findAll($criteria);
        $this->render('history', array('model' => $model, 'pages' => $pages));


        /*echo "<pre>";
        print_r($model);
        exit;*/
    }


    /*public function actionRoom()
    {

        $this->layout = '//layouts/front';
        $room = User::model()->find(Yii::app()->user->getId());

        $this->render('room', array('room' => $room));


    }*/


    public function actionChangepassword($id)
    {
        $model = new User();

        $model = User::model()->findByAttributes(array('id'=>$id));
        $model->setScenario('changePwd');


        if(isset($_POST['User'])) {

            $model->attributes = $_POST['User'];
            $valid = $model->validate();

            if($valid){

                $model->password = md5($model->new_password);

                if($model->save())
                    $this->redirect(array('changepassword','msg'=>'successfully changed password'));
                else
                    $this->redirect(array('changepassword','msg'=>'password not changed'));
            }
        }

        $this->render('changepassword',array('model'=>$model));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        //$this->layout = "";
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->redirect(array("site/index"));
            //$this->renderPartial('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $this->pageTitle = 'Հետադարձ կապ';
        $this->layout = '//layouts/front';
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Շնորհակալություն նամակի համար : Մենք շուտով կպատասխանենք Ձեզ :');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $this->pageTitle = 'Մուտք';
        $this->layout = '//layouts/front';
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(array('main/update/1'));
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionRoom() {

        $this->render('room', array(
            'model' => $this->loadModel(Yii::app()->user->id),
        ));
    }

    public function loadModel($id)
    {
        $model = User::model()->findByPk($id)->with('transactions');
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


}