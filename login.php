<?php
  require ("templates/header.php");
  $firstname=$lastname=$email=$phone=$password=$cpassword=$username=$loginError='';

  if(isset($_POST['register'])) {
    if(notEmpty($_POST)) {
      $firstname = getValue('firstname');
      $lastname = getValue('lastname');
      $username = getValue('username');
      $email = getValue('email');
      $password = getValue('password');
      $phone = getValue('phone');
      $cpassword = getValue('cpassword');
      $sql = "INSERT INTO user (firstname,lastname,username,email,phone,password) VALUES ('$firstname', '$lastname', '$username','$email','$phone','$password')";
      $connection->query($sql);
      if(mysqli_insert_id($connection)) {
        echo "<span class='success'>User Is registered</span>";
        header('Location:index.php');
      }
    } else {
      echo "Same fields have no values";
    }
  }
  if (isset($_POST['login'])) {
    if (notEmpty($_POST)) {
      $username = getValue('username');
      $password = getValue('password');

      $sql = "SELECT * FROM user WHERE email = '$username' OR username = '$username'";
      $result = $connection->query($sql);
      if ($result) {
        if ($result->num_rows > 0) {
          while ($userAccount = $result->fetch_assoc()) {
            if (compare($password, $userAccount['password'])) {
              $_SESSION['username'] =$userAccount['username'];
              $_SESSION['email'] = $userAccount['email'];
              $_SESSION['firstname'] = $userAccount['firstname'];
              $_SESSION['lastname'] = $userAccount['lastname'];
              $_SESSION['phone'] = $userAccount['phone'];
              $_SESSION['user_id'] = $userAccount['id'];
              header("Location:index.php");
            } else {
              $loginError = 'Invalid Username or password';
            }
          }
        } else {
          $loginError = 'Invalid Username or password';
        }
      }
    } else {
      $loginError = 'Please Enter Username Or email,  and Password';
    }
  }
?>
  <div class="col-2">
    <div class="login-form">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h1 class="text-center">Log into your account.</h1>
    <div class="error"><?php echo $loginError; ?></div>
      <label for="username">Username : </label><br>
      <input type="text" placeholder="Email or username" class="text-input" name="username" required><br>
      <label for="password">Password : </label><br>
      <input type="password" placeholder="Password" class="text-input" name="password" required><br><br>
      <button type="submit" name="login" value ="log in">Login</button>
    </form>
    </div>

    <div class="register-form">
      <h1 class="text-center">Create new account.</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
      <button type="submit" name="register" value="Register">Register</button><br>
    </div>
      </form>

  </div>
<?php include "templates/footer.php";

function getValue($index) {
  global $connection;
  $value = $_POST[$index];
  $value = strip_tags($value);
  $value = stripslashes($value);
  $value = $connection->real_escape_string($value);
  return $value;
}

function notEmpty ($values) {
  foreach($values as $value) {
    if (empty($value)) {
      return false;
    }
  }
  return true;
}

function compare($value1, $value2) {
  return $value1 === $value2;
}
?>