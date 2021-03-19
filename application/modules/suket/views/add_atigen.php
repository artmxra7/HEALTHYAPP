<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-8 row">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo lang('add_antigen'); ?>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="suket/addNew" class="clearfix row" method="post">
                                <input type="hidden" name="suket_type" value="1">
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
                                            <input type="text" class="form-control pay_in" id="p_name" name="p_name" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_email"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <input type="text" class="form-control pay_in" id="p_email" name="p_email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_phone"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <input type="text" class="form-control pay_in" name="p_phone" id="p_phone" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_age"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <input type="text" class="form-control pay_in" name="p_age" id="p_age" placeholder="">
                                        </div>
                                    </div> 
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_gender"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                        </div>
                                        <div class="col-md-9"> 
                                            <select class="form-control m-bot15" name="p_gender" id="p_gender" value=''>

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
                                    <div class="col-md-8 payment pad_bot pull-right">
                                        <div class="col-md-3 payment_label"> 
                                            <label for="p_doctor"><?php echo lang('doctor'); ?></label>
                                        </div>
                                        <div class="col-md-9 m-bot15"> 
                                            <select class="form-control js-example-basic-single" id="p_doctor" name="p_doctor" required> 
                                                <?php foreach ($doctors as $doctor) { ?>
                                                    <option value="<?php echo $doctor->id; ?>">
                                                        <?php echo $doctor->name; ?> 
                                                    </option>
                                                <?php } ?>
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
                                        <input type="text" class="form-control" readonly name="birth_date" id="birth_date" required>
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
                                        <label for="status"><?php echo lang('status'); ?></label>
                                    </div>
                                    <div class="col-md-9"> 
                                        <select class="form-control m-bot15 js-example-basic-single status" id="status" name="status" required> 
                                            <option value="positif"><?php echo lang('positif'); ?></option>
                                            <option value="negatif"><?php echo lang('negatif'); ?></option>
                                        </select>
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
        $('.pos_client').hide();
        $(document.body).on('change', '#name_select', function () {
            var v = $("select.name_select option:selected").val();
            if (v == 'add_new') {
                $('.pos_client').show();
            } else if(v != ''){
                $('.pos_client').hide();
                $.ajax({
                    url: 'patient/getPatientByJason?id=' + v,
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
        $('#birth_date').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
        })
                //Listen for the change even on the input
                .change(dateChanged)
                .on('changeDate', dateChanged);
    });
</script>
