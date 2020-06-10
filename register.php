<?php //include_once("header-client.php"); ?>
<?php
if(isset($_SESSION['user'])!="")
{
    //Người dùng đã đăng nhập trả về trang index
    header("Location: index.php");    
}
require_once("entities/user.class.php");
//kiểm tra giá trị được gửi từ form đăng ký
if(isset($_POST['btn_submit']))
{
	$u_name = $_POST['username'];
	$u_email = $_POST['email'];
    $u_pass = $_POST['pass'];
    
    $account = new User($u_name, $u_email, $u_pass);
    $result = $account->save();
    if(!$result)
    {
        ?>
        <script>alert('có lỗi xảy ra, vui lòng kiểm tra dữ liệu!');</script>
        <?php 
    }
    else
    {
        //đăng ký thành công chuyển về trang chủ, lưu session user
        $_SESSION['user'] = $u_name;
        header("Location: index.php"); 
    }
}
?>
	<form action="register.php" method="post">
		<table>
			<tr>
				<td colspan="2">Form dang ky</td>
			</tr>	
			<tr>
				<td>Username :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr>
			<tr>
				<td colspan="2" asign="center"><input type="submit" name="btn_submit" value="Dang ky"></td>
			</tr>

		</table>

	</form>
