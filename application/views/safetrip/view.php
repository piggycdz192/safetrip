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
      <center>
      <div class="container">
        <div class = "view-plate">
        <h1><?php echo $platenum; ?> <small><?php echo $company; ?> Company</small></h1>
        </div>
        <div class="well well-sm form-narrow">
          <table class="table table-borderless no-bottom-margin">
            <thead>
              <tr>
                <th colspan="2">
                  <!-- <span class="glyphicon glyphicon-warning-sign icon-yellow"></span> -->
                  <?php echo "This is a ". $risk ." ".$type. "."; ?>
                </th>
              </tr>
            </thead>
            <tbody>

            <!-- summary of violations -->
            <?php foreach ($violations as $value):?>
                <tr>
                  <td class="nowrap"><strong><?php echo $value['categoryname'];?></strong></td>
                  <td>
                    <div class="progress progress-dark no-bottom-margin">
                      <div class="progress-bar progress-bar-danger progress-bar-text-left" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style=<?php echo "'width:".$value['count']/$nViolation*100 ."%'"?>> <?php echo $value['count'];?></div>
                    </div>
                  </td>
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
                      <!-- TODO: FIX THE PHP CONDITION HERE -->
                      <img class="attachment-small" src="<?php if ($value['picture'] == './uploads/' || $value['picture'] == null) echo(IMG.'noimage.jpg'); else echo(UPLOAD.$value['picture']); ?>" />
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
    </center>
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
  </body>