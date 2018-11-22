<?php
	//导入我们的行为类
	Yii::import('application.modules.houtai.extensions.behaviors.*');
	class TestController extends Controller{
		function filters(){
			return array(
				array(
					'system.web.widgets.COutputCache + detail',
					'duration'=>1800,
					'varyByParam'=>array('id'),
				)
			);
		}
		function actionTime(){
			//计算某段脚本的运行时间
			Yii::beginProfile('mytime');
			for($i=0;$i<500000000;$i++){
				
			}
			//可知php7循环5亿次需要9秒多的时间
			/*sleep(5);*/
			Yii::endProfile('mytime');
		}
		//获取当前控制器和方法
		function actionGc(){
			echo $this->id.'<br />';
			echo $this->action->id.'<br />';
		}
		//页面缓存
		function actionDetail(){
			
			$this->render('detail');
		}
		//数据缓存
		function actionSetCache(){
			Yii::app()->cache->set('admin_username','admin',3000);
			
		}
		//获取数据缓存
		function actionGetCache(){
			echo Yii::app()->cache->get('admin_username');
		}
		//删除数据缓存
		function actionDeleteCache(){
			Yii::app()->cache->delete('admin_username');
			//清除所有的缓存
			Yii::app()->cache->flush();
		}
		function actionfuntest(){
			dump(array('name'=>'高手','age'=>19));
		}
		
		
		//组件的使用
		function actionGet(){
			//$com = Yii::createComponent('application.components.TestComponent');//前台模块组件
			$com = Yii::createComponent('application.modules.houtai.components.TestComponent');
			$com->onTsima = array($this,'kill');
			dump($com->name);
		}
		function actionSet(){
			$com = Yii::createComponent('application.modules.houtai.components.TestComponent');
			$com->name = 'steven';
			dump($com->name);
		}
		function actionEvent(){
			$com = Yii::createComponent('application.modules.houtai.components.TestComponent');
			//注册事件句柄
			$com->onTsima = array($this,'kill');
			//触发事件
			$com->onTsima(new CEvent($com));
		}
		public function actionBehavior(){
			$com = Yii::createComponent('application.modules.houtai.components.TestComponent');
			//绑定行为到组件上
			$com->attachBehavior('test','application.modules.houtai.extensions.behaviors.TestBehavior');//第一个参数是行为的名称，随便取，第二个参数是行为类的路径
			//然后调用行为的方法，跟调用这个组件的方法一样去调用行为的方法
			$com->kill();
		}
		public function kill(){
			$str = '输出卧龙光线x，杀死司马，获取人头一个，金钱200';
			dump($str);
		}
		
		//调用组件的方法，要在main.php里面定义这个组件才可以像Yii::app()->test来调用这个test组建的方法
		public function actionCmethod(){
			dump(Yii::app()->people->name);
			dump(Yii::app()->people->say());
		}
		//获取main.php里面param里面的数据
		public function actionparam(){
			dump(Yii::app()->params['name']);
		}
		
	}
?>