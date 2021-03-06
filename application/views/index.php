﻿<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?Php echo $page_title; ?> | <?Php echo $system_title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/header.css" rel="stylesheet" type="text/css" />
   <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url()?>assets/dist/css/skins/skin-green-light.css" rel="stylesheet" type="text/css" />

	<link rel="icon" type="image/png" href="<?=base_url()?>assets/dist/img/centro_medico.ico">
 
	  </head>
  
  <body class="skin-green-light sidebar-mini">    
   
	
  <header>
		<nav class="frame" role="navigation">
			<div class="container-fluid">
				<a href="#" class="brand">
					<img src="<?=base_url()?>assets/dist/img/logo_cmd.fw.png" class="logo" alt="logo"/>
					<small class="text-muted hidden-xs">CENTRO MÉDICO DOCENTE LAS COCUIZAS, C.A.</small>
				</a>
				<div class="buttons pull-right">
				  
				</div>
			</div>
		</nav><!--/.navbar-->
	</header>
	
<!-- Site wrapper -->
    <div class="wrapper">
	
			<?php include 'layouts/header.php'; ?>
			
			<?php include 'layouts/menu.php'; ?>
			
			<?php include $page_name'.php'; ?>
			 
  </body>
</html>


</html>
