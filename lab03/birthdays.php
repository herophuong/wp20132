<html>
<head><title>Birthday</title></head>
<body>
  <h4>Birthdays</h4>
  <?php 
  $name_1 = get_post_var("name_1");
  $name_2 = get_post_var("name_2");
  $birthday_1 = get_post_var("birthday_1");
  $birthday_2 = get_post_var("birthday_2");
  ?>
  <form method="POST">
    <hr />
    <label>
      Your name:
      <input type="text" name="name_1" value="<?= $name_1; ?>"/>
    </label>
    <label>
      Your birthday:
      <input type="text" name="birthday_1" value="<?= $birthday_1; ?>"/>
    </label>
    <hr />
    <label>
      Your friend's name:
      <input type="text" name="name_2" value="<?= $name_2; ?>"/>
    </label>
    <label>
      Your friend's birthday:
      <input type="text" name="birthday_2" value="<?= $birthday_2; ?>"/>
    </label>
    <br />
    <input type="submit" value="Submit">
  </form>
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $time_1 = strtotime($birthday_1);
    $old_1 = calculate_age($time_1);
    $time_2 = strtotime($birthday_2);
    $old_2 = calculate_age($time_2);
    if ($time_1 === FALSE) {
      echo '<p style="color:red">Your birthday is invalid</p>';
    } else {
      echo '<p style="color:blue">Your birthday is ' . date('D, d M Y', $time_1) . '. You are ' . $old_1 . ' years old.</p>';
    }
    if ($time_2 === FALSE) {
      echo '<p style="color:red">Your friend\'s birthday is invalid';
    } else {
      echo '<p style="color:blue">Your friend\'s birthday is ' . date('D, d M Y', $time_2) . '. Your friend is ' . $old_2 . ' years old.</p>';
    }
    if ($time_1 !== FALSE && $time_2 !== FALSE) {
      $days = abs($time_2 - $time_1) / 60 / 60 / 24;
      echo "There are $days days or " . abs($old_2 - $old_1) . " year(s) between your birthday and your friend's.";
    }
  }
  ?>
</body>
</html>
<?php 
function get_post_var($name) {
  return (array_key_exists($name, $_POST) ? $_POST[$name] : null);
}
function calculate_age($timestamp) {
  return (int) (abs(time() - $timestamp) / (60 * 60 * 24 * 365));
}
?>