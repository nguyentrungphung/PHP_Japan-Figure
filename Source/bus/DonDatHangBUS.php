<?php


    class DonDatHangBUS extends Provider
    {
        var $dondathangDAO;
    
        public function __construct()
        {
            $this->dondathangDAO = new DonDatHangDAO();
        }

        public function GetAll()
        {
            return $this->dondathangDAO->GetAll();
        }

        public function GetAllUnAvaiable()
        {
            return $this->dondathangDAO->GetAllUnAvaiable();
        }
        
        public function GetAllAvaiable()
        {
            return $this->dondathangDAO->GetAllAvaiable();
        }

        public function GetByMa($MaDonDH)
        {
            return $this->dondathangDAO->GetByMa($MaDonDH);
        }

        public function Add($DonDH)
        {
            return $this->dondathangDAO->Add($DonDH);
        }
        
        public function Edit($DonDH)
        {
            return $this->dondathangDAO->Edit($DonDH);
        }
        public function EditMaTinhTrang($MaDDH, $MaTinhTrang)
        {
            return $this->dondathangDAO->EditMaTinhTrang($MaDDH, $MaTinhTrang);
        }
        
        public function Delete($DonDH)
        {
            return $this->dondathangDAO->Delete($DonDH);
        }

        public function Create_MaDatHang()
        {
            return $this->dondathangDAO->Create_MaDatHang();
        }

        public function SetDelete($DonDH)
        {
            return $this->dondathangDAO->SetDelete($DonDH);
        }
        
        public  function Statistical()
        {
            return $this->dondathangDAO->Statistical();
        }
    }
?>