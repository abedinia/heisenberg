<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */


	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        // renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	
	

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}



	public function actionTest(){
        

    }


    /**
     * upload image
     */
//    public function actionUpload()
//    {
//
//        Yii::import("ext.EAjaxUpload.qqFileUploader");
//
//        $folder= Yii::app()->basePath . "/../images/upload/";
//        $allowedExtensions = array("jpg");//array("jpg","jpeg","gif","exe","mov" and etc...
//        $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
//        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
//        $result = $uploader->handleUpload($folder,'');
//        $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
//        echo $result;// it's array
//    }


}
