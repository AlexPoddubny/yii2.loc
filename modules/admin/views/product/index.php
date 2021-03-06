<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'	=> 'category_id',
	            'value' => function($data){
    	            return Html::a(
		                $data->category->name,
    	            	[
    	            		'/category/view',
			                'id' => $data->category->id,
		                ],
		                ['target' => '_blank']
	                );
	            },
	            'format' => 'html',
			],
	        'name',
            'price',
	        [
		        'attribute' => 'hit',
		        'value' => function($data){
			        return $data->hit ? '<span class="text-success">HIT</span>' : '';
		        },
		        'format' => 'html',
	        ],
	        [
		        'attribute' => 'new',
		        'value' => function($data){
			        return $data->new ? '<span class="text-success">New</span>' : '';
		        },
		        'format' => 'html',
	        ],
	        [
		        'attribute' => 'sale',
		        'value' => function($data){
			        return $data->sale ? '<span class="text-success">Sale</span>' : '';
		        },
		        'format' => 'html',
	        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
