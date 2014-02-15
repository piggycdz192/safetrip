<?php $this->load->helper("form"); ?>

<?php echo validation_errors(); ?>

<?php echo form_open('report/create') ?>

	<div class="file-report-page">
      <div class="container">
        <h1>Filing a Report</h1>
        <div class="well">
          <form role="form">
            <div class="form-group form-narrow">
              <label for="report">Report</label>
              <textarea name="report" class="form-control" rows="3" placeholder="Describe the incident"></textarea>
            </div>
            <div class="form-group form-narrower">
              <label for="platenumber">Plate Number</label>
              <input type="text" class="form-control" name="platenumber" placeholder="Example: TXI-123">
            </div>
            <div class="form-group form-narrow">
              <label>Type of Vehicle</label>
              <div class="row">
                <div class="col-xs-5">
                  <div class="radio">
                    <label>
                      <input type="radio" name="vehicletype" value="1"> Bus
                    </label>
                  </div>
                </div>
                <div class="col-xs-5">
                  <div class="radio">
                    <label>
                      <input type="radio" name="vehicletype" value="2"> Taxi
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group form-narrower">
              <label for="datetime">Date and Time of Incident</label>
              <div class="form-group">
                <div class='input-group date' id='datetimepickerincident'>
                  <!-- DateTimePicker plugin: https://github.com/Eonasdan/bootstrap-datetimepicker -->
                  <!-- Documentation: http://eonasdan.github.io/bootstrap-datetimepicker/ -->
                  <input type='text' class="form-control" name="datetime" placeholder="Select the Date and Time" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
              </div>
            </div>
            <div class="form-group form-narrower">
              <label for="location">Location</label>
              <input type="text" class="form-control" name="location" placeholder="Example: Quezon City">
            </div>
            <div class="form-group form-narrow">
              <label>Categories</label>
              <div class="row">
                <div class="col-xs-6">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Overcharging"> Overcharging
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Contracting"> Contracting
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Rude Behavior"> Rude Behavior
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Sexual Harassment"> Sexual Harassment
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="category[]" value="Kidnapping"> Kidnapping
                    </label>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Attempted Murder"> Attempted Murder
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Left Behind Items"> Left Behind Items
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Refused Boarding"> Refused Boarding
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Choosing Passengers"> Choosing Passengers
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name ="category[]" value="Reckless Behavior"> Reckless Behavior
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
                        <input type="text" class="form-control" name ="driver" placeholder="Example: Manong Juan">
                      </div>
                      <div class="form-group form-narrower">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" name ="company" placeholder="Example: Bus Co.">
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
            <input type="submit" name="submit" value="File Report" />
          </form>
        </div>
      </div>

    </div>
    
</form>
