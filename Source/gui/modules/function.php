<?php 

    function createBoxProduct($sanpham)
    {
        $spBUS = new SanPhamBUS();
        $slton = $spBUS->GetMountByID($sanpham->MaSanPham);
        return '<div class="box-product">
                            <a '.(($slton > 0)? 'href="index.php?p=8&id='.$sanpham->MaSanPham.'&num=1"': "").' class="add-cart">
                                <i>'.(($slton > 0)? 'Thêm giỏ hàng' : 'Hết hàng').'</i> <i class="fas fa-shopping-cart"></i>
                             </a>
                            <a href="index.php?p=4&id='.$sanpham->MaSanPham.'" class="product-img-area"">
                                <img src="'.$sanpham->HinhURL.'" />
                                <p>'.$sanpham->TenSanPham.'</p>
                            </a>
                            <div class="price-product">
                                <span>'.number_format($sanpham->GiaSanPham*(100-$sanpham->PhanTramGiamGia)/100).'đ</span>
                                <del>'.number_format($sanpham->GiaSanPham).'đ</del>
                            </div>
                        </div>';
    }

    function createChitietSanPham($sanpham) 
    {
        $content = '
            <div id="container_thongtinchitiet">
                <div id="hinhanh_thongtin">
                    <div id="hinhanhsanpham">
                        <img src="'.$sanpham->HinhURL.'">
                    </div>
                    <div id="thongtinchitiet">
                        <p class="title">
                            '.$sanpham->TenSanPham.'
                        </p>
                        <p class="gia">
                            Giá: <span>'.number_format($sanpham->GiaSanPham*(100-$sanpham->PhanTramGiamGia)/100).'đ</span>
                            <del style="color: red">'.number_format($sanpham->GiaSanPham).'đ</del>
                        </p>
                        <p class="luotxem">
                            Lượt Xem:  <span>'.$sanpham->SoLuocXem.'</span>
                        </p>
                        <p class="soluongdaban">
                            Số Lượng Bán: <span>'.$sanpham->SoLuongBan.'</span> 
                        </p>
                        <p class="soluongton">
                            Số Lượng Tồn: <span>'.$sanpham->SoLuongTon.'</span> 
                        </p>';
                        if($sanpham->SoLuongTon > 0)
                            $content .= '<a href="index.php?p=8&id='.$sanpham->MaSanPham.'&num=1" class="add-cart">Thêm giỏ hàng <i class="fas fa-shopping-cart"></i> </a>';
                        else
                            $content .= '<a class="add-cart">Tạm hết hàng</a>';

                    $content .= '</div>
                </div>
                <div id="thongtinsanpham">
                    <div class="menu-thongtinsanpham">
                        <button onblur="hide()" onfocus="mota()" autofocus>Mô tả</button>
                        <button onblur="hide()" onfocus="xuatxu()">Xuất xứ</button>
                        <button onblur="hide()" onfocus="nhasanxuat()">Hãng sản xuất</button>
                    </div>
                    <p class="mota">
                        '.$sanpham->MoTa.'
                    </p>
                    <p class="xuatxu">
                        '.$sanpham->MaHangSanXuat.'
                    </p>
                    <p class="nhasanxuat">
                        '.$sanpham->MaHangSanXuat.'
                    </p>
                </div>
            </div>';

        return $content;
    }

    function createGroupCheckbox($title, $name, $list)
    {

        $content = '<div class="group-checkbox">
        <div class="group-checkbox-title">'.$title.'</div>'; 

        $url =  urldecode( $_SERVER['REQUEST_URI']);

       
        foreach($list as $key => $value)
        {
            $content .= '<div class="check-box">
                            <input type="checkbox" name="'.$name.'" value="'.$value.'"  '.((stripos($url, $value) > 1)? 'checked':'').' />';
            $content .= "<span> $value </span></div>";
            
        }   
        

        $content.='</div>';

        return $content;
    }


    function getDatetimeNow() {
        $tz_object = new DateTimeZone('Asia/Ho_Chi_Minh');
    
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ H:i:s');
    }
?>