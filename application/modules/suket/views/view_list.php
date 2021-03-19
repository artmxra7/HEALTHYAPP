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
                                    <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="index.php/suket/delete?id=<?php echo $item->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    <div id="pdf-antigen" style="width: 595px;font-family: 'Times New Roman', Times, serif;background: #fff;width: 100%;padding-top: 2cm;padding-left: 1.9cm;padding-right: 1.9cm;padding-bottom: 3.67cm;
                        display:none;">
                        <div style="text-align: center;border-bottom: 2px solid #000;">
                            <div style="display: flex;flex-direction: row;align-items: center;justify-content: space-between;">
                                <img src="uploads/hmp-logo.png" alt="logo" width="10%">
                                <img src="uploads/logo-text.png" alt="logo" width="85%">
                            </div>
                            <p style="font-size: 18px;">Kp.Buwek Raya RT.002 RW 022 Dusun II,DesaSumberJaya,Kec.Tambun Selatan,Kab.Bekasi.Telp.021 - 89534380</p>
                        </div>
                        <h3 style="margin-top: 50px;text-align:center;text-decoration:underline;margin-bottom:50px;font-weight:bold">SURAT KETERANGAN</h3>
                        <p style="font-size: 18px;">Yang bertanda tangan dibawah ini:</p>
                        <table style="width: 100%;margin-bottom:50px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">Nama</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">: Deni Juli Setiawan</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">Jabatan</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">: Kepala Dokter</td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 18px;">Menerangkan bahwa:</p>
                        <table style="width: 100%;margin-bottom: 50px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">Nama</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_nama">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">Tempat/TglLahir</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_ttl">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">Alamat</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_alamat">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">Spesimen</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">: <b class="print_spesimen"></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 18px;margin-bottom:20px">Dari hasil pemeriksaan <span class="print_jenis_suket"></span> pada tanggal, <span class="print_tgl"></span> Saya menyatakan:</p>
                        <p style="font-size: 18px;margin-bottom:20px"><b><i class="print_note"></i></b></p>
                        <p style="font-size: 18px;margin-bottom:20px">Hasil Pemeriksaan:</p>
                        <h4 style="margin-top: 20px;margin-bottom:30px;margin-left:40px;display:none" class="status_positif"><b>- SARS - COV2: <span class="print_status">-</span></b></h4>
                        <h4 style="margin-top: 20px;margin-bottom:30px;margin-left:40px;display:none" class="status_ig_m"><b>- Repid  Tes IG- M SARS COVID 19 : <span class="print_status_ig_m">-</span></b></h4>
                        <h4 style="margin-top: 20px;margin-bottom:30px;margin-left:40px;display:none" class="status_ig_g"><b>- Repid  Tes IG- G SARS COVID 19 : <span class="print_status_ig_g">-</span></b></h4>
                        <p style="font-size: 18px;"><b>Keterangan :</b></p>
                        <p style="font-size: 18px;margin-bottom:80px" class="print_keterangan"></p>
                        <div style="width: 100%;display:flex;justify-content:space-between">
                            <div>
                                <p style="font-size: 18px;text-align:center;margin-bottom:100px"><b class="print_dokter">Deni Juli Setiawan</b></p>
                                <p style="font-size: 18px;text-align:center;font-weight:bold;text-decoration:underline;margin-bottom:0px">(Deni Juli Setiawan)</p>
                                <p style="font-size: 18px;text-align:center;text-decoration:underline;">NIP.28345793485734957</p>
                            </div>
                            <div style="text-align:center;">
                                <p style="font-size: 18px;text-align:center;">Bekasi, <span class="print_tgl_surat"></span></p>
                                <div class="qr-wrapper" data-url="{SCAN_URL}"></div>
                                <p style="font-size: 18px;text-align:center;margin-top:10px" class="print_suket_code">NO: 1230929-ASD</p>
                            </div>
                        </div>
                    </div>
                    <div id="pdf-sehat" style="font-family: 'Times New Roman', Times, serif;background: #fff;width: 100%;padding-top: 2cm;padding-left: 1.9cm;padding-right: 1.9cm;padding-bottom: 3.67cm;
                        display:none">
                        <div style="display: flex;flex-direction: row;justify-content: space-between;">
                            <img src="uploads/hmp-logo.png" alt="logo" height="50px">
                            <div style="padding-left: 20px;padding-right:20px">
                                <div style="text-align: center;border-bottom: 2px solid #000;margin-bottom:15px">
                                    <img src="uploads/logo-text.png" alt="logo" width="100%" style="margin-bottom: 20px;">
                                </div>
                                <p style="font-size: 18px;text-align:center">Kp.Buwek Raya RT.002 RW 022 Dusun II,DesaSumberJaya,Kec.Tambun Selatan,Kab.Bekasi.Telp.021 - 89534380</p>
                            </div>
                        </div>
                        <h3 style="margin-top: 50px;text-align:center;margin-bottom:50px;font-weight:bold">SURAT KETERANGAN SEHAT</h3>
                        <table style="width: 100%;margin-bottom: 50px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Nama</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_nama">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Umur</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_umur">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Pekerjaan</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_pekerjaan">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Alamat</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_alamat">: -</td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 18px;margin-bottom:20px;text-indent:50px">Pada pemeriksaan yang kami lakukan pada hari ini, berada dalam kondisi <b>Sehat/Tidak Sakit</b></p>
                        <p style="font-size: 18px;margin-bottom:20px">Harap berkepentingan menjadi maklum</p>
                        <table style="width: 100%;margin-bottom: 50px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">BB</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_bb">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">TB</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_tb">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">Tensi</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_tensi">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">Suhu</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">: <b class="print_suhu"></b></td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">Buta Warna</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">: <b class="print_buta_warna"></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="width: 100%;display:flex;justify-content:space-between">
                            <div style="text-align:center;">
                                <div class="qr-wrapper" data-url="{SCAN_URL}"></div>
                                <p style="font-size: 18px;text-align:center;margin-top:10px" class="print_suket_code">NO: 1230929-ASD</p>
                            </div>
                            <div>
                                <p style="font-size: 18px;text-align:center;">Bekasi, <span class="print_tgl_surat"></span></p>
                                <p style="font-size: 18px;text-align:center;font-weight:bold;text-decoration:underline;margin-bottom:0px">(Deni Juli Setiawan)</p>
                                <p style="font-size: 18px;text-align:center;text-decoration:underline;">NIP.28345793485734957</p>
                            </div>
                        </div>
                    </div>
                    <div id="pdf-sakit" style="
                        font-family: 'Times New Roman', Times, serif;
                        background: #fff;
                        width: 100%;
                        padding-top: 1.2cm;
                        padding-left: 3cm;
                        padding-right: 3cm;
                        padding-bottom: 2cm;
                        position: relative;
                        display:none;
                        ">
                        <div style="text-align:center;position: absolute;top: 20px;right: 20px;">
                            <div class="qr-wrapper" style="margin: auto;"></div>
                            <p style="font-size: 18px;text-align:center;margin-top:10px" class="print_suket_code">NO: 1230929-ASD</p>
                        </div>
                        <div style="display: flex;flex-direction: row;justify-content: space-between;">
                            <img src="uploads/hmp-logo.png" alt="logo" height="50px">
                            <div style="padding-left: 20px;padding-right:20px">
                                <div style="text-align: center;border-bottom: 2px solid #000;margin-bottom:15px">
                                    <img src="uploads/logo-text.png" alt="logo" width="100%" style="margin-bottom: 20px;">
                                </div>
                                <p style="font-size: 18px;text-align:center">Kp.Buwek Raya RT.002 RW 022 Dusun II,DesaSumberJaya,Kec.Tambun Selatan,Kab.Bekasi.Telp.021 - 89534380</p>
                            </div>
                        </div>
                        <h3 style="margin-top: 10px;text-align:center;margin-bottom:20px;font-weight:bold">SURAT KETERANGAN SAKIT</h3>
                        <p style="font-size: 18px;margin-bottom:0px;">Yang bertanda tangan dibawah ini:</p>
                        <table style="width: 100%;margin-bottom: 20px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Nama</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_nama">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Umur</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">: - <span class="print_umur"></span> tahun, jenis kelamin: <span class="print_jenis_kelamin"></span></td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Pekerjaan</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_pekerjaan">: -</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Alamat</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_alamat">: -</td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 18px;margin-bottom:0px;">Perlu beristirahat karena sakit selama <span class="print_istirahat"></span> hari, terhitung dari <span class="print_tgl_mulai"></span> s/d <span class="print_tgl_akhir"></span></p>
                        <p style="font-size: 18px;margin-bottom:10px">Harap berkepentingan menjadi maklum</p>
                        <div style="width: 100%;display:flex;justify-content:space-between">
                            <div></div>
                            <div>
                                <p style="font-size: 18px;text-align:center;margin-bottom:0px">Bekasi, <span class="print_tgl_surat"></span></p>
                                <p style="font-size: 18px;text-align:center;margin-bottom:50px">Dokter pemeriksa</p>
                                <p style="font-size: 18px;text-align:center;font-weight:bold;text-decoration:underline;margin-bottom:0px">(Deni Juli Setiawan)</p>
                                <p style="font-size: 18px;text-align:center;text-decoration:underline;">NIP.28345793485734957</p>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('edit_suket'); ?> </h4>
            </div>
            <div class="modal-body">
                <form role="form" action="index.php/suket/addNew" class="clearfix row" method="post">
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
                                <select class="form-control m-bot15 js-example-basic-single status" id="status" name="status" required> 
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
                                <select class="form-control m-bot15 js-example-basic-single status" id="status_ig_m" name="status_ig_m" required> 
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
                                <select class="form-control m-bot15 js-example-basic-single status" id="status_ig_g" name="status_ig_g" required> 
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
                                    <input type="number" class="form-control" name="butuh_istirahat" id="butuh_istirahat">
                                </div>
                                <div class="col-md-3 payment_label"> 
                                    <label>/<?php echo lang('hari'); ?></label>
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
                url: 'index.php/suket/editSuketByJason?id=' + iid,
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
                $('#name_select').append(option).end();
                $("#name_select").val(response.suket.id_pasien)
                $("#ktp").val(response.suket.ktp)
                $("#place_birth").val(response.suket.place_birth)
                $("#birth_date").val(response.suket.birth_date)
                $("#address").val(response.suket.address)
                $("#id_suket").val(response.suket.id)
                $("#suket_type").val(response.suket.suket_type)
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
                    $("#butuh_istirahat").val(response.suket.istirahat)
                    $("#date").val(response.suket.tanggal)
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

    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
    $(document).ready(function() {
        $(".printButton").click(function (e) {
            e.preventDefault(e);
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'index.php/suket/getSuketByJason?id=' + iid,
                method: 'GET', 
                data: '',
                dataType: 'json', 
            }).success(function (response) {
                let suket_type = response.suket.suket_type;
                let qr_wrapper = $('.qr-wrapper');

                let url = 'http://localhost:8080/healthyapp/index.php/antigen/suket/'+response.suket.suket_code;
                qr_wrapper.empty().qrcode({
                    text: url,
                    background: '#fff',
                    mode: 5,
                    render: "image",
                    fontname: "Nunito",
                    size: suket_type == 1 || suket_type == 2 ? 150 : 100,
                    ecLevel: "H",
                    minVersion: 3,
                    quiet: 5,
                });
                let birth_date = response.suket.birth_date.split('-');
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
                $('.print_suket_code').text(response.suket.suket_code)
                $('.print_spesimen').text(response.suket.spesimen)
                $('.print_keterangan').text(response.suket.keterangan)
                $('.print_note').text(response.suket.note)
                $('.print_tgl_surat').text(tanggal_surat)
                if(response.suket.suket_type == 1){
                    $('.print_status').text(response.suket.status_positif)
                    $('.print_jenis_suket').text('Swab Tes Antigen')
                    $('#pdf-antigen').show()
                    const doc = new jsPDF();
                    doc.addHTML($('#pdf-antigen')[0], function () {
                        doc.save('antigen-'+response.suket.suket_code+'.pdf');
                        $('#pdf-antigen').css('display', 'none');
                    });
                } else if(response.suket.suket_type == 2){
                    $('.print_jenis_suket').text('Antibody')
                    $('.print_status_ig_m').text(response.suket.status_ig_m)
                    $('.print_status_ig_g').text(response.suket.status_ig_g)
                    $('#pdf-antigen').show()
                    const doc = new jsPDF();
                    doc.addHTML($('#pdf-antigen')[0], function () {
                        doc.save('antibody-'+response.suket.suket_code+'.pdf');
                        $('#pdf-antigen').css('display', 'none');
                    });
                } else if(response.suket.suket_type == 3){
                    $('#pdf-sakit').show()
                    const doc = new jsPDF('l');
                    doc.addHTML($('#pdf-sakit')[0], function () {
                        doc.save('suket sehat-'+response.suket.suket_code+'.pdf');
                        $('#pdf-sakit').css('display', 'none');
                    });
                }
            });
        })
    })
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

