<?php
	class IndexController extends Controller{
		function filters(){
			return array(
				'accessControl',
				//'accessControl + login,logout',//表示accessRules里面设置的权限只对login、logout方法有用
				//accessControl - login,logout//表示accessRules里面设置的权限除了login方法和logout方法，其他方法都有作用
				
			);
		}
		function accessRules(){
			return array(
				array(
					'allow',
					'actions'=>array('head','left','right','footer','sidebar','index','logout'),
					'users'=>array('@')
				),
				array(
					'allow',
					'actions'=>array('login','captcha'), //加上captcha，否则验证码也不出来，因为验证码是调用这个captcha方法生成的
					'users'=>array('*')
				),
				//其他的方法禁止所有用户访问，凡是禁止的，放在最后
				array(
					'deny',
					'users'=>array('*')
				)
			);
		}
		public function actions(){
			return array(
				'captcha'=>array(
					'class'=>'CCaptchaAction',
					
					/*'height'=>25,
					'width'=>80,
					'minLength'=>4,
					'maxLength'=>4*/
				)
			);
		}
		function actionHead(){
			$this->renderPartial('head');
		}
		function actionLeft(){
			$this->renderPartial('left');
		}
		function actionRight(){
			$this->renderPartial('right');
		}
		function actionIndex(){
			$this->render("index");
		}
		function actionFooter(){
			$this->renderPartial('footer');
		}
		function actionSidebar(){
			$this->renderPartial('sidebar');
		}
		function actionLogin(){
			$login_form = new LoginForm;
			if(isset($_POST['LoginForm'])){
				$login_form->attributes = $_POST['LoginForm'];
				if($login_form->validate() && $login_form->login()){
					$this->redirect('./index.php?r=houtai');
				}
			}
			$this->renderPartial('login',array('login_form'=>$login_form));
		}
		function actionLogout(){
			Yii::app()->user->logout();
			$this->redirect('./index.php?r=houtai/index/login');
		}
	}
?>