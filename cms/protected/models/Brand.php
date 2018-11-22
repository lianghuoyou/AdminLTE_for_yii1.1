<?php
/**
* 品牌模型
* 
*/
class Brand extends CActiveRecord{
	public $password2;// 为这个模型添加一个确认密码字段
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return '{{erp_brand}}';
	}
	
	public function attributeLabels(){
		return array(
			'brand_name'=>'品牌名称',
			'brand_logo'=>'缩略图',
			'brand_desc'=>'品牌描述',
			'password2'=>'确认密码'
		);
	}
	
	public function rules(){
		return array(
			array('brand_name','required','message'=>'品牌名称必填'),
			array('brand_desc','required','message'=>'品牌描述必填'),
			array('brand_logo','safe'),
			/*array('birthday','date','allowEmpty'=>false,'format'=>'MM-dd-yyyy','message'=>'出生日期格式不正确'),*/
			/*array('user_name','unique','message'=>'用户名已经占用'),*/
			/*array('address','length','allowEmpty'=>false,'max'=>'20','min'=>'5','tooLong'=>'太长了','tooShort'=>'太短了'),*/
			/*array('user_age','numerical','allowEmpty'=>false,'integerOnly'=>true,'max'=>150,'min'=>1,'tooBig'=>'太大了','tooSmall'=>'太小了','message'=>'年龄必须是1到150之间的整数'),*/
			/*array('user_name','required','requiredValue'=>'abc','message'=>'用户名必须是abc'),
			array('user_name','required','on'=>'register','message'=>'用户名必须填写'),
			array('password2','compare','compareAttribute'=>'password','message'=>'两次输入的密码不一致','on'=>'register'),*/
			/*array('brand_logo,supplier','safe'),*/
			//验证邮箱
			/*array('user_email','email','allowEmpty'=>false,'message'=>'邮箱格式不正确，且不能为空'),*/
			//正则验证
			/*array('user_qq','match','pattern'=>'/^[1-9]\d{4,11}$','message'=>'qq格式不正确')*/
			//下拉验证：1表示请选择、 2表示小学、3表示中学、4表示高中、5表示大学
			/*array('user_xueli','in','range'=>array(2,3,4,5),'message'=>'学历必须选择')*/
			//自定义函数验证，比如验证用户爱好，至少选择两个或者以上
			/*array('user_hobby','check_hobby'),
			//自定义函数还可以传参
			array('user_name','check_user','id'=>3),*/
		);
	}
	
	public function check_hobby(){
		$len = strlen($this->user_hobby); //获取爱好字段的值
		if($len < 3){
			$this->addError('user_hobby','爱好必须选择两项或以上');
		}
	}
	public function check_user($attribute,$params){
		
	}
}