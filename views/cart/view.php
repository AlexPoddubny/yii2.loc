<?php
	use yii\helpers\Html;
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
			</div>
		</div>
	</div>
</section>