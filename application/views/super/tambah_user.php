<!DOCTYPE html>
<html lang="en">
<head>
	<title> Distribusi barang di PT. Cisangkan </title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
   <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            
<body>
	<img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%">
<div class="navbar navbar-default">
	<div id="navbar" class="navbar-collapse collapse"> 
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo site_url('super/home'); ?>"><b>Home</b></a></li></b> 
            </ul>
			<ul class="nav navbar-nav navbar-right">
				<li class= "dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <b> Hai <?php echo $this->session->userdata('nama_awal'); ?> </b> <span class="caret"></span></a>
				<ul class="dropdown-menu">
				   <li><a href="#">Setting Akun</a></li>
                  <li><a href="<?php echo site_url('login/logout/'.$this->session->userdata("nama_awal"));?>" onclick="javascript: return confirm('Anda yakin akan keluar?')" class=""> Logout </a></li>
                </ul>
              </li>
            </ul>	
	</div>
	</div>
</div>
<?php echo validation_errors();?>
<?php echo $message;?>
	<legend>
	 <center><h3><b>Tambah User<b></h3></center>
   </legend><br>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Awal</label>
        <div class="col-lg-3">
            <input type="text" name="nama_awal" class="form-control" data-validation="alpha" data-validation-allowing="alpha"placeholder="nama awal">
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Nama Akhir</label>
        <div class="col-lg-3">
            <input type="text" name="nama_akhir" class="form-control" placeholder="nama akhir">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"> Username</label>
        <div class="col-lg-3">
            <input type="text" name="username" class="form-control" placeholder="username">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Password</label>
        <div class="col-lg-3">
            <input type="password" name="password" class="form-control" placeholder="password">
    </div>
	 </div>
<div class="form-group">
<label class="col-lg-2 control-label">Hak Akses</label>
<div class="col-lg-3">
			<select name="level" class="form-control">
					<option value="<?php echo $tb_user['level'];?>">-Pilih Hak Akses- </option>
					<option value="super admin">Super Admin</option>
					<option value="bag ppic">Bagian PPIC</option>
					<option value="bag distribusi">Bagian Distribusi</option>
					<option value="bag gudang">Bagian Gugang</option>
					<option value="kabag distribusi">Kabag Distribusi</option>
			</select>
</div>
</div>
<br><br>
    <div class="form-group well">
	<center>
		<button class="btn btn-primary">Simpan</button>
		<a href="<?php echo site_url('super/user');?>" class="btn btn-primary">Kembali</a>
	</center>
    </div>
</form>
<div>
<center>
   <div class="span2">
   <footer>
		<p><center>Copyright &copy; Kerja Praktik UNJANI 2016</center></p>
   </footer>
   </div>
</center>
</div>
 
<script src="<?php echo base_url('asset/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap_3_2_0/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/hovernav/hovernav.js'); ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap_datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/psb.js'); ?>"></script>
</html>