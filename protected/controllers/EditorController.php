<?php 
class EditorController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionLists()
	{
		$users = User::model()->findAll();
		$this->render('lists', array(
			'users'=>$users,
			));
	}
}