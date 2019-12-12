<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <br>
                    <h3 class="text-center"><strong>Order summary</strong></h3>
					<br><br>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
									<td><strong>No.</strong></td>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<?php 
									$counter = 1;
									foreach ($transaction as $row):
										$id_item= $row['id_item'];
										$id_item_col= $row['id_item_colored'];
										$name_item= $row['item_name'];
										$color_item= $row['item_color'];
										$price_item= $row['selling_price'];
										$item_size= $row['item_size'];
										$totalitem = $row['totalitem'];
										$quantity = $row['quantity'];
									?>
									<td><?= $counter++?>.</td>
									<td><?= $name_item?></td>
									<td class="text-center">IDR <?= number_format($price_item,2,',','.');?></td>
									<td class="text-center"><?= $quantity?> pcs</td>
									<td class="text-right">IDR <?= number_format(($price_item*$quantity),2,',','.');?></td>
                                </tr>
								<?php endforeach;?>
                                <tr>
									<?php foreach ($totalpayment as $row):
										$total = $row['total'];
									?>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
									<td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Subtotal</strong></td>
                                    <td class="highrow text-right">IDR <?= number_format($total,2,',','.');?></td>
									<?php endforeach;?>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
									<td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Shipping</strong></td>
									<?php foreach ($shipping as $row):
										$shippingfee= $row['shippingfee'];
										$totalsemua= $row['total'];
									?>
                                    <td class="emptyrow text-right">IDR <?= number_format($shippingfee,2,',','.');?></td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
									<td class="emptyrow"></td>
									<td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-right">IDR <?= number_format($totalsemua,2,',','.');?></td>
                                </tr>
								<?php endforeach;?>
                            </tbody>
                        </table>
						<div class="col-12">
                    		<div class="panel panel-default height">
								<?php 
									foreach ($shipping as $row):
										$name= $row['name'];
										$address= $row['address'];
								?>
                        	<div class="panel-heading">Billing and Shipping Details : </div>
                        	<div class="panel-body">
                            	<strong><?= $name?></strong><br>
                            	<?= $address?><br>
                        	</div>
                    	</div>
				<?php endforeach;?>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>
</div>
