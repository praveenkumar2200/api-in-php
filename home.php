<html>
<head>
<title>Demo Create and Consume Simple REST API in PHP - AllPHPTricks.com</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div style="width:700px; margin:0 auto;">

<h3>Demo Create and Consume Simple REST API in PHP</h3>   
<form action="" method="POST">
<label>Enter User ID:</label><br />
<input type="text" name="user_id" placeholder="Enter User ID" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>    

<?php
if (isset($_POST['user_id']) && $_POST['user_id']!="") 
{
	$user_id = $_POST['user_id'];
	$url = "http://localhost/api/api/".$user_id;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	    
	$result = json_decode($response);
	
	echo "<table>";
	echo "<tr><td>User ID:</td><td>".$user_id."</td></tr>";
	echo "<tr><td>Name:</td><td>$result->name</td></tr>";
	echo "<tr><td>Email:</td><td>$result->email</td></tr>";
	echo "<tr><td>Address:</td><td>$result->address</td></tr>";
	echo "<tr><td>Phone:</td><td>$result->phone</td></tr>";
	echo "</table>";
}
?>

</div>
</body>
</html>