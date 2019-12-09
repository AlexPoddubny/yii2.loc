<?php
	
	
	namespace app\controllers;
	
	
	use app\models\Product;
	use Yii;
	
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
		
		public function actionView()
		{
			$id = Yii::$app->request->get('id');
			if ($id) {
				$products = Product::find()
					->where(['category_id' => $id])
					->all();
			}
			return $this->render('view', compact('products'));
		}
	}