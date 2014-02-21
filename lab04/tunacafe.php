<html>
<head><title>Tuna Cafe</title></head>
<body>
  <h1>Welcome to the Tuna Cafe Survey!</h1>
  <form action="tunaresults.php" method="GET">
    <?php
    $menu = array('Tuna Casserole', 'Tuna Sandwich', 'Tuna Pie',
      'Grilled Tuna', 'Tuna Surprise');
    $bestseller = 2;
    echo 'Please indicate all your favorite dishes.<br />';
    for ($i = 0; $i < count($menu); $i++) {
      echo "<label><input type='checkbox' name='prefer[]' value='$i'>$menu[$i]</label>";
      if ($i == $bestseller) {
        echo '<span style="color: red;"> Our best seller!!!</span>';
      }
      echo '<br />';
    }
    ?>
    <input type="submit" value="Submit" />
    <input type="reset" value="Reset" />
  </form>
</body>

</html>