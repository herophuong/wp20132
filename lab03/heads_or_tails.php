<html>
<head><title>Coin Flip!</title></head>
<body>
  <h4>Please pick heads or tails</h4>
  <form action="got_flip.php" method="POST">
    <label>
      <input type="radio" name="pick" value="0">Heads
    </label>
    <label>
      <input type="radio" name="pick" value="1">Tails
    </label>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form>
</body>
</html>