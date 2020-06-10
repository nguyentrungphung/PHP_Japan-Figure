<?php
session_start();
?>
<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	//Gọi file connection.php ở bài trước
	require_once("config/db.class.php");
	require_once("entities/user.class.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$u_name = $_POST["username"];
		$u_pass = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$u_name = strip_tags($u_name);
		$u_name = addslashes($u_name);
		$u_pass = strip_tags($u_pass);
		$u_pass = addslashes($u_pass);
		$account = new User($u_name, $u_email,$u_pass);
		$result = $account->checkLogin($username,$password);
		if(!$result)
    	{
			?>
			<script>alert('có lỗi xảy ra, vui lòng kiểm tra dữ liệu!');</script>
			<?php 
    	}
    	else
    	{
			//đăng ký thành công chuyển về trang chủ, lưu session user
			$_SESSION['username'] = $u_name;
			header("Location: index.php"); 
    	}
		// if ($u_name == "" || $u_pass =="") {
		// 	echo "username hoặc password bạn không được để trống!";
		// }else{
			
		// 	// $sql = "select * from users where Username = '$username' and Password = '$password' ";
		// 	// $query = mysqli_query($conn,$sql);
		// 	// $num_rows = mysqli_num_rows($query);
		// 	// if ($num_rows==0) {
		// 	// 	echo "tên đăng nhập hoặc mật khẩu không đúng !";
		// 	// }else{
		// 		//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
		// 		$_SESSION['username'] = $u_name;
        //         // Thực thi hành động sau khi lưu thông tin vào session
        //         // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
        //         header('Location: index.php');
		// 	// }
		// }
	}
?>
	<form method="POST" action="login.php">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" asign="center"> <input name="btn_submit" type="submit" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>
</body>
</html>