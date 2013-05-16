<?php
class ArticleController extends Controller
{
	
	private $_model;
	
	public $layout='//layouts/column2';
	
		
	protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
	
	
	public function actionView($id)
	{	
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
  
	
	public function actionCreate()
    {
		$article = Article::model()->findAll();
        $users = User::model()->findAll();
        
		$model=new Article;
		$this->performAjaxValidation($model);
        if(isset($_POST['Article']))
        {
            $model->attributes=$_POST['Article'];
			$model->content=CUploadedFile::getInstance($model,'content');
			$model->category = implode($model->category);
			$model->create_date = date('Y-m-d_H-i-s');
            if($model->save())
            {
				
				$extension = explode(".", $model->content);	
				$rootPath = pathinfo(Yii::app()->request->scriptFile);
				$user = $this->loadUser(Yii::app()->user->id);
				$model->author = $user;
				$username = $user->username;
				$date = date('Y-m-d_H-i-s');
				$model->content->saveAs( $rootPath['dirname'].'\uploads\articles\\'.$username.'_'.$date.'.'.$extension[1]);
               	$this->redirect(array('article/create'));
            }
        }
        $this->render('create', array('model'=>$model));
    }
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			$model->content=CUploadedFile::getInstance($model,'content');
			$model->category = implode($model->category);
			$model->create_date = date('Y-m-d_H-i-s');
			
			if($model->save()){
				$rootPath = pathinfo(Yii::app()->request->scriptFile);
				$user = $this->loadUser(Yii::app()->user->id);
				$model->author = $user;
				$file_name = Yii::app()->db->createCommand()
				->select('content')
    			->from('article')
    			->where('id=:id', array(':id'=>$model->id))
    			->queryRow();
				foreach($file_name as $name)
					$model->content->saveAs( $rootPath['dirname'].'\uploads\articles\\'.$name);
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	
	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Article');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Review the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$optional_users;
		$assigment = Yii::app()->db->createCommand()
			->select('user_id')
    		->from('article_user')
    		->where('id=:id', array(':id'=>$id))
    		->queryRow();
		foreach($assigment as $user_id){
			$users = Yii::app()->db->createCommand()
    			->select('username')
    			->from('user')
    			->where('id=:id', array(':id'=>$id))
    			->queryRow();
		}
		
		foreach($users as $username){
			$optional_users = $username.", ";	
		}
		
		
		$model=Article::model()->findByPk($id);
		$model->users = $optional_users;
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
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