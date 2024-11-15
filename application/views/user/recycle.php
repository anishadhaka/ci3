<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/css/dashboard.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/css/recycle.css') ?>" />

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
 
 <div id="table">
            <table> 
                <div class="top">
                <button><a href="<?php echo base_url('UserController/blog'); ?>"><i class="fa-solid fa-backward"></i> Back</a></button>
                <h4 class="h4">Blog Recycle Data</h4>
               
                </div>
              
               <thead>
                 <tr>
                   <th>id</td>
                   <th>Name</th>
                   <th>Title</th>
                   <th>Description</th>
                   <th>Create Date</th>
                   <th>Update Date</th>
                   <th>image</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>   
                <?php foreach ($data as $user) { ?>  
                    <tr>
                       <td> <?php echo $user['id'] ?></td>
                       <td> <?php echo $user['name'] ?></td>
                       <td> <?php echo $user['title'] ?></td>
                       <td> <?php echo $user['description'] ?></td>
                       <td> <?php echo $user['createdate'] ?></td>
                       <td> <?php echo $user['updatedate'] ?></td>  
                       <td>
                           <?php if (!empty($user['image'])): ?>
                               <img src="<?php echo base_url('uploads/images/' . $user['image']); ?>" alt="Blog Image" height="50">
                           <?php else: ?>
                               <span>No Image</span>
                           <?php endif; ?>
                      </td>
                       <td>
                          <form method="DELETE" action="<?php echo base_url('UserController/blogdelete/'.$user['id'] );?>">
                          <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                          <button type="submit" class="btn "><a href="<?php echo base_url('UserController/blogrestore/'.$user['id'] );?>"><i class="fa-solid fa-pen-to-square"></i>Restore</a></button>
                          </form>
                       </td>
                    </tr>
                     <?php } 
                     ?>
        </tbody>
        </table>
        <div class="pagination-links">
            <?php echo $data['links']; ?> 
        </div>
        </div>
        </div>
      

        </div>
        </div>
    </div>

