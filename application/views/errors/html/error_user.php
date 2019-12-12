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
						<a href="<?=base_url('index.php/Products/showDetail/'.$id_item_col)?>"
							class="header-cart-item-name m-b-5 hov-cl1 trans-04">
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
					Total IDR <?=number_format($total,0,",",".")?>
				</div>

				<div class="header-cart-buttons flex-w w-full">
					<a href="<?=base_url('index.php/Cart')?>"
						class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						View Cart
					</a>

					<a href="<?=base_url('index.php/Cart/proceed')?>"
						class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
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
<div class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 m-lr-auto m-b-44 m-t-75">
				<div class="m-l-25 m-r--38 m-lr-0-xl text-center">
					<h3 class="cl1 ltext-104">404</h3>
					<h3 class="p-3 mtext-101 cl1 ">Sorry, please go back to your previous page</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<?=$footer?>
