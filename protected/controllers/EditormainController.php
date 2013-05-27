<?php 
class EditormainController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionUnpublished()
	{
		$articles = Article::model()->findAll('status=:status', array(':status'=>0));
		
		$this->render('unpublished', array(
			'articles'=>$articles,
		));
	}
}