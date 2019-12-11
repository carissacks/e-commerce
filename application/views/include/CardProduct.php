<div class="container card mb-4">
    <br>
	<div class="bg0 m-t-65 p-b-140">
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

						<a href="<?=base_url('index.php/AdminHome/Detail/'.$id_item_col)?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
							Detail
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="<?=base_url('index.php/AdminHome/Detail/'.$id_item_col)?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?=$name_item.' '.$color_item?>
							</a>

							<span class="stext-105 cl3">
								IDR <?=$price_item?>
							</span>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<br>
</div>