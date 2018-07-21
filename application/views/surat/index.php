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

  <body id="page-top">

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
              <a class="nav-link js-scroll-trigger active" href="<?= site_url('surat/rekap') ?>">Rekap</a>
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
          <div class="col-lg-6 mx-auto">
            <form action="<?= site_url('surat/ceknik') ?>" id="formcarinik" method="POST">
              <div class="form-group">
                <label for="nik">Masukkan NIK Penduduk</label>
                <input type="text" class="form-control" id="nik" name="nik" required="">
              </div>
              
              <button type="submit" class="btn btn-default">Cari</button>
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
  $("#formcarinik").submit(function(event){
    event.preventDefault(); //prevent default action 

    $.ajax({
      type:  $(this).attr("method"),
      url : $(this).prop('action'),
      data: $(this).serialize()
    }).done(function(response){ //
      console.log(response);
      var obj = jQuery.parseJSON(response);
      if(obj['status'] == 200){
        swal({ 
          title: "Good job!",
          text: obj['messages'],
          icon: "success", 
        }).then((value) => {
          window.location ="<?= site_url('surat/pilihsurat') ?>" ;
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
