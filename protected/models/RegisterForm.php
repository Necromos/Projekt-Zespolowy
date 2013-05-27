<?php

class RegisterForm extends CFormModel
{
	public $username;
	public $email;
	public $firstName;
	public $lastName;
	public $password;
	public $password2;
	public $rememberMe;
	public $beReviewer;
	public $tags;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('username, email, firstName, lastName, password, password2, tags', 'required'),
			array('email','email'),
			array('username', 'length', 'min'=>3, 'max'=>12),
			array('password, password2', 'length', 'min'=>8, 'max'=>16),
			array('username','unique', 'className' => 'User'),
			array('email','unique', 'className' => 'User'),
			array('password2', 'compare', 'compareAttribute'=>'password'),
			array('rememberMe', 'boolean'),
			array('beReviewer', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'password2' => 'Confirm password',
			'rememberMe'=>'Remember me next time',
			'beReviewer' => 'Do you want to become a reviewer?',
		);
	}


	public function submit()
	{
    	$record = new User;
    	$record->username=$this->username;
    	$record->email=$this->email;
    	$record->password=md5($this->password);
    	$record->firstname=$this->firstName;
    	$record->lastname=$this->lastName;
    	$record->register_date=date('Y-m-d');
    	$record->tags->add((string)$this->tags);

	    if($record->save())
	    {
	    	if ($this->beReviewer)
	    	{
	    		Rights::assign("Reviewer", $record->id);
	    	}
	    	// Assign basic Author role to new users
	    	$authenticatedName = Rights::module()->authenticatedName;
	    	Rights::assign($authenticatedName, $record->id);

	    	$identity = new UserIdentity($this->username,$this->password);
	    	$identity->authenticate();
	    	if($identity->errorCode===UserIdentity::ERROR_NONE)
			{
				$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
				Yii::app()->user->login($identity,$duration);
		   		return true;
		   	}
	    }	
    	return false;
	}
}
