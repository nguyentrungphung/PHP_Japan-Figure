
    <div class="container">
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            
            <?php
                $url =  $_SERVER['REQUEST_URI'];
                
                $url =  urldecode($url);
                $pos = stripos($url, "?");
                if($pos > 0) $url = substr($url, $pos+1);
                $arrParameter = explode('&', $url);
                $arrQuerry = array();


                foreach($arrParameter as $key => $value)
                {
                    $temp = explode('=', $value);
                    $arrQuerry[$temp[0]][] = $temp[1];
                }

                
                foreach($arrQuerry as $key => $value)
                {
                        if($key == 'loaisp') 
                        {
                            foreach($value as $keyZ => $valueZ)
                                echo '<li><a href="index.php?p=1&loaisp='.$valueZ.'">'.$valueZ.'</a></li>';
                        }
                        else if($key == 'nhasx') 
                        {
                            foreach($value as $keyZ => $valueZ)
                                echo '<li><a href="index.php?p=1&nhasx='.$valueZ.'">'.$valueZ.'</a></li>';
                        }
                        else if($key == 'giamin' && $value[0] != null) 
                        {
                            echo '<li><a href="index.php?p=1&giamin='.$value[0].'">Giá thấp nhất: '.number_format($value[0]).'</a></li>';
                        }
                        else if($key == 'giamax' && $value[0] != null) 
                        {
                            echo '<li><a href="index.php?p=1&giamax='.$value[0].'">Giá cao nhất: '.number_format($value[0]).'</a></li>';
                        }
                        else if($key == 'tensp') 
                        {
                            echo '<li><a href="index.php?p=1&tensp='.$value[0].'">Tìm kiếm sản phẩm "'.$value[0].'"</a></li>';
                        }
                }
                
            ?>
        </ul>
    </div>
