<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

?>
<section>
	<div class="container">
		<div class="row">
			<?php
				include __DIR__ . '/../leftsidebar.php';
			?>
			<div class="col-sm-9 padding-right" id="order">
				<h1>
					<?= Html::encode($this->title) ?>
				</h1>
				<?php
					include __DIR__ . '/cart-modal.php';
				?>
				<hr>
				<?php if (!empty($session['cart'])): ?>
					<?php $form = ActiveForm::begin();?>
						<?= $form->field($order, 'name');?>
						<?= $form->field($order, 'email');?>
						<?= $form->field($order, 'phone');?>
						<?= $form->field($order, 'address');?>
						<?= Html::submitButton('Create order', ['class' => 'btn btn-success'])?>
					<?php ActiveForm::end();?>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>