<script type="text/javascript" src="./js/register.js"></script>
<div id="content-page">
    <div class="container">
                
        <div id="register">

        <div class="title-header">
            <span>Đăng kí tài khoản</span>
        </div>

        <form name = "frmDangKi" action="index.php?p=6" method="POST">
            <div id="frmregis">
                <div><img src="./img/iconname.png" alt="name"><input required type="text" name="txtname"
                                                                    placeholder="Họ và tên"></div>
                <div><img src="./img/iconuser.png" alt="name"><input required type="text" name="txtusername" id="idusername"
                                                                    placeholder="Tên đăng nhập"></div>
                <div><img src="./img/iconlock.png" alt="name"><input required type="password" name="txtpassword" id="idpassword"
                                                                    placeholder="Mật khẩu"></div>
                <div><img src="./img/iconlock.png" alt="name"><input required type="password" name="txtcfpw" id="idcfpw"
                                                                    placeholder="Nhập lại mật khẩu"></div>
                <div><img src="./img/iconaddress.png" alt="name"><input required type="text" name="txtdiachi"
                                                                        placeholder="Địa chỉ"></div>
                <div><img src="./img/iconphone.png" alt="name"><input required type="text" name="txtdienthoai" id="iddienthoai"
                                                                    placeholder="Điện thoại"></div>
                <div><img src="./img/iconemail.png" alt="name"><input required type="email" name="txtemail"  id="idemail"
                                                                    placeholder="Email"></div>
                <div id="notborder"><input required type="submit" value="Đăng kí" name="submit"></div>
                <div id="notborder"><a href="index.php">Quay về trang chủ</a></div>
            </div>

        </form>

        </div>

    </div>
</div>