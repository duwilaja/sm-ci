<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Master Data :: <span style="text-transform: capitalize;"><?=$title;?></span></div>
            <div class="card-options ">
                <!--a href="#" title="Batch" class=""><i class="fe fe-upload"></i></a-->
                <a href="#"  data-toggle="modal" data-target="#myModal" title="Add" class=""><i class="fe fe-plus"></i></a>
                <a href="#" title="Expand/Collapse" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <?php foreach ($var['se'] as $v) { 
                            ?>
                            <th><?=$v;?></th>
                            <?php
                            } ?>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left modal_form">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add</strong>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
                </div>
                <form action="javascript:void(0);" id="form_add" class="form-horizontal">
                <div class="modal-body">
                    <!--p>Lorem ipsum dolor sit amet consectetur.</p-->
                        <div class="row">
                            <?php foreach ($var['in'] as $k => $v) { ?>
                                <div class="form-group col-md-12">
                                    <label><?=urai($v)[0];?></label>
                                    
                                    <?php if (!empty(urai($v)[1]) == "select") {
                                        echo '<select id="i_'.$k.'" name="i_'.$k.'" data_url="'.urai($v)[2].'" class="form-control" required></select>';
                                    }else{
                                        echo '<input type="text" id="i_'.$k.'" name="i_'.$k.'" placeholder="..." class="form-control" required>';
                                    } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btn_save">Save</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

     <!-- Modal-->
     <div id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left modal_form">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Edit</strong>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
                </div>
                <form action="javascript:void(0);" id="form_up" class="form-horizontal">
                <div class="modal-body">
                    <!--p>Lorem ipsum dolor sit amet consectetur.</p-->
                        <div class="row">
                            <?php foreach ($var['up'] as $k => $v) { 
                                if ($v != 'hidden') {
                                   ?>
                                    <div class="form-group col-md-12">
                                    <label><?=urai($v)[0];?></label>
                                        <?php if (!empty(urai($v)[1]) == "select") {
                                            echo '<select id="u_'.$k.'" name="u_'.$k.'" data_url="'.urai($v)[2].'" data_key='.$k.' class="form-control" required></select>';
                                        }else{
                                            echo '<input type="text" id="u_'.$k.'" name="u_'.$k.'" placeholder="..." class="form-control" required>';
                                        } ?>
                                    </div>
                                   <?php
                                }else{
                                    ?>
                                     <input type="hidden" id="u_<?=$k?>" name="u_<?=$k?>">
                                    <?php
                                }
                             } ?>

                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btn_del">Delete</button>
                    <button type="submit" class="btn btn-success" id="btn_save">Save</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>