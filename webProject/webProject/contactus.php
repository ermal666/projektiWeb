<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactus.css">
</head>

<body>
    <div class="login-container">

        <form>
            <h1>Contact Us</h1>
            <div class="form-row">
                <input type="text" id="textinput" class="form-input" placeholder="username">
                <label for="textinput" class="form-label" id="usernameMessage">User Name</label>
            </div>
            <div class="form-row">
                <input type="email" id="emailInput" class="form-input" placeholder="example@email.com">
                <label for="emailInput" class="form-label" id="emailMessage">Email</label>
            </div>
            <textarea type="text" id="textinp" class="field" placeholder="Message"></textarea>

            <button id="register" type="submit" class="submit-btn">Send</button>
        </form>

        <!--kodi per navbar-->
        <header>
            <a href="projekti.php"><img src="images/tesla-logo-png-2238.png" class="logo" width="220px"></a>
            <ul>
                <li><a href="projekti.php">Home</a></li>

                <li><a href="buynow.php">Phone</a></li>
                <li><a href="login.php">Account</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>
        </header>
        <!--kodi per navbar-->

    </div>
    </div>

    <!--Kodi ne js-->
    <script>
        var usernameRegex = /^[A-Z][a-z]*/;
        var emailRegex = /^\w+([._-]?\w+)*@[a-z]+[-]?[a-z]*\.[a-z]{2,3}/;
        var textRegex = /^[A-Z][a-z]*/;

        var registerButton = document.getElementById("register");
        var usernameMsg = document.getElementById("usernameMessage");
        var emailMsg = document.getElementById("emailMessage");
        var textMsg = document.getElementById("textinp");

        registerButton.addEventListener("click", function (event) {
            var username = document.getElementById("textinput").value;
            var email = document.getElementById("emailInput").value;
            var textarea = document.getElementById("textinp").value;


            if (username == "" || username == null) {
                usernameMsg.innerText = "Enter a username";
                usernameMsg.style.color = 'red'
                event.preventDefault();
            }
            else {
                if (usernameRegex.test(username)) {
                    usernameMsg.innerText = "";
                } else {
                    usernameMsg.innerText = "Username must start with uppercase";
                    event.preventDefault();
                }
            }
            if (email == "") {
                emailMsg.innerText = "Enter an email"
                emailMsg.style.color = 'red'
                event.preventDefault();
            }
            else {
                if (emailRegex.test(email)) {
                    emailMsg.innerText = "";
                } else {
                    emailMsg.innerText = "Enter a valid email"
                    event.preventDefault();
                }
            }
            if (textarea == "" || textarea == null) {
                textMsg.innerText = "Type something...";
                textMsg.style.color = 'red'
                event.preventDefault();
            }
        })
    </script>
</body>

</html>