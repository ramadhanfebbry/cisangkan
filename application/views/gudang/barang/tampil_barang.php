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
			  <li class=""><a href="<?php echo site_url('gudang/home'); ?>"><b>Home</b></a></li></b> 
              <li class="active"><a href="<?php echo site_url('gudang/barang');?>"><b>Data barang</b></a></li></b> 
              <li class=""><a href="<?php echo site_url('gudang/barang/tambah_barang/');?>"><b>Tambah Barang</a></li></b>
            
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class= "dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <b> Hai <?php echo $this->session->userdata('nama_awal'); ?> </b><span class="caret"></span></a>
				<ul class="dropdown-menu">
				   <li><a href="#">Setting Akun</a></li>
                  <li><a href="<?php echo site_url('login/logout/'.$this->session->userdata("nama_awal"));?>" onclick="javascript: return confirm('Anda yakin akan keluar?')" class=""">Logout</a></li>
                </ul>
              </li>
            </ul>
	</div>
</div>

   <legend>
	 <center><h1><b>SISTEM DISTRIBUSI BARANG<b><h1></center>
   </legend><br>
<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('gudang/barang/cari');?>" method="post">
        <div class="form-group">
           
            <input type="text" class="form-control" placeholder="Cari ID Barang " name="cari">
        </div>
        <button type="submit" class="btn btn-primary"> Cari</button>
    </form>
</div>
 <br><br>
 <?php echo $message;?>
	 <center><h3><b>Data Barang</b></h3></center>
<div class="container">

<table class="table table-striped table-bordered">
    <thead>
            <th><center>No.</center></th>
            <th><center>Kode Barang</center></th>
			<th><center>Kategori Barang</center></th>
			<th><center>Type</center></th>
			<th><center>Unit</center></th>
			<th><center>Warna</center></th>
            <th><center>Berat</center></th>
			<th><center>Warehouse</center></th>
            <th colspan ="2"><center>Aksi</center></th>
		</thead>
    <?php $no=1; 
      foreach($barang as $row):
    ?>
	<tr>
		
		<td><?php echo $this->session->userdata('row')+$no; ?></td>
		<td><?php 

      $ci = &get_instance();

      $ci->load->model('m_barang');

      $c = $ci->m_barang->get_id_barang(ucwords($row->id_barang));

      echo $c;
    // echo ucwords($row->id_barang); 

    ?></td>
		<td><?php echo ucwords($row->nm_kategori); ?></td>
		<td><?php echo ucwords($row->type); ?></td>
		<td><?php echo ucwords($row->unit); ?></td>
		<td><?php echo ucwords($row->warna); ?></td>
		<td><?php echo ucwords($row->berat); ?></td>
		<td><?php echo ucwords($row->warehouse); ?></td>    
		<td border="0">
		
		<a href="<?php echo site_url('gudang/barang/edit_barang/'.$row->id_barang); ?>"><span class="label label-primary">Edit</span></a> 
		|
		<a href="#" onClick="if(confirm('Anda yakin haps data ini? ')){document.location='<?php echo site_url('gudang/barang/hapus_barang/'.$row->id_barang);?>'}" ><span class="label label-danger">Hapus</span></a>
		</td>
   </tr>
   <?php 
     $no++;
    ?>
   <?php endforeach;?>
    
</table>
  <!--<div calss = "pagination">
	<ul>
		<?php echo $this->pagination->create_links(); ?>
    </ul>
  </div>-->
 
 <center>
	   <div class="span2">
		<footer>
			<p><center>Copyright &copy; Kerja Praktik UNJANI 2016</center></p>
		</footer>
	   </div>
   </center>
 </div>
  </body>
</html>