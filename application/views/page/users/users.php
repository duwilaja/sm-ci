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
						<th>Nama</th>
						<th>Pangkat</th>
						<th>Polda</th>
						<th>Polres</th>
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
				<h5 class="modal-title">Form Add Users</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form class="form" action="javascript:void(0);" id="form_add">
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama</label>
                                <div><input type="hidden" name="rowid" class="form-control"></div>
                                <div><input type="text" name="nama" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NRP</label>
                                <div><input type="text" name="username" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <div><input type="password" name="password" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pangkat</label>
                                <div><select  name="pangkat" class="form-control"></select></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Polda</label>
                                <div><select  name="polda" onchange="get_polres('','polres',this.value)" class="form-control"></select></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Polres</label>
                                <div><select  name="polres" class="form-control"></select></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Unit</label>
                                <div><select  name="unit" class="form-control"></select></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <div><input type="email" name="email" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Tlp</label>
                                <div><input type="text" name="tlp" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btn-save" type="submit">Save</button>
					<button class="btn btn-primary" id="btn-save-loading" type="button" style="display:none;" disabled>
					<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					    Loading...
					</button>
                </div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="modal_edit">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Users</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form class="form" action="javascript:void(0);" id="form_edit">
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama</label>
                                <div><input type="hidden" name="u_rowid" class="form-control"></div>
                                <div><input type="text" name="u_nama" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NRP</label>
                                <div><input type="text" name="u_username" readonly class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <div><input type="password" name="u_password" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pangkat</label>
                                <div><select  name="u_pangkat" class="form-control"></select></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Polda</label>
                                <div><select  name="u_polda" onchange="get_polres('','u_polres',this.value)" class="form-control"></select></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Polres</label>
                                <div><select  name="u_polres" class="form-control"></select></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Unit</label>
                                <div><select  name="u_unit" class="form-control"></select></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <div><input type="email" name="u_email" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Tlp</label>
                                <div><input type="text" name="u_tlp" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div>
                                    <select  name="u_usts" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btn-edit" type="submit">Edit</button>
					<button class="btn btn-primary" id="btn-edit-loading" type="button" style="display:none;" disabled>
					<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					    Loading...
					</button>
                </div>
			</form>
		</div>
	</div>
</div>
