	<div class="bg0 p-t-75 p-b-85">
		<div class="container bg0 p-t-75 p-b-85">
			<div class="row">
				<div class="col-sm-12 col-lg-10 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Total item:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?=$total_item?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									IDR <?=number_format($total_price,0,",",".")?>
								</span>
							</div>
						</div>

						<div class="container bor12 p-t-15 p-b-15">
							<div class="row">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Shipping:
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<p class="stext-110 cl6 p-t-2">
										<?=$user->address?>
									</p>
								</div>
							</div>

							<div class="row pt-3">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Shipping Fee:
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<p class="stext-110 cl6 p-t-2">
										<?php 
											if($total_price<300000):
												$shipping_fee= 10000;
												echo 'IDR '.number_format($shipping_fee,0,",",".");
											else:
												$shipping_fee= 0;
												echo 'FREE';
											endif;
										?>
									</p>
								</div>
							</div>

						</div>

						<div class="flex-w flex-t p-t-20 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									IDR <?=number_format($total_price+$shipping_fee,0,",",".")?>
								</span>
							</div>

							
							<div class="size-209 p-t-25">
								<span class="mtext-110 cl2">
									Please transfer the amount on the following account:
								</span>
								<p class="pt-3 mtext-110">BCA		Eyecandy		6450785698</p>
							</div>
						</div>
						<!-- <div class="row">
							<div class="flex-c-m stext-101 cl0 size-116">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>
						</div> -->
						<div class="row justify-content-between">
							<a href="<?=base_url('index.php/Cart')?>">
								<div class="flex-c-m stext-101 cl0 size-119 bg3 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
									Back
								</div>
							</a>
							<form action="<?=base_url('index.php/Cart/paid')?>" method="post">
								<?= form_hidden('shipment', $shipping_fee);?>
								<input type="submit" value="Pay" class="flex-c-m stext-101 cl0 size-119 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 js-thanks">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?=$footer?>
