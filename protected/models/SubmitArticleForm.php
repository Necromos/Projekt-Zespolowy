<?php
class SubmitArticleForm extends CFormModel
{
	public $author;
	public $title;
	public $content;
	public $files;
	
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules(){
		return array(
			array('author, title, content, files', 'required', 'on'=>'insert,update'),
			array('author', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('content', 'length', 'max'=>50),
			array('files', 'file', 'allowEmpty'=>true, 'on'=>'update'), // 'types'=>'application/pdf,application/zip,text/plain,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'title' => 'Title',
			'content' => 'Content',
			'files' => 'File',
		);
	}
	
	
	public function submit()
	{
    	$record = new Article;
    	$record->author=$this->author;
    	$record->title=$this->title;
    	$record->content=$this->content;
    	$record->create_date=date('Y-m-d');
		return false;
	}

	
}
?>