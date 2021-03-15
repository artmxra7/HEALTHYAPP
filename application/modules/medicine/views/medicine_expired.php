<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                <?php echo lang('medicine_expired'); ?>
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
                                <th><?php echo lang('id'); ?></th>
                                <th><?php echo lang('name'); ?></th>
                                <th><?php echo lang('category'); ?></th>
                                <th><?php echo lang('type'); ?></th>
                                <th><?php echo lang('store_box'); ?></th>
                                <th><?php echo lang('expiry_date'); ?></th>
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
                            foreach ($medicines as $medicine) {
                                $i = $i + 1;
                            ?>
                                <tr class="">
                                    <td class="medici_name"><?php echo $i; ?></td>
                                    <td class="medici_name"><?php echo $medicine->name; ?></td>
                                    <td> <?php echo $medicine->category; ?></td>
                                    <td> <?php echo $medicine->type_name; ?></td>
                                    <td> <?php echo $medicine->box; ?></td>
                                    <td> <?php echo $medicine->e_date; ?></td>
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
        $(".editbutton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute
            var iid = $(this).attr('data-id');
            $('#editMedicineForm').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'medicine/editMedicineByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                $('#editMedicineForm').find('[name="id"]').val(response.medicine.id).end()
                $('#editMedicineForm').find('[name="name"]').val(response.medicine.name).end()
                $('#editMedicineForm').find('[name="box"]').val(response.medicine.box).end()
                $('#editMedicineForm').find('[name="price"]').val(response.medicine.price).end()
                $('#editMedicineForm').find('[name="s_price"]').val(response.medicine.s_price).end()
                $('#editMedicineForm').find('[name="quantity"]').val(response.medicine.quantity).end()
                $('#editMedicineForm').find('[name="generic"]').val(response.medicine.generic).end()
                $('#editMedicineForm').find('[name="company"]').val(response.medicine.company).end()
                $('#editMedicineForm').find('[name="effects"]').val(response.medicine.effects).end()
                $('#editMedicineForm').find('[name="e_date"]').val(response.medicine.e_date).end()
            });
        });
    });
</script>
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