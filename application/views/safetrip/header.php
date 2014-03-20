<!DOCTYPE html>
<html lang="en">
  
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Safe Trip</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo(CSS.'bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo(CSS.'bootstrap-datetimepicker.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo(CSS.'font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo(CSS.'webapps.css'); ?>">
    <link rel="stylesheet" href="<?php echo(CSS.'jquery-ui-1.10.4.custom.css'); ?>">
    <link href='http://fonts.googleapis.com/css?family=Lemon' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <div class="navbar navbar-inverse navbar-maincolor navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/safetrip"><img src="<?php echo(IMG.'safetrip_logo.png'); ?>" style="margin: 0px; height: 100%" /></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right pull-left-mobile">
            <li><a href ="<?php echo base_url('index.php/statistics');?>">Statistics</a></li>
            <!-- li><a href="#about">About</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="#contact">FAQs</a></li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
</head>
<body>
</html>