<?php

    class Provider
    {
        const hostname = 'localhost';
        const username = 'root';
        const password = '';
        const database = 'db_php';
        
        public  function ExecuteQuery($query)
        {
            // 1. Kết nối
            $connection = mysqli_connect(static::hostname, static::username, static::password, static::database) or die('Khong the ket noi database');

            // 2. Tạo query

            // 3. Thực thi query
            mysqli_query($connection, "set names 'utf8'");

            $result = mysqli_query($connection, $query);

            // 4. Xử lý kết quả

            // 5. Đóng kết nối
            mysqli_close($connection);

            return $result;
        }
    }
    

    function GetSqlQuery($url, $full)
    {
        $url =  urldecode($url);

        $query = 'select MaSanPham, TenSanPham, HinhURL, GiaSanPham, PhanTramGiamGia 
                    from sanpham sp, loaisanpham l, hangsanxuat h
                    WHERE sp.MaLoaiSanPham = l.MaLoaiSanPham and h.MaHangSanXuat = sp.MaHangSanXuat and sp.BiXoa=0 and l.BiXoa=0';
        
        if(stripos($url, "=") < 1) return $query;
                
        
        $pos = stripos($url, "?");
        if($pos > 0) $url = substr($url, $pos+1);
        $arrParameter = explode('&', $url);
        $arrQuerry = array();


        foreach($arrParameter as $key => $value)
        {
            $temp = explode('=', $value);
            $arrQuerry[$temp[0]][] = $temp[1];
        }


        $orderby = "sp.TenSanPham asc";
        $page = 1;
        foreach($arrQuerry as $key => $value)
        {
            if($key == 'loaisp') 
            {
                $query.=' and ( 1 = 0';
                foreach($value as $keyZ => $valueZ)
                    $query.=' or l.TenLoaiSanPham = \''.$valueZ.'\''; 
                $query.=')';
            }
            else if($key == 'nhasx') 
            {
                $query.=' and ( 1 = 0';
                foreach($value as $keyZ => $valueZ)
                    $query.=' or h.TenHangSanXuat = \''.$valueZ.'\''; 
                $query.=')';
            }
            else if($key == 'giamin' && $value[0] != null) 
            {
                $query.=' and sp.GiaSanPham >= '.$value[0]; 
            }
            else if($key == 'giamax' && $value[0] != null) 
            {
                $query.=' and sp.GiaSanPham <= '.$value[0]; 
            }
            else if($key == 'tensp') 
            {
                $query.=' and sp.TenSanPham like \'%'.str_replace(" ","%",$value[0]).'%\''; 
            }
            else if($key == 'orderby')
            {
                $orderby = $value[0];
            }
            else if($key == 'page')
            {
                $page = $value[0];
            }
        }

        if($full == false) return $query;
               
        $query .= " ORDER BY $orderby LIMIT ".(($page-1)*10).", 10";
        
        
        return $query;
    }

?>