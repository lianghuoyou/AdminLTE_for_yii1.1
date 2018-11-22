<?php
	class UserController extends Controller{
		//设置session
		public function actionS1(){
			Yii::app()->session['user_name1'] = 'zhangsan';
			Yii::app()->session['user_age'] = 20;
			echo "创建session成功！";
		}
		//获取session
		public function actionS2(){
			echo Yii::app()->session['user_name1'];
			echo Yii::app()->session['user_age'];
		}
		//删除session
		public function actionS3(){
			Yii::app()->session->clear();
			Yii::app()->session->destroy();
		}
		//设置cookie
		public function actionC1(){
			$ck = new CHttpCookie('hobby','篮球、足球');
			$ck->expire = time()+3600;
			Yii::app()->request->cookies['hobby'] = $ck;
			
			$ck2 = new CHttpCookie('sex','nan');
			$ck2->expire = time()+3600;
			Yii::app()->request->cookies['sex'] = $ck2;
			echo "设置cookie成功！";
		}
		//获取cookie
		public function actionC2(){
			//获取方法1
			/*$cookie = Yii::app()->request->getCookies();
			echo $cookie['hobby'];*/
			//获取方法2
			echo Yii::app()->request->cookies['hobby'];
			echo Yii::app()->request->cookies['sex'];
		}
		//删除cookie
		public function actionC3(){
			$cookie = Yii::app()->request->getCookies();
			unset($cookie['hobby']);
		}
		//路径别名的使用
		public function actionAlias(){
			echo Yii::getPathOfAlias('system')."<br />";
			echo Yii::getPathOfAlias('system.web')."<br />";
			echo Yii::getPathOfAlias('application')."<br />";
			echo Yii::getPathOfAlias('zii')."<br />";
			echo Yii::getPathOfAlias('webroot')."<br />";
		}
		
	}
?>