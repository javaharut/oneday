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
 * @property string $newpassword
 * @property integer $role
 * @property integer $pay_status
 * @property double $moder_percent
 *
 *
 * The followings are the available model relations:
 * @property Transaction[] $transactions
 * @property User $parent
 * @property User[] $users
 */
class User extends CActiveRecord
{
    const GUEST = "guest";
    const USER = 1;
    const MODER = 2;
    const ADMIN = 3;

    public $newpassword;

    public $old_password;
    public $new_password;
    public $repeat_password;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    protected function afterFind()
    {
        $this->newpassword = $this->password;
        parent::afterFind();
    }


    public function beforeSave()
    {
        /*  if ($this->isNewRecord)
              $this->reg_date = Yii::app()->localtime->UTCNow;*/
        if (!$this->isNewRecord) {
            if ($this->newpassword != $this->password)
                $this->password = md5($this->newpassword);
        }


        return parent::beforeSave();
    }


    public function getcrole()
    {
        if ($this->role == User::ADMIN)
            return "Admin";
        else if ($this->role == User::MODER)
            return "Moderator";
        else
            return "User";
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, parent_id, balance, role, pay_status', 'numerical', 'integerOnly' => true, 'min' => 0),
            array('moder_percent', 'numerical'),
            array('name, lname, username, password, newpassword, phone', 'length', 'max' => 255),
            array('id', 'unique'),
            array('id', 'required'), /*username, password*/

            array('passport', 'length', 'max' => 20),
            array('email', 'length', 'max' => 100),
            array('email', 'email'),
            array('reg_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent_id, name, lname, phone, passport, email,
			        reg_date, balance, username, password, newassword, role, pay_status,
                    moder_percent',
                'safe',
                'on' => 'search'),

            /*PASSWORD CHANGE RULE*/

            array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
            array('old_password', 'findPasswords', 'on' => 'changePwd'),
            array('repeat_password', 'compare', 'compareAttribute' => 'new_password', 'on' => 'changePwd'),


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
            'transactions' => array(self::HAS_MANY, 'Transaction', 'user_id'),
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
            'parent_id' => 'Ծնող',
            'name' => 'Անուն',
            'lname' => 'Ազգանուն',
            'phone' => 'Հեռախոս',
            'passport' => 'Անձնագիր',
            'email' => 'Էլ.Փոստ',
            'reg_date' => 'Գրանցման ամսաթիվ',
            'balance' => 'Հաշվեկշիռ',
            'username' => 'Մուտքանուն',
            'password' => 'Գաղտնաբառ',
            'role' => 'Role',
            'pay_status' => 'Pay Status',
            'moder_percent' => 'Moder Percent',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('lname', $this->lname, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('passport', $this->passport, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('reg_date', $this->reg_date, true);
        $criteria->compare('balance', $this->balance);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('role', $this->role);
        $criteria->compare('pay_status', $this->pay_status);
        $criteria->compare('moder_percent', $this->moder_percent);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
