<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
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
</div>

<legend>
	 <center><h3><b>Ubah Data kendaraan<b></h3></center>
 </legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><br><br>
     <div class="form-group">
        <label class="col-lg-2 control-label">Kode Kendaraan </label>
        <div class="col-lg-3">
            <input type="text" name="id_kendaraan" class="form-control" value="<?php echo $tb_kendaraan['id_kendaraan'];?>" readonly>
        </div>
    </div>
	
	<div class="form-group">
	  <label class="col-lg-2 control-label">Jenis Truk</label>
	   <div class="col-lg-3">

            <input type="radio" name="jenis_truk" value="puso" required 
				<?php if ($tb_kendaraan['jenis_truk'] == 'puso') {
					echo 'checked';
				}
			?>>Puso</input>
            <input type="radio" name="jenis_truk" value="kontainer" required 
				<?php if ($tb_kendaraan['jenis_truk'] == 'kontainer') {
                    echo 'checked';
                }
            ?>>Kontainer</input>          
		</div>
    </div>
	
	
	<!--<div class="form-group">
        <label class="col-lg-2 control-label">Kapasitas </label>
        <div class="col-lg-3">
            <input type="radio" name="kapasitas" value="6000 kg" required 
				<?php if ($tb_kendaraan['kapasitas'] == '6000 kg') {
					echo 'checked';
				}
			?>>6000 kg</input><br>
            <input type="radio" name="kapasitas" value="14000 kg" required 
				<?php if ($tb_kendaraan['kapasitas'] == '14000 kg') {
                    echo 'checked';
                }
            ?>>14000 kg </input>    
        </div>
    </div>-->
	
	<div class="form-group">
        <label class="col-lg-2 control-label"> Nomor Kendaraan</label>
        <div class="col-lg-3">
            <input type="text" name="plat" class="form-control" value="<?php echo $tb_kendaraan['plat'];?>" readonly>
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Nama Awal Sopir </label>
        <div class="col-lg-3">
            <input type="text" name="nama_awal_sopir" class="form-control" value="<?php echo $tb_kendaraan['nama_awal_sopir'];?>" >
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Nama Akhir Sopir </label>
        <div class="col-lg-3">
            <input type="text" name="nama_akhir_sopir" class="form-control" value="<?php echo $tb_kendaraan['nama_akhir_sopir'];?>">
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">No. Telepon</label>
        <div class="col-lg-3">
            <input name="no_tlp" class="form-control" value="<?php echo $tb_kendaraan['no_tlp'];?>"> 
        </div>
    </div>
	
    <div class="form-group well">
		<center>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('distribusi/kendaraan');?>" class="btn btn-primary">Kembali</a>
			
		</center>
	</div>
</form>
</html>