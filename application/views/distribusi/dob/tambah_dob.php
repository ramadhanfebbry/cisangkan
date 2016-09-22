<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
     <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css');?>" />
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            
	 
	<!--<link rel="stylesheet" href="<?php echo base_url('asset/js/jquery-ui.css');?>" />
    <script src="<?=base_url('asset/js/jquery-1.9.1.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('asset/js/jquery-ui.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('asset/js/jquery-ui.js');?>" type="text/javascript"></script>
    <script>
     
    // $((function()  {
        // $("#kode").autocomplete({ 
            // source:"<?php echo site_url('distribusi/plv/packing'); ?>",
            // select:function(event, ui){
                // $('#id_kendaraan').val(ui.item.id_kendaraan);
                // $('#jenis_truk').val(ui.item.jenis_truk);
				 // $('#plat').val(ui.item.plat);
                // $('#nama_awal').val(ui.item.nama_awal);
                // $('#nama_akhir').val(ui.item.nama_akhir);
				 // $('#no_tlp').val(ui.item.no_tlp);
                // }
            // });
        // });
    </script>-->
  </head>
<body>
	<img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%">
	<div class="navbar navbar-default">
		<div id="navbar" class="navbar-collapse collapse"> 
            <ul class="nav navbar-nav">
			  <li class=""><a href="<?php echo site_url('distribusi/home'); ?>"><b>Home</b></a></li></b> 
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
	 <center><h3><b>Tambah Daftar Delivery Order<b></h3></center>
 </legend>
<?php echo validation_errors();?>
<?php echo $message;?>

 <form class="form-horizontal" action="<?php echo site_url('distribusi/dob/tambah_dob/'); ?>" method="POST" enctype="multipart/form-data"><br><Br>
<div class="form-group">
        <label class="col-lg-2 control-label">Kode DO</label>
        <div class="col-lg-3">
            <input name="id_do" type="text" value="<?php echo $id_do;?>" class="form-control" readonly >
        </div>
		</div>
		<div class="form-group">
		<label class="col-lg-2 control-label">Date</label>
        <div class="col-lg-3">
            <input name="date_do" type="text" value="<?php echo $date;?>" class="form-control" readonly >
        </div>
		</div>
		<div class="form-group">
        <label class="col-lg-2 control-label">Kode PLV</label>
        <div class="col-lg-3">
			<input name="id_plv" type="text" id="id_plv"  value="" class="form-control" placeholder="ketik kode PLV" > 
	   </div>
		</div>
		
		<div class="form-group well">
			<center>
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('distribusi/dob');?>" class="btn btn-primary" >Kembali</a>
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
</html>