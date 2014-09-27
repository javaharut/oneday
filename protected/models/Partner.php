<?php

/**
 * This is the model class for table "partner".
 *
 * The followings are the available columns in table 'partner':
 * @property integer $id
 * @property string $title
 * @property string $partner_title
 * @property string $desc
 * @property string $img
 * @property string $url
 * @property string $lat
 * @property string $long
 */
class Partner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'partner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, partner_title, img, url, lat, long', 'length', 'max'=>255),
			array('desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, partner_title, desc, img, url, lat, long', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'partner_title' => 'Partner Title',
			'desc' => 'Desc',
			'img' => 'Img',
			'url' => 'Url',
			'lat' => 'Lat',
			'long' => 'Long',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('partner_title',$this->partner_title,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('long',$this->long,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Partner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
