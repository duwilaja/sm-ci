				<div class="header top-header">
					<div class="container">
						<div class="d-flex">
							<a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a><!-- sidebar-toggle-->
							<a class="header-brand" href="home<?php echo $ext?>">
								<img src="../my/images/logo.png" class="header-brand-img desktop-lgo" alt="Aronox logo">
								<img src="../my/images/sm.png" class="header-brand-img mobile-logo" alt="Aronox logo">
							</a>

							<div class="d-flex order-lg-2 ml-auto">
								<div class="dropdown header-fullscreen">
									
									<a class="nav-link icon full-screen-link" id="fullscreen-button">
										<i class="mdi mdi-arrow-collapse"></i>
									</a>
								
								</div>
								<div class="dropdown ">
									<a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
									    <div class="profile-details mt-2">
											<span class="mr-3 font-weight-semibold"><?php echo $s_ID==""?"Noone":$s_ID?></span>
											<small class="text-muted mr-3"><?php echo $s_LVL?></small>
										</div>
										<img class="avatar avatar-md brround" src="../my/images/sm.png" alt="image">
									 </a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<a class="dropdown-item" href="logout<?php echo $ext?>">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
				<?php if(false){ ?>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="m_user<?php echo $ext?>">
											<i class="dropdown-icon mdi  mdi-account-multiple"></i> Users
										</a>
			<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
