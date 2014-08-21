<div class="jumbotron transparent narrow-container">
    <!-- <p class="jumbotron-title jumbotron-title-mobile text-center"><b>SafeTrip</b></p> -->
        <form role="form">
            <div class="form-group">
                <label for="user">Username</label>
                <input type="text" class="form-control" id="user" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-lg pull-right">Sign In</button>
            <br/><br/>
        </form>
    <!-- </p> -->
</div>
<div>
    <div class = "col-xs-12 col-sm-12 hidden-md hidden-lg" style = "padding: 0; margin-bottom: 20px;">
        <a type="button" class="btn btn-warning btn-lg" href ="<?php echo base_url('signup.php');?>">Sign In</a>
    </div>
    <div class = "col-md-12 col-lg-12 hidden-xs hidden-sm" style = "margin: 0 0 20px 100px;">
        <a type="button" class="btn btn-warning btn-lg" href ="<?php echo base_url('index.php/signup');?>">Sign In</a>
    </div>
</div>