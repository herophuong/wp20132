<html>
<head><title>Coin Flip Results</title></head>
<body>
<?php 
  srand((double) microtime() * 10000000);
  $flip = rand(0, 1);
  $pick = $_POST["pick"];
  echo "The flip is " . ($flip == 0 ? "head" : "tail") . ".<br />";
  if ($flip == $pick) {    
    echo "<font color='blue'>You got it right!</font>";
  } else {
    echo "<font color='red'>You got it wrong!</font>";
  }
?>
</body>
</html>