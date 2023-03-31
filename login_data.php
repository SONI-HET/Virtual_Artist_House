<?php
// echo  'hi';
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'user_data');
$username = $_POST['username'];
$password  = $_POST['password'];
$s = "select * from registration where username = '$username' && password = '$password'" ;
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num==1){
        echo
        "<script>
        alert('Login Successfull');
        window.location.href = 'home-main.html';
        </script>";    
    
}
else{
        echo
         "<script>
         alert('Invalid Information Try Again...!!!');
         window.location.href = 'login.html';
         </script>";
}


?>