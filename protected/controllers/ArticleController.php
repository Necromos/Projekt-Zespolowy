<?php
class ArticleController extends Controller
{
	
	private $_model;
	
	protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
	
  
	
	public function actionCreate()
    {
		$article = Article::model()->findAll();
        $author = User::model()->findAll();
        
		$model=new Article;
		$this->performAjaxValidation($model);
        if(isset($_POST['Article']))
        {
            $model->attributes=$_POST['Article'];
						
			//$model->author = implode(",", $_POST['Article']['author']);
			//$model->author = serialize($model->author);
			
			$model->content=CUploadedFile::getInstance($model,'content');

            if($model->save())
            {
				$extension = explode(".", $model->content);	
				$rootPath = pathinfo(Yii::app()->request->scriptFile);
				$user = $this->loadUser(Yii::app()->user->id);
				$username = $user->username;
				$random = rand(1,1000);
				$model->content->saveAs( $rootPath['dirname'].'\uploads\articles\\'.$username.'_'.date('Y-m-d_H-i-s').'.'.$extension[1]);
               	$this->redirect(array('article/create'));
            }
        }
        $this->render('create', array('model'=>$model));
    }
 
  
	protected function performAjaxValidation($model)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
    	{
        	echo CActiveForm::validate($model);
        	Yii::app()->end();
    	}
	}

}
?>