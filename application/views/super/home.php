<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan </title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('asset/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('asset/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
        
            
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            <script src="<?php echo base_url('asset/js/tinymce/tinymce.min.js');?>"></script>
            <script>
                    tinymce.init({selector:'textarea'});
            </script>
	
</head>
<body>
<img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%">

<?php $user_level = $this->session->userdata('level')?>

<div class="navbar navbar-default">
	<!--<div class="container">-->
	<div id="navbar" class="navbar-collapse collapse"> 
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo site_url('super/home'); ?>"><b>Home</b></a></li></b> 
			  <li><a href="<?php echo site_url('super/user'); ?>"><b>Kelola User</b></a></li></b>
			   <li><a href="<?php echo site_url('login/logout/'.$this->session->userdata("nama_awal"));?>" onclick="javascript: return confirm('Anda yakin akan keluar?')" class=""><b>Logout</b></a></li>
            </ul>	
			
        </div>
	</div>
</div><br>
 <div class="container">
	<legend>
	 <center><h1><b>SISTEM DISTRIBUSI BARANG<b><h1></center>
   </legend><br>
    <div class="jumbotron">
		<center><h1>SIDIBAS</h1></center><br>
		<!--<center><img src="<?php echo base_url('asset/img/cisangkan.jpg');?>" height="120px" width="17%"></center><br>-->
        <center><p>Selamat datang di sistem informasi Distribusi barang di PT. Cisangkan Purwakarta, untuk menggunakan sistem silahkan memilih menu yang telah disediakan di atas. </p>
		<p>Hai <strong><?php echo $this->session->userdata('nama_awal'); ?></strong>, Status Anda telah Login sebagai<strong> <?php echo $this->session->userdata('level'); ?></strong> Jangan lupa LOGOUT sebelum keluar.</p>
		<!--<center><p><a class="btn btn-lg btn-success" href="<?php echo site_url('login/logout/'.$this->session->userdata("nama_awal"));?>" role="button">LOGOUT</a></p></center>-->
    </div>
</div>
    

    <div id="footer">
        <div class="container">
            <p class="text-muted">
                <center>Copyright &copy; Kerja Praktik UNJANI 2016</center>
            </p>
        </div>
    </div>
 <script src="<?php echo base_url('asset/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/hovernav/hovernav.js'); ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap_datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('asset/tinymce_4_1_6/js/tinymce/tinymce.min.js'); ?>"></script>

</div><!-- wrapper-->
</body>
</html>