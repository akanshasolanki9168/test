<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
            <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('User/admin');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span id="Dashboard">Dashboard</span>
        </a>
        <a class="nav-link" href="<?php echo base_url('User/blogview');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span id="blog">Blog</span>
        </a>
      </li>
      <hr class="sidebar-divider">
    </ul>
</body>
</html>