<div class="main-content">
            <header class="topbar">
                <h3> <a href="<?php echo base_url('UserController/welcome');?>" style="color:black;"><i class="fa-solid fa-bars"></i> Dashboard </a></h3>
                <div class="user-info">
                    <p>Welcome,<?php echo $username; ?>!</p>
                    <a href="<?php echo base_url('UserController/logout');?>">Logout</a>
                </div>
            </header>

              
                    <div class="card">
                        <h3>Projects</h3>
                        