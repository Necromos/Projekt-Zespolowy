<?php

class CategoryController extends Controller
{


	public function actionCreate(){
		$model = new CategoryForm;
		$this->performAjaxValidation($model);
		if(isset($_POST['CategoryForm'])){
			$model->attributes=$_POST['CategoryForm'];
			if($model->validate() && $model->submit()){
				Yii::app()->user->setFlash('cc','Category created');
				$this->redirect('create');
			}
		}
		$this->render('create',array('model'=>$model));
	}

	protected function performAjaxValidation($model)
	{
	    if(isset($_POST['ajax']) && ($_POST['ajax']==='category-form'))
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }
	}
}