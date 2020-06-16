<?php

    class Provider
    {
        const hostname = 'localhost';
        const username = 'root';
        const password = '';
        const database = 'quanlysanpham';
        
        public static function ExecuteQuery($query)
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
    
?>