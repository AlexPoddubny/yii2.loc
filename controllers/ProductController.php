<?php
	
	
	namespace app\controllers;
	
	
	use app\models\Product;
	use Yii;
	
	class ProductController
		extends AppController
	{
		public function actionView()
		{
			$id = Yii::$app->request->get('id');
			$product = Product::findOne($id);
			return $this->render('view', compact('product'));
		}
	}