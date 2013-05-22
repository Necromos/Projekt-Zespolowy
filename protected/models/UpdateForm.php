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
    	//$currentUser->username=$this->username;
    	$this->currentUser->email=$this->email;
    	$pass=md5($this->password);
    	if ($this->prevPassword != "")
    		if($pass == $this->currentUser->password)
    			return false;
     		else
     			$this->currentUser->password=$pass;
    	$this->currentUser->tags->set($this->tags);
	    if($this->currentUser->save())
	    {
		   	return true;
		}	
    	return false;
	}
}
