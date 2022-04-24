<?php
require_once '../controller.php';

$menu = new MenuController;
if(isset($_POST['submit'])){
    $menu->insert($_POST);
}
?>
<style>
    .box{
        margin-right: 20px auto;   
        
    }
    form {
    width: 45%;
    margin: 150px auto;
    text-align: center;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
    justify-content: space-between;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    position: fixed;
    right: 400px;
    top: 0;
    z-index: 100;
}

.input-group {
    margin: 10px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
    margin: 10px;
}
.sv{
    background-color: #000000;
    color: red;
}

p{
    justify-content: space-between;
    padding:120px;
    position: fixed;
    left: 400px;
    width: calc(100% - 345px);
    top: 0;
    z-index: 100;
    transition: left 300ms;
}
</style>
<div class="input-group">
<div >
    <p><b>Create Users</b></p>
    <form method="POST">
    Username:
        <input type="text" name="username">
        <br>
        Email:
        <input type="email" name="email">
        <br>
        Password:
        <input type="password" name="password">
        <br>
        <input type="submit" name="submit" class="sv" value="Save">
    </form>
</div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <input type="checkbox" id="nav-toggle">    
    <div class="sidebar">
        <div class="sidebar-brand">
            <!-- <h2><span class="Tesla"></span>Tesla</h2> -->
            <img src="../tesla-logo-png-2238.png" with="22px" height="22px" alt="">

        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="accounts.php"><span class="lar la-user-circle"></span>
                        <span>Accounts</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                        <span>Orders</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <snap class="las la-bars"></snap>
                </label>
                <!-- Dashboard -->
            </h2>
            <div class="user-wrapper">
                <!-- <img src="tesla-logo-png-2244.png" with="20px" height="20px" alt=""> -->
                <div>
                <a href="logoutAdmin.php" style="color: red;">Logout</a>
                </div>
            </div>
        </header>            
    </div>
</body>

</html>