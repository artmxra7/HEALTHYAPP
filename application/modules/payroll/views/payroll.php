<!--sidebar end-->
<!--main content start-->
<style>
    #loading {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
        background: #fff;
        opacity: 0.5;
        cursor: progress;
    }
</style>
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('payroll') ?>
                <div class="col-md-4 no-print pull-right">
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="btn-show-modal" class="btn green btn-xs">
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
                                <th> <?php echo lang('name') ?></th>
                                <th> <?php echo lang('salary') ?></th>
                                <th> <?php echo lang('bpjs') ?></th>
                                <th> <?php echo lang('hadir') ?></th>
                                <th> <?php echo lang('potongan') ?></th>
                                <th> <?php echo lang('overtime') ?></th>
                                <th> <?php echo lang('gs_salary') ?></th>
                                <th> <?php echo lang('date') ?></th>


                                <th class="no-print"> <?php echo lang('options') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payrolls as $payroll) { ?>
                                <tr class="">
                                    <td><?php echo $payroll->employe_name; ?></td>
                                    <td><?php echo $payroll->salary; ?></td>
                                    <td><?php echo $payroll->bpjs; ?></td>
                                    <td><?php echo $payroll->hadir; ?></td>
                                    <td><?php echo $payroll->potongan; ?></td>
                                    <td><?php echo $payroll->overtime; ?></td>
                                    <td><?php echo $payroll->gs_salary; ?></td>
                                    <td><?php echo $payroll->tanggal; ?></td>
                                    <td class="no-print">
                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" title="<?php echo lang('edit'); ?>" data-id="<?php echo $payroll->id; ?>"><i class="fa fa-edit"></i> </button>
                                        <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="payroll/delete?id=<?php echo $payroll->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> </a>
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
                <h4 class="modal-title"> <?php echo lang('add_payroll') ?></h4>
            </div>
            <div class="modal-body" style="position: relative;">
                <div id="loading" style="display: none;">
                    <i class="fa fa-spin fa-5x fa-spinner"></i>
                </div>
                <form role="form" action="payroll/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('employe'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single pos_select" id="pos_select" name="employe_id" value=''>
                            <option value=""><?php echo lang('select'); ?></option>

                            <?php foreach ($employes as $employe) { ?>
                                <option value="<?php echo $employe->id; ?>" <?php
                                                                            if (!empty($payroll->employe)) {
                                                                                if ($payroll->employe == $employe->id) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>><?php echo $employe->name; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label><?php echo lang('date'); ?></label>
                        <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="tanggal" value="" placeholder="" readonly="">
                    </div>
                    <div class="form-group col-md-6">
                        <label class=""> <?php echo lang('salary') ?></label>
                        <input type="number" readonly class="form-control" name="salary" id="salary" value='' placeholder="">

                    </div>

                    <div class="form-group col-md-3">
                        <label><?php echo lang('hadir'); ?></label>
                        <input type="number" class="form-control" name="hadir" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group col-md-3">
                        <label class=""> <?php echo lang('tdk_hadir') ?></label>
                        <input type="number" class="form-control" name="tdk_hadir" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label class=""> <?php echo lang('potongan') ?></label>
                        <input type="number" class="form-control" name="potongan" id="potongan" value='' placeholder="" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class=""> <?php echo lang('overtime') ?></label>
                        <input type="number" class="form-control" name="overtime" id="exampleInputEmail1" value='' placeholder="">
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
                <h4 class="modal-title"> <?php echo lang('list_payroll') ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="payrollEditForm" class="clearfix" action="payroll/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('name_payroll') ?> </label>
                        <input type="text" class="form-control" name="nama" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('qty_payroll') ?></label>
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
    $(document).ready(function() {
        $(".editbutton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'payroll/editpayrollByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                $('#payrollEditForm').find('[name="id"]').val(response.payroll.id).end()
                $('#payrollEditForm').find('[name="nama"]').val(response.payroll.nama).end()
                $('#payrollEditForm').find('[name="waktu"]').val(response.payroll.waktu).end()
                $('#payrollEditForm').find('[name="jumlah"]').val(response.payroll.jumlah).end()

                CKEDITOR.instances['editor'].setData(response.payroll.note)
                $('#payrollEditForm').find('[name="harga"]').val(response.payroll.harga).end()
                $('#myModal2').modal('show');
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
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
            "order": [
                [0, "desc"]
            ],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/payrolls/DataTables/languages/<?php echo $this->language; ?>.json"
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
    });
</script>
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });

    $('#btn-show-modal').click(function() {
        $('.js-example-basic-single').on('select2:select', function(e) {
            var baseUrl = "<?= site_url('payroll/getSalary') ?>";

            var id = $(this).val();
            $('#loading').css('display', 'flex');
            $.get(baseUrl + '/' + id, function(data) {
                $('#loading').hide();
                $('#salary').val(data.salary);
                $('#potongan').val(data.subtraction);
            }, 'json');
        });
    });
</script>