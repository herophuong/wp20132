<html>
<head><title>Conditional Test</title></head>
<body>
<?php 
$first = $_GET["first_name"];
$middle = $_GET["middle_name"];
$last = $_GET["last_name"];

echo ("Hi $first! Your full name is $last $middle $first.<br /><br />");
if ($first == $last) {
	echo "$first and $last are equal";
}
if ($first < $last) {
	echo "$first is less than $last";
}
if ($first > $last) {
	echo "$first is greater than $last";
}
echo "<br /><br />";

$grade_1 = $_GET["grade_1"];
$grade_2 = $_GET["grade_2"];
$final = (2 * $grade_1 + 3 * $grade_2) / 5;
echo "Your final grade is $final.";
if ($final > 89) {
	echo "You got an A. Congratulation";
	$rate = "A";
} elseif ($final > 79) {
	echo "You got a B.";
	$rate = "B";
} elseif ($final > 69) {
	echo "You got a C.";
	$rate = "C";
} elseif ($final >59) {
	echo "You got a D.";
	$rate = "D";
} elseif ($final >39) {
	echo "You got an E.";
	$rate = "E";
} elseif ($final > 0) {
	echo "You got a F";
	$rate = "F";
} else {
	echo "Illegal grade!";
	$rate = "Illegal";	
}

echo "<br /><br />";
switch ($rate) {
	case "A":
		echo "Excellent";
		break;
	case "B":
		echo "Good";
		break;
	case "C":
		echo "Not bad!";
		break;
	case "D":
		echo "Normal!";
		break;
	case "E":
	case "F":
		echo "You have to try again";
		break;
	default:
		echo "Illegal grade!";
		break;
}
?>
</body>
</html>