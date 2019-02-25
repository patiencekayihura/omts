<?php
  include ("templates/header.php");
?>
  <div class="col-2">
    <div class="login-form">
      <h1 class="text-center">Log into your account.</h1>
      <label for="username">Username : </label><br>
      <input type="text" placeholder="Email or username" class="text-input"><br>
      <label for="password">Password : </label><br>
      <input type="password" placeholder="Password" class="text-input"><br><br>
      <button type="submit">Login</button>
    </div>

    <div class="register-form">
      <h1 class="text-center">Create new account.</h1>
      <form action="<?php echo _SERVER['PHP_SELF']; ?>">
      <label for="firstname">Firstname</label><br>
      <input type="text" name="firstname" placeholder="Firstname" id="firstname" class="text-input" required><br>
      <label for="lastname">Lastname</label><br>
      <input type="text" name="lastname" placeholder="Lastname" id="lastname" class="text-input" required><br>
      <label for="email">email</label><br>
      <input type="text" name="email" placeholder="Eamil address" id="email" class="text-input" required><br>
      <label for="username">username</label><br>
      <input type="text" name="username" placeholder="Username" id="username" class="text-input" required><br>
      <label for="phone">phone</label><br>
      <input type="text" name="phone" placeholder="+250787740316" id="phone" class="text-input" required><br>
      <label for="password">password</label><br>
      <input type="password" name="password" placeholder="Password" id="password" class="text-input" required><br>
      <label for="cpassword">password</label><br>
      <input type="password" name="cpassword" placeholder="Confirm Your password" id="cpassword" class="text-input" required><br>
      <button type="submit">Register</button><br>
    </div>
      </form>

  </div>
<?php include "templates/footer.php"; ?>