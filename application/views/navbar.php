<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <h5 id="session"><span><?php echo $this->session->userdata['ci_session']['User_name'];?></span></h5>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                <img class="profileimage" src="http://localhost/management/assets/image/download.png">
              </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation">
                    <a role="menuitem" tabindex="-1" href="<?php echo base_url('User/logout');?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout</a>
                  </li>
              </ul>
            </div>
          </ul>
        </nav>
</body>
</html>