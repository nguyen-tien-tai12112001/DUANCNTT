<?php
require_once("./models/sinhvien.php");
require_once("./models/giangvien.php");
require_once("./models/admin.php");
use models\DatabaseConnection;
class login_controller {
    public function run(){
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $this->giangvien = new giangvien($dbc);
        $this->db = new sinhvien($dbc);
        $this->dbadmin = new admin($dbc);
        $action= filter_input(INPUT_GET,"action");
        if(method_exists($this,$action))
        {
            $this->$action();
        }
        else{
            $this->login();
        }
    }
    function login(){
       
        if(!empty($_POST)){
            $tk = $_POST['taikhoan'];
            $mk = $_POST['password'];
            $check = substr($tk, 0, 1);
            $check1 = substr($tk, 0, 2);
            if($check1 == "AD"){
                $user = $this->dbadmin->login($tk,$mk);
                
                if($user)
                {
                    $info=$this->dbadmin->getinfoadmin($tk);
                    $_SESSION['id']=$info['id'];
                    $_SESSION['name']=$info['hovaten'];
                    $_SESSION['admin']=$info['maadmin'];
                    $_SESSION['ngaysinh']=$info['ngaysinh'];
                    $_SESSION['email']=$info['email'];
                    $_SESSION['start'] = time(); 
                    $_SESSION['expire'] = $_SESSION['start'] + (60*60);
                    $_SESSION['role_id'] = $info['role_id']; 
                }
            }
            else if($check == "A")
            {
                $user =$this->db->mkchecksinhvien($tk,$mk);
                
                if(mysqli_num_rows($user)>0){
                        
                        $info=$this->db->getinfosinhvien1($tk);
                       
                        $_SESSION['name']=$info['hovaten'];
                        $_SESSION['msv']=$info['masinhvien'];
                        $_SESSION['ngaysinh']=$info['ngaysinh'];
                        $_SESSION['lop']=$info['lop'];
                        $_SESSION['role_id'] = $info['role_id'];
                        $_SESSION['start'] = time(); 
                        $_SESSION['expire'] = $_SESSION['start'] + (60*60);
                        $_SESSION['role_id'] = $info['role_id'];
                }
            }
            else if($check == "G")
            {
                $user =$this->giangvien->mkcheckgiangvien($tk,$mk);
                
                if(mysqli_num_rows($user)>0){
                        
                        $info=$this->giangvien->getinfogiangvien($tk);
                        
                        $_SESSION['name']=$info['hovaten'];
                        $_SESSION['mgv']=$info['magiangvien'];
                        $_SESSION['ngaysinh']=$info['ngaysinh'];
                        $_SESSION['email']=$info['email'];
                        $_SESSION['start'] = time(); 
                        $_SESSION['expire'] = $_SESSION['start'] + (60*60);
                        $_SESSION['role_id'] = $info['role_id']; 
                        
                        
                }
               
            }
            
            
        }
        $listStudent = $this->db->listStudentlogin();
        $listGiangVien = $this->giangvien->listTeacherLogin();
        $ADMIN = $this->db->getAllData("admin");
        require_once('./view/index.php');
    }
    function logout(){
        session_destroy();
        require_once('./view/index.php');
        //$this->login();
    }
    function doimk(){
       
            if(isset($_SESSION['msv']))
            {
                $data=$this->db->getinfosinhvien($_SESSION['msv']);
                if( isset($_POST['doimk']) ){
                    $mkc = $_POST['mkc'];
                    $mkm = $_POST['mkm'];
                    $nhaplaimk = $_POST['nhaplaimk'];
                    $check=$this->db->mkchecksinhvien($_SESSION['msv'],$mkc);
                    if(mysqli_num_rows($check)>0){
                        if(strlen($mkm)<6)
                        {
                            $message="Mật khẩu tối thiểu là 6 kí tự";
                        }
                        else if($mkm==$nhaplaimk){
                            $this->db->updatemksinhvien($_SESSION['msv'],$mkm);
                            $message="Đổi lại mật khẩu thành công";
                            //echo "<script type='text/javascript'>alert('$msg');</script>";
                        }
                        else{
                            $message = "Mật khẩu mới và nhập lại mật khẩu không đúng!!!";
                            //echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                    }
                    else
                    {
                        $message = "Mật khẩu không đúng";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                }
            }
            else
            {
                $data=$this->giangvien->getinfogiangvien($_SESSION['mgv']);
              
                if( isset($_POST['doimk']) ){
                    $mkc = $_POST['mkc'];
                    $mkm = $_POST['mkm'];
                    $nhaplaimk = $_POST['nhaplaimk'];
                    $check=$this->giangvien->mkcheckgiangvien($_SESSION['mgv'],$mkc);
                    if(mysqli_num_rows($check)>0){
                        if(strlen($mkm)<6)
                        {
                            $message="Mật khẩu tối thiểu là 6 kí tự";
                        }
                        else if($mkm==$nhaplaimk){
                            $this->giangvien->updatemkgiangvien($_SESSION['mgv'],$mkm);
                            $message="Đổi lại mật khẩu thành công";
                            //echo "<script type='text/javascript'>alert('$msg');</script>";
                        }
                        else{
                            $message = "Mật khẩu mới và nhập lại mật khẩu không đúng!!!";
                            //echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                    }
                    else
                    {
                        $message = "Mật khẩu không đúng";
                        //echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                }
            }
        
        
        require_once("./view/DoiMatKhau.php");
    }
}