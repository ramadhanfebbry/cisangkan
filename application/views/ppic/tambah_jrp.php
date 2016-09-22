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
	<!--<link rel="stylesheet" href="<?php echo base_url('asset/js/jquery-ui.css');?>" />
			<script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
			<script src="<? echo  base_url('asset/js/jquery-1.9.1.js');?>" type="text/javascript"></script>
			<script src="<? echo base_url('asset/js/jquery-ui.min.js');?>" type="text/javascript"></script>
			<script src="<? echo base_url('asset/js/jquery-ui.js');?>" type="text/javascript"></script>-->
			
			<script>
			$(document).ready(function(){
			$("#kode").autocomplete({ 
				source:'<?php echo site_url('ppic/jrp/barang'); ?>',
				select:function(event, ui){
					$('#type').val(ui.item.type);
					$('#unit').val(ui.item.unit);
					$('#warna').val(ui.item.warna;
					$('#berat').val(ui.item.berat);
					$('#warehouse').val(ui.item.warehouse);
				   }
            });
			
        });
    </script>
		
	
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
	 <center><h3><b>Tambah Jadwal Perencanaan Pengiriman<b></h3></center>
 </legend>
<?php echo validation_errors();?>
<?php echo $message;?>
      <form class="form-horizontal" action="<?php echo site_url('ppic/jrp/tambah_jrp/'); ?>" method="POST" enctype="multipart/form-data"><br><br>
       <div class="form-group">
		  <label class="col-lg-2 control-label">kode JRP</label>
             <div class="col-lg-3">
               <input name="id_jrp" type="text"  value="<?php echo $id_jrp;?>"class="form-control" readonly >
            </div>
		</div>
		
		<div class="form-group">
        <label class="col-lg-2 control-label">Ship Date</label>
        <div class="col-lg-3">
            <input name="ship_date" type="date"  class="form-control" placeholder="yyyy/mm/dd">
        </div>
		</div>
         
        <div class="form-group">
        <label class="col-lg-2 control-label">Sales Order</label>
        <div class="col-lg-3">
             <input type="radio" name="sales_order" value="Soba"> Sales Order Bandung
			<input type="radio" name="sales_order" value="Soja"> Sales Order Jakarta
        </div>
		</div>
		
		<div class="form-group">
        <label class="col-lg-2 control-label">Delivery Name</label>
        <div class="col-lg-3">
            <input name="delivery_name" type="text" class="form-control" placeholder="Delivery Name" >
        </div>
		</div>
		
		<div class="form-group">
        <label class="col-lg-2 control-label">Delivery City</label>
        <div class="col-lg-3">
              <input name="delivery_city" type="text" class="form-control"placeholder="Delivery City" >
        </div>
		</div>
		
		<div class="form-group">
        <label class="col-lg-2 control-label">Delivery Address</label>
        <div class="col-lg-3">
              <textarea name="delivery_address" type="text" class="form-control" >  </textarea>
        </div>
		</div>	
		
		<div class="form-group">
        <label class="col-lg-2 control-label">Kode Barang</label>
        <div class="col-lg-3">
			   <input type="text" name="id_barang" id="kode" value="" class="form-control" placeholder="Masukkan id barang">
        </div>
		</div>	
		
		<div class="form-group">
        <label class="col-lg-2 control-label">Type</label>
        <div class="col-lg-3">
             <input name="type" type="text" id="type"  class="form-control" readonly >
        </div>
		</div>	
		
		<div class="form-group">
        <label class="col-lg-2 control-label">Warna</label>
        <div class="col-lg-3">
             <input name="warna" type="text" id="warna"   class="form-control" readonly >
        </div>
		</div>

		<div class="form-group">
        <label class="col-lg-2 control-label">Quantity</label>
        <div class="col-lg-3">
              <input name="quantity" type="text" class="form-control" placeholder="Quantity">
        </div>
		</div>	
		
		
		<!--<div class="form-group">
        <label class="col-lg-2 control-label">Tonase</label>
        <div class="col-lg-3">
              <input name="tonase" type="text" class="form-control"readonly>
        </div>
		</div>-->
		
		<div class="form-group well">
		<center>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('ppic/jrp');?>" class="btn btn-primary">Kembali</a>
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
