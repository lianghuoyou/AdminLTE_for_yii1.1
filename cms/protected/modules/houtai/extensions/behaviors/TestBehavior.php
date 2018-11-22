<?php
class TestBehavior extends CBehavior{
	public 	function events(){
		return array_merge(parent::events(),array(
			'onTsima'=>'kill',
		));
	}
	
	public  function kill(){
		$str = '输出卧龙光线x，杀死司马，获取人头一个，金钱200元';
		dump($str);
	}
}