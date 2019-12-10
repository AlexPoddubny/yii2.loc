<?php
	
	
	namespace app\controllers;
	
	
	use app\models\Product;
	use app\models\Category;
	use Yii;
	
	class ProductController
		extends AppController
	{
		public function actionView()
		{
			$id = Yii::$app
				->request
				->get('id');
			$product = Product::findOne($id);
			$hits = Product::find()
				->where(['hit' => '1'])
				->limit(6)
				->all();
			return $this->render('view', compact('product', 'hits'));
		}
	}