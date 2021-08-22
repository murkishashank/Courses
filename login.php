<?php
require('dbConnection.php');
$msg = '';
if(isset($_POST['submit'])){
    // $msg = '';
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql="SELECT * from Users where emailID = '$username' and password = '$password'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $count = $result->num_rows;
    if($count > 0){
        $_SESSION['USER_LOGIN'] = 'yes';
        $_SESSION['USERID'] = $row["UserID"];
        $_SESSION['USER_NAME'] = $row["UserName"];
        echo $_SESSION['USER_NAME'];
        // header('location:setSessionVariables.php');
        header('location:course.html');
        die();
    }else{
        $msg = "Please Enter Correct Details" ;
        // echo $msg;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="login.css">
	<title>Login</title>
</head>
<body>
    <div class="login">
    	<form method="POST">
            <label>E-Mail ID</label>
    		<input type="email" name="email" id="email" placeholder="Enter your email id"><br>
            <label>Password</label>
    		<input type="password" name="password" id="password" placeholder="Enter your password">
    		<button type="submit" name="submit">Submit</button>
    		<p class="errorMessage"><?php echo $msg ?></p>
    	</form>
    </div>
</body>
</html>