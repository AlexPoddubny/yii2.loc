<?php
	
	
	namespace app\controllers;
	
	
	use app\models\Cart;
	use app\models\Product;
	use Yii;
	
	class CartController
		extends AppController
	{
		public function actionAdd($id, $qty = 1)
		{
//			$qty = !$qty ? 1 : $qty;
			$product = Product::findOne($id);
			if (empty($product)){
				return false;
			}
			$session = Yii::$app->session;
			$session->open();
			$cart = new Cart();
			$cart->addToCart($product, $qty);
			$this->layout = false;
			return $this->render('cart-modal', compact('session'));
		}
		
		public function actionClear()
		{
			$session = Yii::$app->session;
			$session->open();
			$session->remove('cart');
			$session->remove('cart.qty');
			$session->remove('cart.sum');
			$this->layout = false;
			return $this->render('cart-modal', compact('session'));
		}
		
		public function actionDelItem($id)
		{
			$session = Yii::$app->session;
			$session->open();
			$cart = new Cart();
			$cart->recalc($id);
			$this->layout = false;
			return $this->render('cart-modal', compact('session'));
		}
		
		public function actionShow()
		{
			$session = Yii::$app->session;
			$session->open();
			$this->layout = false;
			return $this->render('cart-modal', compact('session'));
		}
		
		public function actionView()
		{
			$session = Yii::$app->session;
			$session->open();
			$this->setMeta('Shopping Cart');
			return $this->render('view', compact('session'));
		}
	}