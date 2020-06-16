<div class="container">
    <ul>
        <?php
        
            $lstLoaiSP = array("Dash board","Sản phẩm","Loại sản phẩm","Nhà sản xuất","Tài khoản","Đơn hàng");
            
            

            foreach($lstLoaiSP as $key => $value)
            {
                echo '<li><a '.(( isset($_GET['p']) && $_GET['p'] == $key )? " style='background: #eee; color: #199427' ":"").' href="dashboard.php?p='.$key.'">'.$value.'</a></li>';
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