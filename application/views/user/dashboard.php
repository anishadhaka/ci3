<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/dashboard.css') ?>" />
</head>
<body>

    
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="sidebar-header">
                <h4> <i class="fa-solid fa-plane-departure"></i>Absolute Global Travel</h4>
            </div>
            <ul class="sidebar-menu">
                <li><a href="<?php echo base_url('UserController/welcome');?>"><i class="fa-solid fa-bars"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('UserController/view');?>"> <i class="fa-solid fa-address-book"></i> userlist</a></li>
                <li><a href="<?php echo base_url('UserController/blog');?>"> <i class="fa-solid fa-bars-progress"></i> Bloglist</a></li>
                <!-- <li><a href="#"> <i class="fa-solid fa-landmark"></i> Resources</a></li>
                <li><a href="#"> <i class="fa-solid fa-bug"></i> Reports</a></li>
                <li><a href="#"> <i class="fa-solid fa-gear"></i> Settings</a></li> -->
            </ul>
        </nav>
        <div class="main-content">
            <header class="topbar">
                <h3> <a href="<?php echo base_url('UserController/welcome');?>" style="color:black;"><i class="fa-solid fa-bars"></i> Dashboard </a></h3>
                <div class="user-info">
                    <p>Welcome,<?php echo $username; ?>!</p>
                    <a href="<?php echo base_url('UserController/logout');?>">Logout</a>
                </div>
            </header>
            <div class="content">
              
                    <div class="card">
                        <h3>Projects</h3>
                        <p>10 active projects</p>
                    </div>
                <div class="cards">
                    <div class="card">
                        <h3>Projects</h3>
                        <p>10 active projects</p>
                    </div>
                    <div class="card">
                        <h3>Tasks</h3>
                        <p>50 tasks completed</p>
                    </div>
                    <div class="card">
                        <h3>Resources</h3>
                        <p>30 resources used</p>
                    </div>
                </div>
             

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
