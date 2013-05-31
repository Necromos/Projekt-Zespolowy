<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property string $email
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

	public static function isExistUser($userName){
    	$user = self::model()->find('LOWER(username)=?', array($userName));
        return !($user===null);       
    }
	public static function updateUsers($usersString, $article_id){
    	//$explodedUsers = explode(",", $usersString);
        foreach($usersString as $singleCouse){
        	//$singleCouse = trim($singleCouse);
            if($singleCouse==="")
            	continue;
				
            $user=User::model()->findByPk($singleCouse);
            Article_user::updateAssignments($article_id, $user->id);
                          
        }
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
			array('username, password, firstname, lastname, email', 'required'),
			array('username, firstname, lastname', 'length', 'max'=>20),
			array('password', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('register_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, firstname, lastname, email, register_date', 'safe', 'on'=>'search'),
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
			//'articles' => array(self::HAS_MANY, 'Article', 'author'),
			'userTags' => array(self::HAS_MANY, 'UserTag', 'user'),
			'FK_user_id' => array(self::MANY_MANY, 'Article', 'article_user(user_id, article_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id User',
			'username' => 'Username',
			'password' => 'Password',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'email' => 'Email',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('register_date',$this->register_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function behaviors() {
        return array(
            'tags' => array(
                'class' => 'ext.Su_MpaK.Taggable.behaviours.TaggableBehaviour',
 
                // Tag model path alias.
                'tagModel' => 'Tag',
 
                // The field name which contains tag title.
                'tagTableTitle' => 'name',
 
                // The name of relation table.
                'tagRelationTable' => 'user_tag',
 
                // The name of attribute in relation table which recalls tag.
                'tagRelationTableTagFk' => 'tag',
 
                // The name of attribute in relation table which recalls model.
                'tagRelationTableModelFk' => 'user',
 
                // Separator for tags in strings.
                'tagsSeparator' => ','
            )
        );
    }
}