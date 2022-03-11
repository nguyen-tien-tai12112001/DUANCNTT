<?php
// require_once("./models/DatabaseConnection.php");
use models\DatabaseConnection;

require_once("./models/sinhvien.php");
require_once("./models/daotao.php");
class daotao_controller
{
    public function run()
    {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $this->daotao = new daotao($dbc);
        $action = filter_input(INPUT_GET, "action");
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            $this->sinhvien();
        }
    }
    //danhsachsinhvien
    function sinhvien()
    {

        $masinhvien = $this->daotao->masinhvien();
        $getmasv = substr($masinhvien['masinhvien'], 1);
        $listStudent = $this->daotao->getAllData('sinhvien');
        $listCN = $this->daotao->getAllData('chuyennganh');
        $listLopCN = $this->daotao->getAllData('lopcn');
        require_once("./view/daotao/danhsachsinhvien.php");
    }
    function GVcn()
    {
        if (!empty($_POST["machuyennganh"])) {

            $listGVCN = $this->daotao->getGiaoVienCN($_POST['machuyennganh']);
            foreach ($listGVCN as $infoCN) {
                echo '<option value="' . $infoCN['magiangvien'] . '">' . $infoCN['hovaten'] . '</option>';
            }
        }
    }
    function lopcn()
    {
        if (!empty($_POST["machuyennganh"])) {

            $listGVCN = $this->daotao->getlopCN($_POST['machuyennganh']);
            foreach ($listGVCN as $infoCN) {
                echo '<option value="' . $infoCN['malop'] . '">' . $infoCN['tenlop'] . '</option>';
            }
        }
    }
    function loctheotrangthai()
    {
        if ($_GET['info'] == "Tất cả") {
            $listStudent = $this->daotao->getAllData('sinhvien');
        } else {
            $listStudent = $this->daotao->loctheotrangthai($_GET['info']);
        }
        require_once("./view/daotao/PDTTimKiemSinhVien.php");
    }
    function uptrangththai()
    {
        $listStudent = $this->daotao->uptrangthai($_GET['masinhvien'], $_GET['trangthai']);
        // require_once("./view/daotao/PDTTimKiemSinhVien.php");
    }
    function createstudent()
    {

        $data = $this->daotao->createstudent($_GET['masinhvien'], $_GET['hovaten'], $_GET['gioitinh'], $_GET['CMND'], $_GET['ngaysinh'], $_GET['phone'], $_GET['email'], $_GET['chuyennganh'], $_GET['giaovien'], $_GET['diachi'], $_GET['lop']);
        require_once("./view/daotao/danhsachsinhvien.php");
    }

    function timkiem()
    {
        $listStudent = $this->daotao->timkiemsinhvien($_GET['info']);
        if ($listStudent == 0) {
            $listStudent = '';
        }
        require_once("./view/daotao/PDTTimKiemSinhVien.php");
    }
    function select()
    {

        if ($_GET['info'] != "Tất cả") {

            $listStudent = $this->daotao->timkiemsinhvientheochuyennganh($_GET['info']);
            if ($listStudent == 0) {
                $listStudent = '';
            }
            require_once("./view/daotao/PDTTimKiemSinhVien.php");
        } else {
            if ($_GET['info'] == "Tất cả") {

                $listStudent = $this->daotao->getAllData('sinhvien');
                require_once("./view/daotao/PDTTimKiemSinhVien.php");
            } else {
                // $masinhvien=$this->daotao->masinhvien();
                // $getmasv = substr($masinhvien['masinhvien'], 1); 
                // $listStudent = $this->daotao->getAllData('sinhvien');
                // $listCN = $this->daotao->getAllData('chuyennganh');
                // require_once("./view/daotao/danhsachsinhvien.php");
            }
        }
    }

    //phanconggiangdayy
    function giangday()
    {
        $listMonHoc = $this->daotao->monhocgiangvien();
        $listMonHoc1 = $this->daotao->getAllData('monhoc');
        $listChuyenNganh = $this->daotao->getAllData('chuyennganh');
        $listGiangVien = $this->daotao->getAllData_gv_tt('giangvien');
        $listLop = $this->daotao->listlop();
        //$listGiangVien = $this->daotao->giaovienmonhoc();
        //$listGiangVienMonHoc = $this->daotao->getAllData('gv-monhoc');

        require_once("./view/daotao/phanconggiangday.php");
    }

    //tochuclichdangkyhoc
    function lichdangkyhoc()
    {
        if (isset($_POST['check']) && $_POST['check'] != "") {
            if ($_POST['ngaybatdau'] == null) {
                echo "<script>alert('Ngày bắt đầu không được để trống')</script>";
            } else if ($_POST['ngayketthuc'] == null) {
                echo "<script>alert('Ngày kết thúc không được để trống')</script>";
            } else {
                foreach ($_POST['check'] as $value) {
                    //Xử lý các phần tử được chọn
                    $this->daotao->themvaolichdkhoc($value, $_POST['ngaybatdau'], $_POST['ngayketthuc']);
                }
            }
        }

        $data_cn = $this->daotao->getAllData("chuyennganh");
        $data = $this->daotao->getAllData("monhoc");
        require_once("./view/daotao/ToChucLichDangKyHoc.php");
        exit();
    }
    function getmonhoc_cn()
    {
        if ($_GET['info'] == "Tất cả") {
            $data_cn = $this->daotao->getAllData("monhoc");
        } else {
            $data_cn = $this->daotao->getmonhoc_cn($_GET['info']);
        }
        require_once("./view/daotao/ToChucLichDangKyHoc1.php");
    }

    function banggiangday()
    {
        if ($_GET['info'] != "Tất cả") {

            $listMonHoc = $this->daotao->timkiemmonhoctheomachuyennganh($_GET['info']);
            $listMonHoc1 = $this->daotao->timkiemmonhoctheomamon($_GET['info']);
            $listLop = $this->daotao->listlop();
            //var_dump($listMonHoc1);
            // if($listMonHoc ==0)
            // {
            //     $listMonHoc = $listMonHoc1;
            // }
            $listGiangVien = $this->daotao->getAllData('giangvien');
            require_once("./view/daotao/bangphanconggiangday.php");
        } else {
            if ($_GET['info'] == "Tất cả") {

                $listMonHoc = $this->daotao->monhocgiangvien();
                $listMonHoc1 = $this->daotao->listmonhoc();
                $listGiangVien = $this->daotao->getAllData('giangvien');
                $listLop = $this->daotao->listlop();
                require_once("./view/daotao/bangphanconggiangday.php");
            } else {
                // $masinhvien=$this->daotao->masinhvien();
                // $getmasv = substr($masinhvien['masinhvien'], 1); 
                // $listStudent = $this->daotao->getAllData('sinhvien');
                // $listCN = $this->daotao->getAllData('chuyennganh');
                // require_once("./view/daotao/danhsachsinhvien.php");
            }
        }
    }
    function timkiemmonhoc()
    {
        $listMonHoc = $this->daotao->timkiemmonhoc($_GET['info']);
        $listMonHoc1 = $this->daotao->timkiemmonhocbangmonhoc($_GET['info']);
        $listLop = $this->daotao->listlop();
        //var_dump($listMonHoc1);
        $listGiangVien = $this->daotao->getAllData('giangvien');
        require_once("./view/daotao/bangphanconggiangday.php");
    }

    function capnhatmonhoc()
    {
        $this->daotao->capnhatgiaovienmonhoc($_GET['mamon'], $_GET['magiangvien'], $_GET['malop']);
    }

    //danhsachgiangvien
    function giangvien()
    {
        if (isset($_GET['mgv'])) {
            $info = $this->daotao->getinfogiangvien($_GET['mgv']);
            $data_cn = $this->daotao->getAllData('chuyennganh');;
            require_once("./view/daotao/modal_giaovien.php");
        } else {
            if (!empty($_POST["machuyennganh"])) {

                $listGVCN = $this->daotao->getLop($_POST['machuyennganh']);
                if ($listGVCN != 0) {
                    foreach ($listGVCN as $infoCN) {
                        echo '<option value="' . $infoCN['malop'] . '">' . $infoCN['tenlop'] . '</option>';
                    }
                    echo '<option value="" >Không chủ nhiệm lớp nào</option>';
                    //require_once("./view/daotao/DanhSachGiaoVien.php");
                } else {
                    echo '<option value="">Không chủ nhiệm lớp nào</option>';
                }
            } else {
                $magiangvien = $this->daotao->magiangvien();
                $getmgv = substr($magiangvien['magiangvien'], 2);

                $listChuyenNganh = $this->daotao->getAllData('chuyennganh');
                $listGiangVien = $this->daotao->getAllData_gv();
                $listlopCN = $this->daotao->getAllData('lopcn');
                require_once("./view/daotao/DanhSachGiaoVien.php");
            }
        }
    }
    function capnhattheotrangthai1()
    {
        $this->daotao->capnhattt_gv($_GET['magiangvien'], $_GET['trangthai']);
    }
    function sxtheotrangthai()
    {
        $listGiangVien = $this->daotao->getinfo_gvtt($_GET['info1']);
        require_once("./view/daotao/banggiangvien.php");
    }
    function banggiangvien()
    {
        if ($_GET['info'] != "Tất cả") {

            $listGiangVien = $this->daotao->timkiemgiangvientheochuyennganh($_GET['info']);
            if ($listGiangVien == 0) {
                $listGiangVien = '';
            }
            require_once("./view/daotao/banggiangvien.php");
        } else {
            if ($_GET['info'] == "Tất cả") {


                $listGiangVien = $this->daotao->timkiemtatcagiangvientheochuyennganh();
                require_once("./view/daotao/banggiangvien.php");
            } else {
                // $masinhvien=$this->daotao->masinhvien();
                // $getmasv = substr($masinhvien['masinhvien'], 1); 
                // $listStudent = $this->daotao->getAllData('sinhvien');
                // $listCN = $this->daotao->getAllData('chuyennganh');
                // require_once("./view/daotao/danhsachsinhvien.php");
            }
        }
    }

    function timkiemgiangvien()
    {

        $listGiangVien = $this->daotao->timkiemgiangvien($_GET['info']);
        if ($listGiangVien == 0) {
            $listGiangVien = '';
        }

        require_once("./view/daotao/banggiangvien.php");
    }



    function creategiangvien()
    {
        $data = $this->daotao->creategiangvien($_GET['magiangvien'], $_GET['hovaten'], $_GET['gioitinh'], $_GET['CMND'], $_GET['ngaysinh'], $_GET['phone'], $_GET['email'], $_GET['chuyennganh'], $_GET['diachi'], $_GET['lop']);

        require_once("./view/daotao/PDTTimKiemSinhVien.php");
    }

    // danhsachmonhoc
    function danhsachmonhoc()
    {
        $chuyennganh = $this->daotao->getAllData("chuyennganh");
        $mon = $this->daotao->getAllData("monhoc");
        require_once("./view/daotao/Danhsachmonhoc.php");
    }
    function timkiemmm()
    {
        $monhoc=$this->daotao->timkiemmonhocmamon($_GET['key']);
        if($monhoc ==0)
        {
            $monhoc = '';
        }
        require_once("./view/daotao/bangmonhoc.php");
    }
    function timkiemmonhoctheochuyennganh()
    {
        if ($_GET['info'] != "Tất cả") {

            $monhoc = $this->daotao->timkiemmonhocmamontheochuyennganh($_GET['info']);
            if ($monhoc == 0) {
                $monhoc = '';
            }
            require_once("./view/daotao/bangmonhoc.php");
        } else {
            if ($_GET['info'] == "Tất cả") {


                $monhoc = $this->daotao->getAllData('monhoc');
                require_once("./view/daotao/bangmonhoc.php");
            }
        }
    }
    function themmon()
    {
        $mamon = $_GET['mamon'];
        $tenmon = $_GET['tenmon'];
        $sotinchi = $_GET['sotinchi'];
        $chuyennganh = $_GET['chuyennganh'];
        //$machuyennganh=$_POST['machuyennganh'];
        $thu = $_GET['thu'];
        $ca = $_GET['ca'];
        $macn = $this->daotao->getmcn($chuyennganh);
        $this->daotao->themmon($mamon, $tenmon, $sotinchi, $ca, $thu, $macn['machuyennganh']);
        $mon = $this->daotao->getAllData("monhoc");
        require_once("./view/daotao/bangdssv.php");
    }
    function xoamon()
    {
        $mamon = $_GET['info'];
        $this->daotao->xoamon($mamon);
        $mon = $this->daotao->getAllData("monhoc");
        require_once("./view/daotao/bangdssv.php");
        // header("Refresh:0");
    }
    // Quản lý chuyên ngành
    function danh_sach_chuyen_nganh()
    {
        $chuyennganh = $this->daotao->getAllData("chuyennganh");
        // $mon=$this->daotao->getAllData("monhoc");
        require_once("./view/daotao/DanhSachChuyenNganh.php");
    }
    function bangchuyennganh()
    {
        if ($_GET['info'] != "Tất cả") {

            $chuyennganh = $this->daotao->selectchuyennganh($_GET['info']);

            require_once("./view/daotao/bangchuyennganh.php");
        } else {
            if ($_GET['info'] == "Tất cả") {


                $chuyennganh = $this->daotao->selectlistchuyennganh();
                require_once("./view/daotao/bangchuyennganh.php");
            } else {
                // $masinhvien=$this->daotao->masinhvien();
                // $getmasv = substr($masinhvien['masinhvien'], 1); 
                // $listStudent = $this->daotao->getAllData('sinhvien');
                // $listCN = $this->daotao->getAllData('chuyennganh');
                // require_once("./view/daotao/danhsachsinhvien.php");
            }
        }
    }
    function timkiemchuyennganh()
    {
        $chuyennganh = $this->daotao->timkiemchuyennganh($_GET['info']);
        if ($chuyennganh == 0) {
            $chuyennganh = '';
        }


        require_once("./view/daotao/bangchuyennganh.php");
    }

    function themchuyennganh()
    {
        $data = $this->daotao->createchuyennganh($_GET['machuyennganh'], $_GET['tenchuyennganh']);
        $chuyennganh = $this->daotao->selectlistchuyennganh();
        require_once("./view/daotao/bangchuyennganh.php");
    }
    function updatechuyennganh()
    {
        if (isset($_GET['machuyennganh'])) {
            $info = $this->daotao->getinfochuyennganh($_GET['machuyennganh']);

            require_once("./view/daotao/modal_chuyennganh.php");
        }
    }
    function capnhatchuyennganh()
    {
        $this->daotao->capnhatchuyennganh($_GET['machuyennganh'], $_GET['tenchuyennganh']);
        $chuyennganh = $this->daotao->selectlistchuyennganh();

        require_once("./view/daotao/bangchuyennganh.php");
    }
    function updatemonhoc()
    {
        if (isset($_GET['mamon'])) {
            $info = $this->daotao->getinfomonhoc($_GET['mamon']);
            $chuyennganh = $this->daotao->selectlistchuyennganh();
            require_once("./view/daotao/modal_monhoc.php");
        }
    }
    function capnhatmonhocdaotao()
    {
        $this->daotao->capnhatmonhoc($_GET['mamon'], $_GET['tenmon'], $_GET['sotinchi'], $_GET['chuyennganh'], $_GET['thu'], $_GET['ca']);
        $monhoc = $this->daotao->selectlistmonhocdaotao();
        require_once("./view/daotao/bangmonhoc.php");
    }
    //xeplichthi





    function updatestudentdaotao()
    {
        if (isset($_GET['masinhvien'])) {
            $svid = $this->daotao->getsinhvien($_GET['masinhvien']);
            $listCN = $this->daotao->getAllData('chuyennganh');
            $listLopCN = $this->daotao->getAllData('lopcn');
            $listGVCN = $this->daotao->getAllData('giangvien');
            require_once("./view/daotao/modal_sinhvien.php");
        }
    }

    function capnhatsinhviendaotao()
    {
        $data = $this->daotao->updatestudentdaotao1($_GET['masinhvien'], $_GET['hovaten'], $_GET['gioitinh'], $_GET['CMND'], $_GET['ngaysinh'], $_GET['phone'], $_GET['email'], $_GET['chuyennganh'], $_GET['giaovien'], $_GET['diachi'], $_GET['lop']);
        $listStudent = $this->daotao->selectlistsinhviendaotao();
        require_once("./view/daotao/bangsinhvien.php");
    }
    //xeplichthi
    function xeplichthi()
    {
        $_SESSION['chuyennganh'] = "Tất cả";
        $mon = $this->daotao->getAllData("monhoc");
        $datacn = $this->daotao->getAllData("chuyennganh");
        require_once("./view/daotao/xeplichthi.php");
    }
    function xeplichthi_loccn()
    {
        $_SESSION['chuyennganh'] = $_GET['info1'];
        if ($_GET['info1'] == "Tất cả") {
            $mon = $this->daotao->getAllData("monhoc");
        } else {
            $macn = $this->daotao->getmcn($_GET['info1']);
            $mon = $this->daotao->xeplichthi_loccn($macn['machuyennganh']);
        }
        require_once("./view/daotao/xeplichthi1.php");
    }
    function capnhatlichthi()
    {
        $this->daotao->capnhatlichthi($_GET['mamon'], $_GET['ngaythi'], $_GET['cathi']);
    }
    function lichthi_timkiem()
    {
        if ($_SESSION['chuyennganh'] == "Tất cả") {
            $mon = $this->daotao->timlichthi($_GET['key']);
        } else {
            echo $_SESSION['chuyennganh'];
            $macn = $this->daotao->getmcn($_SESSION['chuyennganh']);
            $mon = $this->daotao->timlichthi_loccn($_GET['key'], $macn['machuyennganh']);
        }
        require_once("./view/daotao/xeplichthi1.php");
    }

    function danhsachlophoc()
    {
        $data_cn = $this->daotao->getAllData("chuyennganh");
        $lop = $this->daotao->getAllData("lopcn");
        require_once("./view/daotao/Danhsachlophoc.php");
    }
    function locloptheocn()
    {
        $lop = $this->daotao->locloptheocn($_GET['info']);
        $data_cn = $this->daotao->getAllData("chuyennganh");
        require_once("./view/daotao/Danhsachlophoc_ajax.php");
    }
    function timkiemlop()
    {
        $lop = $this->daotao->timkiemlop($_GET['key']);
        $data_cn = $this->daotao->getAllData("chuyennganh");
        require_once("./view/daotao/Danhsachlophoc_ajax.php");
    }


    function themlop()
    {
        $this->daotao->themlop($_GET['malop'], $_GET['tenlop'], $_GET['chuyennganh']);
        $lop = $this->daotao->getAllData("lopcn");
        $data_cn = $this->daotao->getAllData("chuyennganh");
        require_once("./view/daotao/Danhsachlophoc_ajax.php");
    }
    function xoalop()
    {
        $this->daotao->xoalop($_GET['info']);
        $data_cn=$this->daotao->getAllData("chuyennganh");
        $lop=$this->daotao->getAllData("lopcn");
        require_once("./view/daotao/Danhsachlophoc_ajax.php");
    }
    function updatelophoc()
    {

        $info=$this->daotao->getinfolophoc($_GET['malop']);
        $data_cn=$this->daotao->getAllData("chuyennganh");
        require_once("./view/daotao/modal_lophoc.php");
    }
    function capnhatlop()
    {
        $this->daotao->capnhatlop($_GET['malop'], $_GET['tenlop'], $_GET['chuyennganh']);
        $lop = $this->daotao->getAllData("lopcn");
        $data_cn = $this->daotao->selectlistchuyennganh();
        require_once("./view/daotao/Danhsachlophoc_ajax.php");
    }
}
