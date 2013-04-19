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
			'password2' => 'Repeat password',
		);
	}

	public function submit()
	{
		return true;
	}
}
