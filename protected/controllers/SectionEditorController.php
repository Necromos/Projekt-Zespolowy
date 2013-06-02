<?php 
class SectionEditorController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionLists()
	{
		$articles = Article::model()->findAll('status=:status', array(':status'=>0));

		$this->render('lists', array(
			'articles'=>$articles,
		));  
	}

	public function actionUsers()
	{
		$users = User::model()->findAll();
		$this->render('lists', array(
			'users'=>$users,
			));
	}
}