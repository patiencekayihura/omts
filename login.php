<?php
  require_once ("templates/header.php");
?>
<h3 class="text-center">Log into Your account</h3>
  <div class="col-2">
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <div class="form-controls">
  <label for="username">Username: </label> <br>
    <input type="text" class="text" name="username" id="username" placeholder="Email or uername"> <br>
    <label for="password">Password: </label> <br>
    <input type="password" name="password" id="password" class="text" placeholder="Password">
    <br>
    <button type="submit">Login</button>
  </div>
</form>
<h3 class="text-center">Register if you don't have an account</h3>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <div class="form-controls">
  <label for="firstaname">firstname: </label> <br>
    <input type="text" class="text" name="firstname" id="firstname" placeholder="First name"> <br>
    <label for="lastname">Lastname: </label> <br>
    <input type="text" name="lastname" id="lastname" class="text" placeholder="Lastname">
    <br>
    <label for="Othername">othername: </label> <br>
    <input type="text" class="text" name="othername" id="othername" placeholder="Othername"> <br>
    <label for="email">email: </label> <br>
    <input type="email" name="email" id="email" class="text" placeholder="Email">
    <br>

    <label for="phone">phone: </label> <br>
    <input type="phone" class="text" name="phone" id="phone" placeholder="Phone"> <br>
    <label for="lastname">password: </label> <br>
    <input type="password" name="password" id="lastname" class="text" placeholder="Password">
    <br>
    <button type="submit">Login</button>
  </div>
</form>
  </div>
<?php require_once ("templates/footer.php")?>