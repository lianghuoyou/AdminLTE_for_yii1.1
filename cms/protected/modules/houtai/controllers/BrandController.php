<?php
	class BrandController extends Controller{
		function filters(){
			return array(
				'accessControl',
			);
		}
		function accessRules(){
			return array(
				//所有用户，不管登录或者不登录，都可以访问
				array(
					'allow',
					'actions'=>array('editBrand'),
					'users'=>array('*')
				),
				//设置的是登录的用户才可以访问brandList、addBrand方法
				array(
					'allow',
					'actions'=>array('brandList','addBrand'),
					'users'=>array('@')
				),
				//指定某个用户才可以访问删除方法
				array(
					'allow',
					'actions'=>array('delBrand'),
					'users'=>array('wenwei')
				),
				//指定匿名用户可以访问的方法
				array(
					'allow',
					'actions'=>array('brandList'),
					'users'=>array('?')
				),
				//其他的方法禁止所有用户访问，凡是禁止的，放在最后
				array(
					'deny',
					'users'=>array('*')
				)
			);
		}
		function actionBrandList(){
			//缓存
			/*$brand_data = Yii::app()->cache->get('brand_data');
			if($brand_data){
				$data = $brand_data;
				//echo "有缓存";
			}else{*/
				$brand_model = Brand::model();
				$data = $brand_model->findAll();
				/*Yii::app()->cache->set('brand_data',$data,3600);
				//echo '没有缓存';
			}*/
			
			$this->render('brand_list',array('data'=>$data));
		}
		//添加
		function actionAddBrand(){
			$brand_model = new Brand();
			
			if(isset($_POST['Brand'])){
				//下面的代码有点累赘，我们用attributes属性
				/*foreach($_POST['Brand'] as $k=>$v){
					$brand_model->$k = $v;
				}*/
				//只有在rules里面设置了验证规则的属性才可以被attributes接收
				$brand_model->attributes = $_POST['Brand'];
				
				if($brand_model->save()){
					Yii::app()->user->setFlash('brand_success','添加品牌成功！');
					Yii::app()->cache->delete('brand_data');
					//添加成功就跳转到别的页面去
					$this->redirect('./index.php?r=houtai/brand/brandList');
				}else{
					$brand_model->getErrors();
				}
			}
			
			$this->render('add_brand',array('brand_model'=>$brand_model));
		}
		//修改
		function actionEditBrand($brand_id){
			$brand_id = (int)$brand_id;
			$brand_model = Brand::model();
			$brand_data = $brand_model->findByPk($brand_id);
			if(isset($_POST['Brand'])){
				foreach($_POST['Brand'] as $k=>$v){
					$brand_data->$k = $v;
				}
				if($brand_data->save()){
					Yii::app()->user->setFlash('brand_edit_success','修改品牌成功！');
					//添加成功就跳转到别的页面去
					$this->redirect('./index.php?r=houtai/brand/brandList');
				}else{
					$brand_data->getErrors();
				}
			}
			$this->render('edit_brand',array('brand_model'=>$brand_data));
		}
		//删除
		function actionDelBrand($brand_id){
			$brand_id = (int)$brand_id;
			/*删除方法1
			$brand_model = Brand::model()->findByPk($brand_id);
			if($brand_model->delete()){
				var_dump("删除成功！");
			}else{
				var_dump($brand_model->getErrors());
			}*/
			//删除方法2
			$brand_model = Brand::model();
			$num = $brand_model->deleteByPk($brand_id);
			if($num == 1){
				$this->redirect('./index.php?r=houtai/brand/brandList');
			}
		}
	}
?>