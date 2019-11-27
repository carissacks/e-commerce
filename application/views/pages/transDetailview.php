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
				<div class="col-lg-12 m-lr-auto m-b-50">
					<h2>Transaction</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
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
									<td class="column-4 text-center">IDR <?=$item_price?></td>
									<td class="column-1 pr-4">IDR <?=$item_qty*$item_price?></td>
									<?=form_hidden('idColor['.$index.']',$id_item_col);?>
									<?=form_hidden('size['.$index.']',$item_size);?>
									<?=form_hidden('old_qty['.$index.']',$item_qty);?>
								</tr>
							<?php
								$index++;
								endforeach;?>
							</table>
							<?=form_hidden('index',$index);?>

						</div>
						<button class="stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">Back</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?=$footer?>
