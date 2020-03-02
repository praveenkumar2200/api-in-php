<?php
header("content-type:application/json");
if(isset($_GET["user_id"]) && $_GET["user_id"]!="")
{
	include('config.php');
    $user_id=$_GET["user_id"];
	$sql="select * from users where id='$user_id'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$name=$row['name'];
		$address=$row['address'];
		$email=$row['email'];
		$phone=$row['phone'];
		
		response($name,$address,$email,$phone);
	}
	else
	{
		response(null,null,"not found",404);
	}
}
else
{
	response(null,null,"Invalid Request",402);
}

function response($name,$address,$email,$phone)
{
	$response['name']=$name;
	$response['address']=$address;
	$response['email']=$email;
	$response['phone']=$phone;
	
	$json_response=json_encode($response);
	echo $json_response;
}
?>