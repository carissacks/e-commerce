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
	<div class="bg0 p-t-50 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 m-lr-auto m-b-50">
					<h1 class="col-12 ltext-109 mb-3">Transaction</h1>
					<div class="m-l-25 m-r-38 m-lr-0-xl row justify-content-between">
						<div class="col-4">
							<p class="mtext-106">Transactions ID #<?=$trans->id_trans?></p>
							<p class="mtext-106"><?=date_format(date_create($trans->trans_date),"d  M  Y")?></p>
						</div>
						<div class="col-4">
							<p class="mtext-106 text-bold text-uppercase <?php if($trans->stats>3): echo"cl13"; else: echo"cl11"; endif;?>"><?=$trans->status_desc?></p>
							<p class="mtext-106"><?php if($trans->shipping_fee==0):?>FREE Shipping<?php else:?>Shipping fee IDR <?=number_format($trans->shipping_fee,0,",",".")?><?php endif;?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 m-lr-auto m-b-50">
					<div class="m-l-25 m-r-38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Color</th>
									<th class="column-3">Size</th>
									<th class="column-4 text-center">Quantity</th>
									<th class="column-4 text-center">Price</th>
									<th class="column-5">Total Price</th>
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
									<td class="column-4 text-center"><?=$item_qty?></td>
									<td class="column-4 text-center">IDR <?=number_format($item_price,0,",",".")?></td>
									<td class="column-1 pr-4">IDR <?=number_format($item_qty*$item_price,0,",",".")?></td>
								</tr>
							<?php
								$index++;
								endforeach;?>
							</table>

						</div>
						<div class="col-2 text-center pt-4">
							<a href="<?=base_url('index.php/Cart/history/')?>">
								<span class="stext-101 cl2 size-118 bg8 bor14 hov-btn3 px-5 py-2 trans-04 pointer">
									Back
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</d>
<?=$footer?>
