<html>
<head><title>Distance and Time Calculations</title></head>
<body>
<?php 
$cities = array(
  'dallas'        => 803,
  'toronto'       => 435,
  'boston'        => 848,
  'nashville'     => 406,
  'las vegas'     => 1526,
  'san francisco' => 1189,
  'washington'    => 595,
  'miami'         => 1189,
  'pittsburgh'    => 409
);
$destinations = (array) $_GET['destination'];
?>
From Chicago to:
<table>
  <thead>
    <tr>
      <th>No.</th>
      <th>Destination</th>
      <th>Distance</th>
      <th>Driving time</th>
      <th>Walking time</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($destinations as $index => $destination) {
        echo "<tr><td>$index</td>";
        echo "<td>$destination</td>";
        if (isset($cities[$destination])) {
          $distance = $cities[$destination];
          $time = round ( ($distance / 60.0) , 2);
          $walktime = round( ($distance / 5.0), 2);
          echo "<td>$distance</td>";
          echo "<td>$time</td>";
          echo "<td>$walktime</td>";
        } else {
          echo "<td colspan='3'>Sorry, we do not have destination information.</td>";
        }
        echo "</tr>";
      }
    ?>
  </tbody>
</table>
</body>
</html>