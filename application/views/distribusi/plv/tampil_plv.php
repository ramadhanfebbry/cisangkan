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
			  <li class=""><a href="<?php echo site_url('distribusi/home'); ?>"><b>Home</b></a></li></b> 
				<li class="active"><a href="#"><b>Data Packing List Voucher</b></a></li></b> 
              <li class=""><a href="<?php echo site_url('distribusi/plv/tambah/');?>"><b>Tambah PLV</a></li></b>
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

<legend>
	 <center><h2><b>SISTEM DISTRIBUSI BARANG<b></h2></center>
 </legend>
<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('distribusi/plv/cari');?>" method="post">
        <div class="form-group">
           
            <input type="text" class="form-control" placeholder="Cari ID Plv " name="cari">
        </div>
        <button type="submit" class="btn btn-primary"> Cari</button>
    </form>
</div> 

<br><br>
<center><h3><b>Data Packing List</h3></center><br>
<div class="container">
<?php echo $message;?>

<table class="table table-striped table-bordered">
    <thead>
            <th><center> No. </center></th>
			<th><center> Kode PLV </center></th>
            <th><center> Date </center></th>
			<th><center> Kode JRP </center></th>
			<th><center>Kode Car</center></th>
			<th><center>Quantity Confirm</center></th>	
			<th><center>Delivery  Remender</center></th>	
            <th colspan ="2"><center>Aksi</center></th>
		</thead>
   <tr>
    <?php $no=1; 
     foreach($tb_plv->result() as $row){ 
    ?>
    <td><center> <?php echo $this -> session -> userdata('row')+$no; ?></center> </td>
    <td><center> <?php echo ucwords($row->id_plv); ?></center> </td>
	<td><center> <?php echo date("d M Y",strtotime($row->date_plv)); ?></center> </td>
	<td><center> <?php echo ucwords($row->id_jrp); ?></center> </td>
	 <td><center> <?php echo ucwords($row->id_kendaraan); ?></center> </td>
	<!--
	<td> <center><?php 
                $nama_awal_sopir = $row->nama_awal_sopir;
                $nama_akhir_sopir = $row->nama_akhir_sopir;
                echo $nama_awal_sopir." ".$nama_akhir_sopir;
            ?></center>
		</td>-->
	<td><?php echo ucwords($row->quantity_confirm);?></td>
	<td><?php echo ucwords($row->delivery_remender); ?></td>
   <td border="0"><center>
			<a href="<?php echo site_url('distribusi/plv/edit_plv/'.$row->id_plv);?>"><span class="label label-default">Ubah</span></a></center>
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