<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Safe Trip</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/webapps.css" rel="stylesheet">

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
          <a class="navbar-brand" href="#">Safe Trip</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right pull-left-mobile">
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="#contact">FAQs</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="search-page">
      <div class="container">
        <div class="jumbotron transparent search-jumbotron">
          <p class="jumbotron-title jumbotron-title-mobile text-center">Enter the plate number, driver name or company you want to search or report:</p>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Examples: TXI-123 or Manong Juan or Bus Co.">
            </div>
          <p class="text-center">
            <a class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a>
            <a class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-search"></span> Search</a>
          </p>
        </div>
      </div>
    </div>

    <div class="statistics-page">
      <div class="container">
        <ul class="list-inline">
          <li><h4>Statistics</h4></li>
          <li>
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
              <td>1,000</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>9</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>10</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>11</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>12</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>13</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>14</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>15</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>16</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>17</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>18</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>19</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
            <tr>
              <td>20</td>
              <td>Overcharging</td>
              <td>1,000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="file-report-page">
      <div class="container">
        <h4>Filing a Report</h4>
        <div class="well">
          <form role="form">
            <div class="form-group form-narrow">
              <label for="report">Report</label>
              <textarea id="report" class="form-control" rows="3" placeholder="Describe the incident"></textarea>
            </div>
            <div class="form-group form-narrower">
              <label for="platenumber">Plate Number</label>
              <input type="text" class="form-control" id="platenumber" placeholder="Example: TXI-123">
            </div>
            <div class="form-group form-narrower">
              <label for="datetime">Date and Time of Incident</label>
              <div class="form-group">
                <div class='input-group date' id='datetimepickerincident'>
                  <!-- DateTimePicker plugin: https://github.com/Eonasdan/bootstrap-datetimepicker -->
                  <!-- Documentation: http://eonasdan.github.io/bootstrap-datetimepicker/ -->
                  <input type='text' class="form-control" id="datetime" placeholder="Select the Date and Time" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>
            </div>
            <div class="form-group form-narrower">
              <label for="location">Location</label>
              <input type="text" class="form-control" id="location" placeholder="Example: Quezon City">
            </div>
            <div class="form-group form-narrow">
              <label>Categories</label>
              <div class="row">
                <div class="col-xs-6">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value=""> Overcharging
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group form-narrow">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOtherDetails">
                        Other Details
                      </a>
                      <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseOtherDetails">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOtherDetails" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="form-group form-narrower">
                        <label for="driver">Driver Name</label>
                        <input type="text" class="form-control" id="driver" placeholder="Example: Manong Juan">
                      </div>
                      <div class="form-group form-narrower">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" placeholder="Example: Bus Co.">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group  form-narrow">
              <label for="attachment">File input</label>
              <input type="file" id="attachment">
              <p class="help-block">Attach a photo related to the incident.</p>
            </div>
            <button type="submit" class="btn btn-default">File Report</button>
          </form>
        </div>
      </div>
    </div>

    <div class="results-page">
      <div class="container">
        <h4>TXI-123 <small>(Red Company)</small></h4>
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
                    <div class="progress-bar progress-bar-danger progress-bar-text-left" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 50%">5</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="nowrap"><strong>Contracting</strong></td>
                <td class="table-column-widest">
                  <div class="progress progress-dark no-bottom-margin">
                    <div class="progress-bar progress-bar-danger progress-bar-text-left" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 40%">4</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="nowrap"><strong>Rude Behavior</strong></td>
                <td class="td-widest">
                  <div class="progress progress-dark no-bottom-margin">
                    <div class="progress-bar progress-bar-danger progress-bar-text-left" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 30%">3</div>
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
                  <small>3 days ago (Tuesday, 9:00am)</small>
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
                <img class="attachment-small" src="images/attachment.jpg" />
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
                  <small>3 days ago (Tuesday, 9:00am)</small>
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
                <img class="attachment-small" src="images/attachment.jpg" />
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
                  <small>3 days ago (Tuesday, 9:00am)</small>
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
                <img class="attachment-small" src="images/attachment.jpg" />
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
          </tbody>
        </table>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment-2.4.0.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepickerincident').datetimepicker();
        });
    </script>
  </body>
</html>