<?php
	
	use app\widgets\MenuWidget;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;

?>
<section id="advertisement">
	<div class="container">
		<img src="/images/shop/advertisement.jpg" alt="" />
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<?php
				include __DIR__ . '/../leftsidebar.php';
			?>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center"><?= $category->name ?></h2>
					<?php if (!empty($products)):?>
					<?php $i = 0; foreach ($products as $product):?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<?= Html::img("@web/images/products/{$product->img}", ['alt' => $product->name])?>
									<h2>$<?= $product->price?></h2>
									<p>
										<a href="<?= Url::to([
											'product/view',
											'id' => $product->id
										])?>">
											<?= $product->name?>
										</a>
									</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
<!--								<div class="product-overlay">-->
<!--									<div class="overlay-content">-->
<!--										<h2>$56</h2>-->
<!--										<p>Easy Polo Black Edition</p>-->
<!--										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--									</div>-->
<!--								</div>-->
								<?php if ($product->new == '1') : ?>
									<?= Html::img("@web/images/home/new.png", ['class' => 'new', 'alt' => 'New!!!']) ?>
								<?php endif; ?>
								<?php if ($product->sale == '1') : ?>
									<?= Html::img("@web/images/home/sale.png", ['class' => 'new', 'alt' => 'SALE!!!']) ?>
								<?php endif; ?>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php $i++; ?>
					<?php if ($i % 3 == 0):?>
						<div class="clearfix"></div>
					<?php endif; ?>
					<?php endforeach;?>
					<div class="clearfix"></div>
					<?php
						echo LinkPager::widget([
							'pagination' => $pages,
						]);
					?>
					<?php else:?>
						<h2>No Items in this category</h2>
					<?php endif; ?>
				</div><!--features_items-->
				<div class="clearfix"></div>
<!--				<ul class="pagination">-->
<!--					<li class="active"><a href="">1</a></li>-->
<!--					<li><a href="">2</a></li>-->
<!--					<li><a href="">3</a></li>-->
<!--					<li><a href="">&raquo;</a></li>-->
<!--				</ul>-->
			</div>
		</div>
	</div>
</section>