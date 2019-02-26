<?php include "templates/header.php";
$user=$massageType=$date=$status=$actionMessage='';
if (isset($_POST['appoint'])) {
  if (notEmpty($_POST)) {
    $massageType = getValue('massage-type');
    $date = getValue('date');
    $status = "Pending";
    $user = $_SESSION['user_id'];
    $sql = "INSERT INTO appointment (user_id,massagetype,date,status) VALUES ('$user','$massageType','$date','$status')";
    $connection->query($sql);
    if (mysqli_insert_id($connection) > 0) {
      $actionMessage = "<span class='success'>Appointment Was successfully Made! You Will Get a notification When it is Confirmed</span>";
    } else {
      echo "$sql".mysqli_error();
    }
  }
}
?>
<div class="center">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <div class="form-controls">
  <label for="massage-type">Massage Type: </label> <br>
    <input type="text" class="text-input" name="massage-type" id="massage-type" placeholder="Massage Type" required> <br>
    <br>
    <label for="date">Date Of appointment: </label> <br>
    <input type="date" name="date" id="date" class="text-input" required>
    <br>
    <button type="submit" name="appoint" value="rsvp">Make appointment</button>
  </div>
  <div class="text-center"><?php echo $actionMessage; ?></div>
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
?>