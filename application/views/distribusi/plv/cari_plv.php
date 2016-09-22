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
              <li class="active"><a href="<?php echo site_url('ppic/home');?>"><b>Home</b></a></li></b> 
            </ul>
	</div>
	</div>
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
<center><h2>Data JRP</h2></center><br>
<div class="container">
<!--<?php echo $message;?>-->

<table class="table table-striped table-bordered">
    <thead>
            <th><center>No.</center></th>
            <th><center>Kode JRP</center></th>
			<th><center>Ship Date</center></th>
			<th><center>Sales Order</center></th>
			<th><center>Delivery Name</center></th>
			<th><center>Delivery City</center></th>
            <th><center>Delivery Address</center></th>
			<th><center>Item</center></th>
			<th><center>Type</center></th>
			<th><center>Quality</center></th>
            <th><center>Delivery Remender</center></th>
			<th><center>Delivery Now</center></th>
			<th><center>Tonase</center></th>
            <th><center>Aksi</center></th>
		</thead>
		
    <tr>
    <?php $no=0; foreach($tb_jrp as $row ): $no++;?> 
        <td><center><?php echo $no;?></center></td>
        <td><center><?php echo $row->id_jrp;?></center></td>
		<td><center><?php echo $row->ship_date;?></center></td>
		<td><center><?php echo $row->sales_order;?></center></td>
		<td><center><?php echo $row->delivery_name; ?></center></td>
		<td><center><?php echo $row->delivery_city;?></center></td>
		<td><center><?php echo $row->delivery_address;?></center></td>
		<td><center><?php echo $row->item;?></center></td>
		<td><center><?php echo $row->type; ?></center></td>
		
		<td><center><?php echo $row->quality;?></center></td>
		<td><center><?php echo $row->delivery_remender; ?></center></td>
		<td><center><?php echo $row->delivery_now;?></center></td>
		<td><center><?php echo $row->tonase;?></center></td>
	
	<td border="0">
     <a href="<?php echo site_url('ppic/jrp/edit_jrp/'.$row->id_jrp); ?>"><span class="label label-default">Edit</span></a>|<a href="#" onClick="if(confirm('Anda yakin HAPUS data ini? ')){document.location='<?php echo site_url('ppic//hapus_jrp/'.$row->id_jrp);?>'}" ><span class="label label-primary">Hapus</span></a>
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