    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo">
                    <a href="<?=base_url()?>" class="app-brand-text demo sidenav-text font-weight-bold ml-2">EyeCandy</a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">

                    <!-- Dashboards -->
                    <li class="sidenav-header small font-weight-semibold">Home</li>
                    <li class="sidenav-item">
                        <a href="<?=base_url()?>" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboards</div>
                        </a>
                    </li>
                    
                    <!-- UI elements -->
                    <li class="sidenav-item">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-box"></i>
                            <div>All Products</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="<?=base_url('index.php/AdminHome/AllProduct')?>" class="sidenav-link">
                                    <div>All Products</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="<?=base_url('index.php/AdminHome/DressProduct')?>" class="sidenav-link">
                                    <div>Dress</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="<?=base_url('index.php/AdminHome/JumpsuitProduct')?>" class="sidenav-link">
                                    <div>Jumpsuit</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="bui_button.html" class="sidenav-link">
                                    <div>Blouse</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="charts_morrisjs.html" class="sidenav-link">
                                    <div>Shirt</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="bui_dropdowns.html" class="sidenav-link">
                                    <div>Tees</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="bui_pagination.html" class="sidenav-link">
                                    <div>Skirt</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="bui_progress.html" class="sidenav-link">
                                    <div>Jeans</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="bui_progress.html" class="sidenav-link">
                                    <div>Shorts</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="<?=base_url('index.php/AdminHome/HideProduct')?>" class="sidenav-link">
                                    <div>Products Hide</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Forms & Tables -->
                    <li class="sidenav-divider mb-1"></li>
                    <li class="sidenav-header small font-weight-semibold">Transactions</li>
                    <li class="sidenav-item">
                        <a href="<?php echo base_url('index.php/AdminHome/TodayView') ?>" class="sidenav-link">
                            <i class="sidenav-icon feather icon-clipboard"></i>
                            <div>Today's Order</div>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="<?php echo base_url('index.php/AdminHome/MonthlyView') ?>" class="sidenav-link">
                            <i class="sidenav-icon feather icon-grid"></i>
                            <div>Monthly Order</div>
                        </a>
                    </li>

                    <!-- Add & Edit Product -->
                    <li class="sidenav-divider mb-1"></li>
                    <li class="sidenav-header small font-weight-semibold">Add & Edit Product</li>
                    <li class="sidenav-item">
                        <a href="<?php echo base_url('index.php/AdminHome/FormAddProduct') ?>" class="sidenav-link">
                            <i class="sidenav-icon feather icon-clipboard"></i>
                            <div>Add Product</div>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="<?php echo base_url('index.php/AdminHome/FormEditProduct') ?>" class="sidenav-link">
                            <i class="sidenav-icon feather icon-grid"></i>
                            <div>Edit Product</div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- [ Layout sidenav ] End -->
            
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

                    <!-- Brand demo (see assets/css/demo/demo.css) -->
                    <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                        <span class="app-brand-logo demo">
                            <img src="assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                        </span>
                        <span class="app-brand-text demo font-weight-normal ml-2">Bhumlu</span>
                    </a>

                    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">

                        <div class="navbar-nav align-items-lg-center">
                            <!-- Search -->
                            <label class="nav-item navbar-text navbar-search-box p-0 active">
                                <i class="feather icon-search navbar-icon align-middle"></i>
                                <span class="navbar-search-input pl-2">
                                    <!-- <input type="text" class="form-control navbar-text mx-2" placeholder="Search..."> -->
                                </span>
                            </label>
                        </div>

                        <div class="navbar-nav align-items-lg-center ml-auto">

                            <!-- Divider -->
                            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('index.php/AdminHome/FormEditProduct') ?>" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                        <img src="assets/img/avatars/1.png" alt class="d-block ui-w-30 rounded-circle">
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">
                                            Nama blm di echo
                                                <!--foreach($namauser->result_array() as $row){
                                                    echo $namauser = $row['namauser'];
                                                // }
                                               -->
                                        </span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:" class="dropdown-item">
                                        <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                
                <!-- [ Layout navbar ( Header ) ] End -->
