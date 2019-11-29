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
				Transaction History
			</span>
		</div>
	</div>
	
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="<?=base_url('index.php/Cart/proceed')?>" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 m-lr-auto m-b-50">
					<?php if($total !=0):?>	
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<?php 
							foreach($trans as $row):
								$trans_id= $row['id_trans'];
								$trans_date= date_create($row['trans_date']);
								$shipping= $row['shipping_fee'];
								if ($shipping==0) $shipping= "FREE";
								$trans_stat= $row['status_desc'];
								$total_item= $row['total'];
								$id_stat= $row['stats'];
							?>

						<div class="card my-2 bg8" style="border-radius: 25px;">
							<div class="card-body">
								<h5 class="card-title mtext-101 cl1">Transaction ID #<?=$trans_id?></h5>
								<div class="row">
									<div class="col-6 col-md-4 pl-md-5">
										<p class="card-text stext-101"><?=date_format($trans_date,"d  M  Y");?></p>
										<p class="card-text stext-101">Total item(s): <?=$total_item?></p>
									</div>
									<div class="col-6 col-md-4 pl-md-5">
										<p class="card-text stext-101">Shipping: <?=$shipping?></p>
										<p class="card-text stext-101">
											<span class="<?php if($id_stat>3): echo"cl13"; else: echo"cl11"; endif;?>"> <?=$trans_stat?></span>
										</p>
									</div>
									<div class="col-12 col-md-4 text-center pt-md-0 pt-4">
										<a href="<?=base_url('index.php/Cart/historyDetail/'.$trans_id)?>">
											<span class="stext-101 cl0 size-105 bg3 bor14 hov-btn3 px-5 py-2 trans-04 pointer">
												Detail
											</span>
										</a>
									</div>
								</div>								
							</div>
						</div>
						<?php
							endforeach;?>
					</div>
					<?php else:?>
					<div class="m-l-25 m-r--38 m-lr-0-xl text-center">
						<h3>You have no transaction history.</h3>
						<h3 class="p-3">Start shopping now!</h3>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</form>
<?=$footer?>
