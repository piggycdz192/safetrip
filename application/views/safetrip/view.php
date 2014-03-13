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
    

    <?php include 'header.php'; ?>

    <div class="results-page">
      <div class="container">
        <h1><?php echo $platenum; ?> <small>(Red Company)</small></h1>
        <div class="well well-sm form-narrow">
          <table class="table table-borderless no-bottom-margin">
            <thead>
              <tr>
                <th colspan="2">
                  <span class="glyphicon glyphicon-warning-sign icon-yellow"></span>
                  <?php echo $risk; ?>
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
                  <strong>Most Frequent Location:</strong> <?php echo $frequentLocation; ?>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td>
                  <button onclick="post('<?php echo $platenum ?>','Quezon City (dummy location)');" type="button" class="btn btn-primary"><i class="fa fa-facebook-square"></i> Share</button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>


        <!-- total report -->
        <table class="table">
          <thead>
            <tr>
              <th colspan="2" class="text-center"><?php echo $nReport; ?> reports found</th>
            </tr>
          </thead>
          <tbody>
            <!-- reports start -->
            <?php if($reports != null): ?>

              <?php foreach ($reports as $value): ?>
                   
                  <tr>
                    <td colspan="2">
                      <div>
                      <!-- time  -->
                        <small><?php $value['datetime']; ?></small>
                      </div>
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
                      <img class="attachment-small" src="<?php echo(UPLOAD.$value['picture']); ?>" />
                    </td>
                  </tr>
                  <tr>
                    <td class="no-border">
                      <!-- driver name -->
                      <!-- location -->
                      <p class="no-bottom-margin"><small><strong>Driver:</strong> <?php echo $value['drivername']; ?></small></p>
                      <p class="no-bottom-margin"><small><strong>Location:</strong> <?php echo $value['company']; ?></small></p>
                    </td>
                    <td class="no-border">
                      <button onclick="postit('<?php echo $platenum ?>', '<?php echo $value['report'] ?>', 
                        '<?php echo $value['drivername']; ?>', '<?php echo $value['company']; ?>',
                        '<?php echo(UPLOAD.$value['picture']); ?>');" 
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

    <script type="text/javascript">

            function post(platenum, location) {
                  FB.ui(
                      {
                        method: 'feed',
                        name: platenum,
                        link: 'http://localhost',
                        picture: 'http://localhost',
                        caption: 'Most Frequent Location: ' + location,
                        description: 'This vehicle has commited a number of violations.',
                        message: ''
                      });
            }

            function postit(platenum, report, driver, company, photo) {
                  FB.ui(
                      {
                        method: 'feed',
                        name: platenum,
                        link: 'http://localhost',
                        picture: photo,
                        caption: 'Driver: ' + driver + ' Company: ' + company,
                        description: report,
                        message: ''
                      });
            }

    </script>
    
  </body>
</html>