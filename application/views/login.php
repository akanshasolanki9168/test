<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Login</title>
    <link href="http://localhost/management/img/favicon.png" rel="icon">
    <link href="http://localhost/management/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="http://localhost/management/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/management/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="http://localhost/management/css/style.css" rel="stylesheet">
    <link href="http://localhost/management/css/style-responsive.css" rel="stylesheet">
</head>
<body>
    <div id="login-page"><br><br>
        <div class="container">
            <form class="form-login" method="post" action="<?php echo base_url('User/log'); ?>">
            <h2 class="form-login-heading">sign in now</h2>
            <div class="login-wrap">
            <input type="text" class="form-control" placeholder="User ID" name="user_email" autofocus>
            <br>
            <input type="password" class="form-control" placeholder="Password" name="user_password">&nbsp;&nbsp;
            <button class="btn btn-theme btn-block" type="submit" value="login" name="login"><i class="fa fa-lock"></i> SIGN IN</button>
            <hr>
            <div class="registration">
            Don't have an account yet?<br/>
            <a href="<?php echo base_url('User/index'); ?>">Create an account</a>
            </div>
            </div>
            </form>
        </div>
    </div>
    <script src="http://localhost/management/lib/jquery/jquery.min.js"></script>
    <script src="http://localhost/management/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/management/lib/jquery.backstretch.min.js"></script>
    <script>
    $.backstretch("http://localhost/management/img/login-bg.jpg", {
    speed: 500
    });
    </script>
</body>

</html>


