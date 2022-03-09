<?php
    class admin{
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'pointmanagement';

        private $conn;
        private $result = null;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        function executeResult($sql){
            $conn = mysqli_connect($this->hostname, $this->username, $this->pass, $this->dbname);
            
            $result = mysqli_query($conn, $sql);
            $list = [];
            while ($row = mysqli_fetch_array($result, 1)) {
                $list[] = $row;
            }
            mysqli_close($conn);
            
            return $list;
        }

        //thực hiện truy vấn
        public function execute($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;
        }
        //thực hiện lấy dữ liệu
        public function getData(){
                   
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function dem(){
            if($this->result){
                $num = mysqli_num_rows($this->result);
            }
            else{
                $num = 0;
            }
            return $num;
        }
        public function getAllData($table){
            $sql = "select * from $table";
            return $this->execute($sql);
        }


        public function masinhvien()
        {
            $sql = "SELECT  masinhvien FROM `sinhvien` where id=(select MAX(id) from `sinhvien`)";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        
        public function createstudent($masinhvien,$hovaten,$gioitinh,$CMND,$ngaysinh,$phone,$email,$chuyennganh,$giaovien,$diachi,$lop){
            $sql="INSERT INTO `sinhvien`(`masinhvien`, `hovaten`, `gioitinh`, `diachi`, `email`, `dienthoai`, `cmnd`, `ngaysinh`, `GVCN`, `chuyennganh`,  `password`,`lop`) 
            VALUES ('$masinhvien','$hovaten','$gioitinh','$diachi','$email','$phone','$CMND','$ngaysinh','$giaovien','$chuyennganh','$masinhvien','$lop')";
            
            return $this->execute($sql);
        }
        public function magiangvien()
        {
            $sql = "SELECT  magiangvien FROM `giangvien` where id=(select MAX(id) from `giangvien`)";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        // public function diemtrungbinh(){
        //     $sql = "sELECT count(svdm.masinhvien) as hocsinhgioi,(SELECT count(svdm.masinhvien)  FROM `sinhvien-diemmon` svdm INNER join `sinhvien` on sinhvien.masinhvien = svdm.masinhvien WHERE svdm.diemtongket<8 and svdm.diemtongket>6.5) as hocsinhkha,(SELECT count(svdm.masinhvien)  FROM `sinhvien-diemmon` 
        //     svdm INNER join `sinhvien` on sinhvien.masinhvien = svdm.masinhvien WHERE svdm.diemtongket<6.5) 
        //     as hocsinhtb FROM `sinhvien-diemmon` svdm INNER join `sinhvien` on sinhvien.masinhvien = svdm.masinhvien WHERE svdm.diemtongket>8";
        //     $data = $this->executeResult($sql);    
        //     return $data;
            
        // }
        // / Sinh vien
        public function getinfosinhvien($msv){
            $sql = "select `sinhvien`.*, `giangvien`.hovaten as `hvt` from `sinhvien` inner join `giangvien` on `sinhvien`.GVCN=`giangvien`.magiangvien WHERE masinhvien='$msv'";
            $this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }       
        public function getinfoGVCN($msv){
            $sql = "select * from sinhvien WHERE masinhvien='$msv'";
            $this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }       
        public function updatesinhvien($msv,$img,$gioitinh,$cmnd,$dienthoai,$email,$diachi){
            $sql="UPDATE sinhvien SET `image`='$img', gioitinh='$gioitinh', cmnd='$cmnd', dienthoai='$dienthoai', email='$email', diachi='$diachi' WHERE masinhvien='$msv'";
            return $this->execute($sql);
        }  
        
        public function getinfopoint($msv){
            $sql = "select * from `sinhvien-diemmon` inner join `monhoc` on `sinhvien-diemmon`.mamon=`monhoc`.mamon WHERE masinhvien='$msv'";
            $this->execute($sql);
            if($this->dem()==0){
                $data=[];
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function diemtrungbinh($msv){
            $sql = "select sum(sotinchi*diemtongket)/SUM(sotinchi) as diemtb from `sinhvien-diemmon` inner join `monhoc` on 
            `sinhvien-diemmon`.mamon=`monhoc`.mamon WHERE masinhvien='$msv' and `sinhvien-diemmon`.diemcuoiky!=''";
            $data = $this->executeResult($sql);
            return $data;
        }
        
        public function tongdiem($msv){
            $sql = "select sum(sotinchi*diemtongket) as tongdiem from `sinhvien-diemmon` inner join `monhoc` on `sinhvien-diemmon`.mamon=`monhoc`.mamon WHERE masinhvien='$msv'";
            $this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }

        public function mondahoc($msv){
            $sql = "select * from `sinhvien-diemmon` WHERE masinhvien='$msv' and diemquatrinh !=''";
            return $this->execute($sql);
        }
        
        ///// LOGIN
        public  function  login($tk,$password)
        {
            $sql = "select * from admin where maadmin = '$tk' and password = '$password'";
            $ListUser = $this->executeResult($sql);    
            return $ListUser;
        }
        public function mkchecksinhvien($tk,$pass){
            $sql = "select * from `sinhvien` where `masinhvien`='$tk' and `password`='$pass' and trangthai_sv='Đang học'";
            $data=$this->execute($sql);
            return $data;
        }

        public function getinfosinhvien1($tk){
            $sql = "select * from sinhvien where `masinhvien`='$tk' ";
            
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function creategiangvien($magiangvien,$hovaten,$gioitinh,$CMND,$ngaysinh,$phone,$email,$chuyennganh,$diachi,$lop){
            $sql="INSERT INTO `giangvien`(`magiangvien`, `hovaten`, `gioitinh`, `diachi`, `email`, `dienthoai`, `cmnd`, `ngaysinh`, `chuyennganh`,  `password`,`ChuNhiem`) 
            VALUES ('$magiangvien','$hovaten','$gioitinh','$diachi','$email','$phone','$CMND','$ngaysinh','$chuyennganh','$magiangvien','$lop')";
            return $this->execute($sql);
        }

        public function updatemksinhvien($msv,$mk){
            $sql="UPDATE sinhvien SET password='$mk' WHERE masinhvien='$msv'";
            return $this->execute($sql);
        }
        public function getGiaoVienCN($machuyennganh)
        {
            $sql = "select magiangvien,hovaten from giangvien where chuyennganh = '$machuyennganh'";
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;;
        }
        ///tkb
        public function tkb(){
            $sql=" SELECT giangvienmonhoc.magiangvien as magiangvien,monhoc.mamon as mamon,monhoc.tenmon as tenmon,giangvien.hovaten as hovaten,giangvienmonhoc.lop as malop,giangvien.chuyennganh as chuyennganh,monhoc.sotinchi as sotinchi,monhoc.thu as thu,monhoc.ca as ca FROM `giangvienmonhoc` inner join giangvien on giangvienmonhoc.magiangvien = giangvien.magiangvien inner join monhoc on monhoc.mamon = giangvienmonhoc.mamon
            ";
            return $this->execute($sql);
        }
        public function tkb_loccn($machuyennganh){
            $sql="SELECT giangvienmonhoc.magiangvien as magiangvien,monhoc.mamon as mamon,monhoc.tenmon as tenmon,giangvien.hovaten as hovaten,giangvienmonhoc.lop as malop,giangvien.chuyennganh as chuyennganh,monhoc.sotinchi as sotinchi,monhoc.thu as thu,monhoc.ca as ca FROM `giangvienmonhoc` inner join giangvien on giangvienmonhoc.magiangvien = giangvien.magiangvien inner join monhoc on monhoc.mamon = giangvienmonhoc.mamon where monhoc.chuyennganh='$machuyennganh'";
            return $this->execute($sql);
        }
        public function tkb_timkiem($key){
            $sql=" SELECT DISTINCT(monhoc.mamon), monhoc.tenmon, monhoc.sotinchi, monhoc.thu, monhoc.ca, giangvien.hovaten FROM monhoc INNER JOIN `gv-sv-lop` as gv on monhoc.mamon=gv.mamon INNER JOIN giangvien on gv.magiangvien= giangvien.magiangvien where monhoc.tenmon like '%$key%' or monhoc.mamon like '%$key%' ";
            return $this->execute($sql);
        }
        public function tkb_timkiemtheocn($key,$machuyennganh){
            $sql=" SELECT DISTINCT(monhoc.mamon), monhoc.tenmon, monhoc.sotinchi, monhoc.thu, monhoc.ca, giangvien.hovaten FROM monhoc INNER JOIN `gv-sv-lop` as gv on monhoc.mamon=gv.mamon INNER JOIN giangvien on gv.magiangvien= giangvien.magiangvien where ( monhoc.tenmon like '%$key%' or monhoc.mamon like '%$key%' ) and monhoc.chuyennganh='$machuyennganh' ";
            return $this->execute($sql);
        }

        public function countsSV(){
            $sql = 'SELECT count(*) as sl  from sinhvien';
            return $this->executeResult($sql);
        }
        public function countsGV(){
            $sql = 'SELECT count(*) as sl  from giangvien where role_id = 2';
            return $this->executeResult($sql);
        }
        public function countsNV(){
            $sql = 'SELECT count(*) as sl  from giangvien where role_id = 3';
            return $this->executeResult($sql);
        }
        public function countsSVNam(){
            $sql = 'SELECT count(*) as sl  from sinhvien  where gioitinh = "Nam"';
            return $this->executeResult($sql);
        }
        public function countsGVNam(){
            $sql = 'SELECT count(*) as sl  from giangvien where gioitinh = "Nam"';
            return $this->executeResult($sql);
        }
        public function monhocSL(){
            $sql = 'SELECT count(*) as sl  from monhoc';
            return $this->executeResult($sql);
        }
        public function chuyennganhSL(){
            $sql = 'SELECT count(*) as sl  from chuyennganh';
            return $this->executeResult($sql);
        }
        public function giangvienSL(){
            $sql = 'SELECT count(*) as sl  from giangvien';
            return $this->executeResult($sql);
        }
        public function countsSVNu(){
            $sql = 'SELECT count(*) as sl  from sinhvien  where gioitinh = "Nữ"';
            return $this->executeResult($sql);
        }
        public function countsGVNu(){
            $sql = 'SELECT count(*) as sl  from giangvien  where gioitinh = "Nữ"';
            return $this->executeResult($sql);
        }

        public function updatestudent($masinhvien,$hovaten,$gioitinh,$CMND,$ngaysinh,$phone,$email,$chuyennganh,$giaovien,$diachi,$lop,$pass,$id){
            $sql="UPDATE `sinhvien` SET `masinhvien` = '$masinhvien', `hovaten` = '$hovaten', `gioitinh`= '$gioitinh', password = '$pass',`diachi` ='$diachi', `email`='$email', `dienthoai`= '$phone', 
            `cmnd` ='$CMND', `ngaysinh` ='$ngaysinh', `GVCN` ='$giaovien', `chuyennganh`= '$chuyennganh' ,`lop`='$lop' WHERE id='$id'";
            $data = $this->execute($sql);
            echo $sql;
            return $data;
        }
        public function updatestudentdaotao1($masinhvien,$hovaten,$gioitinh,$CMND,$ngaysinh,$phone,$email,$chuyennganh,$giaovien,$diachi,$lop,$pass){
            $sql="UPDATE `sinhvien` SET `masinhvien` = '$masinhvien', `hovaten` = '$hovaten', `gioitinh`= '$gioitinh', password = '$pass',`diachi` ='$diachi', `email`='$email', `dienthoai`= '$phone', 
            `cmnd` ='$CMND', `ngaysinh` ='$ngaysinh', `GVCN` ='$giaovien', `chuyennganh`= '$chuyennganh' ,`lop`='$lop' WHERE masinhvien='$masinhvien'";
            
            return $this->execute($sql);
        }
        public function editgiangvienid($id){
            $sql = "select * from giangvien where `id`='$id' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }

        public function editgiangvien($mgv,$hovaten,$gioitinh,$cmnd,$ngaysinh,$dienthoai,$email,$cn,$diachi,$pass,$id){
            $sql="UPDATE `giangvien` SET `magiangvien` = '$mgv' ,`hovaten`='$hovaten' , gioitinh='$gioitinh',password = '$pass', chuyennganh = '$cn' ,ngaysinh = '$ngaysinh', cmnd='$cmnd', dienthoai='$dienthoai', email='$email', diachi='$diachi' WHERE id='$id'";
            return $this->execute($sql);
        }

        public function editadmin($mgv,$hovaten,$gioitinh,$cmnd,$ngaysinh,$dienthoai,$email,$diachi,$password,$id){
            $sql="UPDATE `admin` SET `maadmin` = '$mgv' ,`hovaten`='$hovaten' , gioitinh='$gioitinh',password = '$password' ,ngaysinh = '$ngaysinh', cmnd='$cmnd', dienthoai='$dienthoai', email='$email', diachi='$diachi' WHERE id='$id'";
            return $this->execute($sql);
        }
        public function deletestudent($id){
            $sql="DELETE FROM sinhvien WHere id = '$id'";
            
            return $this->execute($sql);
        }
        
        public function deletegiangvien($id){
            $sql="DELETE FROM giangvien WHere id = '$id'";
            
            return $this->execute($sql);
        }
        public function createnhanvien($magiangvien,$hovaten, $role_id,$gioitinh,$CMND,$ngaysinh,$phone,$email,$chuyennganh,$diachi,$lop){
            $sql="INSERT INTO `giangvien`(`magiangvien`, `hovaten`,`role_id`, `gioitinh`, `diachi`, `email`, `dienthoai`, `cmnd`, `ngaysinh`, `chuyennganh`,  `password`,`ChuNhiem`) 
            VALUES ('$magiangvien','$hovaten', $role_id,'$gioitinh','$diachi','$email','$phone','$CMND','$ngaysinh','$chuyennganh','$magiangvien','$lop')";
           
            return $this->execute($sql);
        }
        public function getinfoadmin($tk){
            $sql = "select * from admin where `maadmin`='$tk' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function editadminid($id){
            $sql = "select * from admin where `id`='$id' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function editsvid($id){
            $sql = "select * from sinhvien where `id`='$id' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }


        
        
        public function themvaolichdkhoc($mm,$nbd,$nkt){
            $sql="INSERT INTO `lickdkhoc`(`mamon`, `ngaybatdau`, `ngayketthuc`) 
            VALUES ('$mm','$nbd','$nkt')";
            return $this->execute($sql);
        }
        public function getdatalichdk($tg){
            $sql = "SELECT * FROM `lickdkhoc` INNER JOIN monhoc on lickdkhoc.mamon=monhoc.mamon INNER JOIN giangvienmonhoc on giangvienmonhoc.mamon=lickdkhoc.mamon WHERE lickdkhoc.ngaybatdau<'$tg' AND lickdkhoc.ngayketthuc>'$tg'";
            return $this->execute($sql);
        }
        public function giodk($tg){
            $sql = "SELECT * FROM `lickdkhoc` WHERE lickdkhoc.ngaybatdau<'$tg' AND lickdkhoc.ngayketthuc>'$tg' ORDER BY ngaybatdau ASC LIMIT 1";
            $this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function giocbdk($tg){
            $sql = "SELECT * FROM `lickdkhoc` WHERE lickdkhoc.ngaybatdau>'$tg' ORDER BY ngaybatdau ASC LIMIT 1";
            $this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function getdatamondk($msv){
            $sql = "SELECT * FROM `gv-sv-lop` as gv INNER JOIN monhoc on gv.mamon= monhoc.mamon WHERE gv.masinhvien='$msv'";
            return $this->execute($sql);
        }
        public function getmamondk($msv){
            $sql = "SELECT * FROM `gv-sv-lop` where masinhvien ='$msv' and trangthai=true";
            return $this->execute($sql);
        }
        public function dangkyhoc($mm,$mgv,$mlop,$msv){
            $sql = "INSERT INTO `gv-sv-lop`( `magiangvien`, `mamon`, `malop`, `masinhvien`) VALUES ('$mgv','$mm','$mlop','$msv')";
            $this->execute($sql);
            $sql1="INSERT INTO `sinhvien-diemmon`( `masinhvien`, `mamon`) VALUES ('$msv','$mm')";
            return $this->execute($sql1);
        }
        public function huydangkyhoc($mm,$mgv,$mlop,$msv){
            $sql = "DELETE FROM `gv-sv-lop` WHERE masinhvien='$msv'and magiangvien='$mgv'and malop='$mlop'and mamon='$mm'";
            $this->execute($sql);
            $sql1 = "DELETE FROM `sinhvien-diemmon` WHERE masinhvien='$msv'and mamon='$mm'";
            return $this->execute($sql1);
        }

        public function thongtinlich($msv){
            $sql = "SELECT * FROM monhoc INNER JOIN `gv-sv-lop` as gv on monhoc.mamon =gv.mamon WHERE gv.masinhvien='$msv' and cathi !=''";
            $this->execute($sql);
            return $this->execute($sql);
        }    
       
    }