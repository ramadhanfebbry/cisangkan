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
<body>
<img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%">

<div class="navbar navbar-default">
	<div id="navbar" class="navbar-collapse collapse"> 
            <ul class="nav navbar-nav">
			  <li class=""><a href="<?php echo site_url('super/home'); ?>"><b>Home</b></a></li></b> 
              <li class="active"><a href=""><b>Data User</b></a></li></b> 
              <li class=""><a href="<?php echo site_url('super/user/tambahUser');?>"><b>Tambah User</a></li></b>
            </ul>
			<ul class="nav navbar-nav navbar-right">
				<li class= "dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <b> Hai <?php echo $this->session->userdata('nama_awal'); ?> </b> <span class="caret"></span></a>
				<ul class="dropdown-menu">
				   <li><a href="#">Setting Akun</a></li>
                  <li><a href="<?php echo site_url('login/logout/'.$this->session->userdata("nama_awal"));?>" onclick="javascript: return confirm('Anda yakin akan keluar?')" class="">Logout</a></li>
                </ul>
              </li>
            </ul>
			<!--<ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo site_url('login/logout/'.$this->session->userdata("nama_awal"));?>" onclick="javascript: return confirm('Anda yakin akan keluar?')" class="btn btn-danger"><b>Logout</b></a></li>
            </ul>-->
	</div>
</div>
	<legend>
	 <center><h1><b>SISTEM DISTRIBUSI BARANG<b><h1></center>
   </legend>
<?php echo $message;?><br>
<center><h2><b>Data User</b></h2></center><br>
<div class="container">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th><center>No.</center></th>
            <th><center>Username</center></th>
			<th><center>Nama User </center></th>
			<th><center>Level</center></th>
            <th><center>Aksi</center></th>
        </tr>
		</thead>
		<?php $no=0; 
		foreach($tb_user as $row): $no++;?>
    <tr>
        <td><center><?php echo $no;?></center></td>
        <td><center><?php echo $row->username;?></center></td>
		
		<td> <center><?php 
                $nama_awal = $row->nama_awal;
                $nama_akhir = $row->nama_akhir;
                echo $nama_awal." ".$nama_akhir;
            ?></center>
		</td>
		<!--<td><center><?php echo $row->nama_awal;?></center></td>
		<td><center><?php echo $row->nama_akhir;?></center></td>-->
		<td><center><?php echo $row->level; ?></center></td>
		<td border="0"><center><a href="<?php echo site_url('super/user/edit/'.$row->username);?>"><span class="label label-default">Ubah</span></a> 
		| <a href="<?php echo site_url('super/user/hapus/'.$row->username);?>"onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')"><span class="label label-primary">Hapus</span></a></center></td>
	</tr>
    <?php endforeach;?>
</table>
<?php echo $pagination;?>
</div>
</html>