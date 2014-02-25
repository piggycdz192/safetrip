<?php $this->load->helper("form"); ?>

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

    

  <div class="file-report-page">
      <div class="container">
        <h1>Filing a Report</h1>

        <div class="well">
          <?php echo form_open_multipart('report/create') ?>
            <div class="form-group form-narrow">
              <label for="report">Report</label>
              <textarea name="report" class="form-control" rows="3" placeholder="Describe the incident" ><?php echo set_value('report');?></textarea>
              <?php echo form_error('report','<div class="error">', '</div>') ?>
            </div>
            <div class="form-group form-narrower">
              <label for="platenumber">Plate Number</label>
              <input type="text" class="form-control" name="platenumber" placeholder="Example: TXI-123" value="<?php echo set_value('platenumber');?>">
              <?php echo form_error('platenumber','<div class="error">', '</div>') ?>
            </div>
            <div class="form-group form-narrow">
              <label>Type of Vehicle</label>
              <div class="row">
                <div class="col-xs-5">
                  <div class="radio">
                    <label>
                      <input type="radio" name="vehicletype" value="1" <?php echo set_radio('vehicletype', '1'); ?>> Bus
                    </label>
                  </div>
                </div>
                <div class="col-xs-5">
                  <div class="radio">
                    <label>
                      <input type="radio" name="vehicletype" value="2" <?php echo set_radio('vehicletype', '2'); ?>> Taxi
                    </label>
                  </div>
                </div>
              </div>
              <?php echo form_error('vehicletype','<div class="error">', '</div>') ?>
            </div>
            <div class="form-group form-narrower">
              <label for="datetime">Date and Time of Incident</label>
              <div class="form-group">
                <div class='input-group date' id='datetimepickerincident' >
                  <!-- DateTimePicker plugin: https://github.com/Eonasdan/bootstrap-datetimepicker -->
                  <!-- Documentation: http://eonasdan.github.io/bootstrap-datetimepicker/ -->
                  <input type='text' data-format="YYYY-MM-DD HH:mm:ss" class="form-control" name="datetime" placeholder="Select the Date and Time" value="<?php echo set_value('datetime');?>"/>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <?php echo form_error('datetime','<div class="error">', '</div>') ?>
              </div>
            </div>
            <div class="form-group form-narrower">
              <label for="location">Location of Incident</label>
              <input type="text" class="form-control" name="location" placeholder="Example: Quezon City" value="<?php echo set_value('location');?>">
              <?php echo form_error('location','<div class="error">', '</div>') ?>
            </div>
            <div class="form-group form-narrow">
              <label>Violations</label>
              <div class="row">
                <div class="col-xs-6">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Overcharging" <?php echo set_checkbox("category[]", "Overcharging") ?> > Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Contracting" <?php echo set_checkbox("category[]", "Contracting") ?> > Contracting
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Rude Behavior" <?php echo set_checkbox("category[]", "Rude Behavior") ?> > Rude Behavior
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Sexual Harassment" <?php echo set_checkbox("category[]", "Sexual Harassment") ?> > Sexual Harassment
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="category[]" value="Kidnapping" <?php echo set_checkbox("category[]", "Kidnapping") ?> > Kidnapping
                    </label>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Attempted Murder" <?php echo set_checkbox("category[]", "Attempted Murder") ?> > Attempted Murder
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Left Behind Items" <?php echo set_checkbox("category[]", "Left Behind Items") ?> > Left Behind Items
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Refused Boarding" <?php echo set_checkbox("category[]", "Refused Boarding") ?> > Refused Boarding
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Choosing Passengers" <?php echo set_checkbox("category[]", "Choosing Passengers") ?> > Choosing Passengers
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Reckless Behavior" <?php echo set_checkbox("category[]", "Reckless Behavior") ?> > Reckless Behavior
                    </label>
                  </div>
                </div>
              </div>
              <?php echo form_error('category[]','<div class="error">', '</div>') ?>
            </div>
            
            <div class="form-group form-narrow">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOtherDetails">
                        Other Details
                      </a>
                      <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseOtherDetails">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOtherDetails" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="form-group form-narrower">
                        <label for="driver">Driver Name</label>
                        <input type="text" class="form-control" name ="driver" placeholder="Example: Manong Juan" value="<?php echo set_value('driver');?>">
                      </div>
                      <div class="form-group form-narrower">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" name ="company" placeholder="Example: Bus Co." value="<?php echo set_value('company');?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group  form-narrow">
             <!-- <form action="upload_file.php" method="post" enctype="multipart/form-data"> -->
              <label for="file">Attach a Photo of the Incident</label>
              <!-- <input type="file" name="file" id="file" accept='image/*'> --><br>
              <input id="file" placeholder="  Choose Photo" disabled="disabled"/>
              <div class="fileUpload btn btn-info">
                  <span>Upload</span>
                  <input name="picture" id="uploadBtn" type="file" class="upload" accept='image/*'/>
              </div>
              <br>
              <input type="submit" name="submit" value="File Report">
            </div>
          <?php echo form_close(); ?>
      </div>
    </div>    
</form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo(JS.'jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo(JS.'bootstrap.min.js'); ?>"></script>
    <script src="<?php echo(JS.'moment-2.4.0.js'); ?>"></script>
    <script src="<?php echo(JS.'bootstrap-datetimepicker.min.js'); ?>"></script>
    <script type="text/javascript">
        function redir() {
          windows.location.href = "http://localhost/safetrip/index.php/view";
        }
        $(function () {
            $('#datetimepickerincident').datetimepicker();
        });
    </script>
    <script>
      $(document).ready(function() {
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("file").value = this.value;
        };
      });
    </script>
  </body>
</html>


