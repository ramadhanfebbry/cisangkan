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
	 <center><h3><b>Tambah Packing List<b></h3></center>
 </legend>
<?php echo validation_errors();?>
<?php echo $message;?>
       <form class="form-horizontal" action="<?php echo site_url('distribusi/plv/tambah_plv/'); ?>" method="POST" enctype="multipart/form-data"><br><br>
        <div class="form-group">
		<label class="col-lg-2 control-label">Kode PLV</label>
			<div class="col-lg-3">
				<input name="id_plv" type="text" value="<?php echo $id_plv;?>" class="form-control" readonly >
			</div>
		</div>
		
		<div class="form-group">
		<label class="col-lg-2 control-label">Date</label>
			<div class="col-lg-3">
				<input name="date_plv" type="text" value="<?php echo $date;?>" class="form-control" readonly >
			</div>
		</div>
         
        <div class="form-group">
        <label class="col-lg-2 control-label">Kode JRP</label>
			<div class="col-lg-3">
				<input name="id_jrp" type="hidden"> 
        <input name="id_jrp_text" type="text"  class="form-control" placeholder="Masukkan kode Jrp" > 
			</div>
		</div>
		
		<div class="form-group">
		<label class="col-lg-2 control-label">Kode Car</label>
			<div class="col-lg-3">
				<input type="text" name="id_kendaraan" class="form-control" placeholder="Masukkan kode kendaraan">
			</div>
		</div>
		
		<!--<div class="form-group">
        <label class="col-lg-2 control-label">Quantity Confirm</label>
			<div class="col-lg-3">
				<input name="quantity_confirm" type="text"  class="form-control" placeholder="Quantity Confirm diinput oleh bag gudang" Readonly> 
			</div>
		</div>
		
		<div class="form-group">
		<label class="col-lg-2 control-label">Delivery Remender</label>
			<div class="col-lg-3">
				<input name="delivery_remender" type="text"  class="form-control" placeholder="Delivery Remender diinput oleh bag gudang" Readonly>
			</div>
		</div>-->
	
		
		<div class="form-group well">
		<center>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo site_url('distribusi/plv');?>" class="btn btn-primary">Kembali</a>
		</center>
		</div>
       </form>
      </div>
  <div>
<center>
   <div class="span2">
   <footer>
		<p><center>Copyright &copy; Kerja Praktik UNJANI 2016</center></p>
   </footer>
   </div>
</center>
</div>
<script>
     $(function () {
       var projects = [
      {
        value: "jquery",
        label: "jQuery",
        desc: "the write less, do more, JavaScript library",
        icon: "jquery_32x32.png"
      },
      {
        value: "jquery-ui",
        label: "jQuery UI",
        desc: "the official user interface library for jQuery",
        icon: "jqueryui_32x32.png"
      },
      {
        value: "sizzlejs",
        label: "Sizzle JS",
        desc: "a pure-JavaScript CSS selector engine",
        icon: "sizzlejs_32x32.png"
      }
    ];
      $.get('<?php echo site_url('distribusi/dob/getJrp'); ?>', function(data){
        // window.ex = data;
      $("input[name='id_jrp_text']").autocomplete({
      minLength: 0,
      source: JSON.parse(data),
      focus: function( event, ui ) {
        $("input[name='id_jrp_text']").val( ui.item.label );
        return false;
      },
      select: function( event, ui ) {
        $("input[name='id_jrp_text']").val( ui.item.label );
        $("input[name='id_jrp']").val( ui.item.value );
        
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label + "</div>" )
        .appendTo( ul );
    };
        
        });
      });
    </script>
  
</html>
