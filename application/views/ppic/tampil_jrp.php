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
			  <li class=""><a href="<?php echo site_url('ppic/home'); ?>"><b>Home</b></a></li></b> 
              <li class="active"><a href="<?php echo site_url('ppic/jrp');?>"><b>Data JRP</b></a></li></b> 
              <li class=""><a href="<?php echo site_url('ppic/jrp/tambah/');?>"><b>Tambah JRP</a></li></b>
            
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
</div><br>

<legend>
	 <center><h2><b>SISTEM DISTRIBUSI BARANG<b></h2></center>
 </legend>
<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('ppic/jrp/cari');?>" method="post">
        <div class="form-group">
           
            <input type="text" class="form-control" placeholder="Cari ID JRP " name="cari">
        </div>
        <button type="submit" class="btn btn-primary"> Cari</button>
    </form>
</div> 

<br><br>
<center><h3><b>Data Jadwal Perencanaan Pengiriman</b></h3></center><br>
<div class="container">
<?php echo $message;?>

<table class="table table-striped table-bordered">
    <thead>
            <th><center>No.</center></th>
            <th><center>Kode JRP</center></th>
			<th><center>Ship Date</center></th>
			<th><center>Sales Order</center></th>
			<th><center>Delivery Name</center></th>
			<th><center>Delivery City</center></th>
            <th><center>Delivery Address</center></th>
			<th><center>Code Barang</center></th>
			<th><center>Type</center></th>
			<th><center>Color</center></th>
			<th><center>Quantity</center></th>
            <th><center>Delivery Remender</center></th>
			<th><center>Delivery Now</center></th>
			<th><center>Tonase</center></th>
            <th colspan ="2"><center>Aksi</center></th>
		</thead>
		
	<tr>
		<?php $no=1; 
		foreach($tb_jrp ->result() as $row){
		?>
  
		<td><?php echo $this->session->userdata('row')+$no; ?></td>
        <td><center><?php echo ucwords ($row->id_jrp);?></center></td>
		<!--<td><?php echo date("d M Y",strtotime($row->ship_date)); ?></td>-->
		<td><center><?php echo ($row->ship_date);?></center></td>
		<td><center><?php echo ucwords ($row->sales_order);?></center></td>
		<td><center><?php echo ucwords ($row->delivery_name); ?></center></td>
		<td><center><?php echo ucwords ($row->delivery_city);?></center></td>
		<td><center><?php echo ucwords ($row->delivery_address);?></center></td>
		<td><center><?php echo ucwords ($row->id_barang);?></center></td>
		<td><center><?php echo ucwords ($row->type);?></center></td>
		<td><center><?php echo ucwords ($row->warna);?></center></td>
		<td><center><?php echo ucwords ($row->quantity);?></center></td>
		<td><center><?php echo ucwords ($row->delivery_remender); ?></center></td>
		<td><center><?php echo ucwords ($row->delivery_now);?></center></td>
		<td><center><?php echo ucwords ($row->tonase);?></center></td>
		<td border="0"><center>
			<a href="<?php echo site_url('ppic/jrp/edit_jrp/'.$row->id_jrp);?>"><span class="label label-default">Ubah</span></a>|<a href="#" onClick="if(confirm('Anda yakin akan menghapus data ini? ')){document.location='<?php echo site_url('ppic/jrp/hapus_jrp/'.$row->id_jrp);?>'}" ><span class="label label-primary">Hapus</span></a> </center>
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
  <script src="<?php echo base_url('asset/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/hovernav/hovernav.js'); ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap_datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('asset/tinymce_4_1_6/js/tinymce/tinymce.min.js'); ?>"></script>
  </div>
</html>