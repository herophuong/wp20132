<html>
<head>
<title>Square and Cube</title>
</head>
<body>
  <h1>Generate Square and Cube Values</h1>

  <br>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <?php 
      
      $start = !empty($_GET["start"]) ? $_GET["start"] : 0;
      $end = !empty($_GET["end"]) ? $_GET["end"] : 0;
    ?>
    <table>
      <tr>
        <td>Select Start Number: </td>
        <td>
          <select name="start">
            <?php for ($i = 0; $i <= 10; $i++) { ?> 
            <option value="<?= $i; ?>" <?= ($start == $i) ? "selected" : ""; ?>><?= $i; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Select End Number: </td>
        <td>
          <select name="end">
            <?php for ($i = 0; $i <= 20; $i++) { ?>
            <option value="<?= $i; ?>" <?= ($end == $i) ? "selected" : ""; ?>><?= $i; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td align="right"><input type="submit" value="Submit"></td>
        <td><input type="reset" value="Reset"></td>
      </tr>
    </table>
    
    <table>
      <tr><th>Number</th><th>Square</th><th>Cube</th></tr>
      <?php 
        if (array_key_exists("start", $_GET)) {
          $i = $start;
          while ($i <= $end) {
            $sqr = $i * $i;
            $cubed = $i * $i * $i;
            echo "<tr><td>$i</td><td>$sqr</td><td>$cubed</td></tr>";
            $i = $i + 1;
          }
        }
      ?>
    </table>
  </form>
</body>
</html>
