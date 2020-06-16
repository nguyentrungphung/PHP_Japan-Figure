
<div class="container">
    <div id="social-network">
        <a href="javascript: function(){}"><i class="fab fa-facebook-f"></i></a> 
        <a href="javascript: function(){}"><i class="fab fa-instagram"></i></a>
        <a href="javascript: function(){}"><i class="fab fa-twitter"></i></a>
        <a href="javascript: function(){}"><i class="fab fa-google-plus-g"></i></a>
        <i>Hotline: 0123456789</i>
    </div>

    <?php 

        if(isset($_SESSION['username']))
        {
            echo '<div id="login-area">
                    <i class="far fa-user"></i>
                    <a href="index.php?p=10">'.$_SESSION['fullname'].'</a>
                    <a href="index.php?p=9">Đăng xuất</a>
                </div>';
        }
        else
        {
            echo '<div id="login-area">
                    <form name="frmLogin" method="POST" action="index.php?p=2">
                        <input type="text" name="username" placeholder="Tài khoản" style="padding:0px 5px; margin:0px;border-radius:5px;">
                        <input type="password" name="password" placeholder="Mật khẩu" style="padding:0px 5px; margin:0px;border-radius:5px;" ">
                        <input type="submit" value="Đăng nhập" style="padding:0px; margin:0px;border-radius:5px;"/>
                        <input type="button" onclick="location.href=\'index.php?p=3\'" value="Đăng ký"   />
                    </form>
                </div>';

            
            if(isset($_SESSION['statusLogin']) && $_SESSION['statusLogin'] == 'fail')
            {
                echo '<script type="text/javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng")</script>';
                $_SESSION['statusLogin'] = 'none';
            }
        }
    ?>
    
</div>