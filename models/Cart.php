<?php
	
	
	namespace app\models;
	
	
	use app\controllers\AppController;
	use yii\db\ActiveRecord;
	
	class Cart
		extends ActiveRecord
	{
		public function addToCart($product, $qty = 1)
		{
			if (isset($_SESSION['cart'][$product->id])){
				$_SESSION['cart'][$product->id]['qty'] += $qty;
			} else {
				$_SESSION['cart'][$product->id] = [
					'name' => $product->name,
					'price' => $product->price,
					'qty' => $qty,
					'img' => $product->getImage()->getUrl('x50')
				];
			}
			$_SESSION['cart.qty'] = isset($_SESSION['cart.qty'])
				? $_SESSION['cart.qty'] + $qty
				: $qty;
			$_SESSION['cart.sum'] = isset($_SESSION['cart.sum'])
				? $_SESSION['cart.sum'] + $qty * $product->price
				: $qty * $product->price;
		}
		
		public function recalc($id)
		{
			if (!isset($_SESSION['cart'][$id])){
				return false;
			}
			$_SESSION['cart.qty'] -= $_SESSION['cart'][$id]['qty'];
			$_SESSION['cart.sum'] -= $_SESSION['cart'][$id]['qty'] *
				$_SESSION['cart'][$id]['price'];
			unset($_SESSION['cart'][$id]);
		}
		
		public function behaviors()
		{
			return [
				'image' => [
					'class' => 'rico\yii2images\behaviors\ImageBehave',
				]
			];
		}
	}