<?php
include "templates/header.php";
if (isset($_POST['delete'])) {
  $sql = "DELETE FROM appointment WHERE id = '$_POST[appointment_id]'";
  $connection->query($sql);
}
if (isset($_POST['decline'])) {
  $sql = "UPDATE appointment SET status = 'declined' WHERE id = '$_POST[appointment_id]'";
  $connection->query($sql);
}
if (isset($_POST['accept'])) {
  $sql = "UPDATE appointment SET status = 'accepted' WHERE id = '$_POST[appointment_id]'";
  $connection->query($sql);
}
?>
<br>
  <h1 class="text-center">Welcome to Admin Panel</h1>
  <hr>
  <h4 class="text-center">Here is the List of All appointments Made!</h4>
  <br>
  <div class="appointments">
    <?php
      $sql = "SELECT * FROM appointment";
      $appointments = $connection->query($sql);
      if ($appointments) {
        if ($appointments->num_rows) {
           ?>
           <div>
           <ol>
            <?php 
              while ($result = $appointments->fetch_assoc()) {
                $user = getUserById($result['user_id']);
                ?>
                  <div class="card">
                    <div class="username"><b>Name: </b><?php echo $user['firstname']. " ".$user['lastname']?> <br>
                    <b>Email:</b> <?php echo $user['email'];?>
                    <br>
                    <?php
                    echo "<b>Massage Type: </b>".$result['massagetype'];
                    echo "<br>";
                    echo "<b>Date: </b>".$result['date'];
                    echo "<br><b>Status: </b>".$result['status'];
                    ?>
                    <br>
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="inline">
                        <input type="hidden" name="appointment_id" value="<?php echo $result['id']; ?>">
                      <button name="decline" type="submit">Decline</button></form>

                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="inline">
                        <input type="hidden" name="appointment_id" value="<?php echo $result['id']; ?>">
                      <button name="accept" type="submit">Accept</button></form>

                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="inline">
                        <input type="hidden" name="appointment_id" value="<?php echo $result['id']; ?>">
                      <button name="delete" type="submit">Delete</button></form>
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
<?php
  include "templates/footer.php";
  function getUserById($id) {
    $sql = "SELECT * FROM user WHERE id = $id";
    global $connection ;
    $result = $connection->query($sql);
    if ($result) {
      while ($user = $result->fetch_assoc()) {
        return $user;
      }
    } else {
      return false;
    }

  }
?>