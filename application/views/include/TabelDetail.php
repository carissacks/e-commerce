<div class="container col-12">
		<?php foreach ($transaction as $row):
			$id_item= $row['id_item'];
			$id_item_col= $row['id_item_colored'];
			$name_item= $row['item_name'];
			$color_item= $row['item_color'];
			$desc_item= $row['item_desc'];
			$price_item= $row['selling_price'];
			$type_item= $row['type_desc'];
			$weight_item= $row['weight'];
			$care_ins= $row['care_ins'];
			$item_size= $row['item_size'];
			$totalitem = $row['totalitem'];
			$quantity = $row['quantity'];
			// $total = $row['total'];
		?>
		
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<?php foreach ($transaction as $photo):?>
								<div class="item-slick3" data-thumb="<?= base_url('asset/images/'.$type_item.'/'.$photo['item_photo'])?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?= base_url('asset/images/'.$type_item.'/'.$photo['item_photo'])?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?= base_url('asset/images/'.$type_item.'/'.$photo['item_photo'])?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<?php endforeach;?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?= $name_item?>
						</h4>

						<span class="mtext-106 cl2">
							IDR <?= $price_item?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $desc_item; ?>
						</p>
					</div>
					<div class="p-r-50 p-t-5 p-lr-0-lg">
                        <div class="card mb-4">
                        	<div class="card-header">
                                <h6 class="card-header-title mb-0">Details</h6>
                            </div>
                                <div class="card-body">
                                    <dl>
                                        <dt>Size</dt>
                                        <dd>
											<p>Size <?= $item_size?></p>
										</dd>
                                        <dt>Color</dt>
                                        <dd><?= $color_item?></dd>
										<dt>Quantity</dt>
                                        <dd><?= $quantity?> pcs</dd>
                                        <dt>Weight</dt>
                                        <dd><?= $weight_item?> grams</dd>
										<dt>Total per item</dt>
                                        <dd>IDR <?= $totalitem?></dd>
                                    </dl>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach;?>
	</section>
	<?php foreach ($totalpayment as $row):
		$total = $row['total'];
	?>
	<span class="mtext-106 cl2">
		Total Payment <?= $total?>
	</span>
	<?php endforeach;?>
</div>
