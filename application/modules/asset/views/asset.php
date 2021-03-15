<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('list_asset') ?>
                <div class="col-md-4 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header> 
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th> <?php echo lang('name_asset') ?></th>
                                <th> <?php echo lang('qty_asset') ?></th>
                                <th> <?php echo lang('po_time') ?></th>
                                <th> <?php echo lang('price') ?></th>


                                <th class="no-print"> <?php echo lang('options') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($assets as $asset) { ?>
                                <tr class="">
                                    <td><?php echo $asset->nama; ?></td>
                                    <td><?php echo $asset->jumlah; ?></td>
                                    <td><?php echo $asset->waktu; ?></td>
                                    <td><?php echo $asset->harga; ?></td>
                                    <td class="no-print">
                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" title="<?php echo lang('edit'); ?>" data-id="<?php echo $asset->id; ?>"><i class="fa fa-edit"></i> </button> 
                                        <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="asset/delete?id=<?php echo $asset->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->




<!-- Add Department Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('add_department') ?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" action="asset/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name_asset') ?></label>
                        <input type="text" class="form-control" name="nama" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('qty_asset') ?></label>
                        <input type="text" class="form-control" name="jumlah" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                     <div class="form-group">
                        <label><?php echo lang('po_time'); ?></label>
                        <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="waktu" value="" placeholder="" readonly="">      
                    </div>
                     <div class="form-group">
                        <label class=""> <?php echo lang('price') ?></label>
                        <input type="text" class="form-control" name="harga" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('note') ?></label>
                        <div class="">
                            <textarea class="ckeditor form-control editor" id="editor" name="note" value="note" rows="10">  </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button pull-right"> <?php echo lang('submit') ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Department Modal-->

<!-- Edit Department Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">   <?php echo lang('list_asset') ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="assetEditForm" class="clearfix" action="asset/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('name_asset') ?> </label>
                        <input type="text" class="form-control" name="nama" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('qty_asset') ?></label>
                        <input type="text" class="form-control" name="jumlah" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('po_time') ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="waktu" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('price') ?></label>
                        <input type="text" class="form-control" name="harga" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('note') ?></label>
                        <div class="">
                            <textarea class="ckeditor form-control editor" id="editor" name="note" value="note" rows="10">  </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="p_id" value=''>

                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button pull-right"> <?php echo lang('submit') ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".editbutton").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'asset/editAssetByJason?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).success(function (response) {
                                                    // Populate the form fields with the data returned from server
                                                    $('#assetEditForm').find('[name="id"]').val(response.asset.id).end()
                                                    $('#assetEditForm').find('[name="nama"]').val(response.asset.nama).end()
                                                    $('#assetEditForm').find('[name="waktu"]').val(response.asset.waktu).end()
                                                    $('#assetEditForm').find('[name="jumlah"]').val(response.asset.jumlah).end()

                                                   CKEDITOR.instances['editor'].setData(response.asset.note)
                                                    $('#assetEditForm').find('[name="harga"]').val(response.asset.harga).end()
                                                    $('#myModal2').modal('show');
                                                });
                                            });
                                        });
</script>
<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1],
                    }
                },
            ],

            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [[0, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json" 
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
    });
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
