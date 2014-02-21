<html>
<head><title>Date Time Processor</title></head>
<body>
  <h4>Enter your name and select date and time for the appointment</h4>
  <form action="date_time_processing.php" method="POST">
    <table>
      <tbody>
        <tr>
          <td>Yourname:</td>
              <td><input type="text" name="name" value="<?= get_post_var("name"); ?>"></td>
        </tr>
        <tr>
          <td>Date:</td>
          <td>
            <?php echo_select("day", 1, 31, get_post_var("day"));?>
            <?php echo_select("month", 1, 12, get_post_var("month"));?>
            <?php echo_select("year", 1970, 2500, get_post_var("year"));?>
          </td>
        </tr>
        <tr>
          <td>Time: </td>
          <td>
            <?php echo_select("hour", 0, 23, get_post_var("hour"));?>
            <?php echo_select("minute", 0, 59, get_post_var("minute"));?>
            <?php echo_select("second", 0, 59, get_post_var("second"));?>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
          </td>
        </tr>
      </tbody>
    </table>
    <?php 
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = get_post_var("name");
        $month = get_post_var("month");
        $day = get_post_var("day");
        $year = get_post_var("year");
        $hour = get_post_var("hour");
        $minute = get_post_var("minute");
        $second = get_post_var("second");
        $iso_time = sprintf("%04d-%02d-%02d %02d:%02d:%02d", $year, $month, $day, $hour, $minute, $second);
        $timestamp = strtotime($iso_time);
        
        if (checkdate($month, $day, $year)) {
          echo "Hi $name! You choose the date " . date('D, d M Y H:i:s', $timestamp) . "<br />";
          echo "There is " . cal_days_in_month(CAL_GREGORIAN, $month, $year) . " days in " . date('F Y', $timestamp) . "<br />";
          echo "12 hours from this is " . date('D, d M Y H:i:s', $timestamp + 12 * 60 * 60);
        } else {
          echo "Your date is invalid!";
        }    
      } 
    ?>
  </form>
</body>
</html>
<?php 
function echo_select($name, $start, $end, $current) {
  echo "<select name=\"$name\">";
  for ($i = $start; $i <= $end; $i++) {
    if ($i == $current)
      echo "<option value=\"$i\" selected>$i</option>";
    else
      echo "<option value=\"$i\">$i</option>";
  }
  echo "</select>";
}

function get_post_var($name, $default = null) {
  return (array_key_exists($name, $_POST) ? $_POST[$name] : $default);
}
?>