<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Rizvi">
        <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
        <link rel="shortcut icon" href="uploads/favicon.png">

        <title>Surat Keterangan - 
            <?php
            $this->db->where('hospital_id', 'superadmin');
            echo $this->db->get('settings')->row()->system_vendor;
            ?>
        </title>

        <!-- Bootstrap core CSS -->
        <link href="common/css/bootstrap.min.css" rel="stylesheet">
        <link href="common/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="common/css/suket.css" rel="stylesheet">
        <link href="common/css/style.css" rel="stylesheet">
        <link href="common/css/style-responsive.css" rel="stylesheet" /> 
    </head>

    <body>

        <div class="container container-view-suket">
            <?php if($suket->suket_type == 1 || $suket->suket_type == 2) { ?>
            <div class="container-logo">
                <div class="d-flex flex-row logo">
                    <img src="uploads/hmp-logo.png" alt="logo" class="logo-img">
                    <img src="uploads/logo-text.png" alt="logo" class="logo-text">
                </div>
                <p class="alamat">Kp.Buwek Raya RT.002 RW 022 Dusun II,DesaSumberJaya,Kec.Tambun Selatan,Kab.Bekasi.Telp.021 - 89534380</p>
            </div>
            <?php } ?>
            <?php 
                if($suket->suket_type == 1) {
            ?>
                <div class="table">
                    <table>
                        <tbody>
                            <tr>
                                <td>NO</td>
                                <td colspan="2">:<?= $suket->suket_code; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td colspan="2">:<?= $suket->name; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat/TglLahir</td>
                                <td colspan="2">:<?= $suket->place_birth; ?>, <?= $suket->birth_date; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td colspan="2">:<?= $suket->address; ?></td>
                            </tr>
                            <tr>
                                <td>Spesimen</td>
                                <td colspan="2">:<b>Swab Nasofaring</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="content">
                    <p class="pembukaan">Dari hasil pemeriksaan Swab Tes Antigen pada tanggal, <?= $suket->add_date; ?> Saya menyatakan:</p>
                    <p class="info-text"><i>"Sehat dan Tidak ada tanda Gejala Terinfeksi Covid-19"</i></p>
                    <p>Hasil pemeriksaan:</p>
                    <h5 class="text-center hasil">SARS - COV2 <?= strtoupper($suket->status_positif); ?></h5>
                    <p><b>Keterangan :</b></p>
                    <p class="keterangan">Hasil tersebut diatas hanya menggambarkan kondisi saat pengambilan specimen, Bila timbul gejala klinis atau kontak dengan pasien terinfeksi setelah pemeriksaan silahkan hubungan Dokter atau Fasilitas Kesehatan terdekat. Pemeriksaan ulang dapat dilakukan berdasarkan rekomendasi dokter.</p>
                </div>
            <?php } else if ($suket->suket_type == 2) {?>
                <div class="table">
                    <table>
                        <tbody>
                            <tr>
                                <td>NO</td>
                                <td colspan="2">:<?= $suket->suket_code; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td colspan="2">:<?= $suket->name; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat/TglLahir</td>
                                <td colspan="2">:<?= $suket->place_birth; ?>, <?= $suket->birth_date; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td colspan="2">:<?= $suket->address; ?></td>
                            </tr>
                            <tr>
                                <td>Spesimen</td>
                                <td colspan="2">:<b>Swab Nasofaring</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="content">
                    <p class="pembukaan">Dari hasil pemeriksaan Swab Tes Antigen pada tanggal, <?= $suket->add_date; ?> Saya menyatakan:</p>
                    <p class="info-text"><i>"Sehat dan Tidak ada tanda Gejala Terinfeksi Covid-19"</i></p>
                    <p>Hasil pemeriksaan:</p>
                    <div class="container-hasil">
                        <h5 class="hasil m-0">- Repid  Tes IG- M SARS COVID 19 : <?= ucfirst($suket->status_ig_m); ?></h5>
                        <h5 class="hasil">- Repid  Tes IG- G SARS COVID 19 : f<?= ucfirst($suket->status_ig_g); ?></h5>
                    </div>
                    <p class="title-keterangan"><b>Keterangan :</b></p>
                    <p class="keterangan">Hasil tersebut diatas hanya menggambarkan kondisi saat pengambilan specimen, Bila timbul gejala klinis atau kontak dengan pasien terinfeksi setelah pemeriksaan silahkan hubungan Dokter atau Fasilitas Kesehatan terdekat. Pemeriksaan ulang dapat dilakukan berdasarkan rekomendasi dokter.</p>
                </div>
            <?php } else if ($suket->suket_type == 3) {?>
                <?php 
                    if($suket->status_sehat == 'sehat') {
                ?>
                    <div id="pdf-sehat" style="font-family: 'Times New Roman', Times, serif;background: #fff;width: 100%;padding-top: 21m;padding-left: 1.9cm;padding-right: 1.9cm;padding-bottom: 3.67cm;">
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
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_nama">: <?= $suket->name; ?></td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Umur</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">: <span class="print_umur"><?= $user->age; ?></span> tahun, jenis kelamin: <span class="print_jenis_kelamin"><?php echo $user->sex == 'Male' ? 'Laki-laki' : 'Perempuan' ?></span></td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px" class="print_pekerjaan">Pekerjaan</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_pekerjaan">: <?= $suket->pekerjaan; ?></td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Alamat</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_alamat">: <?= $suket->address; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size: 18px;margin-bottom:20px;text-indent:50px">Pada pemeriksaan yang kami lakukan pada hari ini, berada dalam kondisi <b>Sehat/Tidak Sakit</b></p>
                        <p style="font-size: 18px;margin-bottom:20px">Harap berkepentingan menjadi maklum</p>
                        <table style="width: 100%;margin-bottom: 50px">
                            <tbody style="width: 100%;">
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">BB</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_bb">: <?= $user->b_badan; ?> Kg</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">TB</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_tb">: <?= $user->t_badan; ?> Cm</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">Tensi</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_tensi">: <?= $suket->tensi; ?> mmHg</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">Suhu</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;" class="print_suhu">: <?= $suket->suhu; ?> <sup>&#48;</sup>C</td>
                                </tr>
                                <tr>
                                    <td style="border: none;font-size: 18px;padding-left:0px;width:100px">Buta Warna</td>
                                    <td style="border: none;font-size: 18px;padding-left:0px;">: <b class="print_buta_warna"><?= $suket->buta_warna; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php } else { ?>
                        <div id="pdf-sakit" style="
                            font-family: 'Times New Roman', Times, serif;
                            background: #fff;
                            width: 100%;
                            padding-top: 1.2cm;
                            padding-left: 3cm;
                            padding-right: 3cm;
                            padding-bottom: 2cm;
                            ">
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
                                        <td style="border: none;font-size: 18px;padding-left:0px;" class="print_nama">: <?= $suket->name; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Umur</td>
                                        <td style="border: none;font-size: 18px;padding-left:0px;">: <span class="print_umur"><?= $user->age; ?></span> tahun, jenis kelamin: <span class="print_jenis_kelamin"><?php echo $user->sex == 'Male' ? 'Laki-laki' : 'Perempuan' ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Pekerjaan</td>
                                        <td style="border: none;font-size: 18px;padding-left:0px;" class="print_pekerjaan">: <?= $suket->pekerjaan; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;font-size: 18px;padding-left:0px;width:200px">Alamat</td>
                                        <td style="border: none;font-size: 18px;padding-left:0px;" class="print_alamat">: <?= $suket->address; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style="font-size: 18px;margin-bottom:0px;">Perlu beristirahat karena sakit selama <span class="print_istirahat"><?= $suket->istirahat; ?></span> hari, terhitung dari <span class="print_tgl_mulai"><?php $data = date_create($suket->tanggal); echo date_format($data, 'd M Y') ?></span> s/d <span class="print_tgl_akhir"><?php echo date('d M Y', strtotime($suket->tanggal. ' + '.$suket->istirahat.' days')); ?></span></p>
                        </div>
                    <?php } ?>
            <?php } ?>
        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="common/js/jquery.js"></script>
        <script src="common/js/bootstrap.min.js"></script>
        
    </body>
</html>
