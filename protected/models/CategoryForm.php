<?php

class CategoryForm extends CFormModel
{
	public $name;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('name', 'required'),
			array('name', 'unique', 'className' => 'Category'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Category name',
		);
	}


	public function submit()
	{
    	$record = new Category;
    	$record->name=$this->name;

	    if($record->save())
	    {
	   		return true;
	    }	
    	return false;
	}
}
