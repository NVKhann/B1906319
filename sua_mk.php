<!DOCTYPE HTML>
<html>  
<body>
<?php
    session_start();
    ?>
<h1>Đổi mật khẩu</h1>
Xin chào <?php echo $_SESSION['fullname']?>, bạn đang đổi mật khẩu <br>
<form action="capnhat_mk.php" method="post">
    Mật khẩu cũ: <input type="password" name="pass"><br>
    Mật khẩu mới: <input type="password" name="new_pass1"><br>
    Nhập lại mật khẩu mới: <input type="password" name="new_pass2"><br>

<input type="submit">
</form>

</body>
</html>