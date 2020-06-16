<div id="content-page"> 
    <div class="container">

        <div class="title-header">
            <span>Giỏ hàng của bạn</span>
        </div>
        
        <div id="info-cart">
            <table border="1px" cellspacing="0">
                <?php
                    if(isset($_POST['id']))
                    {
                        if($_POST['chucnang'] == "Xóa" || $_POST['soluong'] < 1)
                        {
                             unset( $_SESSION['cart'][$_POST['id']]);
                        }
                        else
                        {
                            $spBUS = new SanPhamBUS();

                            $_SESSION['cart'][$_POST['id']] = min($_POST['soluong'], $spBUS->GetMountByID($_POST['id']));
                        }
                    }

                    if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null) echo '<p>Giỏ hảng của bạn rỗng</p>';
                    else
                    {
                        echo "<tr>
                                <th class='stt'>STT</th>
                                <th class='tensp'>Tên sản phẩm</th>
                                <th class='hinhsp'>Hình ảnh</th>
                                <th class='dongia'>Đơn giá</th>
                                <th class='soluong'>Số lượng</th>
                                <th class='thanhtien'>Thành tiền</th>
                            </tr>";
                        $spBUS = new SanPhamBUS();
                        $i = 1;
                        $tongtien = 0;
                        foreach($_SESSION['cart'] as $key => $value)
                        {
                            $sp = $spBUS->GetByID($key);
                            
                            $tongtien += (($sp->GiaSanPham*(100 - $sp->PhanTramGiamGia)/100)*$value);
                            
                            echo '<tr>';
                                echo "<td class='stt'>$i</td>";
                                echo "<td class='tensp'><a href='index.php?p=4&id=$sp->MaSanPham'>$sp->TenSanPham</a></td>";
                                echo "<td class='hinhsp'><img src='$sp->HinhURL'/></td>";
                                echo "<td class='dongia'>".number_format($sp->GiaSanPham*(100 - $sp->PhanTramGiamGia)/100)."đ</td>";
                                echo "<td class='soluong'>
                                        <form action='' method='POST'>
                                            <input name='id' type='hidden' value='$sp->MaSanPham' />
                                            <input name='soluong' type='number' value='$value' min='0' /> 
                                            <input type='submit' name='chucnang' value='Cập nhật' />
                                            <input type='submit' name='chucnang' value='Xóa' />
                                        </form>
                                    </td>";
                                echo "<td class='thanhtien'>".number_format(($sp->GiaSanPham*(100 - $sp->PhanTramGiamGia)/100)*$value)."đ</td>";
                            echo '</tr>';

                            $i++;
                        }
                    }
                ?>
            </table>

            <?php
                if(isset($tongtien))
                {
                    echo "<div id='tongtien'>Tổng tiền: ".number_format($tongtien)."đ</div>";
                    echo '<a id="btn-Dathang" href="index.php?p=7">Đặt hàng</a>';
                }
            ?>
        </div>

        
    </div>
</div>