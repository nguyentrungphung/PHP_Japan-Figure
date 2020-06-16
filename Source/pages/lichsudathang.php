<?php 
    if(!isset($_SESSION['statusLogin']) || $_SESSION['statusLogin'] == 'fail')
    {
        echo '<script type="text/javascript">alert("Bạn cần đăng nhập để thực hiện chức năng này")</script>';
        echo '<script type="text/javascript">history.go(-1);</script>';
    }
?>

<div id="content-page"> 
    <div class="container">

        <div class="title-header">
            <span>Lịch sử đặt hàng</span>
        </div>

        <div id="info-cart">
            <table border="1px" cellspacing="0">
                <?php
                    $ctddhBUS = new ChiTietDonHangBUS();
                    $lichsudathang = $ctddhBUS->GetHistory($_SESSION['userID']);

                    if($lichsudathang == null) echo '<p>Bạn chưa đặt hàng lần nào</p>';
                    else
                    {
                        echo "<tr>
                                <th class='stt'>STT</th>
                                <th class='tensp'>Tên sản phẩm</th>
                                <th class='hinhsp'>Hình ảnh</th>
                                <th class='dongia'>Đơn giá</th>
                                <th class='soluong'>Số lượng</th>
                                <th class='thanhtien'>Trạng thái</th>
                                <th class='thanhtien'>Ngày đặt</th>
                            </tr>";
                            
                        $i = 1;
                        
                        while($row = mysqli_fetch_array($lichsudathang))
                        {
                            extract($row);
                            
                            echo '<tr>';
                                echo "<td class='stt'>$i</td>";
                                echo "<td class='tensp'><a href='index.php?p=4&id=$MaSanPham'>$TenSanPham</a></td>";
                                echo "<td class='hinhsp'><img src='$HinhURL'/></td>";
                                echo "<td class='dongia'>".number_format($GiaSanPham*(100 - $PhanTramGiamGia)/100)."đ</td>";
                                echo "<td class='soluong'>$SoLuong</td>";
                                echo "<td class='thanhtien'>".$TenTinhTrang."</td>";
                                echo "<td class='thanhtien'>".date("d/m/Y H:i:s ", strtotime($NgayLap))."</td>";
                            echo '</tr>';

                            $i++;
                        }
                    }
                ?>
            </table>
    </div>
</div>