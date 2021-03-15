<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('list_asset'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">           
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php echo validation_errors(); ?>
                                    <form role="form" action="asset/addNew" method="post">
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('name_asset'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('nama');
                                                }
                                                if (!empty($asset->nama)) {
                                                    echo $asset->nama;
                                                }
                                                ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('qty_asset'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="jumlah" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('jumlah');
                                                }
                                                if (!empty($asset->jumlah)) {
                                                    echo $asset->jumlah;
                                                }
                                                ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('po_time'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="waktu" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('waktu');
                                                }
                                                if (!empty($asset->waktu)) {
                                                    echo $asset->waktu;
                                                }
                                                ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('price'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="harga" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('harga');
                                                }
                                                if (!empty($asset->harga)) {
                                                    echo $asset->harga;
                                                }
                                                ?>' placeholder="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('note'); ?></label>
                                            <div class="col-md-9">
                                                <textarea class="ckeditor form-control" name="jumlah" value="" rows="10"><?php
                                                    if (!empty($setval)) {
                                                        echo set_value('note');
                                                    }
                                                    if (!empty($asset->note)) {
                                                        echo $asset->note;
                                                    }
                                                    ?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($asset->id)) {
                                            echo $asset->id;
                                        }
                                        ?>'>
                                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
