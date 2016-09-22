<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
      <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('asset/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('asset/css/plugins/timeline/timeline.css');?>" rel="stylesheet">    
        
            <script src="<?php echo base_url('aseet/js/jquery.alerts.js');?>"</script>
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            
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
	 <center><h3><b>Ubah Retur Delivery Order<b></h3></center>
 </legend>
<?php echo validation_errors();?>
<?php echo $message;?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><br><br>
     <div class="form-group">
        <label class="col-lg-2 control-label">Kode RDO</label>
        <div class="col-lg-3">
            <input name="id_rdo"type="text"  class="form-control" value="<?php echo $tb_rdo['id_rdo'];?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"> Date</label>
        <div class="col-lg-3">
            <input name="date_rdo" type="text"  class="form-control" value="<?php echo $tb_rdo['date_rdo'];?>" readonly>
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Kode DO</label>
        <div class="col-lg-3">
            <input name="id_do" type="text"  class="form-control" value="<?php echo $tb_rdo['id_do'];?>">
        </div>
    </div>
	
    <div class="form-group well">
		<center>
			<button class="btn btn-primary">Update</button>
			<a href="<?php echo site_url('distribusi/rdo');?>" class="btn btn-primary">Kembali</a>
			
		</center>
	</div>
</form>
</html>