<?php
	
	
	namespace app\controllers;
	
	
	use yii\web\Controller;
	
	class AppController
		extends Controller
	{
		public static function debug($arr)
		{
			echo '<pre>' . print_r($arr, true) . '</pre>';
		}
		
		public static function consoleDump($var)
		{
			$str = json_encode(print_r($var, true));
			echo '<script>console.group(\'Var_dump\');console.log(' . $str . ');console.groupEnd();</script>';
		}
		
		protected function setMeta(
			$title = null,
			$keywords = null,
			$description = null
		)
		{
			$this->view->title = $title;
			$this->view->registerMetaTag([
				'name' => 'keywords',
				'content' => "$keywords"]
			);
			$this->view->registerMetaTag([
				'name' => 'description',
				'content' => "$description"]
			);
		}
	}