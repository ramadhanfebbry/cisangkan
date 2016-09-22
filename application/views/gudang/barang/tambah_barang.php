<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet"/>
    <link href="<?php echo base_url('asset/css/jquery-ui.css');?>" rel="stylesheet">
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            <script src="<?php echo base_url('asset/js/jquery-ui.min.js');?>"></script>
 
    <script type="text/javascript">
    //load datepicker control onfocus
    $(function() {
        // $("#hireddate").datepicker();
    });
    </script>
    
</head>
<body>
 <?php $user_level = $this->session->userdata('level')?>
<img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%">
<div class="navbar navbar-default">
	<div id="navbar" class="navbar-collapse collapse"> 
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo site_url('gudang/home');?>"><b>Home</b></a></li></b> 
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
	 <center><h2><b>Tambah Barang<b><h2></center>
   </legend><br>
		<?php 
		$attributes = array("class" => "form-horizontal", "id" => "pasienform", "name" => "pasienform");
        echo form_open("gudang/barang/tambah_barang", $attributes);?>
        <fieldset>
		
            <div class="form-group">
              <div class="col-lg-2 col-sm-3">
                <label for="kategori" class="control-label">Kategori barang</label>
              </div>
              <div class="col-lg-6 col-sm-6">
                <?php
                 $attributes = 'class = "form-control" id = "kategori" ';
                 echo form_dropdown('kategori',$kategori,set_value(''),$attributes);?>
               </div>
            </div>
            
            <div class="form-group">
              <div class="col-lg-2 col-sm-3">
                <label for="type" class="control-label">Type barang</label>
              </div>
              <div class="col-lg-6 col-sm-6">
                <input id="type" name="type" placeholder="Type barang" type="text" class="form-control"  />  
              </div>
            </div>
			
			<div class="form-group">
              <div class="col-lg-2 col-sm-3">
                <label for="unit" class="control-label">Unit</label>
              </div>
              <div class="col-lg-6 col-sm-6">
                 <select id="unit" name="unit"  placeholder="unit barang" type="text" class="form-control">
					<option value="<?php echo $tb_barang['unit'];?>"> -Pilih Unit barang- </option>
					<option value="pcs">Pcs</option>
					<option value="dus">Dus</option>
				 </select>
              </div>
            </div>
			
			<!--<div class="form-group">
			  <div class="col-lg-2 col-sm-3">
                <label for="unit" class="control-label">Unit</label>
              </div>
              <div class="col-lg-6 col-sm-6">
                <input type="radio" name="unit" value="pcs"> PCS
			    <input type="radio" name="unit" value="dus"> DUS
              </div>
            </div>-->
			
			
			
			<div class="form-group">
			  <div class="col-lg-2 col-sm-3">
                <label for="warna" class="control-label">Warna</label>
              </div>
              <div class="col-lg-6 col-sm-6">
                <input id="warna" name="warna" placeholder="warna barang" type="text" class="form-control" />
              </div>
            </div>
           
		   <div class="form-group">
			  <div class="col-lg-2 col-sm-3">
                <label for="berat" class="control-label">Berat</label>
              </div>
              <div class="col-lg-6 col-sm-6">
                <input id="berat" name="berat" placeholder="berat barang" type="text" class="form-control" />
              </div>
            </div>
            
			<div class="form-group">
			  <div class="col-lg-2 col-sm-3">
                <label for="warehouse" class="control-label">Warehouse</label>
              </div>
              <div class="col-lg-6 col-sm-6">
                <select id="warehouse" name="warehouse" type="text" class="form-control">
					<option value="<?php echo $tb_barang['warehouse'];?>"> -Pilih Warehouse- </option>
					<option value="P-PGD GTG Warna-site">P-PGD GTG Warna-site</option>
					<option value="P-PGD Block-site">P-PGD Block-site</option>
				 </select>
				<!--
				<input type="radio" name="warehouse" value="P-PGD GTG Warna-site"> P-PGD GTG Warna-site 
			    <input type="radio" name="warehouse" value="P-PGD Block-site"> P-PGD Block-site-->
              </div>
            </div>
			
			
			
			<div class="form-group well">
			 <center>
				<button class="btn btn-primary">Simpan</button>
				<a href="<?php echo site_url('gudang/barang');?>" class="btn btn-primary">Kembali</a>
			 </center>
		   </div>
        </fieldset>
        <?php echo form_close(); ?>
		
	<center>
	   <div class="span2">
		<footer>
			<p><center>Copyright &copy; Kerja Praktik UNJANI 2016</center></p>
		</footer>
	   </div>
   </center>
</div>
<script>
     // $(function () {
      $("#kategori").change(function(){
        if ($("input[name='type']").data('uiAutocomplete')) {
          $("input[name='type']").autocomplete("destroy");
        }
            $("input[name='type']").autocomplete({ source: '<?php echo site_url('gudang/barang/get_allTypeBarang'); ?>/'+$("#kategori").val()
      })
      });  
      
    </script>
    
</body>
</html>