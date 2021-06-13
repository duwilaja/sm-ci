<?php include "inc.header.php"; ?>
				
				<!-- Horizontal-menu -->
				<div class="horizontal-main hor-menu clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="home<?php echo $ext?>" class=""><i class="fa fa-at"></i> Home</a>
								</li>
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fa fa-database"></i> Master <i class="fa fa-angle-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="m_user<?php echo $ext?>">User</a></li>
			<?php if($s_LVL=="Korlantas" && $s_GRP=='Bag TIK'){ ?>
										<li aria-haspopup="true"><a href="m_form<?php echo $ext?>">Formulir</a></li>
										<li aria-haspopup="true"><a href="m_penduduk<?php echo $ext?>">Penduduk</a></li>
										<li aria-haspopup="true"><a href="m_targetlaka<?php echo $ext?>">Target Laka</a></li>
										<li class="sub-menu-sub">
											<span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Setup</a>
											<ul class="sub-menu">
												<li aria-haspopup="true"><a href="m_da<?php echo $ext?>">Polda</a></li>
												<li aria-haspopup="true"><a href="m_res<?php echo $ext?>">Polres</a></li>
												<li aria-haspopup="true"><a href="m_dit<?php echo $ext?>">Dinas</a></li>
												<li aria-haspopup="true"><a href="m_sub<?php echo $ext?>">Subdinas</a></li>
												<li aria-haspopup="true"><a href="m_unit<?php echo $ext?>">Unit</a></li>
												<li aria-haspopup="true"><a href="m_pang<?php echo $ext?>">Kepangkatan</a></li>
												<li aria-haspopup="true"><a href="m_spec<?php echo $ext?>">Spesialisasi</a></li>
												<li aria-haspopup="true"><a href="m_dg<?php echo $ext?>">Dasar Giat</a></li>
											</ul>
										</li>
										<li class="sub-menu-sub">
											<span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">TMC</a>
											<ul class="sub-menu">
												<li aria-haspopup="true"><a href="tmc_macet<?php echo $ext?>">Penyebab Macet</a></li>
												<li aria-haspopup="true"><a href="tmc_macetd<?php echo $ext?>">Penyebab Detil</a></li>
											</ul>
										</li>
			<?php }?>
									</ul>
								</li>
							</ul>
						</nav>
						<!--Nav end -->
					</div>
				</div>
				<!-- Horizontal-menu end -->
