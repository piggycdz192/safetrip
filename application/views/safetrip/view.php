<?php include 'header.php'; ?>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '428020470667575',
      status     : true,
      xfbml      : true
    });
  };

  (function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/all.js";
   fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<div class="results-page">

  <!-- SUMMARY -->
  <center>
    <div class="container">

      <h1>
        <?php echo $platenum; ?><br />
        <small>
          <a href="<?php echo site_url();?>/company/index/<?php echo $company;?>"> <?php echo $company;?> </a>
        </small>
      </h1>

      <div class="well well-sm form-narrow">
        <table class="table table-borderless no-bottom-margin">
          <thead>
            <tr>
              <th colspan="2">
                <!-- <span class="glyphicon glyphicon-warning-sign icon-yellow"></span> -->
                <center><?php echo "This is a ". $risk ." ".$type. "."; ?></center>
              </th>
            </tr>
            <tr>
              <th>Violation</th>
              <th style="width: 35%;">Number of Violations</th>
            </tr>
          </thead>
          <tbody>

            <!-- summary of violations -->
            <?php foreach ($violations as $value):?>
              <tr>
                <td><?php echo $value['categoryname'];?></td>
                <td><?php echo $value['count'];?></td>
              </tr>
            <?php endforeach;?>

          <tr>
            <td colspan="2">
              <strong>Location with the most violations:</strong> <?php echo $frequentLocation; ?>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td align = "right">
              <button onclick="post('<?php echo $platenum ?>','<?php echo $frequentLocation; ?>', '<?php echo $risk; ?>');" type="button" class="btn btn-primary"><i class="fa fa-facebook-square"></i> Share</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </center>
  <!-- END SUMMARY -->

  <div class="container">
    <div class="row">
      <!-- total report -->
      <table class="table">
        <thead>
          <tr>
            <!--<th colspan="2" class="text-center"><?php echo $nReport; ?> reports found</th>-->
            <th colspan="2" class="text-center">Reports Filed: <?php echo($nreport); ?></th>
          </tr>
        </thead>
        <tbody>
          <!-- reports start -->
          <?php if($reports != null): ?>

          <?php foreach ($reports as $value): ?>

          <tr>
            <td colspan="2">
              <div>
                <!-- violation -->
                <!-- remove ul -->
                <?php foreach($value['violations'] as $item): ?>
                  <span class="label label-danger"><?php echo $item."&nbsp;"; ?></span>
                <?php endforeach; ?>
              </div>
            </td>
          </tr>
          <tr>
            <td class="td-widest no-border">
              <p>
              <!-- report -->
                <?php echo $value['report']; ?>
              </p>
            </td>
            <td class="no-border">
              <!--  image -->
              <img class="attachment-small" src="<?php if ($value['picture'] == null) echo(IMG.'noimage.jpg'); else echo(UPLOAD.$value['picture']); ?>" />
            </td>
          </tr>
          <tr>
            <td class="no-border">
              <!-- driver name -->
              <!-- location -->
              <p class="no-bottom-margin"><small><strong>Driver Name:</strong> <?php echo ($value['drivername'] == null) ? 'Not specified' : 
              $value['drivername'] ?></small></p>
              <p class="no-bottom-margin"><small><strong>Location:</strong> <?php echo $value['location']; ?></small></p>
              <p class="no-bottom-margin"><small><strong>Date & Time of Incident:</strong> <?php echo $value['datetime']; ?></small></p>
            </td>
            <td class="no-border">
              <button onclick="postit('<?php echo $platenum ?>', '<?php echo preg_replace("/[^A-Za-z0-9.!@#$%^&*()_+-=;:,<>? ]/", "", $value['report']) ?>', 
                '<?php echo $value['drivername']; ?>', '<?php echo $value['company']; ?>',
                '<?php echo(UPLOAD.$value['picture']); ?>', '<?php echo $value['location']; ?>');" 
                type="button" class="btn btn-primary pull-right"><i class="fa fa-facebook-square"></i> Share</button>
              </td>
            </tr>
          <?php endforeach; ?>
          <!-- report end -->
          <?php else: ?>

          <!-- need other page -->
          <?php endif; ?>
        </tbody>
      </table>
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
  function post(platenum, location, risk) {
    FB.ui(
    {
      method: 'feed',
      name: platenum,
      link: 'http://localhost',
      picture: 'http://localhost',
      caption: 'Most Frequent Location: ' + location,
      description: 'Level of risk for this vehicle: ' + risk,
      message: ''
    });
  }

  function postit(platenum, report, driver, company, photo, location) {
    FB.ui(
    {
      method: 'feed',
      name: platenum,
      link: 'http://localhost',
      picture: photo,
      caption: 'Driver: ' + driver + '<center></center> Company: ' + company + '<center></center> Location: ' + location,
      description: report,
      message: ''
    });
  }
</script>
<script id="showModal"></script>
</body>