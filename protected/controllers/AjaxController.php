<?php

class AjaxController extends Controller
{
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

    public function actionUser() {
        if(Yii::app()->request->isAjaxRequest) {

           $user = User::model()->findByPk($_POST['id']);

           $this->renderPartial('user', array('user'=>$user));

            Yii::app()->end();
        }
    }

    public function actionDeleteuser() {
        if(Yii::app()->request->isAjaxRequest) {

            $user = User::model()->findByPk($_POST['id']);

            $transactions = $user->transactions;

            foreach ($transactions as $transaction) {
                $transaction->delete();
            }


            if($user->delete())
                echo "1";
            else
                echo "0";

            Yii::app()->end();
        }
    }


    public function actionTransaction() {
        if(Yii::app()->request->isAjaxRequest) {

            $user = User::model()->findByPk($_POST['id']);

            $model = new Transaction;

            $this->renderPartial('transaction', array('user'=>$user, 'model'=>$model));

            Yii::app()->end();
        }
    }

    public function actionAddmoney() {
        try {
            if(Yii::app()->request->isAjaxRequest) {
                $amount = $_POST['amount'];
                $id = $_POST['id'];

                $percent = 10;

                if(Yii::app()->user->role == User::MODER) {
                    $user = User::model()->findByPk(Yii::app()->user->id);
                    $percent = $user->moder_percent;
                }
                else if(Yii::app()->user->role == User::ADMIN) {
                    $percent = $_POST['percent'];
                }

                $result = "";

                $transaction = new Transaction;

                $transaction->date = new CDbExpression('NOW()');

                $transaction->amount = intval($amount);
                $transaction->user_id = $id;
                $transaction->type = Transaction::ADD_MONEY;

                if($transaction->save()) {
                    $user = User::model()->findByPk($id);
                   // $user->balance += intval($amount);
                    if($user->save())
                        $result .= "<div class='row'><div class='col-md-8'>id-{$user->id} amount-0</div></div>";
                    if(!empty($user->parent)) {
                        if(empty($user->parent->parent)) {
                            if($user->pay_status == 0){
                                $money =  intval($amount * $percent / 100);
                                $user->parent->balance += $money;
                                if($user->parent->save())
                                    $result .= "<div class='row'><div class='col-md-8'>id-{$user->parent->id} amount-{$money}</div></div>";

                                $user->pay_status = 1;
                                $user->save(false);
                            }
                            else {
                                $money =  intval($amount * $percent / 100);
                                $user->parent->balance += intval($money/2);
                                if($user->parent->save())
                                    $result .= "<div class='row'><div class='col-md-8'>id-{$user->parent->id} amount-{$money}</div></div>";

                                $user->balance = intval($money/2);
                                $user->save(false);
                            }

                        }
                        else {
                            $half = $percent/2;
                            $money = intval($amount * $half / 100);

                            if($user->pay_status == 1) {
                                $user->balance += $money;
                                if($user->save())
                                    $result .= "<div class='row'><div class='col-md-8'>id-{$user->id} amount-{$money}</div></div>";

                                $counter = $this->calculateCount($user, 0);

                                //echo $counter;

                                $tempuser = $user;
                                $sharedMoney =  intval(($amount * $half / 100 )/ $counter) ;
                            }
                            else {
                                $user->pay_status = 1;
                                $user->parent->balance += $money;

                                if($user->parent->save() && $user->save())
                                    $result .= "<div class='row'><div class='col-md-8'>id-{$user->parent->id} amount-{$money}</div></div>";

                                $counter = $this->calculateCount($user->parent, 0);

                                //echo $counter;

                                $tempuser = $user->parent;
                                if($counter != 0)
                                    $sharedMoney =  intval(($amount * $half / 100 )/ $counter) ;
                                else
                                    $sharedMoney =  intval(($amount * $half / 100 )) ;
                            }

                            do {
                                $tempuser = $tempuser->parent;
                                $tempuser->balance += intval($sharedMoney);
                                if($tempuser->save())
                                    $result .= "<div class='row'><div class='col-md-8'>id-{$tempuser->id} balance-{$sharedMoney}</div></div>";
                                /*if($tempuser->id == 1) {
                                    $check = User::model()->findByPk(1);
                                    $check->balance = 200;
                                    $check->save();
                                    print_r($check->save());
                                }*/
                            }
                            while($tempuser->id != 0);
                        }
                    }
                    else {
                        echo "User Has no parent";
                    }
                }
                else {
                    echo "Transaction is not completed";
                }

                echo $result;

                Yii::app()->end();
            }
        }
        catch(Exception $ex){
            print_r($ex->getMessage() . $ex->getLine());
        }
    }



    private function calculateCount(User $user, $count = 0) {
        if($user->id != 0){
            $count++;
            return  $this->calculateCount($user->parent, $count);
        }
        else
            return $count;
    }

    public function actionSubtractmoney() {
        if(Yii::app()->request->isAjaxRequest) {
            $amount = intval($_POST['amount']);
            $user = User::model()->findByPk($_POST['id']);
            $user->balance -= $amount;

            $transaction = new Transaction;

            $transaction->date = new CDbExpression('NOW()');

            $transaction->amount = intval($amount);
            $transaction->user_id = $user->id;
            $transaction->type = Transaction::ADD_MONEY;

            if($user->save());
            echo "<div class='row'><div class='col-md-8'>id-{$user->id} balance-{$amount}</div></div>";

            Yii::app()->end();
        }
    }

    public function actionHistory() {
        if(Yii::app()->request->isAjaxRequest) {

            $criteria = new CDbCriteria();
            $criteria->condition = 'user_id=:id';
            $criteria->params = array(':id'=>$_POST['id']);
            $criteria->order = "date DESC";

            $user = User::model()->findByPk($_POST['id']);

            $transactions = Transaction::model()->findAll($criteria);

            $this->renderPartial('history', array('transactions'=>$transactions, 'user'=>$user));

            Yii::app()->end();
        }
    }

}