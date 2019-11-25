<!----------------------------------------------- CART ----------------------------------------------->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php 
						$total=0;
						foreach($cart_items as $cart_row):
							$cart_name= $cart_row['item_name'];
							$cart_price= $cart_row['selling_price'];
							$id_item_col= $cart_row['id_item_colored'];
							$cart_color= $cart_row['item_color'];
							$cart_photo= $cart_row['item_photo'];
							$cart_type= $cart_row['type_desc'];
							$cart_qty= $cart_row['quantity'];
							$cart_size= $cart_row['item_size'];
							$total+= $cart_qty*$cart_price;
						?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="<?=base_url('asset/images/'.$cart_type.'/'.$cart_photo)?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?=$cart_name?>
							</a>

							<span class="header-cart-item-info">
								<?=$cart_qty?> x IDR <?=$cart_price?>
							</span>
						</div>
					</li>
					<?php endforeach;?>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total   IDR <?=$total?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="<?=base_url('index.php/Cart')?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="<?=base_url('index.php/Cart/proceed')?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!----------------------------------------------- END OF CART ----------------------------------------------->

	<!----------------------------------------------- SLIDER ----------------------------------------------->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(<?=base_url('asset/images/slide-01.jpg')?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(<?=base_url('asset/images/slide-04.jpg')?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									End of Year-Season
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Tees & Shorts
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="item-slick1" style="background-image: url(<?=base_url('asset/images/slide-04.jpg')?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</section>
	<!----------------------------------------------- END OF SLIDER ----------------------------------------------->

		<!----------------------------------------------- BANNER ----------------------------------------------->

	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="asset/images/banner-01.jpg" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Dress
								</span>

								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="asset/images/banner-08.jpg" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Bags
								</span>

								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="asset/images/banner-03.jpg" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Accessories
								</span>

								<span class="block1-info stext-102 trans-04">
									New Trend
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!----------------------------------------------- END OF BANNER ----------------------------------------------->


	<!----------------------------------------------- PRODUCT ----------------------------------------------->

	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					New Arrivals
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<!-- <div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<?php foreach($types as $type):
						$type_name= $type['type_desc'];
					?>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?=$type_name?>">
						<?=$type_name?>
					</button>
					<?php endforeach;?>
				</div> -->
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>
			</div>

			<div class="row isotope-grid">
				<?php foreach ($items as $row):
					$id_item= $row['id_item'];
					$id_item_col= $row['id_item_colored'];
					$name_item= $row['item_name'];
					$color_item= $row['item_color'];
					$desc_item= $row['item_desc'];
					$price_item= $row['selling_price'];
					$photo_item= $row['item_photo'];
					$type_item= $row['type_desc'];
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?=$type_item?>">
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?=base_url('asset/images/'.$type_item.'/'.$photo_item)?>" alt="IMG-PRODUCT">

							<a href="<?=base_url('index.php/Products/showDetail/'.$id_item_col)?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Detail
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?=base_url('index.php/Products/showDetail/'.$id_item_col)?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?=$name_item?>
								</a>

								<span class="stext-105 cl3">
									IDR <?=$price_item?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="<?=base_url('asset/images/icons/icon-heart-01.png')?>" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?=base_url('asset/images/icons/icon-heart-02.png')?>" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>

				<?php endforeach;?>
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="<?=base_url('index.php/Products')?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="asset/images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="asset/images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="asset/images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="asset/images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="asset/images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="asset/images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="asset/images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="asset/images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="asset/images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="asset/images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?=$footer?>
<?php if ($thanks):?>
	<script>
		$(document).ready(function () {
			swal('Thank you for your purchase!');		
		});	
	</script>
<?php endif;?>
