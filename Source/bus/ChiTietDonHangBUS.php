<?php

    class ChiTietDonHangBUS extends Provider
    {
        var $chitietdonhangDAO;
    
        public function __construct()
        {
            $this->chitietdonhangDAO = new ChiTietDonHangDAO();
        }

        public function GetAll()
        {
            return $this->chitietdonhangDAO->GetAll();
        }

        public function GetByMa($MaChiTietDonHang)
        {
            return $this->chitietdonhangDAO->GetByMa($MaChiTietDonHang);
        }

        public function Add($chitietdh)
        {
            return $this->chitietdonhangDAO->Add($chitietdh);
        }

        public function Edit($chitietdh)
        {
            return $this->chitietdonhangDAO->Edit($chitietdh);
        }
        
        public function Delete($machitietdh)
        {
            return $this->chitietdonhangDAO->Delete($machitietdh);
        }

        
        public function GetHistory($userID)
        {
            return $this->chitietdonhangDAO->GetHistory($userID);
        }
    }
?>