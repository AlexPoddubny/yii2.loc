<?php
	
	
	namespace app\controllers;
	
	
	use app\models\Category;
	use app\models\Product;
	use Yii;
	use yii\data\Pagination;
	use yii\web\HttpException;
	
	class CategoryController
		extends AppController
	{
		public function actionIndex()
		{
			$query = Product::find()
				->where(['hit' => '1'])
				->limit(6);
			$pages = new Pagination([
				'totalCount' => $query->count(),
				'pageSize' => 6,
				'forcePageParam' => false,
				'pageSizeParam' => false
			]);
			$hits = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();
			if ($hits === null){
				throw new HttpException(404, 'Item cannot be found');
			}
			$this->setMeta('E-SHOPPER');
			return $this->render('index', compact('hits', 'pages'));
		}
		
		public function actionView($id)
		{
			$category = Category::findOne($id);
			if ($category === null){
				throw new HttpException(404, 'Category cannot be found');
			}
			$query = Product::find()
				->where(['category_id' => $id]);
			$pages = new Pagination([
				'totalCount' => $query->count(),
				'pageSize' => 3,
				'forcePageParam' => false,
				'pageSizeParam' => false
			]);
			$products = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();
			$this->setMeta(
				'E-SHOPPER | ' . $category->name,
				$category->keywords,
				$category->description
			);
			return $this->render('view', compact('products', 'pages', 'category'));
		}
		
		public function actionSearch($search)
		{
			$this->setMeta('Search: ' . $search);
			if (!$search){
				return $this->render('search', compact('search'));
			}
			$query = Product::find()->where(['like', 'name', trim($search)]);
			$pages = new Pagination([
				'totalCount' => $query->count(),
				'pageSize' => 3,
				'forcePageParam' => false,
				'pageSizeParam' => false
			]);
			$products = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();
			return $this->render('search', compact('products', 'pages', 'search'));
		}
	}