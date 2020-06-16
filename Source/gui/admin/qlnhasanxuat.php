<div id="content-page">
    <div class="container">
    
        <div class="title-header">
            <span>Quản lý hãng sản xuất</span>
        </div>

        <div id="table-quanly">
            <!--            FORM TÌM KIẾM ---------------------------------------------------------------------------------------------->
            <table id="table-menu">
                <tr>
                    <td>
                        <form action="#" method="POST">
                            <input id="searchHSX" type="text" placeholder="Hãng Sản Xuất..." required name='txtSearch'>
                            <input id="btsearchHSX" type='submit' value="Tìm Nhà Sản Xuất" name='chucnang' >
                        </form>
                    </td>
                </tr>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>                        
                        <input id="searchDS3" type='button' value="Liệt Kê Tất Cả" onclick="location.href='dashboard.php?p=3'">
                        <input id="searchDS1" type='button' value="Chưa Xóa" onclick="location.href='dashboard.php?p=3&temp=0'">
                        <input id="searchDS2" type='button' value="Đã Xóa" onclick="location.href='dashboard.php?p=3&temp=1'">
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
                    <th>Mã Hãng Sản Phẩm</th>
                    <th>Tên Hãng Sản Phẩm</th>
                    <th>LogoURL</th>
                    <th>Bị Xóa</th> 
                    <th colspan ='2'>Chức Năng</th>

                </tr>";
                $hangsx = new HangSanXuatBUS();
                $result = null;
                if (isset($_POST['txtSearch'])) 
                {
                    // KẾT QUẢ TÌM KIẾM --------------------------------------------------------------------------------------------
                    $DK = $_POST['txtSearch'];
                    $result = $hangsx->GetByMa($DK);
                    if ($result == null) {
                        $result = $hangsx->GetByName($DK);
                    }
                }
                else if(isset($_GET['temp']))
                {
                    $trangthai = $_GET['temp'];
                    if($trangthai == '0')
                    {
                        $result = $hangsx->GetAllAvaiable();
                    }
                    else
                    {
                        $result = $hangsx->GetAllUnAvaiable();
                    }
                }
                else
                {
                    $result = $hangsx->GetAll();
                }
                $i = 1;

                // FORM THÊM --------------------------------------------------------------------------------------------
                echo "<form action='dashboard.php?p=103' method = 'POST'>
                        <tr>";
                            echo "<td class='stt'>0</td>";
                            echo "<td>
                            <input value= ".$hangsx->CreateMaNSX()." readonly>
                                </td>";
                            echo "<td>
                                    <input required type ='text' name = 'txtTenHSX' placeholder ='Tên Hãng Sản Xuất'>
                                </td>";
                            echo "<td>
                                    <input required type ='text' name = 'txtLogoHSX' placeholder ='Logo URL Hãng Sản Xuất'>
                            </td>";
                            echo "<td>
                                        <select name ='txtBiXoa'>
                                            <option value ='0' selected>Chưa Xóa</option>
                                            <option value ='1'>Đã Xóa</option>
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
                        echo "<form action='dashboard.php?p=103' method = 'POST'>
                                <tr>";
                                echo "<td class='stt'>
                                        $i
                                    </td>";
                                echo "<td>
                                        <input required  type ='text' name = 'txtMaHSX' value = '$item->MaHangSanXuat' readonly>
                                    </td>";
                                echo "<td>
                                        <input required  type ='text' name = 'txtTenHSX' value ='$item->TenHangSanXuat'>
                                    </td>";
                                echo "<td>
                                        <input required  type ='text' name = 'txtLogoHSX' value ='$item->LogoURL'>
                                </td>";
                                echo "<td>      
                                        <select name ='txtBiXoa'>
                                            <option value ='0' ".(($item->BiXoa == 0)? "selected" : "").">Chưa Xóa</option>
                                            <option value ='1' ".(($item->BiXoa == 1)? "selected" : "").">Đã Xóa</option>
                                        </select>
                                    </td>";
                                echo "<td>
                                        <input class='btn btn-info' type ='submit' value ='Edit' name = 'chucnang'>
                                    </td>";
                                    
                                echo "<td>
                                        <input class='btn btn-info' type ='submit' value ='Delete' name = 'chucnang'>
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