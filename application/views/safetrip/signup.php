<!DOCTYPE html>
<html>
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

        <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'bootstrap.min.css'); ?>">
        <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'bootstrap-datetimepicker.min.css'); ?>">
        <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'font-awesome.min.css'); ?>">
        <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'webapps.css'); ?>">
        <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'jquery-ui-1.10.4.custom.css'); ?>">

        <link href='http://fonts.googleapis.com/css?family=Maven+Pro:700,900|Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
      
        <link media="(min-width : 480px)" href="<?php echo(CSS.'reset.css'); ?>" rel="stylesheet" type="text/css" />
        <link media="(min-width : 480px)" href="<?php echo(CSS.'960.css'); ?>" rel="stylesheet" type="text/css" />
        <link media="(min-width : 480px)" href="<?php echo(CSS.'styles.css'); ?>" rel="stylesheet" type="text/css" />
        <link media="(min-width : 480px)" href="<?php echo(FANCY.'jquery.fancybox-1.3.4.css'); ?>" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-inverse navbar-maincolor navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/safetrip"><img src="<?php echo(IMG.'safetrip_logo.png'); ?>" style="margin: 0px; height: 100%" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-page">
            <div class="container">
                <div class="jumbotron transparent narrow-container">
                <!-- <p class="jumbotron-title jumbotron-title-mobile text-center"><b>SafeTrip</b></p> -->
                    <form role="form">
                        <div class="form-group">
                            <label for="emailadd">Email Address</label>
                            <input type="email" class="form-control" id="emailadd" placeholder="Input Email Address">
                        </div> 
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" id="user" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" id="pass" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg pull-right">Sign Up</button>
                        <br/><br/>
                    </form>
                <!-- </p> -->
                </div>
                <div>
                    <!-- <div class = "col-xs-12 col-sm-12 hidden-md hidden-lg" style = "padding: 0; margin-bottom: 20px;">
                        <a type="button" class="btn btn-warning btn-lg" href ="<?php //echo base_url('index.php/loggedin');?>">Sign In</a>
                    </div> -->
                    <div class = "col-md-12 col-lg-12 hidden-xs hidden-sm" style = "margin: 0 0 20px 100px;">
                        <a type="button" class="btn btn-warning btn-lg" href ="<?php echo base_url('');?>">Sign In</a>
                    </div>
                </div>
            </div>
            <footer class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p style = "margin: 0 auto; color:white;">&copy; 2014 All rights reserved</p>
            </footer>
        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo(JS.'smooth-scroll.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo(JS.'jquery.sticky.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo(FANCY.'jquery.fancybox-1.3.4.pack.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo(JS.'jquery.easing-1.3.pack.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo(FANCY.'jquery.mousewheel-3.0.4.pack.js'); ?>"</script>
        <script type="text/javascript" src="<?php echo(JS.'cform.js'); ?>"></script>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo(JS.'jquery.min.js'); ?>"></script>
        <script src="<?php echo(JS.'jquery-1.10.2.js'); ?>"></script>
        <script src="<?php echo(JS.'jquery-ui-1.10.4.custom.js'); ?>"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo(JS.'bootstrap.min.js'); ?>"></script>
        <script src="<?php echo(JS.'moment-2.4.0.js'); ?>"></script>
        <script src="<?php echo(JS.'bootstrap-datetimepicker.min.js'); ?>"></script>
    </body>
</html>




