<?php


    class TaiKhoanBUS extends Provider
    {
        var $taikhoanDAO;
    
        public function __construct()
        {
            $this->taikhoanDAO = new TaiKhoanDAO();
        }

        public function GetAll()
        {
            return $this->taikhoanDAO->GetAll();
        }

        public function GetAllAvaiable()
        {
            return $this->taikhoanDAO->GetAllAvaiable();
        }

        public function GetAllUnAvaiable()
        {
            return $this->taikhoanDAO->GetAllUnAvaiable();
        }

        public function GetByUsername($username)
        {
            return $this->taikhoanDAO->GetByUsername($username);
        }

        public function GetByUsernameList($username)
        {
            return $this->taikhoanDAO->GetByUsernameList($username);
        }

        public function GetByID($MaTaiKhoan)
        {
            return $this->taikhoanDAO->GetByID($MaTaiKhoan);
        }

        public function GetByIDList($MaTaiKhoan)
        {
            return $this->taikhoanDAO->GetByIDList($MaTaiKhoan);
        }

        public function GetByEmail($email)
        {
            return $this->taikhoanDAO->GetByEmail($email);
        }

        public function GetByEmailList($email)
        {
            return $this->taikhoanDAO->GetByEmailList($email);
        }

        public function GetBySDT($sdt)
        {
            return $this->taikhoanDAO->GetBySDT($sdt);
        }

        public function Add($account)
        {
            if($this->KTTaiKhoanAdd($account))
            {
                /*Mã hóa mật khẩu*/
                $account->MatKhau = md5($account->MatKhau);
                $this->taikhoanDAO->Add($account);
                echo '<script type="text/javascript">alert("Tạo tài khoản thành công.")</script>';
            }
        }
        
        public function Edit($account)
        {
            if($this->KTTaiKhoanEdit($account))
            {
                $this->taikhoanDAO->Edit($account);
                echo '<script> alert("Đã thay đổi thông tin tài khoản"); </script>';
            }
            
        }

        public function Delete($TenUser)
        {
            return $this->taikhoanDAO->Delete($TenUser);
        }
       
        public function SetDeleted($TenUser)
        {
            return $this->taikhoanDAO->SetDeleted($TenUser);
        }

        public function UnSetDeleted($TenUser)
        {
            return $this->taikhoanDAO->UnSetDeleted($TenUser);
        }

        public function KTTaiKhoanAdd($account)
        {
            /*KIEM TRA REGULAR EXPRESSION*/
            $UserPatt ='(^[a-zA-Z0-9_]{4,20}$)';
            $PassPatt ='(^[a-zA-Z0-9_]{4,32}$)';
            $SDTPatt ='(^[0-9]{10}$)';
            $EmailPatt ='(^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$)';


            

            $taikhoanBUS = new TaiKhoanBUS();

            /*Kiểm tra Email và Username*/
            if($taikhoanBUS->GetByUsername($account->TenDangNhap) != null)
            {
                echo '<script type="text/javascript">alert("Tài khoản đã tồn tại.")</script>';
            }
            else if($taikhoanBUS->GetByEmail($account->Email) != null)
            {
                echo '<script type="text/javascript">alert("Email đã tồn tại.")</script>';
            }
            else if(!preg_match($UserPatt,$account->TenDangNhap))
            {
                echo '<script type="text/javascript">alert("Tên đăng nhập không hợp lệ.")</script>';
            }
            else if(!preg_match($PassPatt,$account->MatKhau))
            {
                echo '<script type="text/javascript">alert("Mật khẩu không hợp lệ.")</script>';
            }
            else if(!preg_match($SDTPatt,$account->DienThoai))
            {
                echo '<script type="text/javascript">alert("Số điện thoại không hợp lệ.")</script>';
            }
            else if(!preg_match($EmailPatt,$account->Email))
            {
                echo '<script type="text/javascript">alert("Email không hợp lệ.")</script>';
            }
            else
            {
                return true;
            }
            return false;
        }

        public function KTTaiKhoanEdit($account)
        {
            /*KIEM TRA REGULAR EXPRESSION*/
            $UserPatt ='(^[a-zA-Z0-9_]{4,20}$)';
            $PassPatt ='(^[a-zA-Z0-9_]{4,32}$)';
            $SDTPatt ='(^[0-9]{10}$)';
            $EmailPatt ='(^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$)';


            

            $taikhoanBUS = new TaiKhoanBUS();

            $tk = $taikhoanBUS->GetByUsername($account->TenDangNhap);
            if($tk != null && $tk->MaTaiKhoan != $account->MaTaiKhoan)
            {               
                 echo '<script type="text/javascript">alert("Tên đăng nhập đã tồn tại.")</script>';
            }
            else if(!preg_match($UserPatt,$account->TenDangNhap))
            {
                echo '<script type="text/javascript">alert("Tên đăng nhập không hợp lệ.")</script>';
            }
            else if(!preg_match($PassPatt,$account->MatKhau))
            {
                echo '<script type="text/javascript">alert("Mật khẩu không hợp lệ.")</script>';
            }
            else if(!preg_match($SDTPatt,$account->DienThoai))
            {
                echo '<script type="text/javascript">alert("Số điện thoại không hợp lệ.")</script>';
            }
            else if(!preg_match($EmailPatt,$account->Email))
            {
                echo '<script type="text/javascript">alert("Email không hợp lệ.")</script>';
            }
            else
            {
                return true;
            }
            return false;
        }
    }
?>