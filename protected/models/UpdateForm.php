<?php

class UpdateForm extends CFormModel
{
	//public $username;
	public $email;
	//public $firstName;
	//public $lastName;
	public $prevPassword;
	public $password;
	public $password2;
	//public $rememberMe;
	public $tags;

	//private $_identity;


	public function init()
	{
		$record = User::model()->findByPk(Yii::app()->user->id);
		$this->email = $record->email;
		$tmp = $record->tags->get();
		$tmp = $tmp->toArray();
		$res = "";
		foreach ($tmp as &$value) {
		    $res = $res.$value->name.",";
		}
		//$res = implode(',',$tmp);
		$this->tags = $res;
	}
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			//array('username, email, firstName, lastName, password, password2, tags', 'required'),
			array('email','email'),
			//array('username', 'length', 'min'=>3, 'max'=>12),
			//array('password', 'length', 'min'=>8, 'max'=>16),
			//array('username','unique', 'className' => 'User'),
			//array('email','unique', 'className' => 'User'),
			//array('password', 'compare', 'compareAttribute'=>'password2'),
			//array('rememberMe', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			//'firstName' => 'First Name',
			//'lastName' => 'Last Name',
			'password2' => 'Confirm password',
			//'rememberMe'=>'Remember me next time',
			'prevPassword'=>'Previous password',
		);
	}

	public function submit()
	{
    	$record = User::model()->findByPk(Yii::app()->user->id);
    	//$record->username=$this->username;
    	$record->email=$this->email;
  //   	$pass=md5($this->password);
  //   	if ($this->prevPassword != "" && $pass != $record->password)
  //   		return false;
  //   	$criteria = new CDbCriteria;
		// $criteria->condition = 'email = "'.$this->email.'"';
		// $models = User::model()->findAll($criteria);
  //   	if (count($models)!=1)
  //   		return false;
  //   	$record->email = $this->email;
  //   	$record->password=$pass;
  //   	//$record->firstname=$this->firstName;
  //   	//$record->lastname=$this->lastName;
    	$record->tags->set((string)$this->tags);
	    if($record->save())
	    {
		   	return true;
		}	
    	return false;
	}
}
