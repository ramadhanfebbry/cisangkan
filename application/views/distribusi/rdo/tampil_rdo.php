<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Distribusi barang di PT. Cisangkan</title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/cisangkan.jpg');?>" />
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
          
            <script src="<?php echo base_url('aseet/js/jquery.alerts.js');?>"</script>
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
	
</head>
<body>
<img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%">
<div class="navbar navbar-default">
	<div id="navbar" class="navbar-collapse collapse"> 
            <ul class="nav navbar-nav">
			  <li class=""><a href="<?php echo site_url('distribusi/home'); ?>"><b>Home</b></a></li></b> 
              <li class="active"><a href="#"><b>Data RDO</b></a></li></b> 
              <li class=""><a href="<?php echo site_url('distribusi/rdo/tambah/');?>"><b>Tambah RDO</a></li></b>
            </ul>
	</div>
</div>

<legend>
	 <center><h2><b>SISTEM DISTRIBUSI BARANG<b></h2></center>
 </legend>
<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('distribusi/rdo/cari');?>" method="get">
        <div class="form-group">
           
            <input type="text" class="form-control" placeholder="Cari ID RDO " name="cari">
        </div>
        <button type="submit" class="btn btn-primary"> Cari</button>
    </form>
</div> 

<br><br>
<center><h3><b>Data Retur Delivery Order </b></h3></center><br>
<div class="container">
<?php echo $message;?>

<table class="table table-striped table-bordered">
    <thead>
            <th><center>No.</center></th>
            <th><center>Kode RDO</center></th>
			<th><center>Date</center></th>
			<th><center>Kode DO</center></th>
			
            <th colspan ="2"><center>Aksi</center></th>
		</thead>
		
	<tr>
		<?php $no=1; 
		foreach($tb_rdo ->result() as $row){
		?>
  
		<td><center><?php echo $this->session->userdata('row')+$no; ?></center></td>
        <td><center><?php echo ucwords ($row->id_rdo);?></center></td>
		<td><center><?php echo date("d M Y",strtotime($row->date_rdo)); ?></center></td>
		<td><center><?php echo ucwords ($row->id_do);?></center></td>
		<td border="0"><center>
			<a href="<?php echo site_url('distribusi/rdo/edit_rdo/'.$row->id_rdo);?>"><span class="label label-default">Ubah</span></a>|<a href="#" onClick="if(confirm('Anda yakin akan menghapus data ini? ')){document.location='<?php echo site_url('distribusi/rdo/hapus_rdo/'.$row->id_rdo);?>'}" ><span class="label label-primary">Hapus</span></a> </center>
		</td>
	</tr>
    <?php 
	$no++;
	}
	?>
</table>
<div calss = "pagination">
 <ul>
    <?php echo $this->pagination->create_links(); ?>
   </ul>
  </div>
  <hr />
  <div>
   <div class="span2">
   <footer>
  <p><center>Copyright &copy; Kerja Praktik UNJANI 2016</center></p>
   </footer>
   </div>
  </div><br />
  </center>
  </div>
</html>