<!DOCTYPE html>
<html>
<head>
	<title> Distribusi barang di PT. Cisangkan </title>
		<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
			<link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('asset/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('asset/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
        
            <link href="<?php echo base_url('asset/css/navbar.css');?>" rel="stylesheet">
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            <script src="<?php echo base_url('asset/js/tinymce/tinymce.min.js');?>"></script>
			
            <script>
                    tinymce.init({selector:'textarea'});
            </script>
			
            
</head>
<body>
	<img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%">
	<div class="navbar navbar-default">
	<!--<div class="container">-->
    <!--<div class="jumbotron-header">-->

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#"><b>Beranda</b></a></li></b>
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Tentang Kami</b><span class="caret"></span></a>
				<ul class="dropdown-menu">
                  <li><a href="#">Sejarah</a></li>
                  <li><a href="#">Visi & Misi</a></li>
                </ul>
              </li>
              
        </div><!--/.container-fluid -->
		</div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
	</div>


    
<div class="container">
<legend>
	<center><h1><b>Sistem Distribusi Barang<b></h1></center>
</legend>
    <div class="jumbotron">
		<img src="<?php echo base_url('asset/img/pabrik.jpg');?>" height="500px" width="100%"><br><br>
		<center><p><a class="btn btn-lg btn-primary" href="<?php echo site_url('login/halaman_login');?>" role="button">LOGIN</a></p></center>
    </div>
</div>
    

    <div id="footer">
        <div class="container">
            <p class="text-muted">
                <center>Copyright &copy; Kerja Praktik UNJANI 2016</center>
            </p>
        </div>
    </div>
</body>
</html>