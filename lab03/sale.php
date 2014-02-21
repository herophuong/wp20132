<html>
<head><title>Sale</title></head>
<body>
  <?php
    $today = date('l, F d, Y');
    $month = date('m');
    $year = date('Y');
    $day_of_year = date('z');
  ?>
<h3>Welcom on <?= $today; ?> to our huge blowout sale!</h3>
<?php if ($month == 12 && $year == 2001);?>
</body>
</html>