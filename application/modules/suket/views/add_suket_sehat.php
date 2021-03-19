<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-8 row">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo lang('lang_surat_sehat_sakit'); ?>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="index.php/suket/addNew" class="clearfix row" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="suket_type" value="3">
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="name_select"><?php echo lang('name'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <select class="form-control m-bot15 js-example-basic-single name_select" id="name_select" name="name_select" required> 
                                            <option value=""><?php echo lang('select'); ?></option>
                                            <option value="add_new" style="color: #41cac0 !important;"><?php echo lang('add_new'); ?></option>
                                            <?php foreach ($patients as $patient) { ?>
                                                <option value="<?php echo $patient->id; ?>" 
                                                <?php
                                                    if (!empty($appointment->patient)) {
                                                        if ($appointment->patient == $patient->id) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                ?> >
                                                    <?php echo $patient->name; ?> 
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="pos_client clearfix">
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_name"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <input type="text" class="form-control pay_in" id="p_name" name="p_name" >
                                        </div>
                                    </div>
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_email"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <input type="text" class="form-control pay_in" id="p_name" name="p_email" >
                                        </div>
                                    </div>
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_phone"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <input type="text" class="form-control pay_in" id="p_phone" name="p_phone">
                                        </div>
                                    </div>
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_age"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <input type="text" class="form-control pay_in" id="p_age" name="p_age" >
                                        </div>
                                    </div> 
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_gender"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <select class="form-control m-bot15" id="p_gender" name="p_gender" >

                                                <option value="Male" <?php
                                                if (!empty($patient->sex)) {
                                                    if ($patient->sex == 'Male') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > Male </option>   
                                                <option value="Female" <?php
                                                if (!empty($patient->sex)) {
                                                    if ($patient->sex == 'Female') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > Female </option>
                                                <option value="Others" <?php
                                                if (!empty($patient->sex)) {
                                                    if ($patient->sex == 'Others') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > Others </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="ktp"> <?php echo lang('ktp'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <input type="number" class="form-control" name="ktp" id="ktp" required>
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="place_birth"> <?php echo lang('place_birth'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <input type="text" class="form-control" name="place_birth" id="place_birth" required>
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="birth_date"> <?php echo lang('birth_date'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <input type="text" class="form-control datepicker" readonly="" name="birth_date" id="birth_date" required placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="address"> <?php echo lang('address'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <input type="text" class="form-control" name="address" id="address" required>
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="status_sehat"><?php echo lang('status'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <select class="form-control m-bot15 js-example-basic-single status_sehat" id="status_sehat" name="status_sehat" required> 
                                            <option value="sakit"><?php echo lang('sick'); ?></option>
                                            <option value="sehat"><?php echo lang('health'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="if-sehat">
                                    <div class="col-md-12 panel ">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="butuh_istirahat"> <?php echo lang('butuh_istirahat'); ?></label>
                                        </div>
                                        <div class="col-md-6"> 
                                            <input type="number" class="form-control" name="butuh_istirahat" id="butuh_istirahat" required>
                                        </div>
                                        <div class="col-md-3 payment_label"> 
                                            <label for="address">/<?php echo lang('hari'); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 panel">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="date"> <?php echo lang('date'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <input type="text" class="form-control datepicker" id="date" readonly="" name="date" required placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="spesimen"> <?php echo lang('spesimen'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <input type="text" class="form-control" name="spesimen" id="spesimen" required>
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="keterangan"> <?php echo lang('keterangan'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" required>
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                        <label for="note"> <?php echo lang('note'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <input type="text" class="form-control" name="note" id="note" required>
                                    </div>
                                </div>
                                <div class="col-md-12 panel">
                                    <div class="col-md-3 payment_label"> 
                                    </div>
                                    <div class="col-md-9">
                                        <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
    $(document).ready(function () {
        $('.if-sehat').show();
        $(document.body).on('change', '#status_sehat', function() {
            var v = $("select.status_sehat option:selected").val();
            if(v == 'sakit') {
                $('.if-sehat').show();
            } else {
                $('#butuh_istirahat').val('');
                $('#date').val('');
                $('.if-sehat').hide();
            }
        })
    });
    $(document).ready(function () {
        $('.pos_client').hide();
        $(document.body).on('change', '#name_select', function () {
            var v = $("select.name_select option:selected").val()
            if (v == 'add_new') {
                $('.pos_client').show();
            } else if(v != ''){
                $('.pos_client').hide();
                $.ajax({
                    url: 'index.php/patient/getPatientByJason?id=' + v,
                    method: 'GET', 
                    data: '',
                    dataType: 'json', 
                }).success(function (response) {
                    $('#ktp').val(response.patient.ktp);
                    $('#place_birth').val(response.patient.birth_place);
                    $('#birth_date').val(response.patient.birthdate);
                    $('#address').val(response.patient.address);
                });
            } else {
                $('.pos_client').hide();
            }
        });

    });
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
        })
                //Listen for the change even on the input
                .change(dateChanged)
                .on('changeDate', dateChanged);
    });
</script>
