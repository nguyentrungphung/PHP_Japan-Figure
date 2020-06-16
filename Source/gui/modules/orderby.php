<?php
    echo' <div id="order-by">
        <select id="select-order-by" name="select-order-by" onchange="changeOrderBy()">';

            // echo '<option value="sp.TenSanPham asc" '. (($_GET['orderby'] == 'sp.TenSanPham asc')? 'selected':'') .'>Tăng dần tên sản phẩm</option>';
            // echo '<option value="sp.TenSanPham desc"'. (($_GET['orderby'] == 'sp.TenSanPham desc')? 'selected':'') .'>Giảm dần tên sản phẩm</option>';

            echo '<option value="sp.GiaSanPham*(100-sp.PhanTramGiamGia)/100 asc" '. (($_GET['orderby'] == 'sp.GiaSanPham*(100-sp.PhanTramGiamGia)/100 asc')? 'selected':'') .'>Tăng dần giá</option>';
            echo '<option value="sp.GiaSanPham*(100-sp.PhanTramGiamGia)/100 desc" '. (($_GET['orderby'] == 'sp.GiaSanPham*(100-sp.PhanTramGiamGia)/100 desc')? 'selected':'') .'>Giảm dần giá</option>';

            echo '<option value="sp.NgayNhap asc" '. (($_GET['orderby'] == 'sp.NgayNhap asc')? 'selected':'') .'>Tăng dần ngày nhập</option>';
            echo '<option value="sp.NgayNhap desc" '. (($_GET['orderby'] == 'sp.NgayNhap desc')? 'selected':'') .'>Giảm dần ngày nhập</option>';

    echo'    </select>
    </div>';
?>

<script type="text/javascript">
    function changeOrderBy()
    {
        var select = document.getElementById("select-order-by").value;
        var url = window.location.href;
        
        var posOrder = url.indexOf("&orderby=");
        if(posOrder > 0) url = url.substr(0, posOrder);
        var posPage = url.indexOf("&page=");
        if(posPage > 0) url = url.substr(0, posPage);

        window.location.href = url + "&orderby=" + select;
    }
</script>