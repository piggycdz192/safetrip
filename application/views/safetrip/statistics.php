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

	<?php
		include 'header.php';
    $this->load->helper('url');
	?>

		<div class="statistics-page">
			<div class="container">
				<ul class="list-inline">
					<li><h1>Statistics</h1></li>
					<li class="pull-right violate-dropdown">
						<?php
              $this->load->helper('url');
              $this->load->helper('form');
              $options = array(
  							site_url('/statistics/taxi_violation') => 'by Taxi Violation',
  							site_url('/statistics/bus_violation') => 'by Bus Violation',
  							site_url('/statistics/taxi_company') => 'by Taxi Company',
  							site_url('/statistics/bus_company') => 'by Bus Company'
              );
              $attr = 'class="form-control" id="selectform" onChange="document.location = this.value" value="GO"';
              echo form_dropdown('selectform', $options, site_url('/statistics/'.$selected), $attr)
						?>
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
						<?php foreach ($rows as $row): ?>
							<tr>
							<td><?php echo ++$nrow ?></td>
							<td><?php echo $row['categoryname'] ?></td>
							<td><?php echo $row['categorycount'] ?></td>
						</tr>
						<?php endforeach ?>
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