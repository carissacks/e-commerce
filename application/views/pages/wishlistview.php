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
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-100 p-lr-0-lg">
			<a href="<?=base_url('index.php/Products')?>" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Wishlist
			</span>
		</div>
	</div>
	<section class="bg0 p-t-23 p-b-140 p-l-30">
		<div class="container p-lr-25">

			<?php if($total_items !=0):?>	
			<div class="row isotope-grid">
				<?php foreach ($items as $item):
					$item_name= $item['item_name'];
					$item_price= $item['selling_price'];
					$id_item_col= $item['id_item_colored'];
					$item_color= $item['item_color'];
					$item_photo= $item['item_photo'];
					$item_type= $item['type_desc'];
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?=$item_type?>">
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?=base_url('asset/images/'.$item_type.'/'.$item_photo)?>" alt="IMG-PRODUCT">

							<a href="<?=base_url('index.php/Products/showDetail/'.$id_item_col)?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Detail
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?=base_url('index.php/Products/showDetail/'.$id_item_col)?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?=$item_name?>
								</a>

								<span class="stext-105 cl3">
									IDR <?=number_format($item_price,0,",",".")?>
								</span>
							</div>

							<form action="<?=base_url('index.php/Wishlist/removeItem')?>" method="post" class="block2-txt-child2 flex-r p-t-3">
								<button class="btn-addwish-b2 dis-block pos-relative js-addedwish-b2" type="submit" value="<?=$id_item_col?>" name="remove">
									<img class="icon-heart2 dis-block trans-04" src="<?=base_url('asset/images/icons/icon-heart-02.png')?>" alt="ICON">
								</button>
							</form>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div>
				<?php else:?>
			<div class="m-l-25 m-r--38 m-lr-0-xl text-center m-t-70">
				<h2>Your wishlist is empty. Start shopping now!</h2>
			</div>
			<?php endif;?>
		</div>
	</section>
	
<?=$footer?>
<?php if ($modal_remove):?>
	<script>
		$(document).ready(function () {
			swal('Item is removed from your wishlist');		
		});	
	</script>
<?php endif;?>
