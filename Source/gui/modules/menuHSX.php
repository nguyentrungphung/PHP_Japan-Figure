<div class="container">
    <ul>
        <?php
        
            $hsxBUS = new HangSanXuatBUS();
            $lsthsx = $hsxBUS->GetName();

            $url =  urldecode($_SERVER['REQUEST_URI']);
            
            foreach($lsthsx as $key => $value)
            {
                echo '<li title="Hãng sản xuất"><a '.((stripos($url, $value) > 0)? " style='background: #eee; color:  #199427' ":"").' href="index.php?p=1&nhasx='.$value.'">'.$value.'</a></li>';
            }
        ?>
    </ul>
</div>