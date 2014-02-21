<html>
<head><title>Guess a number</title></head>
<body>
<?php 
function get_post_var($name) {
  return (array_key_exists($name, $_POST) ? $_POST[$name] : null);
}
$guess_number = get_post_var("guess_number");
$guess_count = get_post_var("guess_count");
$original_number = get_post_var("original_number");
if ($original_number == NULL) {
  $original_number = rand(0, 100);
}
if ($guess_count == NULL) {
  $guess_count = 0;
}
if (is_numeric($guess_number)) {
  $guess_count++;
}
?>
  <h4>Guess a number</h4>
  <form method="post" action="guess_number.php">
    <input type="hidden" name="guess_count" value="<?= $guess_count; ?>" />
    <input type="hidden" name="original_number" value="<?= $original_number; ?>" />
    <label for="guess_input">Your guess: </label>
    <input id="guess_input" type="text" name="guess_number" value="<?= $guess_number; ?>" />
    <input type="submit" value="Submit" />
  </form>
  <?php 
  if ($guess_number != NULL) {
    if (is_numeric($guess_number)) {
      if ($original_number == $guess_number) {
        echo "<p style='color: blue;'>You got it right! ";
      } else {
        echo "<p style='color: red;'>You got it wrong! ";
        if ($original_number > $guess_number) {
          echo "Try a larger number. ";
        } else {
          echo "Try a smaller number. ";
        }
      }
      echo "Guessed $guess_count times.</p>";
    } else {
      echo "<p style='color: red'>Please guess with a valid number!</p>";
    }
  }
  ?>
</body>
</html>