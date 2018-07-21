<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pelayanan Surat</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets/css/scrolling-nav.css" rel="stylesheet">

  </head>
<script type="text/javascript">
  function tanggalsekarang() {
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    var today = new Date();
    var date = today.getDate()+' '+monthNames[today.getMonth()]+' '+today.getFullYear();
    document.getElementById("tanggal").value = date;
  }
  

</script>
  <body id="page-top" onload="tanggalsekarang()">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Sistem Pelayanan Surat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?= site_url('surat/rekap') ?>">Rekap</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?= site_url('login/logout') ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <form action="<?= site_url('surat/cetaksurat') ?>" id="formcetak" method="POST">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Keterangan Surat</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="jenissurat">Jenis Surat</label>
                        <select class="form-control" id="jenissurat" name="jenissurat">
                          <option value="sktm">Surat Keterangan Tidak Mampu</option>
                          <option value="sik">Surat Izin Keramaian</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nomor">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nama">Nama Lengkap Penduduk</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $penduduk['nama'] ?>" readonly="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $penduduk['nik'] ?>" readonly="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="alamat">Alamat Penduduk</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $penduduk['alamat'] ?>" readonly="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tanggal">Tanggal Pembuatan Surat</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" readonly="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-footer">
                <button type="submit" class="btn btn-default">Cetak Surat</button> <button onclick="window.location.href='<?= site_url()?>/surat'" class="btn btn-default">Kembali</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
    

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="<?= base_url() ?>assets/js/scrolling-nav.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $("#formcetak").submit(function(event){
    event.preventDefault(); //prevent default action 

    $.ajax({
      type:  $(this).attr("method"),
      url : $(this).prop('action'),
      data: $(this).serialize()
    }).done(function(response){ //
      var obj = jQuery.parseJSON(response);
      if(obj['status'] == 200){
        swal({ 
          title: "Good job!",
          text: obj['messages'],
          icon: "success", 
        }).then((value) => {
          window.location ="<?= site_url('surat/printed') ?>" ;
        });
        return false;
      } else {
        swal({   
          title: "Oops..",   
          icon: "error", 
          text: obj['messages'], 
        });
        return false;
      }
    });
  });
</script>

  </body>
</html>
