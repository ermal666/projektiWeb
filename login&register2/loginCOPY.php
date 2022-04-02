<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginCOPY.css">
</head>

<body>
    <!--kodi per login form-->
    <div class="login-container">

        <form action="" method="POST" >
            <h1>Login</h1>
            <div class="form-row">
                <input name="email" type="email" id="emailInput" class="form-input" placeholder="example@email.com" value="<?php echo $email; ?>">
                <label for="emailInput" class="form-label" id="emailMessage">Email</label>
            </div>
            <div class="form-row">
                <input name="password" type="password" id="passwordInput" class="form-input" placeholder="pwd" value="<?php echo $_POST['password']; ?>">
                <label for="passwordInput" class="form-label" id="passwordMessage">Password</label>
            </div>
            <a href="#" class="forgot-pwd">Forgot Password?</a>

            <button name="submit" type="submit" class="submit-btn" id="register">Login</button>
        </form>
        <p class="sign-up-text">Don't have an account? <a href="register2COPY.php"> Sign Up</a></p>
    </div>
    <!--kodi per login form(perfundon)-->
    <!--kodi per navbar-->
    <div class="main">
        <header class="sticky">
            <a href="projektiCOPY.html"><img src="tesla-logo-png-2238.png" class="logo" width="220px"></a>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a href="projektiCOPY.html">Home</a></li>
                <li><a href="#">Phone</a></li>
                <li><a href="loginCOPY.php">Account</a></li>
                <li><a href="contactusCOPY.html">Contact Us</a></li>

            </ul>
        </header>
        <section class="banner"></section>
    <!--kodi per navbar(perfundon)-->

    <!--validation-->
    <!--validation-->

    <!--kodi ne js-->
    <script>
        var registerButton = document.getElementById("register");
        var emailMsg = document.getElementById("emailMessage");
        var passwordMsg = document.getElementById("passwordMessage");

        registerButton.addEventListener("click",function(event){
            var email = document.getElementById("emailInput").value;
            var password = document.getElementById("passwordInput").value;


        if(email == "" || email == null){
            emailMsg.innerText= "Please enter your email!"
            emailMsg.style.color= 'red'
            event.preventDefault();  
        }
        if(password == "" || password == null){
            passwordMsg.innerText = "Please enter your password!"
            passwordMsg.style.color= 'red'
            event.preventDefault();
        }
      
        else{
            emailMsg.innerText = "";
            passwordMsg.innerText = "";
        }
        
})
    </script>
</body>

</html>
