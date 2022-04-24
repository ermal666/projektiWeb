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
				echo "<script>alert('User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
            } else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>
<style>
    /*kodi per navbar*/
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}
body{
    background: #fff;
    min-height: 100vh;
}
header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.6s;
    padding: 20px 100px;
    z-index: 10000;
}
header.sticky{
    padding: 5px 100px;
    background: #fff;
}
header .logo{
    position: relative;
    font-weight: 700;
    color: #fff;
    text-decoration: none;
    font-size: 2em;
    text-transform: uppercase;
}
.sticky .menu-btn i {
    color: black;
    font-size: 22px;
    cursor: pointer;
    display: none;

}
header ul{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
header ul li{
    position: relative;
    list-style: none;
}
header ul li a{
    position: relative;
    margin: 0 15px;
    text-decoration: none;
    color: #fff;
    letter-spacing: 2px;
    font-weight: 500px;
    transition: 0.6s;
}
.banner{
    position: relative;
    width: 100%;
    height: 100vh;
    background-size: cover;
}
header.sticky ul li a{
    color: #000;
}
#click {
    display: none;
}
@media (max-width: 940px) {
    .sticky .menu-btn i {
        display: block;
        color: black;
    }
    header ul {
        position: fixed;
        top: 80px;
        left: -100%;
        height: 100vh;
        width: 100%;
        display: block;
        text-align: center;
        transition: 0.3s ease;
        background-color: #E82126;
    }
    #click:checked ~ ul{
        left: 0;
      }
    header ul li {
        margin: 40px 0;
    }
    header ul li a {
        font-size: 20px;
        display: block;
    }
    
}
/*kodi per navbar*/
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
body {
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Montserrat', sans-serif;
    background: linear-gradient(to left, #E82126, #000000);
}

.register-container{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    padding: 2rem;
    text-align: center;
    border-radius: 1rem;
    background: white;
}

h1{
    margin-top: 0;
}

.form-row {
    position: relative;
    margin-bottom: 0.5rem;
}
.form-input {
    box-sizing: border-box;
    padding:2rem 1rem 0.5rem 0.5rem;
    border: 0;
    border-bottom: 1px solid lightgrey;
    width: 100%;
}

.form-input::placeholder {
    color: transparent;
    display: none;
}

.form-input:focus {
    outline: none;
    border-bottom: 2px solid #E82126;
}

.form-label {
    position: absolute;
    color: gray;
    bottom: 0.5rem;
    left: 0;
    transition: opacity .1s ease-in-out, transform .1s ease-in-out;
}

.form-input:focus~.form-label, .form-input:not(:placeholder-shown)~.form-label {
    opacity: .65;
    transform: scale(.85) translateY(-1.3rem);
}

.forgot-pwd{
    float: right;
    text-decoration: none;
    color: black;
    margin-top: 1rem;
}

.submit-btn {
    margin-top: 2rem;
    width: 100%;
    font-size: 1.2rem;
    border-radius: 2rem;
    padding: 0.5rem 2rem;
    background: #E82126;
    color: white;
    border: 0;
}

.submit-btn:hover {
    cursor: pointer;
    background: black;
    text-decoration: none;
}

.sign-up-text{
    color: gray;
    display: block;
    margin-top: 2rem;
}

.sign-up-text >a{
    text-decoration: none;
    color: #E82126;
}




</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register2.css">
</head>
<body>
    <div class="register-container">

        <form action="" method="POST">
            <h1>Register</h1>
            <div class="form-row">
                <input name="username" type="text" id="textinput" class="form-input" placeholder="username" value="<?php $username; ?>">
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
        <p class="sign-up-text">Already have an account? <a href="login.php"> Sign In</a></p>
    </div>
    <!--kodi per navbar-->
    <div class="main">
        <header class="sticky">
            <a href="projekti.php"><img src="tesla-logo-png-2238.png" class="logo" width="220px"></a>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a href="projekti.php">Home</a></li>
                <li><a href="buynow.php">Phone</a></li>
                <li><a href="login.php">Account</a></li>
                <li><a href="contactus.php">Contact Us</a></li>

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