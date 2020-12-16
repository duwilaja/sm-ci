<?php
$page_title = isset($title)?$title:"";
$base_url = base_url();
?>
<body class="app">

<!---Global-loader-->
<div id="global-loader" >
    <img src="<?php echo $base_url;?>aronox/assets/images/svgs/loader.svg" alt="loader">
</div>

<div class="page">
    <div class="page-main">
        <div class="header top-header">
            <div class="container">
                <div class="d-flex">
                    <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a><!-- sidebar-toggle-->
                    <a class="header-brand" href="index.html">
                        <img src="<?php echo $base_url;?>aronox/assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Aronox logo">
                        <img src="<?php echo $base_url;?>aronox/assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Aronox logo">
                    </a>
                    <div class="mt-1">
                        <form class="form-inline">
                            <div class="search-element">
                                <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
                                <button class="btn btn-primary-color" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div><!-- SEARCH -->
                    <div class="d-flex order-lg-2 ml-auto">
                        <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="fa fa-search"></i></a>
                        <div class="dropdown   header-fullscreen" >
                            <a  class="nav-link icon full-screen-link"  id="fullscreen-button">
                                <i class="mdi mdi-arrow-collapse"></i>
                            </a>
                        </div>
                        <div class="dropdown d-md-flex message">
                            <a class="nav-link icon text-center" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="nav-unread bg-danger pulse"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow w-300  pt-0">
                                <div class="dropdown-header mt-0 pt-0 border-bottom p-4">
                                    <h5 class="dropdown-title mb-1 font-weight-semibold text-drak">Messages</h5>
                                    <p class="dropdown-title-text subtext mb-0 pb-0 ">You have 4 unread messages</p>
                                </div>
                                <a href="#" class="dropdown-item d-flex pb-4 pt-4">
                                    <div class="avatar avatar-md  mr-3 d-block cover-image border-radius-4" data-image-src="<?php echo $base_url;?>aronox/assets/images/users/5.jpg">
                                        <span class="avatar-status bg-green"></span>
                                    </div>
                                    <div>
                                        <small class="dropdown-text">Madeleine</small>
                                        <p class="mb-0 fs-13 text-muted">Hey! there I' am available</p>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex pb-4 pt-4">
                                    <div class="avatar avatar-md  mr-3 d-block cover-image border-radius-4" data-image-src="<?php echo $base_url;?>aronox/assets/images/users/8.jpg">
                                        <span class="avatar-status bg-red"></span>
                                    </div>
                                    <div>
                                        <small class="dropdown-text">Anthony</small>
                                        <p class="mb-0 fs-13 text-muted ">New product Launching</p>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex pb-4 pt-4">
                                    <div class="avatar avatar-md  mr-3 d-block cover-image border-radius-4" data-image-src="<?php echo $base_url;?>aronox/assets/images/users/11.jpg">
                                        <span class="avatar-status bg-yellow"></span>
                                    </div>
                                    <div>
                                        <small class="dropdown-text">Olivia</small>
                                        <p class="mb-0 fs-13 text-muted">New Schedule Realease</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider mt-0"></div>
                                <a href="#" class="dropdown-item text-center">See all Messages</a>
                            </div>
                        </div><!-- MESSAGE-BOX -->
                        <div class="dropdown header-notify">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class=" bg-success pulse-success "></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow pt-0">
                              <div class="dropdown-header border-bottom p-4 pt-0 mb-3 w-270">
                                    <div class="d-flex">
                                        <h5 class="dropdown-title float-left mb-1 font-weight-semibold text-drak">Notifications</h5>
                                        <a href="#" class="fe fe-align-justify text-right float-right ml-auto text-muted"></a>
                                    </div>
                                </div>
                                <a href="#" class="dropdown-item d-flex pb-2 pt-2">
                                    <div class="card box-shadow-0 mb-0">
                                        <div class="card-body p-3">
                                            <div class="notifyimg bg-gradient-primary border-radius-4">
                                                <i class="mdi mdi-email-outline"></i>
                                            </div>
                                            <div>
                                                <div>Message Sent.</div>
                                                <div class="small text-muted">3 hours ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex  pb-2">
                                    <div class="card box-shadow-0 mb-0 ">
                                        <div class="card-body p-3">
                                            <div class="notifyimg bg-gradient-danger border-radius-4 bg-danger">
                                                <i class="fe fe-shopping-cart"></i>
                                            </div>
                                            <div>
                                                <div> Order Placed</div>
                                                <div class="small text-muted">5  hour ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex pb-2">
                                    <div class="card box-shadow-0 mb-0">
                                        <div class="card-body p-3">
                                            <div class="notifyimg bg-gradient-success  border-radius-4 bg-success mr-2">
                                                <i class="fe fe-airplay"></i>
                                            </div>
                                            <div>
                                                <div>Your Admin launched</div>
                                                <div class="small text-muted">1 daya ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class=" text-center p-2 border-top mt-3">
                                    <a href="#" class="">View All Notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown ">
                            <a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile-details mt-2">
                                    <span class="mr-3 font-weight-semibold">Anna Sthesia</span>
                                    <small class="text-muted mr-3">appdeveloper</small>
                                </div>
                                <img class="avatar avatar-md brround" src="<?php echo $base_url;?>aronox/assets/images/users/1.jpg" alt="image">
                             </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow w-250">
                                <div class="user-profile border-bottom p-3">
                                    <div class="user-image"><img class="user-images" src="<?php echo $base_url;?>aronox/assets/images/users/1.jpg" alt="image"></div>
                                    <div class="user-details">
                                        <h4>Anna Sthesia</h4>
                                        <p class="mb-1 fs-13 text-muted">AnnaSthesia@gmail.com</p>
                                    </div>
                                </div>
                                <a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon mdi mdi-account-outline text-primary "></i> My Profile</a>
                                <a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon mdi  mdi-message-outline text-primary"></i> Messages <span class="badge badge-pill badge-success">41</span></a>
                                <a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon  mdi mdi-settings text-primary"></i> Setting</a>
                                <a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon mdi mdi-help-circle-outline text-primary"></i> FAQ</a>
                                <a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon  mdi  mdi-logout-variant text-primary"></i>Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        				<!-- Horizontal-menu -->
				<div class="horizontal-main hor-menu clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="home.php" class=""><i class="fa fa-at"></i> Home</a>
								</li>
								<li aria-haspopup="true"><a href="myprofile.php" class=""><i class="fa fa-address-card-o"></i> Profil</a>
								</li>
								<li aria-haspopup="true"><a href="laporan.php" class="sub-icon"><i class="fa fa-pencil-square-o"></i> Laporan</a>
								</li>
								<li aria-haspopup="true"><a href="rekap.php" class="sub-icon"><i class="fa fa-file-text-o"></i> Rekap</a>
								</li>
								<li aria-haspopup="true"><a href="dashboard.php" class="sub-icon"><i class="fa fa-dashboard"></i> Dashboard</a>
								</li>
								<!--li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-dashboard"></i> Overview <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true" class="home"><a class="home" href="home.php">Summary</a></li>
										<li aria-haspopup="true" class="home"><a class="home" href="home2.php">Dash Pusat</a></li>
										<li aria-haspopup="true" class="home"><a class="home" href="home3.php">Dash Polda</a></li>
										<li aria-haspopup="true" class="home"><a class="home" href="home4.php">Dash Polres</a></li>
									</ul>
								</li-->
									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-cogs"></i> Setup <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<!--li aria-haspopup="true"><a href="m_user.php">User</a></li-->
										<li aria-haspopup="true"><a href="m_da.php">Polda</a></li>
										<li aria-haspopup="true"><a href="m_res.php">Polres</a></li>
										<li aria-haspopup="true"><a href="m_dit.php">Direktorat</a></li>
										<li aria-haspopup="true"><a href="m_sub.php">Subdit</a></li>
										<li aria-haspopup="true"><a href="m_bag.php">Bagian</a></li>
										<li aria-haspopup="true"><a href="m_unit.php">Unit</a></li>
										<li aria-haspopup="true"><a href="m_pang.php">Kepangkatan</a></li>
										<li aria-haspopup="true"><a href="m_dg.php">Dasar Giat</a></li>
									</ul>
								</li>
								</ul>
						</nav>
						<!--Nav end -->
					</div>
				</div>
				<!-- Horizontal-menu end -->

        <div class="app-content page-body">
            <div class="container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title"><?= $title;?></h4>
                        <ol class="breadcrumb pl-0">
                            <li class="breadcrumb-item"><a href="#"><?= $bread['nama'];?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!--End Page header-->
                    <?php if(@$linkView){ ?>
                        <?php $this->load->view($linkView);?>
                    <?php } ?>
            </div>
        </div><!-- end app-content-->
    </div>