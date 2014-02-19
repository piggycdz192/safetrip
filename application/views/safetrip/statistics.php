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

    <div class="navbar navbar-inverse navbar-maincolor navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/safetrip">Safe Trip</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right pull-left-mobile">
            <li class = "active"><a href ="#">Statistics</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="#contact">FAQs</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="statistics-page">
      <div class="container">
        <ul class="list-inline">
          <li><h1>Statistics</h1></li>
          <li class="pull-right violate-dropdown">
            <select class="form-control">
              <option>By taxi violations</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </li>
        </ul>
        <table class="table">
          <thead>
            <tr>
              <th>Rank</th>
              <th>Violation</th>
              <th>Number</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Overcharging</td>
              <td>3</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Contracting</td>
              <td>2</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Rude Behavior</td>
              <td>1</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Sexual Harassment</td>
              <td>1</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Kidnapping</td>
              <td>1</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Left Behind Items</td>
              <td>1</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Refused Boarding</td>
              <td>1</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Choosing Passengers</td>
              <td>1</td>
            </tr>
          </tbody>
        </table>
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