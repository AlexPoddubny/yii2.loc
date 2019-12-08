<?php
	
	
	namespace app\controllers;
	
	
	use app\models\Product;
	
	class CategoryController
		extends AppController
	{
		public function actionIndex()
		{
			$hits = Product::find()
				->where(['hit' => '1'])
				->limit(6)
				->all();
//			echo AppController::debug($hits);
			return $this->render('index', compact('hits'));
		}
	}