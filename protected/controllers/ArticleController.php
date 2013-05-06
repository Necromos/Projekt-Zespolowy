<?php
class ArticleController extends CController
{
	public function actionArticle()
	{
		$model=new ArticleForm;
		if(isset($_POST['ArticleForm']))
		{
			$rnd = rand(0,9999);  // generate random number between 0-9999
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            //$model->files = $fileName;
			$model->attributes=$_POST['ArticleForm'];
			$model->files=CUploadedFile::getInstance($model,'files');
			
			if($model->save())
            {	
				$model->files->saveAs('./aaa.jpg');
				//$uploadedFile->saveAs(Yii::app()->basePath.'/../articles/'.$fileName);  // rootDirectory/articles
				$this->redirect(Yii::app()->homeUrl);
            }	
		}
		$this->render('article',array('model'=>$model));
	}
}
?>