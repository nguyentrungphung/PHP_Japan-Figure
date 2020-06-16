<div class="container">
    <ul>
        <?php
        
            $loaiSanPhamBUS = new LoaiSanPhamBUS();
            $lstLoaiSP = $loaiSanPhamBUS->GetName();

            $url =  urldecode($_SERVER['REQUEST_URI']);
            
            foreach($lstLoaiSP as $key => $value)
            {
                echo '<li title="Loại sản phẩm"><a '.((stripos($url, $value) > 0)? " style='background: #eee; color:  #199427' ":"").' href="index.php?p=1&loaisp='.$value.'">'.$value.'</a></li>';
            }
        ?>
    </ul>
</div>


<script type="text/javascript">

    var menu = document.getElementById('menu');
    var sticky = menu.offsetTop;
    window.onscroll = function(){
        if(window.pageYOffset > sticky)
        {
            menu.classList.add('sticky-menu');
        }
        else
        {
            menu.classList.remove('sticky-menu');
        }
    }

</script>