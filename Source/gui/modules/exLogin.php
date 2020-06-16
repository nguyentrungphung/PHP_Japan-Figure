<?php


    if(isset($_POST['username']))
    {
        $username = $_POST['username'];

        
        $tkBus = new TaiKhoanBUS();
        $account = $tkBus->GetByUsername($username);
        
        if($account == null)
        {
            $_SESSION['statusLogin'] =  'fail';
        }
        else
        {
            if($account->MatKhau == md5($_POST['password']))
            {
                $_SESSION['userID'] = $account->MaTaiKhoan;
                $_SESSION['username'] = $username;
                $_SESSION['fullname'] =  $account->TenHienThi;
                $_SESSION['statusLogin'] =  'success';

                if($account->MaLoaiTaiKhoan == 1)
                {
                    $_SESSION['admin'] = true;
                    echo '<script type="text/javascript">window.location.href="dashboard.php";</script>';
                }
            }
            else
            {
                $_SESSION['statusLogin'] =  'fail';
            }
        }
    }

    echo '<script type="text/javascript">history.go(-1);</script>';
?>