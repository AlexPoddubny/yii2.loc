<?php
	
	
	namespace app\models;
	
	
	use app\controllers\AppController;
	use yii\db\ActiveRecord;
	
	class Cart
		extends ActiveRecord
	{
		public function addToCart($product, $qty = 1)
		{
			return AppController::debug($product);
		}
	}