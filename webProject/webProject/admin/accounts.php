<?php
require_once '../controller.php';
?>
<style>
  .box{ 
  margin: 100 auto;
  margin-left: 400px;
  margin-right: 40px;
  }

.content-table {
  text-align: center !important;
  font-size: 0.9em;
  width: 100%;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin-right: 30px;
}

.content-table thead tr {
  background-color: #000000;
  color: red;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 10px 10px;
  margin: 15px auto;
} 

 .link{
    text-decoration: none;
    color: red;
    font-size: 10px;
}
.first-link{
  color: black;
  font-size: 10px;
  padding:  50%;
  position: relative;
  top: 20px;
}
.top-links{
    font-size: 10px;
    color: black;
    padding: 10px;
    text-decoration: none;
}
</style>
<div class="box">
<div>
    <table class="content-table">
        <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Password</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
        </thead>
        <tbody>
          <?php 
          $m = new MenuController;
          $allMenu = $m->readData();
          foreach($allMenu as $menu): ?>
          <tr>
            <td><?php echo $menu['username']; ?></td>
            <td><?php echo $menu['email']; ?></td>
            <td><?php echo $menu['password']; ?></td> 
            <td><a href="edit.php?id=<?php echo $menu['id'];?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $menu['id'];?>">Delete</a></td>

          </tr>
          <?php endforeach; ?>
           
        </tbody>
    </table>
</div> 
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                    <a href="dashboard.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="accounts.php" class="active"><span class="lar la-user-circle"></span>
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