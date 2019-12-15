<?php
	
	
	namespace app\controllers;
	
	
	use app\models\Cart;
	use app\models\Order;
	use app\models\OrderItems;
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
			$order = new Order();
			if ($order->load(Yii::$app->request->post())){
				$order->qty = $session['cart.qty'];
				$order->sum = $session['cart.sum'];
				if ($order->save()){
					$this->saveOrderItems($session['cart'], $order->id);
					Yii::$app->session->setFlash('success', 'Order is placed');
					Yii::$app->mailer
						->compose(
							'order',
							['session' => $session])
						->setFrom(['test@gmail.com' => 'yii2.loc'])
						->setTo($order->email)
						->setSubject('Order')
						->send();
					$session->remove('cart');
					$session->remove('cart.qty');
					$session->remove('cart.sum');
					return $this->refresh();
				} else {
					Yii::$app->session->setFlash('error', 'Order is not placed');
				}
			}
			return $this->render('view', compact('session', 'order'));
		}
		
		protected function saveOrderItems($items, $order_id)
		{
			foreach ($items as $id => $item){
				$order_item = new OrderItems();
				$order_item->order_id = $order_id;
				$order_item->product_id = $id;
				$order_item->name = $item['name'];
				$order_item->qty_item = $item['qty'];
				$order_item->price = $item['price'];
				$order_item->sum_item = $item['price'] * $item['qty'];
				$order_item->save();
			}
		}
	}