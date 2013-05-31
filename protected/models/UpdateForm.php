<?php

class UpdateForm extends CFormModel
{
	public $email;
	public $prevPassword;
	public $password;
	public $password2;
	public $tags;


	private $currentUser;


	protected function afterConstruct()
	{
		$this->currentUser = User::model()->findByPk(Yii::app()->user->id);
		$this->email = $this->currentUser->email;
		$tmp = $this->currentUser->tags->get();
		$tmp = $tmp->toArray();
		$res = "";
		foreach ($tmp as &$value) {
		    $res = $res.$value->name.",";
		}
		$this->tags = $res;
	}

	public function rules()
	{
		return array(
			array('email','email'),
			array('prevPassword', 'length', 'min'=>8, 'max'=>16, 'allowEmpty'=>true),
			array('password', 'length', 'min'=>8, 'max'=>16, 'allowEmpty'=>true),
			array('password2', 'length', 'min'=>8, 'max'=>16, 'allowEmpty'=>true),
			array('password2', 'compare', 'compareAttribute'=>'password'),
			array('email', 'checkEmailChange'),
			array('tags', 'checkIfNull'),
		);
	}

	public function checkEmailChange($attribute,$params)
    {
    	$models = User::model()->findAllByAttributes(array('email'=>$this->email));
    	if ($this->currentUser->email != $this->email && count($models)>0){
    		$this->addError('email', 'This email is being used.');
    		return false;
    	}
    	return true;
    }

    public function checkIfNull($attribute,$params)
    {
    	if (trim($this->tags)=="") {
    		$this->addError('tags', 'Tags cannot be null.');
    		return false;
    	}
    	return true;
    }
	public function attributeLabels()
	{
		return array(
			'password2' => 'Confirm password',
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