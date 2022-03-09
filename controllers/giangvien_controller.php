<?php
require_once("./models/sinhvien.php");
require_once("./models/giangvien.php");
require_once("./models/daotao.php");
use models\DatabaseConnection;
class giangvien_controller {
    public function run(){
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $this->daotao = new daotao($dbc);
        $this->giangvien = new giangvien($dbc);
        $action= filter_input(INPUT_GET,"action");
        if(method_exists($this,$action))
        {
            $this->$action();
        }
        else{
            $this->nhapdiem();
        }
    }
    function nhapdiem()
    {
        $svl=$this->giangvien->getinfo_svl($_SESSION['mgv']);
        $_SESSION['mamon']="Tất cả";
        if(isset($_GET['Ajax_action']) && $_GET['info']!="Tất cả")
        {
            $mamon=$this->giangvien->getinfo_mamon($_GET['info']);
            $_SESSION['mamon']=$mamon['mamon'];
            $svl2=$this->giangvien->getinfo_svmon($_SESSION['mgv'],$mamon['mamon']);
            require_once("./view/giangvien/qlbangdiemsinhvien.php");
        }
        else{
            if( isset($_GET['Ajax_action'])&& $_GET['info']=="Tất cả"){
                $svl2=$this->giangvien->getinfo_svl($_SESSION['mgv']);
                require_once("./view/giangvien/qlbangdiemsinhvien.php");
            }
            else{
                $mon=$this->giangvien->getinfo_mon($_SESSION['mgv']);
                
                require_once("./view/giangvien/NhapDiemSinhVien.php");
            }
        }

    }

    function sapxep()
    {
        if($_GET['info']=="Thấp -> cao"){
            $_SESSION['sapxep']='getinfo_thapcao';
            $svl2=$this->giangvien->getinfo_thapcao($_SESSION['mgv'],$_SESSION['mamon']);
            require_once("./view/giangvien/qlbangdiemsinhvien.php");
        }
        else{
            $_SESSION['sapxep']='getinfo_caothap';
            $svl2=$this->giangvien->getinfo_caothap($_SESSION['mgv'],$_SESSION['mamon']);
            require_once("./view/giangvien/qlbangdiemsinhvien.php");
        }
    }

    function sapxep1()
    {
        $_SESSION['sapxep']=$_GET['info'];
        $svl2=$this->giangvien->getinfo_all($_SESSION['mgv'],$_SESSION['mamon'],$_GET['info']);
        require_once("./view/giangvien/QLHocSinhTheoMonHoc1.php");
    }
    function timkiem()
    {
        // if($_GET['info']==''){
        //     if($_SESSION['sapxep']=='getinfo_thapcao')
        //     {
        //         $svl2=$this->giangvien->getinfo_thapcao($_SESSION['mgv'],$_SESSION['mamon']);
        //         require_once("./view/giangvien/qlbangdiemsinhvien.php");
        //     }
        //     else
        //     {
        //         $svl2=$this->giangvien->getinfo_caothap($_SESSION['mgv'],$_SESSION['mamon']);
        //         require_once("./view/giangvien/qlbangdiemsinhvien.php");
        //     }
        
        // }
        // else{
        //     if($_SESSION['sapxep']=='getinfo_thapcao')
        //     {
        //         $svl2=$this->giangvien->getinfo_tkthapcao($_SESSION['mgv'],$_SESSION['mamon'], $_GET['info']);
        //         require_once("./view/giangvien/qlbangdiemsinhvien.php");
        //     }
        //     else
        //     {
        //         $svl2=$this->giangvien->getinfo_tkcaothap($_SESSION['mgv'],$_SESSION['mamon'], $_GET['info']);
        //         require_once("./view/giangvien/qlbangdiemsinhvien.php");
        //     }
        // }
        $svl2=$this->giangvien->getinfo_tk($_SESSION['mgv'],$_SESSION['mamon'],$_GET['info'],$_SESSION['trangthai']);
        require_once("./view/giangvien/qlbangdiemsinhvien.php");
       
    }
    
    function updiem()
    {
        $mamon=$this->giangvien->getinfo_mamon($_GET['tenmon']);
        if(isset($_GET['diemtongket'])){
            $data=$this->giangvien->updiem($mamon['mamon'], $_GET['masinhvien'], $_GET['diemquatrinh'], $_GET['diemcuoiky'], $_GET['diemtongket']);
        }
        else{
            $data=$this->giangvien->updiemqt($mamon['mamon'], $_GET['masinhvien'], $_GET['diemquatrinh']);
        }
        if(!isset($_SESSION['sapxep']) || ($_SESSION['sapxep'])=='getinfo_thapcao')
        {
            $svl2=$this->giangvien->getinfo_thapcao($_SESSION['mgv'],$_SESSION['mamon']);
            require_once("./view/giangvien/qlbangdiemsinhvien.php");
        }
        else
        {
            $svl2=$this->giangvien->getinfo_caothap($_SESSION['mgv'],$_SESSION['mamon']);
            require_once("./view/giangvien/qlbangdiemsinhvien.php");
        }

    }
    
    function QLHocSinhTheoMonHoc()
    {
        $_SESSION['mamon']="Tất cả";
        $_SESSION['trangthai']="Tất cả";
        if(isset($_GET['msv'])){
            $info = $this->giangvien->getinfoGVCN($_GET['msv']);
            $info['hvt']='';
            if( $info['GVCN'] != null){
                $info=$this->giangvien->getinfosinhvien($_GET['msv']);
            }
           
            $data=$this->giangvien->getinfopoint($_GET['msv']);
            $tongtin=$this->giangvien->tongtin($_GET['msv']);
            $tongdiem=$this->giangvien->tongdiem($_GET['msv']);
            $data_cn=$this->daotao->getAllData("chuyennganh");
            require_once("./view/giangvien/modal_diem.php");
        }
        else{
            $mon=$this->giangvien->getinfo_mon($_SESSION['mgv']);
            $data=$this->giangvien->getinfo_svl_tt($_SESSION['mgv'],$_SESSION['mamon'],$_SESSION['trangthai']);
            require_once("./view/giangvien/QLHocSinhTheoMonHoc.php");
        }
    }

    function sxtheomon()
    {
        if( $_GET['info']=="Tất cả"){
            $_SESSION['mamon']="Tất cả";
            $data1=$this->giangvien->getinfo_svl_tt($_SESSION['mgv'],$_GET['info'],$_SESSION['trangthai']);
            require_once("./view/giangvien/QLHocSinhTheoMonHoc1.php");
        }
        else{
            $mamon=$this->giangvien->getinfo_mamon($_GET['info']);
            $_SESSION['mamon']=$mamon['mamon'];
            $data1=$this->giangvien->getinfo_svl_tt($_SESSION['mgv'],$mamon['mamon'],$_SESSION['trangthai']);
            require_once("./view/giangvien/QLHocSinhTheoMonHoc1.php");
        }
    }
    function sxtheotrangthai()
    {
        $_SESSION['trangthai']=$_GET['info1'];
        $data1=$this->giangvien->getinfo_svl_tt($_SESSION['mgv'],$_SESSION['mamon'],$_GET['info1']);
        require_once("./view/giangvien/QLHocSinhTheoMonHoc1.php");
    }
    function timkiem1()
    {
        $data1=$this->giangvien->getinfo_tk($_SESSION['mgv'],$_SESSION['mamon'],$_GET['info'],$_SESSION['trangthai']);
        require_once("./view/giangvien/QLHocSinhTheoMonHoc1.php");
    }
    function capnhattheotrangthai()
    {
        $this->giangvien->capnhattt($_GET['masinhvien'],$_GET['mamon'],$_GET['trangthai']);
        // require_once("./view/giangvien/QLHocSinhTheoMonHoc1.php");
    }
}