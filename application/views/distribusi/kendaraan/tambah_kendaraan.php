<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet"/>
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            
	
</head>

<img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%">
<div class="navbar navbar-default">
	<div id="navbar" class="navbar-collapse collapse"> 
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo site_url('distribusi/home');?>"><b>Home</b></a></li></b> 
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

<legend>
	 <center><h3><b>Tambah Kendaraan<b></h3></center>
 </legend><?php echo validation_errors();?>
<?php echo $message;?>

       <form class="form-horizontal" action="<?php echo site_url('distribusi/kendaraan/tambah_kendaraan/'); ?>" method="POST" enctype="multipart/form-data"><br><br>
       <div class="form-group">
        <label class="col-lg-2 control-label">Kode Kendaraan</label>
        <div class="col-lg-3">
            <input name="id_kendaraan" type="text" value="<?php echo $id_kendaraan;?>" class="form-control"  >
        </div>
		</div>
		
		<!--<div class="form-group">
		<label class="col-lg-2 control-label">Jenis Truk</label>
		<div class="col-lg-3">
			<select name="poli" class="form-control">
					<option>--jenis truk--</option>
					<option value="puso">Puso</option>
					<option value="kontainer">Kontainer</option>
					
			</select>
		</div>
		</div>-->
		
        <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Truk</label>
        <div class="col-lg-3">
             <input type="radio" name="jenis_truk" value="Puso"> Puso
			<input type="radio" name="jenis_truk" value="kontainer"> Kontainer
        </div>
		</div>
		
		<!--<div class="form-group">
        <label class="col-lg-2 control-label">Kapasitas </label>
        <div class="col-lg-3">
             <input type="radio" name="kapasitas" value="6000 kg"> 6 ton <br>
			<input type="radio" name="kapasitas" value="14000 kg"> 14 ton
        </div>
		</div>-->
		
		<div class="form-group">
        <label class="col-lg-2 control-label"> Nomor Kendaraan </label>
        <div class="col-lg-3">
            <input name="plat" type="text" class="form-control" placeholder="Nomor Kendaraan">
        </div>
		</div>
		
		<div class="form-group">
        <label class="col-lg-2 control-label">Nama Awal Sopir </label>
        <div class="col-lg-3">
            <input name="nama_awal_sopir" type="text" class="form-control" placeholder="Nama Awal Sopir" >
        </div>
		</div>
		<div class="form-group">
        <label class="col-lg-2 control-label">Nama Akhir Sopir </label>
        <div class="col-lg-3">
              <input name="nama_akhir_sopir" type="text" class="form-control" placeholder="Nama Akhir Sopir">
        </div>
		</div>
		<div class="form-group">
        <label class="col-lg-2 control-label">No. Telepon </label>
        <div class="col-lg-3">
              <input name="no_tlp" type="text" class="form-control" placeholder="No Telepon"> 
        </div>
		</div>	
		
		<div class="form-group well">
		<center>
				<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('distribusi/kendaraan');?>" class="btn btn-primary">Kembali</a>
		</center>
		</div>
       </form>
      </div>
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
