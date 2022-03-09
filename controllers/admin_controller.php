<?php
require_once("./models/sinhvien.php");
use models\DatabaseConnection;
class admin_controller
{
    public function run()
    {
       
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
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
       
        $countsSV =$this->db->countsSV();
        $countsGV =$this->db->countsGV();
        $countsNV =$this->db->countsNV();
        $countsSVNam =$this->db->countsSVNam();
        $countsGVNam =$this->db->countsGVNam();
        $countsGVNu =$this->db->countsGVNu();
        $countsSVNu =$this->db->countsSVNu();
        $giangvienSL =$this->db->giangvienSL();
        $chuyennganhSL =$this->db->chuyennganhSL();
        $monhocSL =$this->db->monhocSL();
        require_once("./view/admin/dashboardadmin.php");
    }

    function dangxuat()
    {
        session_destroy();
        header('location:index.php?controller=login&action=login');
    }
    function danhsachsinhvien()
    {
        $listStudent = $this->db->getAllData('sinhvien');
        require_once("./view/admin/danhsachsinhvien.php");
    }
    function danhsachgiangvien()
    {
        $listGiangvien = $this->db->getAllData('giangvien');
        require_once("./view/admin/danhsachgiangvien.php");
    }
    function danhsachnhanvien()
    {
        $listNhanVien = $this->db->getAllData('giangvien');
        require_once("./view/admin/danhsachnhanvien.php");
    }
    function dashboardadmin()
    {

        $countsSV =$this->db->countsSV();
        $countsGV =$this->db->countsGV();
        $countsNV =$this->db->countsNV();
        $countsSVNam =$this->db->countsSVNam();
        $countsGVNam =$this->db->countsGVNam();
        $countsGVNu =$this->db->countsGVNu();
        $countsSVNu =$this->db->countsSVNu();
        


        $giangvienSL =$this->db->giangvienSL();
        $chuyennganhSL =$this->db->chuyennganhSL();
        $monhocSL =$this->db->monhocSL();
        require_once("./view/admin/dashboardadmin.php");
    }
    function themsinhvien()
    {   
        if(!empty($_POST["machuyennganh"])){ 

            $listGVCN = $this->db->getGiaoVienCN($_POST['machuyennganh']);
            foreach ($listGVCN as $infoCN)
            {
              echo '<option value="'.$infoCN['magiangvien'].'">'.$infoCN['hovaten'].'</option>'; 

            }
            require_once("./view/admin/themsinhvien.php");
        }
        $masinhvien=$this->db->masinhvien();
        $getmasv = substr($masinhvien['masinhvien'], 1); 
        $listCN = $this->db->getAllData('chuyennganh');
        $listLopCN = $this->db->getAllData('lopcn');
        $listGVCN = $this->db->getAllData('giangvien');
        if(isset($_POST['addstudent'])){
            if(isset($_POST['masinhvien']) && isset($_POST['hovaten'])){
                $data=$this->db->createstudent($_POST['masinhvien'], $_POST['hovaten'], $_POST['gioitinh'], $_POST['CMND'], $_POST['ngaysinh'], $_POST['phone'], $_POST['email'], $_POST['chuyennganh'], $_POST['giaovien'], $_POST['diachi'], $_POST['lop']);
                $listStudent = $this->db->getAllData('sinhvien');
                header('location: index.php?controller=admin&action=danhsachsinhvien');
            }
           
        }
        require_once("./view/admin/themsinhvien.php");

    }
    function suasinhvien()
    {   
        if(!empty($_POST["machuyennganh"])){ 

            $listGVCN = $this->db->getGiaoVienCN($_POST['machuyennganh']);
            foreach ($listGVCN as $infoCN)
            {
              echo '<option value="'.$infoCN['magiangvien'].'">'.$infoCN['hovaten'].'</option>'; 

            }
            require_once("./view/admin/themsinhvien.php");
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $svid = $this->db->editsvid($id);
            $listCN = $this->db->getAllData('chuyennganh');
            $listLopCN = $this->db->getAllData('lopcn');
            $listGVCN = $this->db->getAllData('giangvien');
            if(isset($_POST['suastudent']) ){
                if(isset($_POST['masinhvien']) && isset($_POST['hovaten'])){
                    $data=$this->db->updatestudent($_POST['masinhvien'], $_POST['hovaten'], $_POST['gioitinh'], $_POST['CMND'], $_POST['ngaysinh'], $_POST['phone'], $_POST['email'], $_POST['chuyennganh'], $_POST['giaovien'], $_POST['diachi'], $_POST['lop'],$_POST['password'],$id);
                    $listStudent = $this->db->getAllData('sinhvien');
                    header('location: index.php?controller=admin&action=danhsachsinhvien');
                }
            }
            require_once("./view/admin/suasinhvien.php");
        }
    }
    function suagiangvien()
    {   
        if(!empty($_POST["machuyennganh"])){ 

            $listGVCN = $this->db->getGiaoVienCN($_POST['machuyennganh']);
            foreach ($listGVCN as $infoCN)
            {
              echo '<option value="'.$infoCN['magiangvien'].'">'.$infoCN['hovaten'].'</option>'; 

            }
            require_once("./view/admin/themsinhvien.php");
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $gvid = $this->db->editgiangvienid($id);
            $listChuyenNganh = $this->db->getAllData('chuyennganh');
            if(isset($_POST['suagiangvien'])){
                if(isset($_POST['magiangvien']) && isset($_POST['hovaten'])){
                    $data=$this->db->editgiangvien($_POST['magiangvien'], $_POST['hovaten'], $_POST['gioitinh'], $_POST['CMND'], $_POST['ngaysinh'], $_POST['phone'], $_POST['email'], $_POST['chuyennganh'], $_POST['diachi'],$_POST['password'],$id);
                    $listNhanVien = $this->db->getAllData('giangvien');
                    header('location: index.php?controller=admin&action=danhsachgiangvien');
                }
                
            }
            require_once("./view/admin/suagiangvien.php");
        }
    }
    function suaadmin()
    {   
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $gvid = $this->db->editadminid($id);
            if(isset($_POST['suaadmin'])){
                if(isset($_POST['maadmin']) && isset($_POST['hovaten'])){
                    $_SESSION['name'] = $_POST['hovaten'];
                    $data=$this->db->editadmin($_POST['maadmin'], $_POST['hovaten'], $_POST['gioitinh'], $_POST['CMND'], $_POST['ngaysinh'], $_POST['phone'], $_POST['email'], $_POST['diachi'],$_POST['password'],$id);
                    header('location: index.php?controller=admin&action=dashboardadmin');
                }
                
            }
            require_once("./view/admin/suaadmin.php");
        }
    }
    function suanhanvien()
    {   

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $gvid = $this->db->editgiangvienid($id);
            $listChuyenNganh = $this->db->getAllData('chuyennganh');
            if(isset($_POST['suanhanvien'])){
                if(isset($_POST['magiangvien']) && isset($_POST['hovaten'])){
                    $data=$this->db->editgiangvien($_POST['magiangvien'], $_POST['hovaten'], $_POST['gioitinh'], $_POST['CMND'], $_POST['ngaysinh'], $_POST['phone'], $_POST['email'], $_POST['chuyennganh'], $_POST['diachi'],$_POST['password'],$id);
                    $listNhanVien = $this->db->getAllData('giangvien');
                    header('location: index.php?controller=admin&action=danhsachnhanvien');
                }
                
            }
            require_once("./view/admin/suanhanvien.php");
        }
    }
    function xoasinhvien()
    {   
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $data=$this->db->deletestudent($id);
        }
        header('location: index.php?controller=admin&action=danhsachsinhvien');
    }

    function themgiangvien()
    {   
        if(!empty($_POST["machuyennganh"])){ 

            $listGVCN = $this->db->getGiaoVienCN($_POST['machuyennganh']);
            foreach ($listGVCN as $infoCN)
            {
              echo '<option value="'.$infoCN['magiangvien'].'">'.$infoCN['hovaten'].'</option>'; 

            }
            require_once("./view/admin/themsinhvien.php");
        }
        $magiangvien=$this->db->magiangvien();
        $getmgv = substr($magiangvien['magiangvien'], 2); 
        $listChuyenNganh = $this->db->getAllData('chuyennganh');
        if(isset($_POST['addgiangvien'])){
            if(isset($_POST['magiangvien']) && isset($_POST['hovaten'])){
                $data=$this->db->creategiangvien($_POST['magiangvien'], $_POST['hovaten'], $_POST['gioitinh'], $_POST['CMND'], $_POST['ngaysinh'], $_POST['phone'], $_POST['email'], $_POST['chuyennganh'], $_POST['diachi'], $_POST['lop']);
                $listNhanVien = $this->db->getAllData('giangvien');
                header('location: index.php?controller=admin&action=danhsachgiangvien');
            }
            
        }
        require_once("./view/admin/themgiangvien.php");

    }
    function themnhanvien()
    {   
        $magiangvien=$this->db->magiangvien();
        $getmgv = substr($magiangvien['magiangvien'], 2); 
        $listChuyenNganh = $this->db->getAllData('chuyennganh');
        if(isset($_POST['addnhanvien'])){
            if(isset($_POST['magiangvien']) && isset($_POST['hovaten'])){
                $role_id = 3;
                $data=$this->db->createnhanvien($_POST['magiangvien'], $_POST['hovaten'], $role_id, $_POST['gioitinh'], $_POST['CMND'], $_POST['ngaysinh'], $_POST['phone'], $_POST['email'], $_POST['chuyennganh'], $_POST['diachi'], $_POST['lop']);
                $listNhanVien = $this->db->getAllData('giangvien');
                header('location: index.php?controller=admin&action=danhsachnhanvien');
            }
            
        }
        require_once("./view/admin/themnhanvien.php");

    }
    function xoagiangvien()
    {   
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $data=$this->db->deletegiangvien($id);
        }
        header('location: index.php?controller=admin&action=danhsachgiangvien');
    }
    
    function xoanhanvien()
    {   
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $data=$this->db->deletegiangvien($id);
        }
        header('location: index.php?controller=admin&action=danhsachnhanvien');
    }
}
