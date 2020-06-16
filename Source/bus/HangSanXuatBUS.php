<?php


    class HangSanXuatBUS extends Provider
    {
        var $hangsanxuatDAO;
    
        public function __construct()
        {
            $this->hangsanxuatDAO = new HangSanXuatDAO();
        }

        public function GetAll()
        {
            return $this->hangsanxuatDAO->GetAll();
        }

        public function GetAllAvaiable()
        {
            return $this->hangsanxuatDAO->GetAllAvaiable();
        }

        public function GetAllUnAvaiable()
        {
            return $this->hangsanxuatDAO->GetAllUnAvaiable();
        }

        public function GetName()
        {
            return $this->hangsanxuatDAO->GetName();
        }

        
        public function CreateMaNSX()
        {
            return $this->hangsanxuatDAO->CreateMaNSX();
        }
        

        public function GetByName($TenHang)
        {
            return $this->hangsanxuatDAO->GetByName($TenHang);
        }
        
        public function GetByMa($MaHang)
        {
            return $this->hangsanxuatDAO->GetByMa($MaHang);
        }

        public function Add($HangSX)
        {
            return $this->hangsanxuatDAO->Add($HangSX);
        }

        public function Edit($HangSX)
        {
            return $this->hangsanxuatDAO->Edit($HangSX);
        }

        public function Delete($HangSX)
        {
            return $this->hangsanxuatDAO->Delete($HangSX);
        }

        public function SetDelete($HangSX)
        {
            return $this->hangsanxuatDAO->SetDelete($HangSX);
        }

        public function UnSetDelete($HangSX)
        {
            return $this->hangsanxuatDAO->SetDelete($HangSX);
        }       
    }
?>