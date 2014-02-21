<html>
<head><title>Tuna Cafe</title></head>
<body>
<h1>Tuna Cafe Results Received</h1>
<?php 
$menu = array('Tuna Casserole', 'Tuna Sandwich', 'Tuna Pie',
    'Grilled Tuna', 'Tuna Surprise');
$prefer = $_GET['prefer'];
if (count($prefer) == 0) {
  echo "Please pick something";
} else {
  echo "<br />Your selection were: ";
  echo "<ul>";
  foreach ($prefer as $item) {
    echo "<li>$menu[$item]</li>";
  }
  echo "</ul>";
}
?>
</body>
</html>