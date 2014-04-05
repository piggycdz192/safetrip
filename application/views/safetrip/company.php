<?php include 'header.php'; ?>

<div class="results-page">

  <!-- SUMMARY -->
  <center>
    <div class="container">

      <h1>
        <small>
        <a href="<?php echo site_url();?>/company/index/<?php echo $company; ?>"> <?php echo $company;?> </a>
        </small>
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

              <?php 
              for($i=0; $i < sizeof($platenum); $i++){?>
                <tr>
                  <td><a href ="<?php echo base_url();?>index.php/view/<?php echo $platenum[$i]->platenum; ?>"> <?php echo $platenum[$i]->platenum;?></a></td>
                  <td><?php echo $violation[$i];?></td>
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