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
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.css"/>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.css"/>
 

 



  </head>

  <body id="page-top" >

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
              <a class="nav-link js-scroll-trigger" href="<?= site_url('surat') ?>">Buat Surat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?= site_url('login/logout') ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center">Rekap Surat</h2>
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Jenis Surat</th>
                      <th>Nomor Surat</th>
                      <th>Tanggal Surat</th>
                      <th>NIK Pemohon</th>
                      <th>Nama Pemohon</th>
                  </tr>
              </thead>
              <tbody>

                <?php 
                $no = 1;
                foreach ($data as $row) {
                  ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?= $row['jenissurat'] ?></td>
                      <td><?= $row['nomorsurat'] ?></td>
                      <td><?= $row['date'] ?></td>
                      <td><?= $row['nik'] ?></td>
                      <td><?= $row['nama'] ?></td>
                  </tr>
                  <?php
                }?>
                  
                  
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>Jenis Surat</th>
                      <th>Nomor Surat</th>
                      <th>Tanggal Surat</th>
                      <th>NIK Pemohon</th>
                      <th>Nama Pemohon</th>
                  </tr>
              </tfoot>
          </table>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/b-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print',
            'pdfHtml5',
            'csv',
            'excel'
        ]
    } );
} );
</script>
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
