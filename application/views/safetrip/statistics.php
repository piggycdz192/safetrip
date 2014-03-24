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
							<th style="width: 80px;">Rank</th>
							<th><?php echo $head ?></th>
							<th style="width: 30%;">Number of Violations</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rows as $row): ?>
							<tr>
							<td><?php echo ++$nrow ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['count'] ?></td>
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