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
          <p class="jumbotron-title jumbotron-title-mobile text-center">Search or report a plate number:</p>
          <div class="form-group">
          	<?php
          		$this->load->helper("form");

          		echo validation_errors();
          		echo form_open("home/validate");
          		
          		$data = array(
                'id' => 'txt',
          			'type' => 'text',
                'style' => "text-transform:uppercase",
          			'name' => 'plateNum',
                'maxlength' => "6",
          			'class' => "form-control",
          			'placeholder' => "Example: TXI123"
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
                  //<span class="glyphicon glyphicon-search"></span>
                  echo form_submit($data,'Search');

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
    
    <?php print_r($plateList);?>

    <script src="<?php echo(JS.'jquery-1.10.2.js'); ?>"></script>
    <script src="<?php echo(JS.'jquery-ui-1.10.4.custom.js'); ?>"></script>
    <script>
        $(function() {
          var availableTaxi = <?php echo json_encode($plateList); ?>;
            $( "#txt" ).autocomplete({
               source: availableTaxi
              });
        });
    </script> 
  </body>
</html>



