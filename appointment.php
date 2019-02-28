<?php include "templates/header.php";
if (isset($_POST['cancel'])) {
  $sql = "DELETE FROM appointment WHERE id = '$_POST[appointment_id]'";
  $connection->query($sql);
}
$user=$massageType=$date=$status=$actionMessage='';
if(isset($_GET['appointment'])) {
  $sql = "SELECT * FROM appointment WHERE id = '$_GET[appointment]'";
  $result = $connection->query($sql);
  while ($appointment = $result->fetch_assoc()) {
    $massageType = $appointment['massagetype'];
    $date = $appointment['date'];
  }
}
if (isset($_POST['appoint']) && isset($_GET['appointment'])) {
    if (notEmpty($_POST)) {
      $massageType = getValue('massage-type');
      $date = getValue('date');
      $status = "Pending";
      $user = $_SESSION['user_id'];
      $sql = "UPDATE appointment SET massagetype = '$massageType',status ='pending', date= '$date' WHERE id = '$_GET[appointment]'";
      $updated = $connection->query($sql);
      if ($updated) {
        $actionMessage = "<span class='success'>Appointment was updated successfully</span>";
      } else {
        echo "$sql".mysqli_error($connection);
      }
    }
}
if (!isset($_GET['appointment']) && isset($_POST['appoint'])) {
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
<form action="<?php echo $_SERVER['PHP_SELF']?><?php if (isset($_GET['appointment'])) { echo "?appointment=".$_GET['appointment']; }?>" method="POST">
  <div class="form-controls">
  <label for="massage-type">Massage Type: </label> <br>
    <input type="text" class="text-input" name="massage-type" id="massage-type" placeholder="Massage Type" required value="<?php echo $massageType; ?>"> <br>
    <br>
    <label for="date">Date Of appointment: </label> <br>
    <input type="date" name="date" id="date" class="text-input" required value="<?php echo $date; ?>">
    <br>
    <button type="submit" name="appoint" value="rsvp">Make appointment</button>
  </div>
  <div class="text-center"><?php echo $actionMessage; ?></div>
</form>
</div>
<div class="appointments">
<?php
      $sql = "SELECT * FROM appointment where user_id = '$_SESSION[user_id]'";
      $appointments = $connection->query($sql);
      if ($appointments) {
        if ($appointments->num_rows) {
           ?>
           <div>
           <ol>
            <?php 
              while ($result = $appointments->fetch_assoc()) {
                ?>
                  <div class="card">
                    <div class="appoint">
                    <?php
                    echo "<b>Massage Type: </b>".$result['massagetype'];
                    echo "<br>";
                    echo "<b>Date: </b>".$result['date'];
                    echo "<br><b>Status: </b>".$result['status'];
                    ?>
                    <br>
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="inline">
                        <input type="hidden" name="appointment_id" value="<?php echo $result['id']; ?>"><br>
                      <button name="cancel" type="submit">Cancel</button></form>
                      <a class ="button" href="?appointment=<?php echo $result['id']; ?>" type="submit">Edit</a> <br>
                    <?php
                    ?></div>

                  </div> <br>
                <?php
              }
            ?>
           </ol>
           </div>
           <?php
        } else {
          echo " no appoint ments were made";
        }
      } else {
        echo "There was an error While getting Appointments ";
      }
    ?>
</div>
<br><br>
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