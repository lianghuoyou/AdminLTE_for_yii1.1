<?php
class UserWidget extends CWidget{
	public $num;
	public function init(){
		if(!$this->num){
			$this->num = 5;
		}
	}
	public function run(){
		$users = $this->getUsers();
		$this->render('user_widget',array(
			'users'=>$users,
			'num'=>$this->num
		));
	}
	public function getUsers(){
		return Yii::app()->db->createCommand()->select('uid,mem_name')->from('ecs_mem_card')->order('uid desc')->limit($this->num)->queryAll();
	}
}