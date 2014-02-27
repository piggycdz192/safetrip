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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'header.php'; ?>

    <div class="search-page">
      <div class="container">
        <div class="jumbotron transparent narrow-container">
          <p class="jumbotron-title jumbotron-title-mobile text-center">Is this taxi/bus SAFE?</p>
          <div class="form-group">
          	<?php
          		$this->load->helper("form");

          		echo validation_errors();
          		echo form_open("home/validate");
          		
          		$data = array(
          			'type' => 'text',
          			'name' => 'plateNum',
          			'class' => "form-control",
          			'placeholder' => "Examples: TXI-123 or Manong Juan or Bus Co."
          		);

          		echo form_input($data);
          	?>
          		 <p class="text-center">
          		 <!-- creates two buttons -->
              	<br>
                <?php

                $data = array(
                    'class'=>"btn btn-primary btn-lg",
                    'name' => "search"
                    );

                  echo form_button($data,'<span class="glyphicon glyphicon-search"></span> Search');

                  $data = array(
                    'class' => "btn btn-danger btn-lg btnSize",
                    'name' => 'report',
                    'onclick' => "this.form.submit()"
                    );

                  echo anchor("create",'<span class="glyphicon glyphicon-exclamation-sign"></span> File a Report',$data);

                  

                  echo form_close();

                ?>

              </p>
          </div>
          </p>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo(JS.'jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo(JS.'bootstrap.min.js'); ?>"></script>
    <script src="<?php echo(JS.'moment-2.4.0.js'); ?>"></script>
    <script src="<?php echo(JS.'bootstrap-datetimepicker.min.js'); ?>"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepickerincident').datetimepicker();
        });
    </script>
  </body>
</html>



