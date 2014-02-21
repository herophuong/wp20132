<html>
<head><title>Distance from Chicago!</title></head>
<body>
  <h1>Welcome to the Distance Calculator</h1>
  <div>The page that calculates the distance from Chicago to different locations</div>
  <p>Select a destination:</p>
  <form action="check_distance.php" method="GET">
    <select name="destination[]" size="5" multiple>
      <option value="boston">Boston</option>
      <option value="dallas">Dallas</option>
      <option value="miami">Miami</option>
      <option value="nashville">Nashville</option>
      <option value="las vegas">Las Vegas</option>
      <option value="pittsburgh">Pittsburgh</option>
      <option value="san francisco">San Francisco</option>
      <option value="toronto">Toronto</option>
      <option value="washington">Washinton, DC</option>
    </select>
    <br />
    <input type="submit" value="Submit" />
    <input type="reset" value="Reset" />
  </form>
</body>
</html>