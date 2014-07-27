<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $lname
 * @property string $phone
 * @property string $passport
 * @property string $email
 * @property string $reg_date
 * @property integer $balance
 * @property string $username
 * @property string $password
 * @property integer $role
 *
 * The followings are the available model relations:
 * @property User $parent
 * @property User[] $users
 */
class User extends CActiveRecord
{
    const GUEST = "guest";
    const ADMIN = 3;
    const MODER = 2;
    const USER = 1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

    public function beforeSave() {
      /*  if ($this->isNewRecord)
            $this->reg_date = Yii::app()->localtime->UTCNow;*/

        return parent::beforeSave();
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, parent_id, balance, role', 'numerical', 'integerOnly'=>true, 'min'=>0),
			array('name, lname, username, password, phone', 'length', 'max'=>255),
            array('id', 'unique'),
            array('id', 'required'),  /*username, password*/

			array('passport', 'length', 'max'=>20),
			array('email', 'length', 'max'=>100),
            array('email','email'),
			array('reg_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, name, lname, phone, passport, email, reg_date, balance, username, password, role', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parent' => array(self::BELONGS_TO, 'User', 'parent_id'),
			'users' => array(self::HAS_MANY, 'User', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'name' => 'Name',
			'lname' => 'LastName',
			'phone' => 'Phone',
			'passport' => 'Passport',
			'email' => 'Email',
			'reg_date' => 'Reg Date',
			'balance' => 'Balance',
			'username' => 'Login',
			'password' => 'Password',
			'role' => 'Role',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('reg_date',$this->reg_date,true);
		$criteria->compare('balance',$this->balance);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
