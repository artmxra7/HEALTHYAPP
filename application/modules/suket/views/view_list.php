<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('suket'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th><?php echo lang('name'); ?></th>
                                <th><?php echo lang('jenis_suket'); ?></th>
                                <th><?php echo lang('tanggal_test'); ?></th>
                                <th class="no-print"><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }

                        </style>

                        <?php 
                            $i = 1;
                            foreach ($suket as $item) { 
                        ?>
                            <tr class="">
                                <td> <?php echo $i++; ?></td>
                                <td> <?php echo $item->name; ?></td>
                                <td>
                                    <?php 
                                        if($item->suket_type == 1){
                                            echo 'Suket Antigen';
                                        } else if($item->suket_type == 2) {
                                            echo 'Suket Antibody';
                                        } else if($item->suket_type == 3) {
                                            echo 'Suket Sehat/Sakit';
                                        }
                                     ?></td>
                                <td><?php echo $item->add_date; ?></td>
                                <td class="no-print">
                                    <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $item->id; ?>"><i class="fa fa-edit"> </i></button>   
                                    <button type="button" class="btn btn-primary btn-xs btn_width printButton" title="<?php echo lang('print'); ?>" data-id="<?php echo $item->id; ?>"><i class="fa fa-print"> </i></button>   
                                    <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="suket/delete?id=<?php echo $item->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    <div id="pdf-antigen" style="
                        font-family: 'Times New Roman', Times, serif;
                        background: #fff;
                        padding-top: 30px;
                        padding-left: 40px;
                        padding-right: 40px;
                        display:none;
                        width:595px!important;
                        height:842px!important;
                        ">
                        <div style="text-align: center;border-bottom: 2px solid #000;">
                            <div style="display: flex;flex-direction: row;align-items: center;justify-content: space-between;">
                                <img src="uploads/hmp-logo.png" alt="logo" width="68px">
                                <img src="uploads/logo-text.png" alt="logo" width="427px">
                            </div>
                            <p style="font-size: 10px;">Kp.Buwek Raya RT.002 RW 022 Dusun II,DesaSumberJaya,Kec.Tambun Selatan,Kab.Bekasi.Telp.021 - 89534380</p>
                        </div>
                        <h3 style="margin-top: 30px;text-align:center;text-decoration:underline;margin-bottom:30px;font-weight:bold;font-size:15px">SURAT KETERANGAN</h3>
                        <p style="font-size: 12px;">Yang bertanda tangan dibawah ini:</p>
                        <table style="width: 100%;margin-bottom:30px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:100px">Nama</td>
                                    <td style="border: none;font-size: 12px;padding:0px;">: <span class="print_dokter"></span></td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:100px">Jabatan</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_jabatan">: </td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 12px;">Menerangkan bahwa:</p>
                        <table style="width: 100%;margin-bottom: 30px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;">Nama</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_nama">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;">Tempat/TglLahir</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_ttl">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;">Alamat</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_alamat">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;">Spesimen</td>
                                    <td style="border: none;font-size: 12px;padding:0px;">: <b class="print_spesimen"></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 12px;margin-bottom:15px">Dari hasil pemeriksaan <span class="print_jenis_suket"></span> pada tanggal, <span class="print_tgl"></span> Saya menyatakan:</p>
                        <p style="font-size: 12px;margin-bottom:15px"><b><i class="print_note"></i></b></p>
                        <p style="font-size: 12px;margin-bottom:15px">Hasil Pemeriksaan:</p>
                        <h4 style="margin-top: 15px;margin-bottom:15px;margin-left:40px;display:none;font-size:15px" class="show_status_positif"><b>- SARS - COV2: <span class="print_status">-</span></b></h4>
                        <h4 style="margin-top: 15px;margin-bottom:15px;margin-left:40px;display:none;font-size:15px" class="show_status_ig_m"><b>- Repid  Tes IG- M SARS COVID 19 : <span class="print_status_ig_m">-</span></b></h4>
                        <h4 style="margin-top: 15px;margin-bottom:15px;margin-left:40px;display:none;font-size:15px" class="show_status_ig_g"><b>- Repid  Tes IG- G SARS COVID 19 : <span class="print_status_ig_g">-</span></b></h4>
                        <p style="font-size: 12px;"><b>Keterangan :</b></p>
                        <p style="font-size: 12px;margin-bottom:30px" class="print_keterangan"></p>
                        <div style="width: 100%;display:flex;justify-content:space-between">
                            <div>
                                <p style="font-size: 12px;text-align:center;margin-bottom:80px"><b>HeryudaMeda</b></p>
                                <p style="font-size: 12px;text-align:center;font-weight:bold;text-decoration:underline;margin-bottom:0px" class="print_dokter">(Deni Juli Setiawan)</p>
                                <p style="font-size: 12px;text-align:center;text-decoration:underline;" class="print_sip">SIP.-</p>
                            </div>
                            <div style="text-align:center;">
                                <p style="font-size: 12px;text-align:center;margin-bottom:5px;">Bekasi, <span class="print_tgl_surat"></span></p>
                                <div class="qr-wrapper" data-url="{SCAN_URL}"></div>
                                <p style="font-size: 12px;text-align:center;margin-top:5px" class="print_suket_code">NO: 1230929-ASD</p>
                            </div>
                        </div>
                    </div>
                    <div id="pdf-sehat" style="
                        font-family: 'Times New Roman', Times, serif;
                        background: #fff;
                        padding-top: 30px;
                        padding-left: 40px;
                        padding-right: 40px;
                        display:none;
                        width:595px!important;
                        height:842px!important;">
                        <div style="display: flex;flex-direction: row;justify-content: space-between;">
                            <img src="uploads/hmp-logo.png" alt="logo" width="68px" height="42px">
                            <div style="padding-left: 10px;padding-right:10px">
                                <div style="text-align: center;border-bottom: 2px solid #000;margin-bottom:10px">
                                    <img src="uploads/logo-text.png" alt="logo" width="427px" style="margin-bottom: 10px;">
                                </div>
                                <p style="font-size: 10px;text-align:center">Kp.Buwek Raya RT.002 RW 022 Dusun II,DesaSumberJaya,Kec.Tambun Selatan,Kab.Bekasi.Telp.021 - 89534380</p>
                            </div>
                        </div>
                        <h3 style="margin-top: 10px;text-align:center;margin-bottom:30px;font-weight:bold;font-size:15px">SURAT KETERANGAN SEHAT</h3>
                        <table style="width: 100%;margin-bottom: 30px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:200px">Nama</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_nama">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:200px">Umur</td>
                                    <td style="border: none;font-size: 12px;padding:0px;">: <span class="print_umur"></span> tahun, jenis kelamin: <span class="print_jenis_kelamin"></span></td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:200px">Pekerjaan</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_pekerjaan">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:200px">Alamat</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_alamat">: -</td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 12px;margin-bottom:20px;text-indent:50px">Pada pemeriksaan yang kami lakukan pada hari ini, berada dalam kondisi <b>Sehat/Tidak Sakit</b></p>
                        <p style="font-size: 12px;margin-bottom:20px">Harap berkepentingan menjadi maklum</p>
                        <table style="width: 100%;margin-bottom: 50px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:100px">BB</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_bb">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:100px">TB</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_tb">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:100px">Tensi</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_tensi">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:100px">Suhu</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_suhu">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:100px">Buta Warna</td>
                                    <td style="border: none;font-size: 12px;padding:0px;">: <b class="print_buta_warna">-</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="width: 100%;display:flex;justify-content:space-between">
                            <div style="text-align:center;">
                                <div class="qr-wrapper" data-url="{SCAN_URL}"></div>
                                <p style="font-size: 12px;text-align:center;margin-top:10px" class="print_suket_code">NO: -</p>
                            </div>
                            <div>
                                <p style="font-size: 12px;text-align:center;margin-bottom:60px">Bekasi, <span class="print_tgl_surat"></span></p>
                                <p style="font-size: 12px;text-align:center;font-weight:bold;text-decoration:underline;margin-bottom:0px" class="print_dokter"></p>
                            </div>
                        </div>
                    </div>
                    <div id="pdf-sakit" style="
                        font-family: 'Times New Roman', Times, serif;
                        background: #fff;
                        position: relative;
                        padding-top: 30px;
                        padding-left: 80px;
                        padding-right: 80px;
                        display:none;
                        height:421px!important;
                        width:595px!important;
                        ">
                        <div style="text-align:center;position: absolute;top: 10px;right: 10px;">
                            <div class="qr-wrapper" style="margin: auto;"></div>
                            <p style="font-size: 10px;text-align:center;margin-top:5px" class="print_suket_code">NO: 1230929-ASD</p>
                        </div>
                        <div style="display: flex;flex-direction: row;justify-content: space-between;">
                            <img src="uploads/hmp-logo.png" alt="logo" height="40px">
                            <div style="padding-left: 10px;padding-right:10px">
                                <div style="text-align: center;border-bottom: 2px solid #000;margin-bottom:10px">
                                    <img src="uploads/logo-text.png" alt="logo" width="100%" style="margin-bottom: 10px;">
                                </div>
                                <p style="font-size: 10px;text-align:center">Kp.Buwek Raya RT.002 RW 022 Dusun II,DesaSumberJaya,Kec.Tambun Selatan,Kab.Bekasi.Telp.021 - 89534380</p>
                            </div>
                        </div>
                        <h3 style="margin-top: 5px;text-align:center;margin-bottom:5px;font-weight:bold;font-size:14px">SURAT KETERANGAN SAKIT</h3>
                        <p style="font-size: 12px;margin-bottom:0px;">Yang bertanda tangan dibawah ini:</p>
                        <table style="width: 100%;margin-bottom: 15px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:200px">Nama</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_nama">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:200px">Umur</td>
                                    <td style="border: none;font-size: 12px;padding:0px;">: <span class="print_umur"></span> tahun, jenis kelamin: <span class="print_jenis_kelamin"></span></td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:200px">Pekerjaan</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_pekerjaan">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 12px;padding:0px;width:200px">Alamat</td>
                                    <td style="border: none;font-size: 12px;padding:0px;" class="print_alamat">: -</td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 12px;margin-bottom:0px;">Perlu beristirahat karena sakit selama <span class="print_istirahat"></span> hari, terhitung dari <span class="print_tgl_mulai"></span> s/d <span class="print_tgl_akhir"></span></p>
                        <p style="font-size: 12px;margin-bottom:10px">Harap berkepentingan menjadi maklum</p>
                        <div style="width: 100%;display:flex;justify-content:space-between">
                            <div></div>
                            <div>
                                <p style="font-size: 12px;text-align:center;margin-bottom:0px">Bekasi, <span class="print_tgl_surat"></span></p>
                                <p style="font-size: 12px;text-align:center;margin-bottom:40px">Dokter pemeriksa</p>
                                <p style="font-size: 12px;text-align:center;font-weight:bold;text-decoration:underline;margin-bottom:0px" class="print_dokter"></p>
                            </div>
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

<!-- Edit Nurse Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                <h4 class="modal-title">  <?php echo lang('edit_suket'); ?> </h4>
            </div>
            <div class="modal-body">
                <form role="form" action="suket/addNew" class="clearfix row" method="post">
                    <input type="hidden" name="id" id="id_suket">
                    <input type="hidden" name="suket_type" id="suket_type">
                    <div class="col-md-12 panel">
                        <div class="col-md-3 payment_label"> 
                            <label for="name_select"><?php echo lang('name'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <select class="form-control m-bot15 js-example-basic-single name_select" id="name_select" name="name_select" required> 
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
                                <input type="text" class="form-control pay_in" id="p_phone" name="p_phone" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="p_age"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control pay_in" id="p_age" name="p_age" placeholder="">
                            </div>
                        </div> 
                        <div class="col-md-8 payment pad_bot pull-right">
                            <div class="col-md-3 payment_label"> 
                                <label for="p_gender"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <select class="form-control m-bot15" id="p_gender" name="p_gender" value=''>

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
                                <select class="form-control js-example-basic-single" id="p_doctor" name="p_doctor"> 
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
                    <div class="antigen-edit">
                        <div class="col-md-12 panel">
                            <div class="col-md-3 payment_label"> 
                                <label for="status"><?php echo lang('status'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <select class="form-control m-bot15 js-example-basic-single status" id="status" name="status"> 
                                    <option value="positif"><?php echo lang('positif'); ?></option>
                                    <option value="negatif"><?php echo lang('negatif'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="antibody-edit">
                        <div class="col-md-12 panel">
                            <div class="col-md-3 payment_label"> 
                                <label for="status_ig_m"><?php echo lang('status'); ?> IG-M</label>
                            </div>
                            <div class="col-md-9"> 
                                <select class="form-control m-bot15 js-example-basic-single status" id="status_ig_m" name="status_ig_m"> 
                                    <option value="reaktif"><?php echo lang('reaktif'); ?></option>
                                    <option value="non reaktif"><?php echo lang('non_reaktif'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 panel">
                            <div class="col-md-3 payment_label"> 
                                <label for="status_ig_g"><?php echo lang('status'); ?> IG-G</label>
                            </div>
                            <div class="col-md-9"> 
                                <select class="form-control m-bot15 js-example-basic-single status" id="status_ig_g" name="status_ig_g"> 
                                    <option value="reaktif"><?php echo lang('reaktif'); ?></option>
                                    <option value="non reaktif"><?php echo lang('non_reaktif'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="surat-edit">
                        <div class="col-md-12 panel">
                            <div class="col-md-3 payment_label"> 
                                <label for="status_sehat"><?php echo lang('status'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <select class="form-control m-bot15 js-example-basic-single status_sehat" id="status_sehat" name="status_sehat"> 
                                    <option value="sakit"><?php echo lang('sick'); ?></option>
                                    <option value="sehat"><?php echo lang('health'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="if-sakit">
                            <div class="col-md-12 panel ">
                                <div class="col-md-3 payment_label"> 
                                    <label for="butuh_istirahat"> <?php echo lang('butuh_istirahat'); ?></label>
                                </div>
                                <div class="col-md-6"> 
                                    <input type="number" class="form-control" name="butuh_istirahat" id="butuh_istirahat">
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
                                    <input type="text" class="form-control datepicker" id="date" readonly="" name="date" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="if-sehat">
                            <div class="col-md-12 panel">
                                <div class="col-md-3 payment_label"> 
                                    <label for="tensi"> <?php echo lang('tensi'); ?></label>
                                </div>
                                <div class="col-md-6"> 
                                    <input type="number" class="form-control" name="tensi" id="tensi">
                                </div>
                                <div class="col-md-3 payment_label"> 
                                    <label for="tensi">mmHg</label>
                                </div>
                            </div>
                            <div class="col-md-12 panel">
                                <div class="col-md-3 payment_label"> 
                                    <label for="suhu"> <?php echo lang('suhu'); ?></label>
                                </div>
                                <div class="col-md-6"> 
                                    <input type="number" class="form-control" name="suhu" id="suhu">
                                </div>
                                <div class="col-md-3 payment_label"> 
                                    <label for="tensi"><sup>&#48;</sup> C</label>
                                </div>
                            </div>
                            <div class="col-md-12 panel">
                                <div class="col-md-3 payment_label"> 
                                    <label for="buta_warna"><?php echo lang('buta_warna'); ?></label>
                                </div>
                                <div class="col-md-9"> 
                                    <select class="form-control m-bot15 js-example-basic-single status" id="buta_warna" name="buta_warna"> 
                                        <option value="iya">Iya</option>
                                        <option value="tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 panel">
                            <div class="col-md-3 payment_label"> 
                                <label for="pekerjaan"> <?php echo lang('pekerjaan'); ?></label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
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
                            <label for="doctor"><?php echo lang('doctor'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <select class="form-control js-example-basic-single" id="doctor" name="doctor" required> 
                            </select>
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editNurseForm').trigger("reset");
            $.ajax({
                url: 'suket/editSuketByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                let option =    `<option value=""><?php echo lang('select'); ?></option> 
                                <option value="add_new" style="color: #41cac0 !important;"><?php echo lang('add_new'); ?></option>`;
                for (let i = 0; i < response.patients.length; i++) {
                    option += `<option value="${response.patients[i].id}" ${response.patients[i].id == response.suket.id_pasien ? 'selected' : null} >
                                    ${response.patients[i].name}
                                </option>`;   
                }
                let optionDoctor = null;
                for (let i = 0; i < response.doctors.length; i++) {
                    optionDoctor += `<option value="${response.doctors[i].id}" ${response.doctors[i].id == response.suket.doctor ? 'selected' : null} >
                                    ${response.doctors[i].name}
                                </option>`;   
                }
                $('#name_select').append(null).append(option).end();
                $('#doctor').append(null).append(optionDoctor).end();

                $("#name_select").val(response.suket.id_pasien)
                $("#doctor").val(response.suket.doctor)

                $("#ktp").val(response.suket.ktp)
                $("#place_birth").val(response.suket.place_birth)
                $("#birth_date").val(response.suket.birth_date)
                $("#address").val(response.suket.address)
                $("#id_suket").val(response.suket.id)
                $("#suket_type").val(response.suket.suket_type)
                $("#spesimen").val(response.suket.spesimen)
                $("#keterangan").val(response.suket.keterangan)
                $("#note").val(response.suket.note)
                if(response.suket.suket_type == 1){
                    $("#status").val(response.suket.status_positif)
                    $(".antibody-edit").hide()
                    $(".surat-edit").hide()
                } else if(response.suket.suket_type == 2){
                    $("#status_ig_m").val(response.suket.status_ig_m)
                    $("#status_ig_g").val(response.suket.status_ig_g)
                    $(".antigen-edit").hide()
                    $(".surat-edit").hide()
                } else if(response.suket.suket_type == 3){
                    $("#status_sehat").val(response.suket.status_sehat)
                    if(response.suket.status_sehat == 'sakit') {
                        $("#butuh_istirahat").val(response.suket.istirahat)
                        $("#date").val(response.suket.tanggal)
                        $('.if-sakit').show();
                        $('.if-sehat').hide();
                    } else {
                        $('#tensi').val(response.suket.tensi);
                        $('#suhu').val(response.suket.suhu);
                        $('#buta_warna').val(response.suket.buta_warna);
                        $('#pekerjaan').val(response.suket.pekerjaan);
                        $('.if-sakit').hide();
                        $('.if-sehat').show();
                    }

                    $(".antigen-edit").hide()
                    $(".antibody-edit").hide()
                }
                $('#myModal2').modal('show');
            });

        });
    });
</script>
<script>
    $(document).ready(function () {
       var table =  $('#editable-sample').DataTable({
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
                        columns: [1, 2, 3, 4],
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
    function formatTanggal(tanggal){
        const d = new Date(tanggal);
        const ye = new Intl.DateTimeFormat('id', { year: 'numeric' }).format(d);
        const mo = new Intl.DateTimeFormat('id', { month: 'long' }).format(d);
        const da = new Intl.DateTimeFormat('id', { day: '2-digit' }).format(d);
        return `${da} ${mo} ${ye} ${tanggal.substr(11, tanggal.length - 3)}`;
    }

    function getTanggal(){
        let Tanggal = new Date();
        let tahun = Tanggal.getFullYear().toString();
        let bulan =
            Tanggal.getMonth() + 1 < 10
                ? '0' + (Tanggal.getMonth() + 1).toString()
                : (Tanggal.getMonth() + 1).toString();
        let tgl =
            Tanggal.getDate() < 10
                ? '0' + Tanggal.getDate().toString()
                : Tanggal.getDate().toString();
                
        return tahun + '-' + bulan + '-' + tgl
    };

    function getTanggalEnd(tanggal, istirahat){
        let d = new Date(tanggal);
        d.setDate(d.getDate()+parseInt(istirahat))
        let date = d.getDate();
        date = date < 10 ? '0'+date : date;
        let bulan = d.getMonth() + 1;
        bulan = bulan < 10 ? '0'+bulan : bulan
        let year = d.getFullYear();
        return bulan+'/'+date+'/'+year;
    }

    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
    $(document).ready(function() {
        $(".printButton").click(function (e) {
            e.preventDefault(e);
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'suket/getSuketByJason?id=' + iid,
                method: 'GET', 
                data: '',
                dataType: 'json', 
            }).success(function (response) {
                let suket_type = response.suket.suket_type;
                let qr_wrapper = $('.qr-wrapper');

                let url = `${window.location.origin}/antigen/suket/${response.suket.suket_code}`;
                qr_wrapper.empty().qrcode({
                    text: url,
                    background: '#fff',
                    mode: 5,
                    render: "image",
                    fontname: "Nunito",
                    size: suket_type == 3 && response.suket.status_sehat == 'sakit' ? 80 : 100,
                    ecLevel: "H",
                    minVersion: 3,
                    quiet: 5,
                });
                let birth_date = response.suket.birth_date?.split('-');
                let tanggalAkhir = null;
                if(birth_date.length > 0){
                    birth_date = birth_date[1]+'/'+birth_date[0]+'/'+birth_date[2];
                    birth_date = formatTanggal(birth_date);
                }
                let tanggal_surat = formatTanggal(getTanggal());
                let add_date = formatTanggal(response.suket.add_date);
                $('.print_nama').text(': '+response.suket.name)
                $('.print_ttl').text(': '+response.suket.place_birth+'/'+birth_date)
                $('.print_alamat').text(': '+response.suket.address)
                $('.print_tgl').text(add_date)
                $('.print_dokter').text('Deni')
                $('.print_suket_code').text('NO: '+response.suket.suket_code)
                $('.print_spesimen').text(response.suket.spesimen)
                $('.print_keterangan').text(response.suket.keterangan)
                $('.print_note').text(response.suket.note)
                $('.print_tgl_surat').text(tanggal_surat)
                if(response.suket.suket_type == 1){
                    $('.show_status_ig_m').hide()
                    $('.show_status_ig_g').hide()
                    $('.show_status_positif').show();
                    $('.print_status').text(response.suket.status_positif)
                    $('.print_jenis_suket').text('Swab Tes Antigen')
                    $('.print_dokter').text(response.doctor.name)
                    $('.print_jabatan').text(': '+response.doctor.department)
                    $('.print_sip').text('SIP: '+response.doctor.profile)
                    $('#pdf-antigen').show()
                    const doc = new jsPDF('p','mm',[297, 210]);
                    doc.addHTML($('#pdf-antigen')[0], function () {
                        doc.save('antigen-'+response.suket.suket_code+'.pdf');
                        $('#pdf-antigen').css('display', 'none');
                    });
                } else if(response.suket.suket_type == 2){
                    $('.print_jenis_suket').text('Antibody')
                    $('.show_status_positif').hide()
                    $('.show_status_ig_m').show()
                    $('.print_status_ig_m').text(response.suket.status_ig_m)
                    $('.show_status_ig_g').show()
                    $('.print_status_ig_g').text(response.suket.status_ig_g)
                    $('.print_dokter').text(response.doctor.name)
                    $('.print_jabatan').text(': '+response.doctor.department)
                    $('.print_sip').text('SIP: '+response.doctor.profile)
                    $('#pdf-antigen').show()
                    const doc = new jsPDF('p','mm',[297, 210]);
                    doc.addHTML($('#pdf-antigen')[0], function () {
                        doc.save('antibody-'+response.suket.suket_code+'.pdf');
                        $('#pdf-antigen').css('display', 'none');
                    });
                } else if(response.suket.suket_type == 3){
                    let tanggal = response.suket.tanggal?.split('-');
                    if(response.suket.tanggal != '' && tanggal.length > 0){
                        tanggal = tanggal[1]+'/'+tanggal[0]+'/'+tanggal[2];
                        tanggalAkhir = getTanggalEnd(tanggal, response.suket.istirahat);
                        tanggalAkhir = formatTanggal(tanggalAkhir)
                        tanggal = formatTanggal(tanggal);
                    }
                    $('.print_umur').text(response.user.age);
                    $('.print_jenis_kelamin').text(response.user.sex == 'Male' ? 'Laki-laki' : 'Perempuan');
                    $('.print_pekerjaan').text(': '+response.suket.pekerjaan);
                    $('.print_alamat').text(': '+response.suket.address);
                    if(response.suket.status_sehat == 'sakit'){
                        $('.print_istirahat').text(response.suket.istirahat)
                        $('.print_tgl_mulai').text(tanggal)
                        $('.print_tgl_akhir').text(tanggalAkhir)
                        $('#pdf-sakit').show()
                        const doc = new jsPDF({
                            orientation: "landscape",
                            unit: "in",
                            format: [6.1979166667, 4.3854166667]
                        });
                        doc.addHTML($('#pdf-sakit')[0], function () {
                            doc.save('suket sakit-'+response.suket.suket_code+'.pdf');
                            $('#pdf-sakit').css('display', 'none');
                        });
                    } else {
                        $('.print_bb').text(': '+response.user.b_badan+' Kg')
                        $('.print_tb').text(': '+response.user.t_badan+' Cm')
                        $('.print_tensi').text(': '+response.suket.tensi+' mmHg')
                        $('.print_suhu').html(': '+response.suket.suhu+' <sup>&#48;</sup>C')
                        $('.print_buta_warna').text(response.suket.buta_warna)
                        $('#pdf-sehat').show()
                        const doc = new jsPDF('p','mm',[297, 210]);
                        doc.addHTML($('#pdf-sehat')[0], function () {
                            doc.save('suket sehat-'+response.suket.suket_code+'.pdf');
                            $('#pdf-sehat').css('display', 'none');
                        });
                    }
                }
            });
        })
    })
    $(document).ready(function () {
        $('.if-sehat').show();
        $(document.body).on('change', '#status_sehat', function() {
            var v = $("select.status_sehat option:selected").val();
            if(v == 'sakit') {
                $('#tensi').val('');
                $('#suhu').val('');
                $('#buta_warna').val('');
                $('#pekerjaan').val('');
                $('.if-sakit').show();
                $('.if-sehat').hide();
            } else {
                $('#butuh_istirahat').val('');
                $('#date').val('');
                $('.if-sakit').hide();
                $('.if-sehat').show();
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
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
        })
                //Listen for the change even on the input
                .change(dateChanged)
                .on('changeDate', dateChanged);
    });
</script>

