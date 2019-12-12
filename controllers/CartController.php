<?php
	
	
	namespace app\controllers;
	
	
	use app\models\Cart;
	use app\models\Product;
	use Yii;
	
	class CartController
		extends AppController
	{
		public function actionAdd($id)
		{
			$product = Product::findOne($id);
			if (empty($product)){
				return false;
			}
//			return self::debug($product);
			$session = Yii::$app->session;
			$session->open();
			$cart = new Cart();
			$cart->addToCart($product);
			$this->layout = false;
			return $this->render('cart-modal', compact('session'));
		}
	}