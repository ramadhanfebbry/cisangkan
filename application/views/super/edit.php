<!DOCTYPE html>
<html lang="en">
<head>
	<title> Distribusi barang di PT. Cisangkan </title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
   <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            
</head>
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
	 <center><h3><b>Ubah User<b><h3></center>
   </legend><br>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
     <div class="form-group">
        <label class="col-lg-2 control-label">Nama Awal </label>
        <div class="col-lg-3">
            <input type="text" name="nama_awal" class="form-control" value="<?php echo $tb_user['nama_awal'];?>" >
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Akhir</label>
        <div class="col-lg-3">
            <input type="text" name="nama_akhir" class="form-control" value="<?php echo $tb_user['nama_akhir'];?>">
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Username</label>
        <div class="col-lg-3">
            <input type="text" name="username" class="form-control" value="<?php echo $tb_user['username'];?>" readonly>
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Password</label>
        <div class="col-lg-3">
            <input type="password" name="password" class="form-control" value="<?php echo $tb_user['password'];?>">
        </div>
    </div>
	<div class="form-group">
<label class="col-lg-2 control-label">Hak Akses</label>
<div class="col-lg-3">
			<select name="level" class="form-control">
					<option value="<?php echo $tb_user['level'];?>"><?php echo $tb_user['level'];?></option>
					<option value="super_admin">Super Admin</option>
					<option value="bag_ppic">Bagian PPIC</option>
					<option value="bag_distribusi">Bagian Distribusi</option>
					<option value="bag_gudang">Bagian Gudang</option>
					<option value="kabag_distribusi">Kabag Distribusi</option>
			</select>
</div>
</div>
<br><br>
    <div class="form-group well">
		<center>
		<button class="btn btn-primary">Update</button>
		<a href="<?php echo site_url('super/user');?>" class="btn btn-primary">Kembali</a>
		</center>
    </div>
</form>
<script src="<?php echo base_url('asset/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap_3_2_0/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/hovernav/hovernav.js'); ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap_datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/psb.js'); ?>"></script>
</html>