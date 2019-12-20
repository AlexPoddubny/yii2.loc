<?php

use yii\helpers\Html;
	use yii\web\YiiAsset;
	use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="order-view">

    <h1>Order №&nbsp;<?= Html::encode($model->id) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
//            'status',
            [
	            'attribute' => 'status',
	            'value' => !$model->status
			            ? '<span class="text-danger">Active</span>'
			            : '<span class="text-success">Completed</span>',
	            'format' => 'html',
			],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>
	
	<?php
//		$items = $model->orderItems;
//		\app\controllers\AppController::consoleDump($items);
	?>

	<div class="table-responsive">
		<table class="table table-hover table-stripped">
			<thead>
			<tr>
				<th>Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Summary</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($model->orderItems as $item) : ?>
				<tr>
					<td><?=Html::a(
							$item['name'],
							['/product/view',
								'id' => $item['product_id']],
							['target' => '_blank',]
						) ?>
					</td>
					<td><?=$item['qty_item']?></td>
					<td><?=$item['price']?></td>
					<td><?= $item['sum_item']?></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>

</div>
