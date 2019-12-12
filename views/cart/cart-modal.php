<?php use yii\helpers\Html;
	
	if (!empty($session['cart'])): ?>
	<div class="table-responsive">
		<table class="table table-hover table-stripped">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Name</th>
					<th>Qty</th>
					<th>Price</th>
					<th><span class="glyphicon glyphicon-remove"
					          aria-hidden="true"></span>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($session['cart'] as $id => $item) : ?>
				<tr>
					<td>
						<?= Html::img("@web/images/products/{$item['img']}")?>
					</td>
					<td><?=$item['name']?></td>
					<td><?=$item['qty']?></td>
					<td><?=$item['price']?></td>
					<td>
						<span class="glyphicon glyphicon-remove text-danger del-item"
						      aria-hidden="true"></span>
					</td>
				</tr>
			<?php endforeach;?>
				<tr>
					<td colspan="4">Total:</td>
					<td><?=$session['cart.qty']?></td>
				</tr>
				<tr>
					<td colspan="4">Cost:</td>
					<td><?=$session['cart.sum']?></td>
				</tr>
			</tbody>
		</table>
	</div>
<?php else:?>
	<h3>Cart is empty</h3>
<?php endif;?>