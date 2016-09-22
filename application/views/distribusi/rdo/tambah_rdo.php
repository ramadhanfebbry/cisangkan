<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
			
	<link rel="stylesheet" href="<?php echo base_url('asset/js/jquery-ui.css');?>" />
			<script src="<? echo  base_url('asset/js/jquery-1.9.1.js');?>" type="text/javascript"></script>
			<script src="<? echo base_url('asset/js/jquery-ui.min.js');?>" type="text/javascript"></script>
			<script src="<? echo base_url('asset/js/jquery-ui.js');?>" type="text/javascript"></script>
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
              <li class="active"><a href="<?php echo site_url('distribusi/home');?>"><b>Home</b></a></li></b> 
            </ul>
	</div>
	</div>
</div>

<legend>
	 <center><h3><b>Tambah Retur Delivery Order<b></h3></center>
 </legend>
<?php echo validation_errors();?>
<?php echo $message;?>
       <form class="form-horizontal" action="<?php echo site_url('distribusi/rdo/tambah_rdo/'); ?>" method="POST" enctype="multipart/form-data"><br><br>
       <div class="form-group">
		  <label class="col-lg-2 control-label">kode RDO</label>
             <div class="col-lg-3">
               <input name="id_rdo" type="text"  value="<?php echo $id_rdo;?>"class="form-control" readonly >
            </div>
		</div>
		
		<div class="form-group">
        <label class="col-lg-2 control-label"> Date</label>
        <div class="col-lg-3">
            <input name="date_rdo" type="text" value="<?php echo $date;?>" class="form-control" readonly>
        </div>
		</div>
         
		<div class="form-group">
        <label class="col-lg-2 control-label">Kode DO</label>
        <div class="col-lg-3">
			   <input type="text" name="id_do" id="kode" value="" class="form-control" placeholder="Masukkan id barang">
        </div>
		</div>	
		
		
		<div class="form-group well">
		<center>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('distribusi/rdo');?>" class="btn btn-primary">Kembali</a>
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
