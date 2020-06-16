<div id="content-page">
    <div class="container">
    
        <div class="title-header">
            <span>Quản lý đơn đặt hàng</span>
        </div>

        <div id="table-quanly">
            <!--            FORM TÌM KIẾM ---------------------------------------------------------------------------------------------->
            <table id="table-menu">
                <tr>
                    <td>
                        <form action="#" method="POST">
                            <input id="searchLSP" type="text" placeholder="Mã Đơn Đặt Hàng..." required name='txtSearch'>
                            <input id="btnsearchLSP" type='submit' value="Tìm Đơn Đặt Hàng" name='chucnang'>
                        </form>
                    </td>
                </tr>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>                        
                        <input id="searchDS3" type='button' value="Liệt Kê Tất Cả" onclick="location.href='dashboard.php?p=5'">
                        <input id="searchDS1" type='button' value="Chưa Xóa" onclick="location.href='dashboard.php?p=5&temp=0'">
                        <input id="searchDS2" type='button' value="Đã Xóa" onclick="location.href='dashboard.php?p=5&temp=1'">
                    </td>
                </tr>
            </table>
            

            <table border="1px" cellspacing="0" id="table-list">
                <?php
                if(($_SESSION['admin'] != true) || ($_SESSION['statusLogin'] ==  'fail'))
                {
                    echo '<script> window.location = "index.php"; </script>';
                }
                // TIÊU ĐỀ CỦA BẢNG --------------------------------------------------------------------------------------------
                echo "<tr>
                    <th>STT</th>
                    <th>Mã Đơn Đặt Hàng</th>
                    <th>Ngày Lập</th>
                    <th>Tổng thành tiền</th> 
                    <th>Tên Tài Khoản</th> 
                    <th>Tên Tình Trạng</th> 
                    <th colspan='2'>Chức Năng</th>
                </tr>";
                $dondathang = new DonDatHangBUS();
                $result = null;
                if (isset($_POST['txtSearch'])) 
                {
                    // KẾT QUẢ TÌM KIẾM --------------------------------------------------------------------------------------------
                    $DK = $_POST['txtSearch'];
                    $result = $dondathang->GetByMa($DK);
                }
                else if (isset($_GET['temp'])) {
                    $trangthai = $_GET['temp'];
                    if ($trangthai == '1') {
                        $result = $dondathang->GetAllUnAvaiable();
                    } else {
                        $result = $dondathang->GetAllAvaiable();
                    }
                } 
                else
                {
                    $result = $dondathang->GetAll();
                }
                $i = 1;
                $maddh = $dondathang->Create_MaDatHang();
                // FORM THÊM --------------------------------------------------------------------------------------------
                echo "<form action='dashboard.php?p=105' method = 'POST'>
                        <tr>";
                            echo "<td class='stt'>0</td>";
                            echo "<td>
                                    <input required type ='text'  name = 'txtMaDDH' placeholder ='Mã Đơn Đặt Hàng' readonly value='$maddh'>
                                </td>";
                            echo "<td>
                                    <input required type ='text' name = 'txtNgayLap' placeholder ='Ngày Lập'>
                                </td>";
                            echo "<td>
                                    <input required type ='text' name = 'txtTongThanhTien' placeholder ='Tổng Thành Tiền'>
                            </td>";
                            echo "<td>
                                    <input required type ='text' name = 'txtMaTaiKhoan' placeholder ='Tên Tài Khoản'>
                            </td>";
                            echo "<td>
                                <select name ='txtMaTinhTrang'>
                                    <option value ='1' selected>Đang xử lý</option>
                                    <option value ='2'>Đã giao</option>
                                    <option value ='2'>Đã hủy</option>
                                </select>
                            </td>";
                            echo "<td id ='btadd' colspan ='2'>
                                        <input type ='submit' value ='Add' name = 'chucnang'>
                                </td>";
                echo "</tr>
                </form>";

                // FORM XÓA SỬA --------------------------------------------------------------------------------------------
                if($result != null)
                {
                    foreach ($result as $item)
                    {
                        echo "<form action='dashboard.php?p=105' method = 'POST'>
                                <tr>";
                                echo "<td class='stt'>
                                        $i
                                    </td>";
                                echo "<td>
                                        $item->MaDonDatHang
                                        <input type ='hidden' value ='$item->MaDonDatHang' name = 'txtMaDDH'>
                                    </td>";
                                echo "<td>
                                        $item->NgayLap
                                    </td>";
                                echo "<td>
                                    $item->TongThanhTien
                                </td>";
                                echo "<td>
                                    $item->MaTaiKhoan
                                </td>";
                                echo "<td>      
                                        <select name ='txtMaTinhTrang'>
                                            <option value ='1' ".(($item->MaTinhTrang == 1)? "selected" : "").">Đang xử lý</option>
                                            <option value ='2' ".(($item->MaTinhTrang == 2)? "selected" : "").">Đã giao</option>
                                            <option value ='3' ".(($item->MaTinhTrang == 3)? "selected" : "").">Đã hủy</option>
                                            <option value ='4' ".(($item->MaTinhTrang == 4)? "selected" : "").">Đã Xóa</option>
                                        </select>
                                    </td>";
                                echo "<td>
                                        <input type ='submit' value ='Edit' name = 'chucnang'>
                                    </td>";
                                echo "<td>
                                        <input type ='submit' value ='Delete' name = 'chucnang'>
                                    </td>";
                            echo "</tr>
                        </form>";
                        $i++;
                    }
                }

                ?>
            </table>
        </div>
    </div>
</div>