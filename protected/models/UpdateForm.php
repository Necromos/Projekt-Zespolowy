<?php

class UpdateForm extends CFormModel
{
	public $email;
	public $prevPassword;
	public $password;
	public $password2;
	public $tags;

	//private $_identity;

	private $currentUser;


	public function init()
	{
		$this->currentUser = User::model()->findByPk(Yii::app()->user->id);
		$this->email = $this->currentUser->email;
		$tmp = $this->currentUser->tags->get();
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
			array('prevPassword', 'length', 'min'=>8, 'max'=>16, 'allowEmpty'=>true),
			array('password', 'length', 'min'=>8, 'max'=>16, 'allowEmpty'=>true),
			array('password2', 'length', 'min'=>8, 'max'=>16, 'allowEmpty'=>true),
			//array('username','unique', 'className' => 'User'),
			//array('email','unique', 'className' => 'User'),
			array('password2', 'compare', 'compareAttribute'=>'password'),
			array('email', 'checkEmailChange'),
			array('tags', 'checkIfNull'),
			//array('rememberMe', 'boolean'),
		);
	}

	public function checkEmailChange($attribute,$params)
    {
    	$models = User::model()->findAllByAttributes(array('email'=>$this->email));
    	if ($this->currentUser->email != $this->email && count($models)>0)
    		$this->addError('email', 'This email is being used.');
    }

    public function checkIfNull($attribute,$params)
    {
    	if (trim($this->tags)=="")
    		$this->addError('tags', 'Tags cannot be null.');
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
