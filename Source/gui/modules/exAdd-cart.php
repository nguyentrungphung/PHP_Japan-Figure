<?php
    if(isset($_GET['id']) && isset($_GET['num']))
    {
        $spBUS = new SanPhamBUS();
        if ($_GET['num'] < 1)
            echo '<script type="text/javascript">alert("Số lượng không hợp lệ")</script>';
        else if($spBUS->GetByID($_GET['id']) == null)
            echo '<script type="text/javascript">alert("Sản phẩm không tồn tại")</script>';
        else
        {
            $slton = $spBUS->GetMountByID($_GET['id']);
            if($_GET['num'] > $slton)
                echo '<script type="text/javascript">alert("Số lượng sản phẩm không đủ")</script>';
            else
            {
                if(isset($_SESSION['cart'][$_GET['id']]))
                    $_SESSION['cart'][$_GET['id']] += $_GET['num'];
                else
                    $_SESSION['cart'][$_GET['id']] = $_GET['num'];  

                echo '<script type="text/javascript">alert("Đã thêm vào giỏ hàng")</script>';
            }      
        }

    }

    echo '<script type="text/javascript">history.go(-1);</script>';

?>