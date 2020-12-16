<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<!-- SPRIN-DAH/004/XI/2020/POlDA -->
<div class="card">
	<div class="card-header">
		<div class="card-title">Master Data :: <span style="text-transform: capitalize;"><?=$title;?></span></div>
		<div class="card-options ">
			<!--a href="#" title="Batch" class=""><i class="fe fe-upload"></i></a-->
			<a href="#"  data-toggle="modal" data-target="#modal_add" title="Add" class=""><i class="fe fe-plus"></i></a>
			<a href="#" title="Expand/Collapse" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
			<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="tabel" class="table table-striped table-bordered w-100">
				<thead>
					<tr>
						<th>No Sprint</th>
						<th>Kegiatan</th>
						<th>Kejadian</th>
						<th>Tanggal</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="modal_add">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Laporan</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="py-1">
					<form class="form" novalidate="">
						<div class="row">
							<div class="col">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Kegiatan</label>
											<select class="form-control form-control-sm" name="kegiatan" id="kegiatan"></select>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label>No Sprint</label>
											<input class="form-control form-control-sm" type="text" name="no_sprint" id="no_sprint">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Tanggal</label>
											<input class="form-control form-control-sm" type="date" name="tanggal">
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label>Kejadian</label>
											<input class="form-control form-control-sm" type="text" name="username" placeholder="johnny.s" value="johnny.s">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-6 mb-3">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Jam</label>
											<input class="form-control form-control-sm" name="jam" type="time">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Pos/Simpang</label>
											<input class="form-control form-control-sm" name="pos" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Koordinat</label>
											<input class="form-control form-control-sm" name="koordinat" type="text">
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6  mb-3">
								<!-- <div class="mb-2"><b>Keeping in Touch</b></div> -->
								<div class="row">
									<div class="col">
										<label>Tindakan Yang dilakukan</label>
										<textarea class="form-control"  rows="8" placeholder="My Bio"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-6 mb-3">
								<div class="mb-2"><b>Informasi Lalul intas</b></div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Status</label>
											<input class="form-control" type="password" placeholder="••••••">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>New Password</label>
											<!-- <input class="form-control" type="password" placeholder="••••••"> -->
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label>Confirm <span class="d-none d-xl-inline">Password</span></label>
											<input class="form-control" type="password" placeholder="••••••">
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-5 offset-sm-1 mb-3">
								<div class="mb-2"><b>Keeping in Touch</b></div>
								<div class="row">
									<div class="col">
										<label>Email Notifications</label>
										<div class="custom-controls-stacked px-2">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
												<label class="custom-control-label" for="notifications-blog">Blog posts</label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
												<label class="custom-control-label" for="notifications-news">Newsletter</label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
												<label class="custom-control-label" for="notifications-offers">Personal Offers</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col d-flex justify-content-end">
								<button class="btn btn-primary" type="submit">Save Changes</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>