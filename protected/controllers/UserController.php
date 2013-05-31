<?php

class UserController extends Controller
{

	public function actionRegister()
	{
		if (!Yii::app()->user->isGuest)
			$this->redirect(Yii::app()->homeUrl);
		$model=new RegisterForm;
		$this->performAjaxValidation($model);
		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
			if($model->validate() && $model->submit())
				$this->redirect(Yii::app()->homeUrl);
		}
		$this->render('register',array('model'=>$model));
	}

	public function actionLogin()
	{
		$model=new LoginForm;

		$this->performAjaxValidation($model);

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->homeUrl);
		}
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	public function actionUpdate()
	{
		if (Yii::app()->user->isGuest)
			$this->redirect(Yii::app()->homeUrl);
		$model=new UpdateForm;
		$this->performAjaxValidation($model);
		if(isset($_POST['UpdateForm']))
		{
			$model->attributes=$_POST['UpdateForm'];
			if($model->validate() && $model->submit())
			{
				Yii::app()->user->setFlash('update','Your account is updated.');
				$this->refresh();
			}
		}
		$this->render('update',array('model'=>$model));
	}


	protected function performAjaxValidation($model)
	{
	    if(isset($_POST['ajax']) && ($_POST['ajax']==='login-form' || $_POST['ajax']==='register-form' || $_POST['ajax']==='update-form'))
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }
	}
}