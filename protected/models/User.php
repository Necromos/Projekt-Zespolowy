<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property string $nick
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property integer $isadmin
 * @property integer $issectioneditor
 * @property integer $iseditor
 * @property integer $isreviewer
 * @property integer $ismanager
 * @property string $register_date
 *
 * The followings are the available model relations:
 * @property Article[] $articles
 * @property UserTag[] $userTags
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nick, email, isadmin, issectioneditor, iseditor, isreviewer, ismanager', 'required'),
			array('isadmin, issectioneditor, iseditor, isreviewer, ismanager', 'numerical', 'integerOnly'=>true),
			array('nick, firstname, lastname', 'length', 'max'=>20),
			array('email', 'length', 'max'=>100),
			array('register_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_user, nick, firstname, lastname, email, isadmin, issectioneditor, iseditor, isreviewer, ismanager, register_date', 'safe', 'on'=>'search'),
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
			'articles' => array(self::HAS_MANY, 'Article', 'author'),
			'userTags' => array(self::HAS_MANY, 'UserTag', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'nick' => 'Nick',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'email' => 'Email',
			'isadmin' => 'Isadmin',
			'issectioneditor' => 'Issectioneditor',
			'iseditor' => 'Iseditor',
			'isreviewer' => 'Isreviewer',
			'ismanager' => 'Ismanager',
			'register_date' => 'Register Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('nick',$this->nick,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('isadmin',$this->isadmin);
		$criteria->compare('issectioneditor',$this->issectioneditor);
		$criteria->compare('iseditor',$this->iseditor);
		$criteria->compare('isreviewer',$this->isreviewer);
		$criteria->compare('ismanager',$this->ismanager);
		$criteria->compare('register_date',$this->register_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}