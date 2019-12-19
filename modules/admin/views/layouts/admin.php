<?php
	
	/* @var $this \yii\web\View */
	/* @var $content string */
	
	use app\widgets\Alert;
	use yii\bootstrap\Modal;
	use yii\helpers\Html;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\helpers\Url;
	use yii\widgets\Breadcrumbs;
	use app\assets\AppAsset;
	use app\assets\ltAppAsset;
	
	AppAsset::register($this);
	ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php $this->registerCsrfMetaTags() ?>
		<title>АДминка | <?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	</head><!--/head-->
	
	<body>
	<?php $this->beginBody() ?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="<?= Url::home()?>">
								<?= Html::img('@web/images/home/logo.png', ['alt' => 'E-SHOPPER'])?>
							</a>
						</div>
						
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<?php if (!Yii::$app->user->isGuest):?>
									<li>
										<a href="<?=Url::to(['/site/logout'])?>">
											<i class="fa fa-user"></i>
											<?=Yii::$app->user->identity['username']?>
											&nbsp;(Logout)
										</a>
									</li>
								<?php endif;?>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li>
									<a href="#" onclick="return getCart();">
										<i class="fa fa-shopping-cart"></i>
										Cart
									</a>
								</li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?=Url::to(['/admin'])?>"
								       class="active">Home</a>
								</li>
								<li class="dropdown">
									<a href="#">Category<i class="fa fa-angle-down"></i>
									</a>
									<ul role="menu" class="sub-menu">
										<li>
											<a href="<?=Url::to(['category/'])?>">Categories List</a>
										</li>
										<li>
											<a href="<?=Url::to(['category/create'])?>">Add category</a>
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#">Products<i class="fa fa-angle-down"></i>
									</a>
									<ul role="menu" class="sub-menu">
										<li>
											<a href="<?=Url::to(['product/index'])?>">Products List</a>
										</li>
										<li>
											<a href="<?=Url::to(['product/create'])?>">Add product</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form method="get" action="<?=Url::to(['category/search'])?>">
								<input type="text" placeholder="Search"
								       name="search"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<div class="container">
	<?= $content ?>
	</div>
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
	
	</footer><!--/Footer-->
	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>