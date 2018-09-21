<html lang="en">
<head>
  <title>Learn Feedback Demo - User Record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h1 style="padding:8px 0">Learn Feedback Demo - User Record</h1>


<?php
///*
$servername = "localhost";
$username = "devbyo5_LFBDEMO";
$password = "o7N[;j]U*6y5";
$dbname = "devbyo5_LFBDEMO";
//*/
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lfb_demo";
*/

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT `UserId`, `FirstName`, `LastName`, `Email`, `CompanyName`, `MaltiRater`, `Delivering`, `Receiving`, `CreatedOn` FROM `tbluser` ORDER by `UserId` DESC;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo '<table class="table table-condensed table-bordered">';
	$sr = 1;
	echo "
		<thead>
		<tr>
		<th class='text-center'>No.</th>
		<th>Name</th>
		<th>Email</th>
		<th>Company</th>
		<th class='text-center'>MultiRater?</th>
		<th class='text-center'>Delivering Avg.</th>
		<th class='text-center'>Receiving Avg.</th>
		<th class='text-center'>Submitted On</th>
		</tr>
		</thead>
		<tbody>";
    while($row = mysqli_fetch_assoc($result)) {
        $mr = "";
		if($row["MaltiRater"]==1)
			$mr="Yes";
		echo "
		<tr>
		<td class='text-center'>".$sr."</td>
		<td>".$row["FirstName"]." ".$row["LastName"]."</td>
		<td>".$row["Email"]."</td>
		<td>".$row["CompanyName"]."</td>
		<td class='text-center'>".$mr."</td>
		<td class='text-center'>".$row["Delivering"]."</td>
		<td class='text-center'>".$row["Receiving"]."</td>
		<td class='text-center'>".$row["CreatedOn"]."</td>
		</tr>
		";
		$sr++;
    }
	echo "</tbody></table>";
} else {
    echo "No Result Found";
}

mysqli_close($conn);
?>
</div>
</body>
</html>