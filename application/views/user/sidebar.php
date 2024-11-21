<nav class="sidebar">
            <div class="sidebar-header">
                <h4> <i class="fa-solid fa-plane-departure"></i>Absolute Global Travel</h4>
            </div>
            <ul class="sidebar-menu">
                <li><a href="<?php echo base_url('UserController/welcome');?>"><i class="fa-solid fa-bars"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('UserController/profile');?>"> <i class="fa-solid fa-user"></i> Profile</a></li>
                <li><a href="<?php echo base_url('UserController/view');?>"> <i class="fa-solid fa-users"></i> userlist</a></li>
                
            <li class="dropdown">
              <a href="" class="dropdown-toggle"> <i class="fa-solid fa-bars-progress"></i> Blog </a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('UserController/blog');?>"><i class="fa-solid fa-bars-progress"></i> Blogs</a></li>
              <li><a href="<?php echo base_url('UserController/addblog');?>"><i class="fa-solid fa-plus"></i> Add Blog</a></li>
              <li><a href="<?php echo base_url('UserController/bloglistcategorias');?>"><i class="fa-solid fa-table"></i>blog categorias</a></li>
              <li><a href="<?php echo base_url('UserController/addcategories');?>"><i class="fa-solid fa-plus"></i>Add categorias</a></li>
                
            </ul>
            </li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle"> <i class="fa-solid fa-bars-progress"></i> Pages_list </a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('UserController/pageslist');?>"><i class="fa-solid fa-bars-progress"></i> Pages_list</a></li>
                <li><a href="<?php echo base_url('UserController/addpages');?>"><i class="fa-solid fa-plus"></i>  Add Pages</a></li>
               
              </ul>
            </li>
               

            <li class="dropdown">
              <a href="" class="dropdown-toggle"> <i class="fa-solid fa-newspaper"></i> News </a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('UserController/news');?>"> <i class="fa-solid fa-newspaper"></i> News</a></li>
                <li><a href="<?php echo base_url('UserController/newscategorias');?>"><i class="fa-solid fa-plus"></i>  news categorias</a></li>
                <!-- <li><a href="<?php echo base_url('UserController/editpage/'.$user['id'] );?>"><i class="fa-solid fa-edit"></i> Manage page</a></li> -->
                <!-- <li><a href="<?php echo base_url('UserController/blog_archive');?>"><i class="fa-solid fa-archive"></i> Archived Blogs</a></li> -->
              </ul>
            </li>
                
                <!-- <li><a href="<?php echo base_url('UserController/news');?>"> <i class="fa-solid fa-newspaper"></i> News</a></li> -->
            </ul>
        </nav>