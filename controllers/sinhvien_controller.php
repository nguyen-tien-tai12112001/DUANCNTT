<?php
require_once("./models/sinhvien.php");
require_once("./models/giangvien.php");
use models\DatabaseConnection;
class sinhvien_controller
{
    public function run()
    {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $this->giangvien = new giangvien($dbc);
        $this->db = new sinhvien($dbc);
        $action = filter_input(INPUT_GET, "action");
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            $this->main();
        }
    }
    function main()
    {
        if(!empty($_POST))
        {
            if (isset($_SESSION['msv'])) {
                $image = $_POST['image'];
                $gioitinh = $_POST['gioitinh'];
                $cmnd = $_POST['CMND'];
                $dienthoai = $_POST['phone'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $this->db->updatesinhvien($_SESSION['msv'], $image, $gioitinh, $cmnd, $dienthoai, $email, $diachi);
                header("Refresh:0");
            }
            else
            {
                $image = $_POST['image'];
                $gioitinh = $_POST['gioitinh'];
                $cmnd = $_POST['CMND'];
                $dienthoai = $_POST['phone'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $this->giangvien->updategiangvien($_SESSION['mgv'], $image, $gioitinh, $cmnd, $dienthoai, $email, $diachi);
                header("Refresh:0");
            }
        }
        if (isset($_SESSION['msv'])) {
            $data = $this->db->getinfosinhvien1($_SESSION['msv']);
            

            require_once("./view/sinhvien/ThongTinCaNhan.php");
        } else {
            $data = $this->giangvien->getinfogiangvien($_SESSION['mgv']);
           

            require_once("./view/giangvien/ThongTinCaNhanGiaoVien.php");
        }
    }


    function bangdiem()
    {
        $data = $this->db->getinfopoint($_SESSION['msv']);
        $tongtin = $this->db->tongtin($_SESSION['msv']);
        $tongdiem = $this->db->tongdiem($_SESSION['msv']);
        if($tongtin==''){
            $tongtin=0;
        }
        if($tongdiem==''){
            $tongdiem=0;
        }
        require_once("./view/sinhvien/BangDiemSinhVien.php");
    }

    function infoGiangVien()
    {
    }

    function lichthisinhvien()
    {
        $data = $this->db->getinfosinhvien($_SESSION['msv']);
        $data1 = $this->db->thongtinlich($_SESSION['msv']);
        require_once("./view/sinhvien/lichthi.php");
    }
    function dangkyhoc()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $giohientai=date('Y-m-d H:i:s');
        $data=$this->db->getdatalichdk($giohientai);
        if(mysqli_num_rows($data)>0){
            $giodk=$this->db->giodk($giohientai);
        }
        else{
            $giodk=$this->db->giocbdk($giohientai);
        }
        $data1=$this->db->getdatamondk($_SESSION['msv']);
        $data2=$this->db->getmamondk($_SESSION['msv']);
        $data3=$this->db->mondahoc($_SESSION['msv']);
        require_once("./view/sinhvien/DangKyHoc.php");
    }
    function dangkyhoc1()
    {
        $this->db->dangkyhoc($_GET['mamon'],$_GET['magv'],$_GET['malop'],$_SESSION['msv']);
        $data1=$this->db->getdatamondk($_SESSION['msv']);
        $data3=$this->db->mondahoc($_SESSION['msv']);
        require_once("./view/sinhvien/DangKyHoc1.php");
    }
    function huydangkyhoc()
    {
        $this->db->huydangkyhoc($_GET['mamon'],$_GET['magv'],$_GET['malop'],$_SESSION['msv']);
        $data1=$this->db->getdatamondk($_SESSION['msv']);
        $data3=$this->db->mondahoc($_SESSION['msv']);
        require_once("./view/sinhvien/DangKyHoc1.php");
    }
}
