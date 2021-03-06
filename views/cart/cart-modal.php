<?php use yii\helpers\Html;
	
	if (!empty($session['cart'])): ?>
	<div class="table-responsive">
		<table class="table table-hover table-stripped">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Summary</th>
					<th><span class="glyphicon glyphicon-remove"
					          aria-hidden="true"></span>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($session['cart'] as $id => $item) : ?>
				<tr>
					<td>
						<?= Html::img($item['img'])?>
					</td>
					<td><?=Html::a(
							$item['name'],
							['product/view',
							'id' => $id],
							['target' => '_blank']
						) ?>
					</td>
					<td><?=$item['qty']?></td>
					<td><?=$item['price']?></td>
					<td><?= $item['qty'] * $item['price'] ?></td>
					<td>
						<span class="glyphicon glyphicon-remove text-danger del-item"
						      data-id="<?=$id?>"
						      aria-hidden="true"></span>
					</td>
				</tr>
			<?php endforeach;?>
				<tr>
					<td colspan="2">Total Items:</td>
					<td><?=$session['cart.qty']?></td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Total Cost:</td>
					<td><?=$session['cart.sum']?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
<?php else:?>
	<h3>Cart is empty</h3>
<?php endif;?>