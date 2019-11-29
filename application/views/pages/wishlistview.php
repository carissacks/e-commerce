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
	
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="<?=base_url('index.php/Cart/proceed')?>" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 m-lr-auto m-b-50">
					<?php if($total !=0):?>	
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
						
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Color</th>
									<th class="column-3">Size</th>
									<th class="column-4 text-center">Quantity</th>
									<th class="column-4">Price @</th>
									<th class="column-5"></th>
								</tr>

							<?php 
								$index=0;
								foreach($items as $item):
									$item_name= $item['item_name'];
									$item_price= $item['selling_price'];
									$id_item_col= $item['id_item_colored'];
									$item_color= $item['item_color'];
									$item_photo= $item['item_photo'];
									$item_type= $item['type_desc'];
									$item_qty= $item['quantity'];
									$item_size= $item['item_size'];
								?>
								<tr class="table_row">
									<td class="column-1">
										<a href="<?=base_url('index.php/Products/showDetail/'.$id_item_col)?>">	
											<div class="how-itemcart1">
												<img src="<?=base_url('asset/images/'.$item_type.'/'.$item_photo)?>" alt="IMG">
											</div>
										</a>
									</td>
									<td class="column-2">
										<a href="<?=base_url('index.php/Products/showDetail/'.$id_item_col)?>" class="cl8 hov-cl1 trans-04"><?=$item_name?></a>
									</td>
									<td class="column-3"><?=$item_color?></td>
									<td class="column-3"><?=$item_size?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty[<?=$index?>]" value="<?=$item_qty?>" readonly>

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-4">IDR <?=$item_price?></td>
									<td class="column-1 pr-4">
										<a href="<?=base_url('index.php/Cart/remove/'.$id_item_col.'/'.$item_size)?>">
											<span class="flex-c-m stext-101 cl0 size-105 bg3 bor14 hov-btn3 p-lr-2 trans-04 pointer">
												Add to cart
											</span>
										</a>
									</td>
									<?=form_hidden('idColor['.$index.']',$id_item_col);?>
									<?=form_hidden('size['.$index.']',$item_size);?>
								</tr>
							<?php
								$index++;
								endforeach;?>
							</table>
							<?=form_hidden('index',$index);?>

						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm justify-content-end">	
							<!-- <a href="<?=base_url('index.php/Cart/proceed')?>"> -->
								<input type="submit" value="Proceed" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
							<!-- </a> -->
						</div>
					</div>
					<?php else:?>
					<div class="m-l-25 m-r--38 m-lr-0-xl text-center">
						<h2>Your shopping cart is empty. Start shopping now!</h2>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</form>
<?=$footer?>
