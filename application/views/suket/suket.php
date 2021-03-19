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
            <div class="container-logo">
                <div class="d-flex flex-row logo">
                    <img src="uploads/hmp-logo.png" alt="logo" class="logo-img">
                    <img src="uploads/logo-text.png" alt="logo" class="logo-text">
                </div>
                <p class="alamat">Kp.Buwek Raya RT.002 RW 022 Dusun II,DesaSumberJaya,Kec.Tambun Selatan,Kab.Bekasi.Telp.021 - 89534380</p>
            </div>
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
                    <p><b>Keterangan :</b></p>
                    <p class="keterangan">Hasil tersebut diatas hanya menggambarkan kondisi saat pengambilan specimen, Bila timbul gejala klinis atau kontak dengan pasien terinfeksi setelah pemeriksaan silahkan hubungan Dokter atau Fasilitas Kesehatan terdekat. Pemeriksaan ulang dapat dilakukan berdasarkan rekomendasi dokter.</p>
                </div>
            <?php } ?>
        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="common/js/jquery.js"></script>
        <script src="common/js/bootstrap.min.js"></script>
        
    </body>
</html>
