<!-- [ Layout content ] Start -->
<div class="layout-content">

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <!-- 1st row Start -->
        <div class="col-lg-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 bg-pattern-2-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="lnr lnr-gift display-4 text-primary"></div>
                                <div class="ml-3">
                                    <div class="text-muted small">Products</div>
                                    <div class="text-large">
                                        <?php 
                                            foreach($countproduct->result_array() as $row){
                                                echo $total = $row['totalproduct'];
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div id="ecom-chart-3" class="mt-3 chart-shadow-primary" style="height:40px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
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
                            <div id="order-chart-1" class="mt-3 chart-shadow" style="height:40px"></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-12">
                    <div class="card d-flex w-100 mb-4">
                        <div class="row no-gutters row-bordered row-border-light h-100">
                            <div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">
                                <div class="card-body media align-items-center text-dark">
                                    <i class="lnr lnr-diamond display-4 d-block text-primary"></i>
                                    <span class="media-body d-block ml-3"><span class="text-big mr-1 text-primary">$1584.78</span>
                                        <br>
                                        <small class="text-muted">Earned this month</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- 1st row Start -->
    </div>
    <div class="row">
        <!-- 2nd row Start -->
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
                                    <h6 class="mb-0 text-muted">Average <span class="text-primary">Rating</span></h6>
                                    <h4 class="mt-3 mb-0">
                                        <?php 
                                            foreach($avgrating->result_array() as $row){
                                                echo $total = $row['avgrating'];
                                            }
                                        ?>
                                    <!-- <i class="ion ion-md-arrow-round-down ml-3 text-danger"></i> -->
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
                                    <!-- <i class="ion ion-md-arrow-round-up ml-3 text-success"></i> -->
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
                                    <!-- <i class="ion ion-md-arrow-round-down ml-3 text-danger"></i> -->
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
                                    <!-- <i class="ion ion-md-arrow-round-up ml-3 text-success"></i></h4> -->
                                </div>
                            </div>
                            <p class="mb-0 text-muted">From This Month</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Staustic card 3 Start -->
        </div>
        <!-- 2nd row Start -->
    </div>
    <div class="row">
        <!-- 3rd row Start -->
        <div style="height: 310px" id="tasks-inner"></div>
        <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header with-elements pb-0">
                        <h6 class="card-header-title mb-0">Latest Reviews</h6>
                        <div class="card-header-elements ml-auto p-0">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#sale-stats">Reviews</a>
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
                                                <th>Reviews</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($reviews->result_array() as $row){ ?>
                                                <tr>
                                                    <td>
                                                        <div class="media mb-0">
                                                            <img src="assets/img/avatars/3-small.png" class="d-block ui-w-40 rounded-circle" alt="">
                                                            <div class="media-body align-self-center ml-3">
                                                                <h6 class="mb-0"><?php echo $reviews = $row['nama'];?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <h6 class="mb-1 text-success"><?php echo $reviews = $row['email'];?></h6>
                                                            <p class="text-muted mb-0"><?php echo $reviews = $row['description_review'];?></p>
                                                            <p class="feather icon-star"><?php echo $reviews = $row['rating'];?></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="javascript:" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>
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
                                                    <a href="javascript:" class="text-dark"><?php echo $reviews = $row['name'];?></a>
                                                </td>
                                                <td class="align-middle"><?php echo $reviews = $row['quantity'];?></td>
                                                <td class="align-middle"><?php echo $reviews = $row['totalpembelian'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="javascript:" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>
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