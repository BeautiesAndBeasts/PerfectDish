<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        
        <style>
            
        .background-wrap{
                position : fixed;
                z-index : -1000;

                height : 100%;
                width : 100%;
                overflow : hidden;
                top : 50px;
                left : 0;
        }
        #video-bg-elem{
                position : absolute;
                top : 0;
                left : 0;
                min-height : 100%;
                min-width : 100%;
        }
        </style>
	<title>Perfect Dish</title>

	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>
<body>
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Trazite najbolje recepte na internetu ?    -Na pravom ste mestu 
          Perfect Dish</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              
      
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br/><br/><br/>
    <div class ="col-sm-4 ">
     <?php echo validation_errors(); ?>
   <?php echo form_open('LoginController/index'); ?>
                
                  <div class="form-group">
                      <div class="col-md-8">
                        <label for="korisnickoIme" class="control-label">Korisnicko Ime</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" name="korisnickoIme" placeholder="Korisnicko Ime" type="text" value="<?php echo set_value('name'); ?>" />
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                </div>
                
                
                
                  <div class="form-group">
                      <div class="col-md-8">
                        <label for="lozinka" class="control-label">Lozinka</label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" class="form-control" name="lozinka" placeholder="Lozinka" type="text" value="<?php echo set_value('name'); ?>" />
                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                    </div>
                </div>
        
                 <div class="form-group">
                    <div class="col-md-12">
                        <br/>
                        <input name="submit" type="submit" class="btn btn-primary" value="Login" />
                        &nbsp;&nbsp;
                        <a href="http://localhost/perfectdish/index.php/RegistrationController/index" class="btn btn-primary">Registracija</a>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-12">
                        <?php
                            $this->load->helper("url");
                            if(!empty($poruke))
                            {
                                echo "<font color = 'red'>".$poruke."</font>";
                            }
                        ?>
                    </div>
                 </div>
     <?php echo form_close(); ?> 
        
    </div>
    
     <div class = "background-wrap">
		<video id = "video-bg-elem" preload = "auto" autoplay = "true" loop = "loop" >
			<source src="assets/backgroundVideo.mp4" type = "video/mp4">
			Video not supported
                </video>
     </div>
    
   


    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.12.3.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>