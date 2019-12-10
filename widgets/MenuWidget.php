<?php
	
	
	namespace app\widgets;
	
	
	use app\controllers\AppController;
	use app\models\Category;
	use Yii;
	use yii\base\Widget;
	
	class MenuWidget
		extends Widget
	{
		public $tpl;
		public $data;
		public $tree;
		public $menuHtml;
		
		public function init()
		{
			parent::init();
			if ($this->tpl === null){
				$this->tpl = 'menu';
			}
			$this->tpl .= '.php';
		}
		
		public function run()
		{
			//get cache
			$menu = Yii::$app->cache->get('menu');
			if ($menu) {
				$this->menuHtml = $menu;
			} else {
				$this->data = Category::find()->indexBy('id')->asArray()->all();
				$this->tree = $this->getTree();
				$this->menuHtml = $this->getMenuHtml($this->tree);
				//set cache
				Yii::$app->cache->set('menu', $this->menuHtml, 60);
			}
			//echo AppController::debug($this->tree);
			return $this->menuHtml;
		}
		
		protected function getTree()
		{
			$tree = [];
			
			foreach ($this->data as $id=>&$node) {
				if (!$node['parent_id']){
					$tree[$id] = &$node;
				}else{
					$this->data[$node['parent_id']]['childs'][$node['id']] =
					&$node;
				}
			}
			
			return $tree;
		}
		
		protected function catToTemplate($category)
		{
			ob_start();
			include __DIR__ . '/menu_tpl/' . $this->tpl;
			return ob_get_clean();
		}
		
		protected function getMenuHtml($tree)
		{
			$str = '';
			foreach ($tree as $category){
				$str .= $this->catToTemplate($category);
			}
			
			return $str;
		}
	}