<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="<?php echo base_url('public/css/login.css') ?>">
   
</head>

<body>
<div class="bgccenter">
  <div class="container">
    <div class="header">
      <h1><span class="l">L</span>OGIN</h1>
    </div>
    <form action="<?php echo base_url('UserController/loginvalidation') ?>" id="login" method="post" >
      <label for="name">name</label>
      <input type="text" class="inp" name="name" required>
      <label for="ppassword">Password</label>
      <input type="password" class="inp" name="password" required>
      <button type="submit">Enter</button>
    </form>
    <div class="signup">
      <b>Don't have account?</b>
      <a href="<?php echo base_url('UserController/index')?>">Sign up</a>
    </div>
  </div>
</div>



</body>

</html>