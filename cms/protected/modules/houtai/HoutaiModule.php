<?php

class HoutaiModule extends CWebModule
{
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		//设置后台默认控制器
		$this->defaultController = 'index';
		// import the module-level models and components
		$this->setImport(array(
			'houtai.models.*',
			'houtai.components.*',
		));
		//设置后台的登录管理员的session名称前缀
		Yii::app()->setComponents(array(
			'user'=>array(
				'stateKeyPrefix'=>'houtai',
				'loginUrl'=>array('houtai/index/login')
			),
			'errorHandler'=>array(
				// use 'site/error' action to display errors
				'errorAction'=>'/houtai/site/error',
			),
		));
		
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
