<?php
	class ImageController extends Controller{
		function actionUpload(){
			$filename = $_FILES['file']['name'];
			$key = $_POST['key'];
			$key2 = $_POST['key2'];
			
			if ($filename) {
			    $res = move_uploaded_file($_FILES["file"]["tmp_name"],YII::app()->basePath."/../assets/houtai/dist/img/upload/" . $filename);
			    
			}
			echo "/assets/houtai/dist/img/upload/" . $filename ;
		}
	}
?>