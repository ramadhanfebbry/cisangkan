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
            
 
    <script type="text/javascript">
    //load datepicker control onfocus
    $(function() {
        $("#hireddate").datepicker();
    });
    </script>
            
</head>
<body>
 <?php $user_level = $this->session->userdata('level')?>
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

<div class="container">
  <?php echo validation_errors();?>
  <?php echo $message;?>
   <legend>
	 <center><h2><b>Ubah Barang<b><h2></center>
   </legend><br>

		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
            <div class="col-lg-2 col-sm-3">
                <label for="kategori" class="control-label">Kode Barang</label>
            </div>
            <div class="col-lg-6 ">
				<input type="text" name="id_barang" class="form-control" value="<?php echo $tb_barang['id_barang'];?>" readonly>
            </div>
         </div>
            
		<div class="form-group">
            <div class="col-lg-2 col-sm-3">
                <label for="kategori" class="control-label">Kategori Barang</label>
            </div>
            <div class="col-lg-6 ">
                <?php
                $attributes = 'class = "form-control" id = "kategori" disabled';
                echo form_dropdown('kategori',$kategori, $tb_barang['id_kategori'],$attributes);?>
            </div>
        </div>
		
		<div class="form-group">
           <div class="col-lg-2 col-sm-3">
                <label for="type" class="control-label">Type barang</label>
           </div>
           <div class="col-lg-6">
				<input type="text" name="type" class="form-control" value="<?php echo $tb_barang['type'];?>" >
            </div>
        </div>
		
		<div class="form-group">
           <div class="col-lg-2 col-sm-3">
                <label for="unit" class="control-label">Unit</label>
           </div>
            <div class="col-lg-6 col-sm-6">
                 <select id="unit" name="unit"  type="text" class="form-control"value="<?php echo $tb_barang['unit'];?>">
					<option value="<?php echo $tb_barang['unit'];?>"> </option>
					<option value="pcs">Pcs</option>
					<option value="dus">Dus</option>
				 </select>
            </div>
        </div>
		
		<div class="form-group">
			  <div class="col-lg-2 col-sm-3">
                <label for="warna" class="control-label">Warna</label>
              </div>
              <div class="col-lg-6 ">
                <input  name="warna"  type="text" class="form-control" value="<?php echo $tb_barang['warna'];?>">
              </div>
            </div>
           
		   <div class="form-group">
			  <div class="col-lg-2 col-sm-3">
                <label for="berat" class="control-label">Berat</label>
              </div>
              <div class="col-lg-6 ">
                <input  name="berat"  type="text" class="form-control" value="<?php echo $tb_barang['type'];?>">
              </div>
            </div>
            
			<div class="form-group">
			  <div class="col-lg-2 col-sm-3">
                <label for="warehouse" class="control-label">Warehouse</label>
              </div>
              <div class="col-lg-6 ">
                <select name="unit"  type="text" class="form-control" value="<?php echo $tb_barang['warehouse'];?>">
					<option value="<?php echo $tb_barang['warehouse'];?>"> <?php echo $tb_barang['warehouse'];?> </option>
					<option value="P-PGD GTG Warna-site">P-PGD GTG Warna-site</option>
					<option value="P-PGD Block-site">P-PGD Block-site</option>
				 </select>
			  </div>
            </div>
			
			<div class="form-group well">
			 <center>
				<button class="btn btn-primary">Simpan</button>
				<a href="<?php echo site_url('gudang/barang');?>" class="btn btn-primary">Kembali</a>
			 </center>
			</div>
	<center>
	   <div class="span2">
		<footer>
			<p><center>Copyright &copy; Kerja Praktik UNJANI 2016</center></p>
		</footer>
	   </div>
   </center>
 </div>
</html>