<?php
	class GoodsController extends Controller{
		function actionIndex(){
			$goods_model = Goods::model();
			//获取数据
			//$data = $goods_model->findAll();
			
			//$data = $goods_model->find();
			
			//$data = $goods_model->find('goods_name=:goods_name',array(':goods_name'=>'德国女孩 香水修护手霜'));
			//$data = $goods_model->findAll('goods_id > 1430 and goods_id < 1500');
			
			/*下面也是查询goods_id大于1450小于1500的数据
			$criteria = new CDbCriteria();
			$criteria->addCondition('goods_id > 1430');
			$criteria->addCondition('goods_id < :id');
			$criteria->params[':id'] = 1500;
			$data = $goods_model->findAll($criteria);
			*/
			
			/*
			$criteria = new CDbCriteria();
			$criteria->select = 'goods_id,goods_name';
			$criteria->addCondition('goods_id > :id1');
			$criteria->addCondition('goods_id < :id2');
			$criteria->params = array(":id1"=>1430,":id2"=>1500);
			$data = $goods_model->findAll($criteria);
			*/
			
			//$data = $goods_model->findAll(array('select'=>'goods_id','condition'=>'goods_id < 1500'));
			
			/*$criteria = new CDbCriteria();
			$criteria->addBetweenCondition('goods_id',1430,1500);//包含goods_id等于1430和1500的，多了两条数据，哈哈
			$data = $goods_model->findAll($criteria);
			*/
			
			//$data = $goods_model->exists('goods_id = 1430');//返回true，表示存在goods_id等于1430这条数据
			
			/*
			$criteria = new CDbCriteria();
			$criteria->addInCondition('goods_id',array(1430,1888,1488,1388));
			$data = $goods_model->findAll($criteria);
			*/
			
			/*
			$criteria = new CDbCriteria();
			$criteria->addSearchCondition('goods_name','黄金');//模糊查找goods_name中有黄金的数据
			$criteria->order = 'goods_id desc';
			$criteria->limit = 3;
			$criteria->offset = 3;
			$data =$goods_model->findAll($criteria);
			*/
			
			//修改数据
			//$data = $goods_model->updateByPk(1430,array('goods_name'=>'修改后的商品名称'));
			
			//删除数据
			//$data = $goods_model->findByPk(1430)->delete();
			//$data = $goods_model->deleteByPk(1431);
			
			/*$criteria = new CDbCriteria();
			$criteria->addCondition('goods_id > 1430');
			$criteria->addCondition('goods_id < :id');
			$criteria->params[':id'] = 1500;
			$data = $goods_model->findAll($criteria);*/
			
			
			//通过DAO方式来操作数据
			$sql = "select * from {{erp_goods_info}}";
			$d_obj = Yii::app()->db->createCommand($sql);
			$data = $d_obj->query();
			//$data = $data->read();//获取一条记录结果
			//获取所有数据呢？如下
			//$data = $data->readAll();
			//获取如下获取所有数据
			//$data = $d_obj->queryAll();
			//获取一条数据
			//$data = $d_obj->queryRow();
			//或者如下查询
			/*$data = Yii::app()->db->createCommand()->select('goods_id,goods_name')->from('ecs_erp_goods_info')->where('goods_id=:id',array(':id'=>3033))->queryRow();*/
			//查询所有的数据，用queryAll
			/*$data = Yii::app()->db->createCommand()->select('goods_id,goods_name')->from('ecs_erp_goods_info')->where('goods_id>:id',array(':id'=>3033))->queryAll();*/
			//返回记录数
			/*$data = Yii::app()->db->createCommand()->select('count(1)')->from('ecs_erp_goods_info')->where('goods_id>:id',array(':id'=>3033))->queryScalar();*/
			/*$data = Yii::app()->db->createCommand()->select('goods_id,goods_name')->from('ecs_erp_goods_info')->where(array('and','goods_id>2000','goods_id<5000'))->queryAll();*/
			//获取如下，一样的效果
			/*$data = Yii::app()->db->createCommand()->select('goods_id,goods_name')->from('ecs_erp_goods_info')->where('goods_id>:id',array(':id'=>2000))->andWhere('goods_id<:id1',array(':id1'=>5000))->queryAll();*/
			/*$data = Yii::app()->db->createCommand()->select('goods_id,goods_name')->from('ecs_erp_goods_info')->where(array('in','goods_id',array(3038,3015)))->queryAll();*/
			//like查询
			/*$data = Yii::app()->db->createCommand()->select('goods_id,goods_name')->from('ecs_erp_goods_info')->where(array('like','goods_name','%黄金%'))->queryAll();*/
			/*$data = Yii::app()->db->createCommand()->select('goods_id,goods_name')->from('ecs_erp_goods_info')->where(array('like','goods_name','%黄金%'))->limit(3)->order('goods_id desc')->queryAll();*/
			//然后我们看看关联查询
			/*$data = Yii::app()->db->createCommand()->select('u.goods_id,goods_name,warehouse_id')->from('ecs_erp_goods_info u')->join('ecs_erp_goods i','u.goods_id = i.goods_id')->queryAll();*/
			//更新操作
			/*$sql = 'update {{erp_goods_info}} set goods_name = "测试" where goods_id = 3270';
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql);
			$res = $command->execute();*/
			//插入操作
			/*$res = Yii::app()->db->createCommand()->insert('ecs_erp_goods_info',array('goods_name'=>'测试222','supplier_id'=>22));*/
			
			//或者我们预处理的方法插入
			/*$sql = 'insert into {{erp_goods_info}} (goods_name,supplier_id) values(:goods_name,:supplier_id)';
			$yu = Yii::app()->db->createCommand($sql);
			$goods_name = '测试商品88';
			$supplier_id = '200';
			
			$yu->bindParam(':goods_name',$goods_name);
			$yu->bindParam(':supplier_id',$supplier_id);
			
			$res = $yu->execute();
			
			$goods_name = '测试商品88888888';
			$supplier_id = '300';
			$yu->bindParam(':goods_name',$goods_name);
			$yu->bindParam(':supplier_id',$supplier_id);
			//还可以设置第三个参数，如下
			$yu->bindParam(':goods_name',$goods_name,PDO::PARAM_STR);
			$yu->bindParam(':supplier_id',$supplier_id,PDO::PARAM_INT);
			
			$res = $yu->execute();*/
			
			//修改
			/*$res = Yii::app()->db->createCommand()->update('ecs_erp_goods_info',array(
				'goods_name'=>'测试99999'
			),'goods_id=:id',array(':id'=>3274));*/
			//删除
			/*$res = Yii::app()->db->createCommand()->delete('ecs_erp_goods_info','goods_id=:id',array(
				'id'=>3274
			));
			var_dump($res);*/
			/*$sql = 'select count(*) from {{erp_goods_info}}';
			$res = Yii::app()->db->createCommand($sql)->queryScalar();*/
			
			//返回字段的值组成的数组，比如id，即array(1,3,5)这样的数据，其中1、3、5是id的值
			/*$sql = 'select goods_id from {{erp_goods_info}}';
			$res = Yii::app()->db->createCommand($sql)->queryColumn();
			echo "<pre>";*/
			
			//打印执行的sql语句
			/*$res = Yii::app()->db->createCommand()->select("*")->from('{{erp_goods_info}}')->text;
			var_dump($res);*/
			
			$data = $goods_model->findAll();
			//获取品牌信息
			$brand_model = Brand::model();
			$temp_data = $brand_model->findAll();
			foreach($temp_data as $t_k=>$t_v){
				$brand_data[$t_v->brand_id] = $t_v->brand_name;
			}
			//我们自定义的分页类使用
			/*$per = 6;
			$page = new Pagination(100,$per);
			//$page_list = $page->fpage(array(3,4,5,6,7));
			//$page_list = $page->fpage();*/
			$this->render('index',array('data'=>$data,'brand_data'=>$brand_data));
		}
		
		function actionAddGood(){
			/*$goods_model = new Goods();
			$goods_model->goods_name = '新添加的商品';
			$goods_model->brand_id = '100';
			$goods_model->supplier_id = '102';
			if($goods_model->save()){
				echo "success";
			}else{
				echo "fail";
			}*/
			
			$this->render('add_good');
		}
	}
?>