<?php


class UserPassword extends CFormModel
{
    //Define public variable

    public $old_password;
    public $new_password;
    public $repeat_password;


    //Define the rules for old_password, new_password and repeat_password with changePwd Scenario.

    public function rules()
    {
        return array(
            array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
            array('old_password', 'findPasswords', 'on' => 'changePwd'),
            array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),
        );
    }


    //matching the old password with your existing password.
    public function findPasswords($attribute, $params)
    {
        $user = User::model()->findByPk(Yii::app()->user->id);
        if ($user->password != md5($this->old_password))
            $this->addError($attribute, 'Old password is incorrect.');
    }
}
