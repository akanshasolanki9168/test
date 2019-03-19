<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Register</title>
    <link href="http://localhost/management/img/favicon.png" rel="icon">
    <link href="http://localhost/management/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="http://localhost/management/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/management/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="http://localhost/management/css/style.css" rel="stylesheet">
    <link href="http://localhost/management/css/style-responsive.css" rel="stylesheet">
    <style type="text/css">
      .container
      {
        height:1000px;
      }
    </style>
</head>
<body>
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="post" action="<?php echo base_url('User/validation'); ?>">
            <h2 class="form-login-heading">Register Now</h2>
                <div class="login-wrap">
                 <div class="form-group">
                            <input class="form-control" placeholder="Name" name="user_name" type="text" autofocus value="">
                            <span class="text-danger"></span>  
                            <?php echo form_error('user_name', '<div class="text-danger">', '</div>'); ?>
                          </div>  
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus  >
                            <?php echo form_error('user_email', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="user_password" type="password" value=""  >
                            <?php echo form_error('user_password', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control" placeholder="Age" name="user_age" type="text" value="" >
                            <?php echo form_error('user_age', '<div class="text-danger">', '</div>'); ?>
                        </div>
                         <div class="form-group">
                            <input class="form-control" placeholder="Mobile No" name="user_mobile" type="text" value=""   >
                            <?php echo form_error('user_mobile', '<div class="text-danger">', '</div>'); ?>
                        </div>
                         <div class="form-group">
                            <input class="form-control" placeholder="Address LIne 1" name="user_adda" type="text" value=""  >
                            <?php echo form_error('user_adda', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Address Line 2" name="user_addb" type="text" value=""  >
                            <?php echo form_error('user_addb', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                             <select class="form-control" placeholder="Country" id="user_country" name="user_country" type="text" value=""  >
                             <option>Select Country</option>
                             <?php
                               foreach($countries as $row)
                                 {
                                  echo '<option value="'.$row->country_id.'"> '.$row->country_name.'</option>';               
                                 }
                              ?>
                              </select>
                             <?php echo form_error('user_country', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control" placeholder="State"  id="states" name="user_state" type="text" value=""  >
                            <option>Select State</option>
                            </select>
                            <?php echo form_error('user_state', '<div class="text-danger">', '</div>'); ?>

                        </div>
                        <div class="form-group">

                             <select class="form-control" placeholder="City" id="cities" name="user_city" type="text" value=""  >  
                             <option>Select City</option>
                            </select>
                             <?php echo form_error('user_city', '<div class="text-danger">', '</div>'); ?>

                        </div>
                        <div class="form-group"> 
                          <h4>User Type</h4>
                            <input type="radio"  id="type" name="user_type" value="admin">Admin<br>
                            <input type="radio" id="type" name="user_type" value="user">User
                          </div>
                          <input class="btn btn-theme btn-block" type="submit" value="submit" name="submit">
                  <center><b>Already registered ?</b> <br></b><a href="<?php echo base_url('User/log'); ?>">Login here</a></center>
                </div>
            </form>
        </div>
    </div>
    <script src="http://localhost/management/lib/jquery/jquery.min.js"></script>
    <script src="http://localhost/management/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/management/lib/jquery.backstretch.min.js"></script>
    <script>
    $.backstretch("http://localhost/management/img/Button-Page-Section.jpg", 
    {
      speed: 200
    });
    </script>
</body>
</html>
<script>
$(document).ready(function(){
$('#user_country').change(function()
{
    var country_id = $('#user_country').val();
    if(country_id != '')
    {
        $.ajax
        ({
        url:"<?php echo base_url(); ?>User/fetch_state",
        method:"POST",
        data:{country_id:country_id},
        success:function(data)
        {
          $('#states').html(data);
          $('#cities').html('<option value="">Select City</option>');
        }
        });
    }
    else
    {
      $('#states').html('<option value="">Select State</option>');
      $('#cities').html('<option value="">Select City</option>');
    }
});

$('#states').change(function(){
var state_id = $('#states').val();
if(state_id != '')
{
    $.ajax
    ({
    url:"<?php echo base_url(); ?>User/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
      $('#cities').html(data);
    }
    });
}
else
{
  $('#cities').html('<option value="">Select City</option>');
}
});

});
</script>
