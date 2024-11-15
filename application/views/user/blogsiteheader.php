<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Watch My Review</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="<?php echo base_url('public/css/blogsite.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/contactus.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/about.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/categorias.css'); ?>">

  <!-- <script src="scripts.js" defer></script> -->
</head>
<body>


  <header>
    <div class="logo">
      <h1><i class="fa-solid fa-sailboat"> </i><b>DW</b>Digita Web</h1>
    </div>
    <nav>
    <ul>
        <li><a href="<?php echo base_url('blogsite'); ?>"><i class="fa-solid fa-house"></i> Home</a></li>
        <li><a href="<?php echo base_url('UserController/blogsitecategories'); ?>">Categorías</a></li>
        <li><a href="<?php echo base_url('UserController/blogsiteabout'); ?>">About</a></li>
        <li><a href="<?php echo base_url('contactus'); ?>">Contact Us</a></li>
      </ul>
     
       
      <!-- <div class="language-switcher">
   
        <select id="languageSelect" onchange="changeLanguage()">
          <option value="es">Español</option>
          <option value="en">English</option>
          <option value="fr">Français</option>
          <option value="pt">Português</option>
          <option value="it">Italiano</option>
          <option value="de">Deutsch</option>
          <option value="tr">Türkçe</option>
          <option value="ru">Русский</option>
          <option value="zh">中文</option>
          <option value="ko">한국어</option>
        </select>
      </div> -->
    </nav>
  </header>