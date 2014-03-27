<?php include 'header.php'; ?>
    
    <div class="search-page">
      <div class="container">
        <div class="jumbotron transparent narrow-container">
          <p class="jumbotron-title jumbotron-title-mobile text-center">Search or report a plate number:</p>
          <div class="form-group">
          	<?php
          		$this->load->helper("form");

          		echo validation_errors();
          		echo form_open("home/validate");
              
          		$data = array(
                'id' => 'txt',
          			'type' => 'text',
                'style' => "text-transform:uppercase",
          			'name' => 'plateNum',
                'maxlength' => "6",
          			'class' => "form-control",
          			'placeholder' => "Example: TXI123"
          		);

              if ($loadError)
                $data['class'] = $data['class'].' decoratedErrorField';

          		echo form_input($data);

              if ($loadError)
                echo '<div class="error">'.$error.'</div>';
            ?>

          		 <p class="text-center">
          		 <!-- creates two buttons -->
              	<br>
                <?php

                $data = array(
                    'class'=>"btn btn-primary btn-lg",
                    'name' => "search"
                    // 'class'=>"button",
                    // 'name' => "search",
                    // 'button type' => "button",
                    // 'data-dismiss' => "alert",
                    // 'aria-hidden' => "true"
                    );
                  //<span class="glyphicon glyphicon-search"></span>
                //echo form_button($data,'<span class="glyphicon glyphicon-search"> View Report </span>');
                  echo form_submit($data,'View Reports');

                    
                  /*
                  $data = array(
                    'class' => "btn btn-danger btn-lg btnSize",
                    'name' => 'report',
                    'onclick' => "this.form.submit()"
                    );

                  echo anchor("create",'<span class=""></span> File a Report',$data);
                  // echo anchor("create",'<span class="glyphicon glyphicon-exclamation-sign"></span> File a Report',$data);
                  */
                  $data = array(
                    'class' => "btn btn-danger btn-lg btnSize",
                    'name' => 'report',
                    );

                  echo form_submit($data,'File Report');
                  echo form_close();

                ?>
              </p>
          </div>
          </p>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo(JS.'jquery.min.js'); ?>"></script>
    <script src="<?php echo(JS.'jquery-1.10.2.js'); ?>"></script>
    <script src="<?php echo(JS.'jquery-ui-1.10.4.custom.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo(JS.'bootstrap.min.js'); ?>"></script>
    <script src="<?php echo(JS.'moment-2.4.0.js'); ?>"></script>
    <script src="<?php echo(JS.'bootstrap-datetimepicker.min.js'); ?>"></script>
    
    <script>
        $(function() {
          var availableTaxi = <?php echo json_encode($plateList); ?>;
            $( "#txt" ).autocomplete({
               source: availableTaxi
              });
        });
    </script>
  </body>



