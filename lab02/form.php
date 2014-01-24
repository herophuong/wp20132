<?php $header = ($_SERVER["REQUEST_METHOD"] == 'POST') ? "So you said this:" : "Tell me something" ?>
<html>
<head>
  <title><?php echo $header; ?></title>
  <style type="text/css">
  body {
    font-family: "Arial", sans-serif;
    background-color: rgb(255, 255, 255);
    background-image: url("noisy.png");
  }
  header, .container {
    width: 640px;
    background-color: white;
    padding: 10px;
    margin: auto;
    margin-bottom: 10px;
  }
  header h1 { text-align: center; margin: 0px;}
  </style>
</head>
<body>
    <header>
      <h1><?php echo $header; ?></h1>
    </header>
    <div class="container">
      <?php if ($_SERVER["REQUEST_METHOD"] != 'POST') { ?>
      <form method="POST" action="form.php">
        <table>
      		<tbody>
      			<tr>
      				<th>What's your name?</th>
      				<td>
      					<input type="text" name="info[name]" />
      				</td>
      			</tr>
      			<tr>
      				<th>Where I can send your email?</th>
      				<td>
      					<input type="email" name="info[email]" />
      				</td>
      			</tr>
      		</tbody>
      		<tfoot>
      			<tr>
      				<th></th>
      				<td><input type="submit" name="submit" value="Submit" /></td>
      			</tr>
      		</tfoot>
      	</table>
      </form>
      <?php } else { ?>
      <table>
      	<tbody>
      		<tr>
      			<th>Your name is </th>
      			<td><?php echo $_POST["info"]["name"]; ?></td>
      		</tr>
      		<tr>
      			<th>Your email is </th>
      			<td><?php echo $_POST["info"]["email"]?></td>
      		</tr>
      	</tbody>
      	<tfoot>
      		<tr>
      			<th></th>
      			<td><a href="form.php">Come back</a></td>
      		</tr>
      	</tfoot>
      </table>
      <?php } ?>
    </div>
</body>
</html>