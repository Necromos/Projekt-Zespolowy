<?php

class SubmitRegisterForm extends CFormModel
{
	public $username;
	public $email;
	public $firstName;
	public $lastName;
	public $password;
	public $password2;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('username, email, firstName, lastName, password, password2', 'required'),
			array('email','email'),
			array('username', 'length', 'min'=>3, 'max'=>12),
			array('password, password2', 'length', 'min'=>8, 'max'=>16),
			array('username','unique', 'className' => 'Users')
			array('password', 'compare', 'compareAttribute'=>'password2'),
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
		);
	}

	public function submit()
	{
		return true;
	}
}
