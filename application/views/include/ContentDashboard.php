<div class="col-12">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 bg-pattern-2-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="lnr lnr-gift display-4 text-primary"></div>
                                    <div class="ml-3">
                                        <div class="text-muted small">Products Show</div>
                                        <div class="text-large">
                                            <?php 
                                                foreach($countproductshow->result_array() as $row){
                                                    echo $total = $row['totalproduct'];
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 bg-pattern-2-dark">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="lnr lnr-gift display-4 text-primary"></div>
                                    <div class="ml-3">
                                        <div class="text-muted small">Products Hide</div>
                                        <div class="text-large">
                                            <?php 
                                                foreach($countproducthide->result_array() as $row){
                                                    echo $total = $row['totalproduct'];
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 bg-pattern-2 bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="lnr lnr-cart display-4"></div>
                                    <div class="ml-3">
                                        <div class="small">Monthly sales</div>
                                        <div class="text-large">
                                            <?php 
                                                foreach($countmonthlysale->result_array() as $row){
                                                    echo $total = $row['totalmonthlysales'];
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 1st row END -->
        <!-- untuk rating,  -->
        <div class="row">
            <div class="col-md-12">
                <div class="card d-flex w-100 mb-4">
                    <div class="row no-gutters row-bordered row-border-light h-100">
                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <i class="lnr lnr-earth text-primary display-4"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Out of <span class="text-primary">Stock</span></h6>
                                        <h4 class="mt-3 mb-0">
                                            <?php 
                                                foreach($countoutstock as $row){
                                                    echo $row['countoutstock'];
                                                }
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">From Last 24 Hours</p>
                            </div>
                        </div>
                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <i class="lnr lnr-cart text-primary display-4"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted"><span class="text-primary">Order</span> Status</h6>
                                        <h4 class="mt-3 mb-0">
                                            <?php 
                                                foreach($countorder->result_array() as $row){
                                                    echo $total = $row['totalorder'];
                                                }
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">From This Month</p>
                            </div>
                        </div>
                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <i class="lnr lnr-users text-primary display-4"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Unique <span class="text-primary">Visitors</span></h6>
                                        <h4 class="mt-3 mb-0">
                                            <?php 
                                                foreach($countuser->result_array() as $row){
                                                    echo $total = $row['totaluser'];
                                                }
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">From Last 6 Months</p>
                            </div>
                        </div>
                        <div class="d-flex col-md-6 col-lg-3 align-items-center">
                            <div class="card-body">
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        <i class="lnr lnr-magic-wand text-primary display-4"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Monthly <span class="text-primary">Earnings</span></h6>
                                        <h4 class="mt-3 mb-0">IDR 
                                            <?php 
                                                foreach($monthlyearning->result_array() as $row){
                                                    echo $total = $row['totalmonthlyearning'];
                                                }
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                                <p class="mb-0 text-muted">From This Month</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- 2nd row Start -->
        </div>
        <div class="row">
            <!-- 3rd row Start -->
            <div style="height: 310px" id="tasks-inner"></div>
            <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header with-elements pb-0">
                            <!-- <h6 class="card-header-title mb-0">Latest Reviews</h6> -->
                            <div class="card-header-elements ml-auto p-0">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#sale-stats">Wishlist</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#latest-sales">Latest sales</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-tabs-top">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="sale-stats">
                                    <div style="height: 330px" id="tab-table-1">
                                        <table class="table table-hover card-table">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Wishlist</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($wishlist->result_array() as $row){ ?>
                                                    <tr>
                                                        <td>
                                                            <div class="media mb-0">
                                                                <div class="media-body align-self-center ml-3">
                                                                    <h6 class="mb-0"><?php echo $wishlist = $row['nama'];?></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <h6 class="mb-1 text-success"><?php echo $wishlist = $row['email'];?></h6>
                                                                <p class="text-muted mb-0"><?php echo $wishlist = $row['item_name'];?></p>
                                                                <p>Size : <?php echo $wishlist = $row['size'];?></p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <a href="javascript:" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a> -->
                                </div>
                                <div class="tab-pane fade" id="latest-sales">
                                    <div style="height: 330px" id="tab-table-2">
                                        <table class="table table-hover card-table">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Qty.</th>
                                                    <th>Sum.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($latestsales->result_array() as $row){ ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <a href="javascript:" class="text-dark"><?php echo $row['name'];?></a>
                                                    </td>
                                                    <td class="align-middle"><?php echo $row['quantity'];?></td>
                                                    <td class="align-middle"><?php echo $row['totalpembelian'];?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <a href="javascript:" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3rd row Start -->
    </div>
</div>
<!-- [ content ] End -->