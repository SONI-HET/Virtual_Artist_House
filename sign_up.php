
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$userType = $_POST['userType'];


$conn = new mysqli('localhost', 'root', '', 'user_data');
$ps=1;
$s = "select * from registration where username = '$username'";
$res = mysqli_query($conn, $s);
if($conn->connect_error){
	die('connection error :'.$conn->connect_error);
    
}

else{
		if(mysqli_num_rows($res)>0){
		
			echo
			 "<script>
			 alert('User Already Registered With This Email Address');
			 window.location.href = 'signUp.html';
			 </script>";
		}
		else if(($confirm_password==$password)  && (mysqli_num_rows($res)<=0)){
			$stmt = $conn->prepare("insert into registration(username, password,userType) values(?,?,?)");
			$stmt->bind_param("sss", $username, $password,$userType);
			$stmt->execute();
			$stmt->close();
			echo
			"<script>
			alert('Registration Successfull...');
			window.location.href = 'home-main.html';
			</script>";
		}
		else{	
			echo
			"<script>
			alert('Password Not Match...');
			window.location.href = 'signUp.html';
			</script>";
	}
	}
    
?>