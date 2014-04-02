<?php include 'header.php'; ?>

<div class="results-page">

  <!-- SUMMARY -->
  <center>
    <div class="container">

      <h1>
        <small><?php echo 'JMC'; ?> Company</small>
      </h1>

      <div class="well well-sm form-narrow">
        <table class="table table-borderless no-bottom-margin">
          <thead>
            <tr>
              <th>Taxi/Bus</th>
              <th style="width: 70%;">Most Commited Violation/s</th>
            </tr>
          </thead>
          <tbody>

              <tr>
                <td><a href ="<?php echo base_url('index.php/view/12DWEF');?>"><?php echo '12DWEF';?></a></td>
                <td><?php echo 'Overcharging, contracting, refusing';?></td>
              </tr>
              <tr>
                <td><a href ="<?php echo base_url('index.php/view/TXI123');?>"><?php echo 'TXI123';?></a></td>
                <td><?php echo 'Murder';?></td>
              </tr>
              <tr>
                <td><a href ="<?php echo base_url('index.php/view/UHG113');?>"><?php echo 'UHG113';?></a></td>
                <td><?php echo 'Contracting';?></td>
              </tr>
              <tr>
                <td><a href ="<?php echo base_url('index.php/view/JUN908');?>"><?php echo 'JUN908';?></a></td>
                <td><?php echo 'Overcharging, contracting, refusing';?></td>
              </tr>
        </tbody>
      </table>
    </div>
  </center>
  <!-- END SUMMARY -->
</div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo(JS.'jquery.min.js'); ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo(JS.'bootstrap.min.js'); ?>"></script>
<script src="<?php echo(JS.'moment-2.4.0.js'); ?>"></script>
<script src="<?php echo(JS.'bootstrap-datetimepicker.min.js'); ?>"></script>

</body>