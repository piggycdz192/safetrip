<?php include 'header.php'; ?>

<div class="results-page">

  <!-- SUMMARY -->
  <center>
    <div class="container">

      <h1>
        <?php echo $company;?>
      </h1>

      <div class="well well-sm form-narrow">
        <table class="table table-borderless no-bottom-margin">
          <thead>
            <tr>
              <th style="width: 20% ;">Taxi/Bus</th>
              <th style="width: 35% ;">Number of Report</th>
              <th style="width: 70% ;">Most Commited Violation/s</th>
            </tr>
          </thead>
          <tbody>

              <?php for($i=0; $i < sizeof($platenum); $i++){?>
                  <tr>
                      <td><a href ="<?php echo base_url();?>index.php/view/<?php echo $platenum[$i]->platenum; ?>"> <?php echo $platenum[$i]->platenum;?></a></td>
                      <td><?php echo $nReport[$i];?></td>
                      <td><?php foreach ($violation[$i] as $vio): ?>
                                <?php echo $vio['categoryname']."<br>";?>
                           <?php endforeach ?>
                  </tr>
              <?php }?>

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