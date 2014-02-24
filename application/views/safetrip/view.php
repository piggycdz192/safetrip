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

    <div class="results-page">
      <div class="container">
        <h1>TXI-123 <small>(Red Company)</small></h1>
        <div class="well well-sm form-narrow">
          <table class="table table-borderless no-bottom-margin">
            <thead>
              <tr>
                <th colspan="2">
                  <span class="glyphicon glyphicon-warning-sign icon-yellow"></span>
                  Low Risk
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="nowrap"><strong>Overcharging</strong></td>
                <td>
                  <div class="progress progress-dark no-bottom-margin">
                    <div class="progress-bar progress-bar-danger progress-bar-text-left" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 30%">3</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="nowrap"><strong>Contracting</strong></td>
                <td class="table-column-widest">
                  <div class="progress progress-dark no-bottom-margin">
                    <div class="progress-bar progress-bar-danger progress-bar-text-left" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 20%">2</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="nowrap"><strong>Rude Behavior</strong></td>
                <td class="td-widest">
                  <div class="progress progress-dark no-bottom-margin">
                    <div class="progress-bar progress-bar-danger progress-bar-text-left" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 10%">1</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <strong>Most Frequent Location:</strong> Quezon City
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td>
                  <button type="button" class="btn btn-primary"><i class="fa fa-facebook-square"></i> Share</button>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th colspan="2" class="text-center">3 reports found</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2">
                <div>
                  <small>1 minute ago (Saturday, 6pm)</small>
                </div>
                <div>
                  <span class="label label-danger">Overcharging</span> <span class="label label-danger">Contracting</span>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td class="td-widest no-border">
                <p>
                  He added P50 to my fare.
                </p>
              </td>
              <td class="no-border">
                <img class="attachment-small" src="<?php echo(IMG.'taxi1.jpg'); ?>" />
              </td>
            </tr>
            <tr>
              <td class="no-border">
                <p class="no-bottom-margin"><small><strong>Driver:</strong> Juan</small></p>
                <p class="no-bottom-margin"><small><strong>Location:</strong> Quezon City</small></p>
              </td>
              <td class="no-border">
                <button type="button" class="btn btn-primary pull-right"><i class="fa fa-facebook-square"></i> Share</button>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div>
                  <small>4 days ago (Tuesday, 1pm)</small>
                </div>
                <div>
                  <span class="label label-danger">Overcharging</span> <span class="label label-danger">Contracting</span> <span class="label label-danger">Rude Behavior</span>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td class="td-widest no-border">
                <p>
                  This taxi charged me P50 extra for non-existent traffic and then shouted at me and called me names when I called him out.
                </p>
              </td>
              <td class="no-border">
                <img class="attachment-small" src="<?php echo(IMG.'taxi2.jpg'); ?>"/>
              </td>
            </tr>
            <tr>
              <td class="no-border">
                <p class="no-bottom-margin"><small><strong>Driver:</strong> Manong Juan</small></p>
                <p class="no-bottom-margin"><small><strong>Location:</strong> Quezon City</small></p>
              </td>
              <td class="no-border">
                <button type="button" class="btn btn-primary pull-right"><i class="fa fa-facebook-square"></i> Share</button>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div>
                  <small>4 days ago (Tuesday, 9am)</small>
                </div>
                <div>
                  <span class="label label-danger">Overcharging</span>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td class="td-widest no-border">
                <p>
                  Dinagdagan ng P50 ung bayad ko. :-(
                </p>
              </td>
              <td class="no-border">
                <img class="attachment-small" src="<?php echo(IMG.'taxi3.jpg'); ?>" />
              </td>
            </tr>
            <tr>
              <td class="no-border">
                <p class="no-bottom-margin"><small><strong>Driver:</strong> Juan dela Cruz</small></p>
                <p class="no-bottom-margin"><small><strong>Location:</strong> Quezon City</small></p>
              </td>
              <td class="no-border">
                <button type="button" class="btn btn-primary pull-right"><i class="fa fa-facebook-square"></i> Share</button>
              </td>
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