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
			$id = Yii::$app->request->get('id');
			$product = Product::findOne($id);
//				->with('category')
//				->where(['id' => $id])
//				->limit(1)
//				->one();
			return $this->render('view', compact('product'));
		}
	}