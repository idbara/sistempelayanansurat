<?php //$this->load->view('print/headjs.php');?>

<body onload="window.print()">
<div id="content" class="container_12 clearfix">
<div id="content-main" class="grid_7">

<link href="<?php echo base_url()?>assets/css/surat.css" rel="stylesheet" type="text/css" />
<div>
<table width="100%">

<tr> <img src="<?= base_url() ?>assets/logo.png" alt="" class="logo"></tr>

<div class="header">
<h4 class="kop">PEMERINTAH KABUPATEN <?php echo strtoupper($penduduk['kabupaten'])?> </h4>
<h4 class="kop">KECAMATAN <?php echo strtoupper($penduduk['kecamatan'])?> </h4>
<h4 class="kop">DESA <?php echo strtoupper($penduduk['desa'])?></h4>
<h5 class="kop2">Jalan Raya Sirayak No 1 jraganan@desakupemalang.id Kode Pos : 52365</h5>

<div style="text-align: center;">
<hr /></div></div>

</table>
<table width="100%">
</table>
<table width="100%">
</table>
<table width="100%">
<div align="center"><u><h4 class="kop">SURAT KETERANGAN TIDAK MAMPU</h4></u></div>
<div align="center"><h4 class="kop3">Nomor :<?php echo $surat['nomor']?></h4></div>
</table>
<div class="clear"></div>

<table width="100%">

<tr><td class="indentasi">Yang bertanda tangan dibawah ini Kepala Desa <?php echo $penduduk['desa']?> Kecamatan <?php echo $penduduk['kecamatan']?> Kabupaten <?php echo $penduduk['kabupaten']?> Provinsi <?php echo $penduduk['provinsi']?> menerangkan dengan sebenarnya kepada :  </td></tr>
</table>
<div id="isi3">
<table width="100%">
<tr><td width="23%">1. Nama Lengkap</td><td width="3%">:</td><td width="64%"><b><?php echo $penduduk['nama']?></td></tr>
<tr><td width="23%">2. NIK/ No KTP</td><td width="3%">:</td><td width="64%"><?php echo $penduduk['nik']?></td></tr>
<tr><td>3. Tempat dan Tgl. Lahir </td><td>:</td><td><?php echo $penduduk['tempatlahir']?>, <?php echo $penduduk['tanggallahir']?> </td></tr>
<tr><td>4. Jenis Kelamin</td><td>:</td><td><?php echo $penduduk['jeniskelamin']?></td></tr>
<tr><td>5. Agama</td><td>:</td><td><?php echo $penduduk['agama']?></td></tr>
<tr><td>6. Pekerjaan</td><td>:</td><td><?php echo $penduduk['pekerjaan']?></td></tr>
<tr><td>7. Kewarganegaraan </td><td>:</td><td><?php echo $penduduk['kewarganegaraan']?></td></tr>
<tr><td>8. Alamat/ Tempat Tinggal</td><td>:</td><td><?php echo $penduduk['alamat'] ?> RT. <?php echo $penduduk['rt']?> RW. <?php echo $penduduk['rw']?> Dusun <?php echo $penduduk['dusun']?> Desa <?php echo $penduduk['desa']?> Kecamatan <?php echo $penduduk['kecamatan']?> Kabupaten <?php echo $penduduk['kabupaten']?></td></tr>
</table>
<table width="100%">
<tr><td class="indentasi">Bahwa yang tersebut namanya diatas, sepanjang pengetahuan dan penelitian kami hingga saat dikeluarkannya surat keterangan ini memang benar Keluarga yang KURANG MAMPU dan tidak memiliki penghasilan tetap. </td></tr>
</table>


<table width="100%">
<tr></tr>
<tr><td class="indentasi">Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya</td></tr>
<tr></tr>
</table>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
</table></div>
<table width="100%">
<tr></tr>
<tr></tr>
<tr></tr>
<tr><td></td><td width="55%"></td><td align="center"><?php echo $penduduk['desa']?>, <?php echo $surat['tanggal'] ?></td></tr>
<tr><td></td><td width="55%"></td><td align="center">Kepala Desa</td></tr>
</table></div>
<table width="100%">
<table width="100%">
<table width="100%">
<table width="100%">
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr><td></td><td width="55%"></td><td align="center">Slamet Masduki</td></tr>
</table>  </div></div>
<div id="aside">
</div>
</div>
</body>
</html>