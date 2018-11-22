<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'timeZone'=>'Asia/Shanghai',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'houtai'
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'cache'=>array(
			'class'=>'system.caching.CFileCache',
		),
		'people'=>array(
			'class'=>'application.modules.houtai.components.PeopleComponent',
			//初始化它的name属性的值
			'name'=>'月亮湾'
		),
		// uncomment the following to enable URLs in path-format
		
		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'goods/<id:\d+>'=>'goods/detail',//即访问goods/30这样的路由其实就是访问goods/detail
				'user/login'=>array('user/login','urlSuffix'=>'.html'),//即访问user/login，它会这样的地址，user/login.html
				'goods/<brand_id:\d+>-<price:\d+>-<color:\d+>-<screen:\d+>'=>array('goods/category','urlSuffix'=>'.html'), //如果你想美化http://地址/index.php?r=goods/category&brand_id=4&price=2&color=3&screen=5这样的地址，改为http://地址/index.php/goods/4-2-3-5.html，可以设置这样的路由规则
				'index.html'=>array('index'),
				'a/<aid:\d+>'=>array('article/index','urlSuffix'=>'.html'), //如果你想访问/a/40，就是访问article/index/aid/40的话，可以设置这样的路由规则
			),
		),*/
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=demo',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '123456',
			'charset' => 'utf8',
			'tablePrefix' => 'ecs_',
			'enableParamLogging' => true,
			'enableProfiling'=>true
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		/*'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'name'=>'大奥'
	),
);