<?php
	
	
	namespace app\modules\admin\controllers;
	
	
	use app\controllers\AppController;
	use yii\filters\AccessControl;
	
	class AppAdminController
		extends AppController
	{
		public function behaviors()
		{
			return [
				'access' => [
					'class' => AccessControl::className(),
					'rules' => [
						[
							'allow' => true,
							'roles' => ['@'],
						],
					],
				],
			];
		}
	}