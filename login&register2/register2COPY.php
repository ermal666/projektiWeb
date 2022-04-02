<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register2COPY.css">
</head>
<body>
    <div class="register-container">

        <form action="" method="POST">
            <h1>Register</h1>
            <div class="form-row">
                <input name="username" type="text" id="textinput" class="form-input" placeholder="username" value="<?php echo $username; ?>">
                <label for="textinput" class="form-label" id="usernameMessage">User Name</label>
            </div>
            <div class="form-row">
                <input name="email" type="email" id="emailInput" class="form-input" placeholder="example@email.com" value="<?php echo $email; ?>">
                <label for="emailInput" class="form-label" id="emailMessage">Email</label>
            </div>
            <div class="form-row">
                <input name="password" type="password" id="passwordInput" class="form-input" placeholder="password" value="<?php echo $_POST['password']; ?>">
                <label for="passwordInput" class="form-label" id="passwordMessage">Password</label>
            </div>
            <div class="form-row">
                <input name="cpassword" type="password" id="passwordInput" class="form-input" placeholder="password" value="<?php echo $_POST['cpassword']; ?>">
                <label for="passwordInput" class="form-label" id="confirmpasswordMessage">Confirm Password</label>
            </div>

            <button name="submit" id="register" type="submit" class="submit-btn">Register</button>
        </form>
        <p class="sign-up-text">Already have an account? <a href="loginCOPY.php"> Sign In</a></p>
    </div>
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
    <!--kodi per navbar-->
    
    <!--Kodi ne js-->
    <script>
        var usernameRegex = /^[A-Z][a-z]*/;
        var emailRegex = /^\w+([._-]?\w+)*@[a-z]+[-]?[a-z]*\.[a-z]{2,3}/;
        var passwordRegex = /^[A-Z][a-z]+\d{3}$/;
        var confirmpasswordRegex = /^[A-Z][a-z]+\d{3}$/;

        var registerButton = document.getElementById("register");
        var usernameMsg = document.getElementById("usernameMessage");
        var emailMsg = document.getElementById("emailMessage");
        var passwordMsg = document.getElementById("passwordMessage");
        var confirmpasswordMsg = document.getElementById("confirmpasswordMessage");

        registerButton.addEventListener("click",function(event){
        var username = document.getElementById("textinput").value;
        var email = document.getElementById("emailInput").value;
        var password = document.getElementById("passwordInput").value;
        var confirmpassword = document.getElementById("passwordInput").value;


        if(username == "" || username == null){
            usernameMsg.innerText = "Enter a username";
            usernameMsg.style.color= 'red'
            event.preventDefault();
        }
        else{
            if(usernameRegex.test(username)){
                usernameMsg.innerText = "";
            }else{
                usernameMsg.innerText = "Username must start with uppercase";
                event.preventDefault();
            }
        }
        if(email == ""){
            emailMsg.innerText = "Enter an email" 
            emailMsg.style.color= 'red'
            event.preventDefault();
        }
        else{
            if(emailRegex.test(email)){
                emailMsg.innerText = "";
            }else{
                emailMsg.innerText = "Enter a valid email"
                event.preventDefault();
             }
        }
        if(password == ""){
            passwordMessage.innerText = "Enter password"
            passwordMessage.style.color= 'red'
            event.preventDefault();
        }
        else{
            if(passwordRegex.test(password)){
                passwordMessage.innerText = "";
            }else{
                passwordMessage.innerText = "Password must start with uppercase and end with 3 numbers"
                event.preventDefault();
            }
        }
        if(confirmpassword == ""){
            confirmpasswordMessage.innerText = "Enter password"
            confirmpasswordMessage.style.color= 'red'
            event.preventDefault();
        }

    })
    </script>
</body>
</html>