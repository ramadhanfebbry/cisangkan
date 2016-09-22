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
            <script src="<?php echo base_url('asset/js/tinymce/tinymce.min.js');?>"></script>
            <script>
                    tinymce.init({selector:'textarea'});
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
	
	<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('distribusi/kendaraan/cari');?>" method="post">
        <div class="form-group">
           
            <input type="text" class="form-control" placeholder="Cari ID Kendaraan " name="cari">
        </div>
        <button type="submit" class="btn btn-primary"> Cari</button>
    </form>
</div> 

<br><br>
<center><h2>Data Kendaraan</h2></center><br>
<div class="container">
<!--<?php echo $message;?>-->

<table class="table table-striped table-bordered">
    <thead>
            <th><center>No.</center></th>
            <th><center>Kode Kendaraan</center></th>
			<th><center>Jenis Truk</center></th>
			<th><center>Nomor Kendaraan</center></th>
			<!--<th><center>Kapasitas</center></th>-->
			<th><center>Nama Awal Kendaraan </center></th>
			<th><center>Nama Akhir Kendaraan </center></th>
			<th><center>No. Telepon</center></th>
            <th><center>Aksi</center></th>
		</thead>
		
    <tr>
    <?php $no=0; foreach($tb_kendaraan as $row ): $no++;?> 
        <td><center><?php echo $no;?></center></td>
        <td><center><?php echo $row->id_kendaraan;?></center></td>
		<td><center><?php echo $row->jenis_truk;?></center></td>
		<td><center><?php echo $row->plat;?></center></td>
		<!--<td><center><?php echo $row->kapasitas;?></center></td>-->
		<td><center><?php echo $row->nama_awal_sopir;?></center></td>
		<td><center><?php echo $row->nama_akhir_sopir; ?></center></td>
		<td><center><?php echo $row->no_tlp;?></center></td>
		
	<td border="0">
     <a href="<?php echo site_url('distribusi/kendaraan/edit_kendaraan/'.$row->id_kendaraan); ?>"><span class="label label-default">Ubah</span></a>|<a href="#" onClick="if(confirm('Anda yakin HAPUS data ini? ')){document.location='<?php echo site_url('distribusi//hapus_kendaraan/'.$row->id_kendaraan);?>'}" ><span class="label label-primary">Hapus</span></a>
    </td>
   </tr>
    <?php endforeach;?>
  </table>
  
	<?php echo $message;?>
 
  <div class="pagination">
	<ul>
		<?php echo $this->pagination->create_links(); ?>
	</ul>
  </div>

  <div>
    <div class="span2">
		<footer>
			<p><center>Copyright &copy; Kerja Praktik UNJANI 2016</center></p>
		</footer>
	</div>
  </div>
</center>
</div>
</html>