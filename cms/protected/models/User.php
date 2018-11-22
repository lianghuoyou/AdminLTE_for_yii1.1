<?php
/**
* 品牌模型
* 
*/
class User extends CActiveRecord{
	public $password2;// 为这个模型添加一个确认密码字段
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return '{{admin_user}}';
	}
}