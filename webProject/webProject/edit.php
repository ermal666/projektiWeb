 <?php
 require_once 'accounts.php';
 if(isset($_GET['id'])){
     $menuId = $_GET['id'];
 }

 $menu = new MenuController;
 $currenMenu = $menu->edit($menuId);

 if(isset($_POST['submit'])){
     $menu->update($_POST, $menuId);
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

}.input-group {
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
.up{
    background-color: #000000;
    color: red;
}
</style>
<div class="input-group">
<div class="box">
    <form method="POST">
    Username:
        <input type="text" value="<?php echo $currenMenu['username'];?>" name="username">
        <br>
        Email:
        <input type="email" value="<?php echo $currenMenu['email'];?>"  name="email">
        <br>
        Password:
        <input type="password"value="<?php echo $currenMenu['password'];?>"  name="password">
        <br>
        <input type="submit" name="submit" class="up" value="Update">
    </form>
</div>
</div>
</div>