<?php include "templates/header.php"; ?>
<div class="center">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <div class="form-controls">
  <label for="massage-type">Massage Type: </label> <br>
    <input type="text" class="text-input" name="massage-type" id="massage-type" placeholder="Massage Type" required> <br>
    <br>
    <label for="date">Date Of appointment: </label> <br>
    <input type="date" name="date" id="date" class="text-input" required>
    <br>
    <button type="submit">Make appointment</button>
  </div>
</form>
</div>
<?php include "templates/footer.php"; ?>