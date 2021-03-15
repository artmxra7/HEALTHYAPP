<!--sidebar end-->
<!--main content start-->
<style>
    tr.bg-black td {
        background: black !important;
        color: #ffffff !important;
    }

    tr.bg-red td {
        background: red !important;
        color: #ffffff !important;
    }

    tr.bg-yellow td {
        background: yellow !important;
        color: black !important;
    }
</style>
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                Credit Report
            </header>
            <style>
                .editable-table .search_form {
                    border: 0px solid #ccc !important;
                    padding: 0px !important;
                    background: none !important;
                    float: right;
                    margin-right: 14px !important;
                }


                .editable-table .search_form input {
                    padding: 6px !important;
                    width: 250px !important;
                    background: #fff !important;
                    border-radius: none !important;
                }

                .editable-table .search_row {
                    margin-bottom: 20px !important;
                }

                .panel-body {
                    padding: 15px 0px 15px 0px;
                }
            </style>

            <div class="panel-body">
                <div class="adv-table editable-table">
                    <div class="space15">
                        <?php if (!empty($key)) { ?>
                            <p>Search Result For <?php echo $key; ?></p>
                        <?php } ?>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('invoice_id'); ?></th>
                                <th><?php echo lang('patient'); ?></th>
                                <th><?php echo lang('date'); ?></th>
                                <th><?php echo lang('sub_total'); ?></t>
                                <th><?php echo lang('discount'); ?></th>
                                <th><?php echo lang('grand_total'); ?></th>
                                <th><?php echo lang('paid'); ?> <?php echo lang('amount'); ?></th>
                                <th class="option_th no-print"><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <style>
                                .img_url {
                                    height: 20px;
                                    width: 20px;
                                    background-size: contain;
                                    max-height: 20px;
                                    border-radius: 100px;
                                }

                                .load {
                                    float: right !important;
                                }
                            </style>

                            <?php
                            if (!empty($p_n)) {
                                $i = $p_n * 50;
                            } else {
                                $i = 0;
                            }
                            foreach ($credits as $credit) {
                                $i = $i + 1;
                                $deposited_amount = $this->db->select_sum('deposited_amount', 'total')
                                    ->from('patient_deposit')
                                    ->where('payment_id', $credit->id)
                                    ->get()->row_array();
                                if (empty($deposited_amount)) {
                                    $deposited_amount['total'] = 0;
                                }
                                $className = '';
                                $date = date_create_from_format('d-m-y', $credit->date_string);
                                $now = date_create(date('Y-m-d'));
                                $diff = date_diff($date, $now);
                                $diffData = $diff->format('%a');
                                if ($diffData > 90) {
                                    $className = 'bg-black';
                                } else if ($diffData > 60) {
                                    $className = 'bg-red';
                                } else if ($diffData > 30) {
                                    $className = 'bg-yellow';
                                }
                            ?>
                                <tr class="<?= $className ?>">
                                    <td><?php echo $credit->id; ?></td>
                                    <td> <?php echo $credit->patient_name; ?></td>
                                    <td> <?php echo $credit->date_string; ?></td>
                                    <td> <?php echo $settings->currency . ' ' . $credit->amount; ?></td>
                                    <td> <?php echo $settings->currency . ' ' . $credit->discount; ?></td>
                                    <td> <?php echo $settings->currency . ' ' . $credit->gross_total; ?></td>
                                    <td> <?php echo $settings->currency . ' ' . $deposited_amount['total']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-xs btn_width" href="finance/setPaid/<?php echo $credit->id; ?>" onclick="return confirm('Are you sure you want to set paid this payment ?');"><i class="fa fa-check"> </i> Set Paid</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                    <!--
                    <?php if (empty($key)) { ?>

                                                            <div class="row">
                                                                <div class="col-lg-6"><div class="dataTables_paginate paging_bootstrap pagination"><ul>
                                                                            <li class="next disabled"><a href="medicine/medicineByPageNumber?page_number=<?php
                                                                                                                                                            if (($pagee_number > 1)) {
                                                                                                                                                                echo $pagee_number - 1;
                                                                                                                                                            }
                                                                                                                                                            ?>"><-- Prev</a>
                                                                            </li>

                        <?php
                        if ($pagee_number < 5) {
                            for ($pagee = 1; $pagee < 6; $pagee++) {
                        ?>
                                                                                                                    <li class="active"><a href="medicine/medicineByPageNumber?page_number=<?php echo $pagee; ?>"><?php echo $pagee; ?></a></li>
                                <?php
                            }
                        }

                        if ($pagee_number >= 5) {
                            for ($x = 3; $x > 0; $x--) {
                                ?>
                                                                                                                    <li class="active"><a href="medicine/medicineByPageNumber?page_number=<?php echo $pagee_number - $x; ?>"><?php echo $pagee_number - $x; ?></a></li>
                                <?php
                            }
                            for ($x = 0; $x < 4; $x++) {
                                ?>
                                                                                                                    <li class="active"><a href="medicine/medicineByPageNumber?page_number=<?php echo $pagee_number + $x; ?>"><?php echo $pagee_number + $x; ?></a></li>
                                <?php
                            }
                        }
                                ?>
                                                                            <li class="next disabled"><a href="medicine/medicineByPageNumber?page_number=<?php
                                                                                                                                                            if (!empty($pagee_number)) {
                                                                                                                                                                echo $pagee_number + 1;
                                                                                                                                                            } else {
                                                                                                                                                                echo '1';
                                                                                                                                                            }
                                                                                                                                                            ?>">Next → </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                    <?php } else { ?>
                                                            <div class="row">
                                                                <div class="col-lg-6"><div class="dataTables_paginate paging_bootstrap pagination"><ul>
                                                                            <li class="next disabled"><a href="medicine/searchMedicine?key=<?php echo $key; ?>&page_number=<?php
                                                                                                                                                                            if (($pagee_number > 1)) {
                                                                                                                                                                                echo $pagee_number - 1;
                                                                                                                                                                            }
                                                                                                                                                                            ?>"><-- Prev</a>
                                                                            </li>

                        <?php
                        if ($pagee_number < 5) {
                            for ($pagee = 1; $pagee < 6; $pagee++) {
                        ?>
                                                                                                                    <li class="active"><a href="medicine/searchMedicine?key=<?php echo $key; ?>&page_number=<?php echo $pagee; ?>"><?php echo $pagee; ?></a></li>
                                <?php
                            }
                        }

                        if ($pagee_number >= 5) {
                            for ($x = 3; $x > 0; $x--) {
                                ?>
                                                                                                                    <li class="active"><a href="medicine/searchMedicine?key=<?php echo $key; ?>&page_number=<?php echo $pagee_number - $x; ?>"><?php echo $pagee_number - $x; ?></a></li>
                                <?php
                            }
                            for ($x = 0; $x < 4; $x++) {
                                ?>
                                                                                                                    <li class="active"><a href="medicine/searchMedicine?key=<?php echo $key; ?>&page_number=<?php echo $pagee_number + $x; ?>"><?php echo $pagee_number + $x; ?></a></li>
                                <?php
                            }
                        }
                                ?>
                                                                            <li class="next disabled"><a href="medicine/searchMedicine?key=<?php echo $key; ?>&page_number=<?php
                                                                                                                                                                            if (!empty($pagee_number)) {
                                                                                                                                                                                echo $pagee_number + 1;
                                                                                                                                                                            } else {
                                                                                                                                                                                echo '1';
                                                                                                                                                                            }
                                                                                                                                                                            ?>">Next → </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                    <?php } ?>

                    -->

                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".load").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute
            var iid = $(this).attr('data-id');
            $('#editMedicineForm').trigger("reset");
            $('#myModal3').modal('show');

            //  var id = $(this).data('id');

            // Populate the form fields with the data returned from server
            $('#editMedicineForm').find('[name="id"]').val(iid).end()
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
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
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
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            },

        });

        table.buttons().container()
            .appendTo('.custom_buttons');
    });
</script>
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>