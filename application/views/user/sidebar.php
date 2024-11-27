
    <nav class="sidebar">
        <div class="sidebar-header">
            <h4> 
                <!-- <i class="fa-solid fa-plane-departure"></i> -->
                <img src="https://www.absglobaltravel.com/public/images/footer-abs-logo.webp" height="50">
             </h4>
        </div>
        <ul class="sidebar-menu">
            <li><a href="<?php echo base_url('UserController/welcome');?>"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('UserController/profile');?>"> <i class="fa-solid fa-user"></i> Profile</a></li>
            <li><a href="<?php echo base_url('UserController/view');?>"> <i class="fa-solid fa-users"></i> User List</a></li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-btn"> <i class="fa-solid fa-bars-progress"></i> Blog <i class="fa-solid fa-caret-down"></i> </a>
                <ul class="dropdown-container">
                    <li><a href="<?php echo base_url('UserController/blog');?>"><i class="fa-solid fa-bars-progress"></i> Blogs</a></li>
                    <li><a href="<?php echo base_url('UserController/bloglistcategorias');?>"><i class="fa-solid fa-table"></i> Blog Categories</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-btn"> <i class="fa-solid fa-bars-progress"></i> Pages List <i class="fa-solid fa-caret-down"></i></i> </a>
                <ul class="dropdown-container">
                    <li><a href="<?php echo base_url('UserController/pageslist');?>"><i class="fa-solid fa-bars-progress"></i> Pages List</a></li>
                    <li><a href="<?php echo base_url('UserController/addpages');?>"><i class="fa-solid fa-plus"></i> Add Pages</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-btn"> <i class="fa-solid fa-newspaper"></i> News <i class="fa-solid fa-caret-down"></i></i></a>
                <ul class="dropdown-container">
                    <li><a href="<?php echo base_url('UserController/news');?>"><i class="fa-solid fa-newspaper"></i> News</a></li>
                    <li><a href="<?php echo base_url('UserController/newscategorias');?>"><i class="fa-solid fa-plus"></i> News Categories</a></li>
                </ul>
            </li>
        </ul>
    </nav>



   
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

