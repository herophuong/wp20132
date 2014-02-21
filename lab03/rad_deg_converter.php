<?php
function deg_2_rad($deg) {
  return $deg * M_PI / 180;
}
function rad_2_deg($rad) {
  return $rad * 180 / M_PI;
}
?>
<html>
<head><title>Angle Unit Conversion</title></head>
<body>
  <form method="POST">
    <input type="text" name="number" value="0" />
    <select name="function">
      <option value="rad_2_deg">Radian to Degree</option>
      <option value="deg_2_rad">Degree to Radian</option>
    </select>
    <input type="submit" value="Submit" />
  </form>
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    echo "Result is " . call_user_func($_POST["function"], $_POST["number"]);
  }
  ?>
  
</body>
</html>