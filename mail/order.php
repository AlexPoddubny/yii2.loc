<?php use yii\helpers\Html;?>
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
		<?php foreach ($session['cart'] as $id => $item) : ?>
			<tr>
				<td><?=Html::a(
						$item['name'],
						['product/view',
							'id' => $id],
						['target' => '_blank']
					) ?>
				</td>
				<td><?=$item['qty']?></td>
				<td><?=$item['price']?></td>
				<td><?=$item['qty'] * $item['price'] ?></td>
			</tr>
		<?php endforeach;?>
		<tr>
			<td colspan="2">Total Items:</td>
			<td colspan="2"><?=$session['cart.qty']?></td>
		</tr>
		<tr>
			<td colspan="3">Total Cost:</td>
			<td><?=$session['cart.sum']?></td>
		</tr>
		</tbody>
	</table>
</div>