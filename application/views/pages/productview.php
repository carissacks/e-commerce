	<!-- Cart -->
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
			<?php if($total_cart_items !=0):?>
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
							<a href="<?=base_url('index.php/Products/showDetail/'.$id_item_col)?>" class="header-cart-item-name m-b-5 hov-cl1 trans-04">
								<?=$cart_name?>
							</a>

							<span class="header-cart-item-info">
								<?=$cart_size?>
							</span>

							<span class="header-cart-item-info">
								<?=$cart_qty?> x IDR <?=number_format($cart_price,0,",",".")?>
							</span>
						</div>
					</li>
					<?php endforeach;?>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total   IDR <?=number_format($total,0,",",".")?>
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
			<?php else:?>
			<div class="col-12">
				<p>Your shopping cart is empty.</p>
			</div>
			<?php endif;?>
		</div>
	</div>

	<!----------------------------------------------- END OF CART ----------------------------------------------->
	
	<!----------------------------------------------- PRODUCT ----------------------------------------------->
	<div class="bg0 m-t-65 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<a href="<?=base_url('index.php/Products')?>">
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ($selected_type=='') echo 'how-active1'?>">
							All Products
						</button>
					</a>

					<?php foreach($types as $type):
						$type_name= $type['type_desc'];
					?>


					<a href="<?=base_url('index.php/Products/showTypes/'.$type_name)?>">
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ($selected_type==$type_name) echo 'how-active1'?>">
							<?=$type_name?>
						</button>
					</a>

					<!-- <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?=$type_name?>">
						<?=$type_name?>
					</button> -->
					<?php endforeach;?>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
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

			<?php if($total_data!=0):?>
			<div class="row isotope-grid">
				<?php
					foreach ($items as $row):
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
									IDR <?=number_format($price_item,0,",",".")?>
								</span>
							</div>

							<!-- <div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="<?=base_url('asset/images/icons/icon-heart-01.png')?>" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?=base_url('asset/images/icons/icon-heart-02.png')?>" alt="ICON">
								</a>
							</div> -->
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>

			<?php else:?>
			<div class="col-12 text-center">
				<h4>In the middle of creating something awesome for you!</h4>
				<h4 class="mt-2">Coming to you shortly</h4>
			</div>
			<?php endif;?>

			<p><?=$links?></p>
		</div>
	</div>
		
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
<?=$footer?>
