<?php
/**
* ��Ʒģ��
* 
*/
class Goods extends CActiveRecord{
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return '{{erp_goods_info}}';
	}
}