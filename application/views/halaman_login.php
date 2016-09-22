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
        
            
            <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
            <script src="<?php echo base_url('asset/js/tinymce/tinymce.min.js');?>"></script>
            <script>
                    tinymce.init({selector:'textarea'});
            </script>
</head>
<body>
<?php echo $message;?>
 <img src="<?php echo base_url('asset/img/logo2.jpg');?>" height="145px" width="40%"> 
 <div class="navbar navbar-default">
	<div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo site_url('home');?>"><b>Home</b></a></li></b> 
		</ul>
	</div>
</div>

    
			<div class="container">
                <div class="row">
                    <div>
                        <legend><center><h2>Selamat Datang di Sistem Distribusi Barang</h2></center></legend>
                    </div>
					<div>
                        <center><h4>Login</h4></center>
                    </div>
				</div>
			</div>
			
			<div class="container">
			  <div class="row">               
				<div class="col-sm-offset-4 col-lg-4 col-sm-4 well">
                            <form action="<?php echo site_url('login/proses_login');?>" method="post">
									<div class="text-center">
										<?php $pesan = $this->session->flashdata('pesan');
											if(isset($pesan)){
												echo $pesan;
										}?>	
									</div>
							
							<div class="form-group">
							   <div class="row colbox">
									<div class="col-lg-4 col-sm-4">
										<label class="control-label">Username</label>
									</div>
									<div class="col-lg-8 col-sm-8">
										<input type="text" name="username" class="form-control" placeholder="Username"/>  
									</div>
							   </div>
							</div>
       
						   <div class="form-group">
							   <div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									<label class="control-label">Password</label>
								</div>
								<div class="col-lg-8 col-sm-8">
								  <input type="password" name="password" class="form-control"  placeholder="Password" />
								</div>
							   </div>
							</div>		
						<!--<center>
							<div class="form-group input-group" >
                                    <label> <b> Username </b></label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="username" class="form-control" placeholder="Username"></input><br>
                            </div>
                            <div class="form-group input-group">
									 <label> <b> Password </b></label>
									 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="password" name="password" class="form-control"  placeholder="Password" />
                            </div>   </center>	-->							
												
							<center><br>
									<input name="login" type="submit" value="Masuk" class="btn btn-primary"></input>
									<input name="reset" type="reset" value="Reset" class="btn btn-primary"></input>
							</center>
                            </form>     
					</div>                              
				</div>
			</div>
            
         
            <script src="<?php echo base_url('assets/js/jquery-1.10.2.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
 <div class="panel-footer">	   
 <div class="footer">
        <p><center>Copyright &copy; Kerja Praktik UNJANI 2016</center></p>
    </div>		
	
 	
</body>
</html>