<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="<?php echo base_url('public/css/blogsite.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/contactus.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/about.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/categorias.css'); ?>">

<section class="hero">
  <h2>INBOUND MARKITING BLOG</h2>
  <ul>
  <li><a href="<?php echo base_url('blogsite'); ?>"><i class="fa-solid fa-house"></i> Home</a></li>

  <li><a href="<?php echo base_url('UserController/blogcategoriasite'); ?>">Blog categorias</a></li>
  <li><a href="<?php echo base_url('UserController/newscategoriasite'); ?>">News Section</a></li>
        <li><a href="<?php echo base_url('about'); ?>">SEO</a></li>
        <li><a href="<?php echo base_url('contactus'); ?>">Contact Maeketing</a></li>
        <li><a href="<?php echo base_url('contactus'); ?>">Inbound Maeketing</a></li>

      </ul>
</section>
<section>
  <div class="top3">
     <h5>Recives the monthly newsletter </h5>
       <button><a href="UserController/login"><i class="fa-regular fa-user"></i></a></button>
</div>
</section>