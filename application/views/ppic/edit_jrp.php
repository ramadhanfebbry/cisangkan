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
              <li class="active"><a href="<?php echo site_url('ppic/home');?>"><b>Home</b></a></li></b> 
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
	 <center><h2><b>Ubah Jadwal Perencanaan Pengiriman<b></h2></center>
 </legend>
<?php echo validation_errors();?>
<?php echo $message;?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><br>
     <div class="form-group">
		   <label class="col-lg-2 control-label">Kode PLV</label>
			<div class="col-lg-3">
				<input name="id_jrp" type="text" value="<?php echo $tb_jrp['id_jrp'];?>"class="form-control" readonly >
			</div>
	 </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Ship Date</label>
        <div class="col-lg-3">
            <input type="date" name="ship_date" class="form-control" value="<?php echo $tb_jrp['ship_date'];?>" readonly>
        </div>
    </div>
	
	<div class="form-group">
	  <label class="col-lg-2 control-label">Sales Order</label>
	   <div class="col-lg-3">
            <input type="radio" name="sales_order" value="soba" required 
				<?php if ($tb_jrp['sales_order'] == 'Soba') {
					echo 'checked';
				}
			?>>Sales Order Bandung</input>
			
            <input type="radio" name="sales_order" value="soja" required 
				<?php if ($tb_jrp['sales_order'] == 'Soja') {
                    echo 'checked';
                }
            ?>>Sales Order Jakarta</input>          
		</div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Delivery Name</label>
        <div class="col-lg-3">
            <input type="text" name="delivery_name" class="form-control" value="<?php echo $tb_jrp['delivery_name'];?>" >
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Delivery City</label>
        <div class="col-lg-3">
            <input type="text" name="delivery_city" class="form-control" value="<?php echo $tb_jrp['delivery_city'];?>">
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Delivery Address</label>
        <div class="col-lg-3">
            <textarea name="delivery_address" class="form-control"><?php echo $tb_jrp['delivery_address'];?> </textarea>
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Kode Barang</label>
        <div class="col-lg-3">
            <input type="text" name="id_barang" class="form-control" value="<?php echo $tb_jrp['id_barang'];?>">
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Type</label>
        <div class="col-lg-3">
            <type="type" name="type" class="form-control" value="<?php echo $tb_jrp['type'];?>" readonly> 
    </div>
	</div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Warna</label>
        <div class="col-lg-3">
            <type="warna" name="type" class="form-control" value="<?php echo $tb_jrp['warna'];?>" readonly> 
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Quantity</label>
        <div class="col-lg-3">
            <input type="text" name="quantity" class="form-control" value="<?php echo $tb_jrp['quantity'];?>">
        </div>
    </div>
	
	<!--<div class="form-group">
        <label class="col-lg-2 control-label">Tonase</label>
        <div class="col-lg-3">
            <input type="text" name="tonase" class="form-control" readonly>
        </div>
    </div>-->
	
    <div class="form-group well">
		<center>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('ppic/jrp');?>" class="btn btn-primary">Kembali</a>
			
		</center>
	</div>
</form>
</html>