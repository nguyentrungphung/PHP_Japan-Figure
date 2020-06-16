<?php
/**
 * Created by PhpStorm.
 * User: DucTan
 * Date: 11/28/2018
 * Time: 11:26 PM
 */
for ($i = 0; $i<10;$i++) {
    echo $i;
}
class TinhTrang
{
    var $MaTinhTrang;
    var $TenTinhTrang;

    function __construct()
    {
        $this->MaTinhTrang = 0;
        $this->TenTinhTrang = "";
    }
}
?>