<?php include 'header.php'; ?>

    <style>

    #landing {
      display: block;
    }

    @media (max-width : 480px) {
      #landing {
        display: none;
      }
    }

    </style>

    <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'bootstrap.min.css'); ?>">
    <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'bootstrap-datetimepicker.min.css'); ?>">
    <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'font-awesome.min.css'); ?>">
    <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'webapps.css'); ?>">
    <link media="(max-width : 480px)" rel="stylesheet" href="<?php echo(CSS.'jquery-ui-1.10.4.custom.css'); ?>">

    <link href='http://fonts.googleapis.com/css?family=Maven+Pro:700,900|Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
  
    <link media="(min-width : 480px)" href="<?php echo(CSS.'reset.css'); ?>" rel="stylesheet" type="text/css" />
    <link media="(min-width : 480px)" href="<?php echo(CSS.'960.css'); ?>" rel="stylesheet" type="text/css" />
    <link media="(min-width : 480px)" href="<?php echo(CSS.'styles.css'); ?>" rel="stylesheet" type="text/css" />
    <link media="(min-width : 480px)" href="<?php echo(FANCY.'jquery.fancybox-1.3.4.css'); ?>" rel="stylesheet" type="text/css" />


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo(JS.'smooth-scroll.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo(JS.'jquery.sticky.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo(FANCY.'jquery.fancybox-1.3.4.pack.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo(JS.'jquery.easing-1.3.pack.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo(FANCY.'jquery.mousewheel-3.0.4.pack.js'); ?>"</script>
    <script type="text/javascript" src="<?php echo(JS.'cform.js'); ?>"></script>


    <script type="text/javascript"> // sticky nav bar 
      $(document).ready(function(){
        $("nav").sticky({topSpacing:0});
      });
    </script>

    <script type="text/javascript"> // fancybox
    $(document).ready(function() {

      /* This is basic - uses default settings */
      
      $("a.single_image").fancybox();
      
      /* Using custom settings */
      
      $("a#inline").fancybox({
        'hideOnContentClick': true
      });

      /* Apply fancybox to multiple items */
      
      $("a.group").fancybox({
        'transitionIn'  : 'elastic',
        'transitionOut' : 'elastic',
        'speedIn'   : 600, 
        'speedOut'    : 200, 
        'overlayShow' : false
      });
      
    });
    </script>
    
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
                echo '<div class="search-page-error">'.$error.'</div>';
            ?>

          		 <p class="text-center">
          		 <!-- creates two buttons -->
              	<br>
                <?php

                $data = array(
                    'class'=>"btn btn-primary btn-lg",
                    'name' => "search"
                    );
                  echo form_submit($data,'View Reports');

                    
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
<div id="landing">
<div id="features">
  <div class="container_16">
  
    <div class="subheader">
      <div class="subheader_line"></div><h2>features</h2><div class="subheader_line"></div>
    </div>
    
    <div class="clear"></div>
    
    <div class="serv_icons">
      <div class="grid_4">
        <div class="serv_icon1"></div>
        <h3>Report Taxi or Bus</h3>
        <p>This feature allows the user to report abusive or malicious behaviors of the taxi or bus.</p>
      </div>
    
      <div class="grid_4">
        <div class="serv_icon2"></div>
        <h3>Search for reports</h3>
        <p>This feature allows the user to search for existing reports on a taxi or bus.</p>
        
      </div>
    
      <div class="grid_4">
        <div class="serv_icon3"></div>
        <h3>view detailed report of a taxi or bus</h3>
        <p>This feature allows the user to view detailed reports of a single taxi or bus.</p>
      </div>
      
      <div class="grid_4">
        <div class="serv_icon4"></div>
        <h3>view statistics</h3>
        <p>This feature allows users to view statistics of the top violations, top reported companies or top reported drivers.</p>
      </div>
    </div> <!-- end .serv_icons -->
    
  </div> <!-- end .container_16 -->
</div> <!-- end #services -->


<div id="screenshots">
  <div class="container_16">
    
    <div class="subheader">
      <div class="subheader_line2"></div><h2>Sample Screenshots</h2><div class="subheader_line2"></div>
    </div>
    
    <div class="gallery">
      <div class="grid_5">
        <div class="screenshot1 ss"></div>
        <p>HomePage<br />
        <span class="ss_text">The home page of the web application</span>
        </p>
      </div>
      <div class="grid_6">
        <div class="screenshot2 ss center"></div>
        <p>Filing a Report<br />
        <span class="ss_text">The page where the user files a report</span>
        </p>
      </div>
      <div class="grid_5">
        <div class="screenshot3 ss"></div>
        <p>Results Page<br />
        <span class="ss_text">The reports from the searched plate number</span>
        </p>
      </div>
    </div><!-- end .gallery -->
    
  </div> <!-- end .container_16 -->
</div> <!-- end #screenshots -->


<div id="team">
  <div class="container_16">
    
    <div class="subheader">
      <div class="subheader_line"></div><h2>team</h2><div class="subheader_line"></div>
    </div>
    
    <div class="gallery">
      <div class="grid_5">
        <div class="screenshot7 ss"></div>
        <p>Carol Alvarez<br />
        <span class="ss_text">Front End Developer</span>
        </p>
      </div>
      <div class="grid_6">
        <div class="screenshot8 ss center"></div>
        <p>Sharmaine Lim<br />
        <span class="ss_text">Project Manager</span>
        </p>
      </div>
      <div class="grid_5">
        <div class="screenshot9 ss"></div>
        <p>Oliver Syson<br />
        <span class="ss_text">Back End Developer</span>
        </p>
      </div>
    
      <div class="spacer">&nbsp;</div>
    
      <div class="grid_5">
        <div class="screenshot10 ss"></div>
        <p>Peigen Xu<br />
        <span class="ss_text">Back End Developer</span>
        </p>
      </div>
      <div class="grid_6">
        <div class="screenshot11 ss center"></div>
        <p>Briane Samson<br />
        <span class="ss_text">Adviser</span>
        </p>
      </div>
      <div class="grid_5">
        <div class="screenshot12 ss"></div>
        <p>Ralph Regalado<br />
        <span class="ss_text">Idea Provider</span>
        </p>
      </div>
    </div><!-- end .gallery -->
    
  </div> <!-- end .container_16 -->
</div> <!-- end #team -->

<div class="work_bg_bottom"></div>

<div id="contact">
  <div class="container_16">
  
    <div class="subheader">
      <div class="subheader_line"></div><h2>contact</h2><div class="subheader_line"></div>
    </div>
    
    <div class="grid_7">
      <div class="contact_form">
        <h4>Get in touch</h4>
        <form method="post">
          <input type="text" name="Name" id="name" value="Name" onfocus="this.value = this.value=='Name'?'':this.value;" onblur="this.value = this.value==''?'Name':this.value;" />
          <input type="text" name="Email" id="email" value="Email" onfocus="this.value = this.value=='Email'?'':this.value;" onblur="this.value = this.value==''?'Email':this.value;" />
          <input type="text" value="Subject" id="subject" onfocus="this.value = this.value=='Subject'?'':this.value;" onblur="this.value = this.value==''?'Subject':this.value;" />
          <textarea name="Message" id="body" onfocus="this.value = this.value=='Message'?'':this.value;" onblur="this.value = this.value==''?'Message':this.value;">Message</textarea>
          <input type="submit" name="submit" id="submit" value="send" class="submit-button" onClick="return check_values();" />
        </form>
        <div id="confirmation" style="display:none; position: relative; z-index: 600; font-family: 'Open Sans', sans-serif; font-weight: 300; font-size: 16px; color: #4e4e4e;"></div>
      </div> <!-- end .contact_form -->
        
    </div> <!-- end .grid_7 -->
        
    <div class="grid_9">
    
      <div class="contact_info">
        <h4>Contact Information</h4>
        <div class="grid_4 alpha">
          <p><img src="<?php echo(IMG.'landing_page/icn_phone.png'); ?>" alt="" /> +639123456789</p>
          <p><img src="<?php echo(IMG.'landing_page/icn_mail.png'); ?>" alt="" /> safetrip@yahoo.com</p>
        </div>
        <div class="grid_4 omega">
          <p><img src="<?php echo(IMG.'landing_page/icn_address.png'); ?>" alt="" /> De La Salle University<br />
          <span class="address">2401 Taft Ave</span><br />
          <span class="address">Manila, Philippines 1004</span></p>
        </div>
      </div> <!-- end .contact_info -->
    
      <div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.5916255074108!2d120.99291114999998!3d14.565330349999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97f2ea0318b%3A0x8e8eae0957d17c38!2sDe+La+Salle+University!5e0!3m2!1sen!2s!4v1394107369882" width="400" height="300" frameborder="0" style="border:0"></iframe>     </div> <!-- end .map -->
      
    </div> <!-- end .grid_9 -->
    
  </div> <!-- end .container_16 -->
</div> <!-- end #contact -->

<div class="contact_bg_bottom"></div>

<footer>
  <p>&copy; 2014 All rights reserved</p>
</footer>
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



