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
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('distribusi/rdo/cari');?>" method="post">
        <div class="form-group">
           
            <input type="text" class="form-control" placeholder="Cari ID RDO" name="cari">
    
        </div>
        <button type="submit" class="btn btn-primary"> Cari</button>
    </form>
</div> 

<br><br>
<div class="container">
<?php echo $message;?>
<center><h2>Data Retur Delivery Order</h2></center><br>


<table class="table table-striped table-bordered">
    <thead>
            <th><center>No.</center></th>
            <th><center>Kode RDO</center></th>
			<th><center> Date</center></th>
			<th><center>Sales Order</center></th>
			<th><center>Kode DO</center></th>
            <th><center>Aksi</center></th>
		</thead>
		
    <tr>
    <?php $no=0; foreach($tb_rdo as $row ): $no++;?> 
        <td><center><?php echo $no;?></center></td>
        <td><center><?php echo $row->id_rdo;?></center></td>
		<td><center><?php echo date("d M Y",strtotime($row->date_rdo)); ?></center></td>
		<td><center><?php echo $row->id_do;?></center></td>
		<td><center><?php echo $row->delivery_name; ?></center></td>
	
	<td border="0">
     <a href="<?php echo site_url('distribusi/rdo/edit_rdo/'.$row->id_rdo); ?>"><span class="label label-default">Edit</span></a>|<a href="#" onClick="if(confirm('Anda yakin HAPUS data ini? ')){document.location='<?php echo site_url('distribusi//hapus_jrp/'.$row->id_jrp);?>'}" ><span class="label label-primary">Hapus</span></a>
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