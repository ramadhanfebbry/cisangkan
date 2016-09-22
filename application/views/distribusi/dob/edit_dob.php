<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
       <link href="<?php echo base_url('asset/css/jquery-ui.css');?>" rel="stylesheet">
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
                 <script src="<?php echo base_url('asset/js/jquery-ui.min.js');?>"></script>
       
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
	 <center><h3><b>Ubah Data Delivery Order<b></h3></center>
 </legend>
<?php echo validation_errors();?>
<?php echo $message;?>
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data"><br><br>
<div class="form-group">
        <label class="col-lg-2 control-label">Kode DO</label>
        <div class="col-lg-3">
            <input name="id_do" type="text" class="form-control" value="<?php echo $tb_do['id_do'];?>"  readonly >
        </div>
		</div>
		<div class="form-group">
		<label class="col-lg-2 control-label">Date</label>
        <div class="col-lg-3">
            <input name="date_do" type="text" value="<?php echo $tb_do['date_do'];?>" class="form-control" readonly >
        </div>
		</div>
		<div class="form-group">
        <label class="col-lg-2 control-label">Kode PLV</label>
        <div class="col-lg-3">
			<input name="id_plv" type="text"  class="form-control" value="<?php echo $tb_do['id_plv'];?>" > 
	   </div>
		</div>
	
    <div class="form-group well">
		<center>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('distribusi/dob');?>" class="btn btn-primary">Kembali</a>
			
		</center>
	</div>
</form>
<script>
     $(function () {
      
      $.get('<?php echo site_url('distribusi/dob/getPlv'); ?>', function(data){
        
          $("input[name='id_plv']").autocomplete({ source:data });
      },'json');
        
        });
    </script>
    
</html>