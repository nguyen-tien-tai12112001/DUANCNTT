<?php
    class daotao{
        private $conn;
        private $result = null;

        public function __construct($conn) {
            $this->conn = $conn;
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
        public function getAllData_gv(){
            $sql = "select * from giangvien where role_id=2";
            return $this->execute($sql);
        }
        public function getAllData_gv_tt(){
            $sql = "select * from giangvien where role_id=2 and trangthai=1";
            return $this->execute($sql);
        }
        public function timkiemmonhocmamon($timkiem){
            $sql = "select * from monhoc where (monhoc.mamon like '%$timkiem%' or monhoc.tenmon like '%$timkiem%') ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function timkiemmonhocmamontheochuyennganh($timkiem){
            $sql = "select * from monhoc where chuyennganh = '$timkiem' ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
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
        public function getlopCN($machuyennganh)
        {
            $sql = "select malop,tenlop from lopcn where chuyennganh = '$machuyennganh'";
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

        public function timkiemsinhvien($masinhvien){
            $sql = "select * from  `sinhvien`  where  (masinhvien LIKE '%$masinhvien%' or hovaten like '%$masinhvien%')";
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function timkiemsinhvientheochuyennganh($machuyennganh){
            $sql = "select * from  `sinhvien`  where  chuyennganh = '$machuyennganh' ";
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function timkiemmonhoctheomachuyennganh($machuyennganh){
            $sql = "SELECT giangvienmonhoc.magiangvien as magiangvien,monhoc.mamon as mamon,monhoc.tenmon as tenmon,giangvien.hovaten as hovaten,giangvienmonhoc.lop as malop,giangvien.chuyennganh as chuyennganh FROM `giangvienmonhoc` inner join giangvien on giangvienmonhoc.magiangvien = giangvien.magiangvien inner join monhoc on monhoc.mamon = giangvienmonhoc.mamon WHERE monhoc.chuyennganh  = '$machuyennganh' ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function timkiemmonhoctheomamon($machuyennganh){
            $sql = "select * from monhoc where chuyennganh = '$machuyennganh' ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function giaovienmonhoc()
        {
            $sql="SELECT * FROM `giangvienmonhoc` inner join giangvien on giangvienmonhoc.magiangvien = giangvien.magiangvien";
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function listlop()
        {
            $sql="SELECT * FROM lop";
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function capnhatgiaovienmonhoc($mamon,$magiangvien,$malop)
        {
            $sqlcheck = "select * from giangvienmonhoc where mamon = '$mamon'";
            $this->execute($sqlcheck);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            if($data == 0)
            {
                $insert = "INSERT INTO `giangvienmonhoc`(`magiangvien`, `mamon`, `lop`) VALUES ('$magiangvien','$mamon','$malop')";
                return $this->execute($insert);
            }
            else
            {
                $sql = "UPDATE `gv-sv-lop` SET `magiangvien`='$magiangvien',`malop` = '$malop' WHERE mamon = '$mamon'";
            
                $this->execute($sql);
                $sqlupdate = "UPDATE `giangvienmonhoc` SET `magiangvien`='$magiangvien',`lop`='$malop' WHERE mamon =  '$mamon'";
                return $this->execute($sqlupdate);
            }
           
        }

        public function timkiemmonhoc($timkiem)
        {
            $sql = "SELECT giangvienmonhoc.magiangvien as magiangvien,monhoc.mamon as mamon,monhoc.tenmon as tenmon,giangvien.hovaten as hovaten,giangvienmonhoc.lop as malop,giangvien.chuyennganh as chuyennganh FROM `giangvienmonhoc` inner join giangvien on giangvienmonhoc.magiangvien = giangvien.magiangvien inner join monhoc on monhoc.mamon = giangvienmonhoc.mamon WHERE  (monhoc.mamon like '%$timkiem%' or monhoc.tenmon like '%$timkiem%') ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function listmonhoc()
        {
            $sql = "SELECT * from monhoc  ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function timkiemmonhocbangmonhoc($timkiem)
        {
            $sql = "SELECT * from monhoc WHERE  (monhoc.mamon like '%$timkiem%' or monhoc.tenmon like '%$timkiem%') ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function timkiemgiangvientheochuyennganh($timkiem)
        { 
            $sql = "select * from  `giangvien`  where  chuyennganh = '$timkiem' and trangthai = 1 and role_id = 2";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function timkiemtatcagiangvientheochuyennganh()
        { 
            $sql = "select * from  `giangvien`  where trangthai = 1 and role_id = 2";
           
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

        public function timkiemgiangvien($timkiem)
        {
            $sql = "select * from  `giangvien`  where  (magiangvien like '%$timkiem%' or hovaten like '%$timkiem%') and role_id = 2 ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
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

        public function getLop($machuyennganh)
        {
            $sql = "select * from lopcn where chuyennganh = '$machuyennganh'";
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
        public function monhocgiangvien()
        {
            $sql = "SELECT giangvienmonhoc.magiangvien as magiangvien,monhoc.mamon as mamon,monhoc.tenmon as tenmon,giangvien.hovaten as hovaten,giangvienmonhoc.lop as malop FROM `giangvienmonhoc` inner join giangvien on giangvienmonhoc.magiangvien = giangvien.magiangvien inner join monhoc on monhoc.mamon = giangvienmonhoc.mamon";
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
        
        public function creategiangvien($magiangvien,$hovaten,$gioitinh,$CMND,$ngaysinh,$phone,$email,$chuyennganh,$diachi,$lop){
            $sql="INSERT INTO `giangvien`(`magiangvien`, `hovaten`, `gioitinh`, `diachi`, `email`, `dienthoai`, `cmnd`, `ngaysinh`, `chuyennganh`,  `password`,`ChuNhiem`) 
            VALUES ('$magiangvien','$hovaten','$gioitinh','$diachi','$email','$phone','$CMND','$ngaysinh','$chuyennganh','$magiangvien','$lop')";
            return $this->execute($sql);
        }

        public function capnhattt_gv($mgv,$tt){
            if($tt=='Đang dạy')
            {
                $sql="UPDATE `giangvien` SET `trangthai`=1 WHERE magiangvien='$mgv'";
            }
            else{
                $sql="UPDATE `giangvien` SET `trangthai`=0 WHERE magiangvien='$mgv'";
            }
            
            return $this->execute($sql);
        }
        public function getinfo_gvtt($tt){
            if($tt=="Tất cả"){
                $sql = "select * from giangvien where trangthai=1 and role_id = 2";
            }
            else{
                if($tt=="Đang dạy"){
                    $sql = "select * from giangvien where trangthai=1 and role_id = 2";
                }
                else{
                    $sql = "select * from giangvien where trangthai=0 and role_id = 2";
                }
            }
            return $this->execute($sql);
        }
        
        public function uptrangthai($msv,$tt){
            $sql="UPDATE `sinhvien` SET `trangthai_sv`='$tt' WHERE masinhvien='$msv'";
            
            return $this->execute($sql);
        }
        public function loctheotrangthai($tt){
            $sql="select * from `sinhvien` WHERE trangthai_sv='$tt'";
            
            return $this->execute($sql);
        }
        public function getmcn($tcn){
            $sql="select * from chuyennganh where tenchuyennganh='$tcn'";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function tkb_timkiemtheocn($key,$machuyennganh){
            $sql=" SELECT DISTINCT(monhoc.mamon), monhoc.tenmon, monhoc.sotinchi, monhoc.thu, monhoc.ca, giangvien.hovaten FROM monhoc INNER JOIN `giangvienmonhoc` as gv on monhoc.mamon=gv.mamon INNER JOIN giangvien on gv.magiangvien= giangvien.magiangvien where ( monhoc.tenmon like '%$key%' or monhoc.mamon like '%$key%' ) and monhoc.chuyennganh='$machuyennganh' ";
            
            return $this->execute($sql);
        }
        public function tkb_timkiem($key){
            $sql=" SELECT DISTINCT(monhoc.mamon), monhoc.tenmon, monhoc.sotinchi, monhoc.thu, monhoc.ca, giangvien.hovaten FROM monhoc INNER JOIN `giangvienmonhoc` as gv on monhoc.mamon=gv.mamon INNER JOIN giangvien on gv.magiangvien= giangvien.magiangvien where ( monhoc.tenmon like '%$key%' or monhoc.mamon like '%$key%' )  ";
            
            return $this->execute($sql);
        }
        public function themmon($mm,$tm,$stc,$ca,$thu,$cn){
            $gt=$stc*400000;
            $sql="INSERT INTO `monhoc`( `mamon`, `tenmon`, `sotinchi`, `chuyennganh`, `thu`, `ca`,`giatien`) 
            VALUES ('$mm','$tm','$stc','$cn','$thu','$ca','$gt')";

            return $this->execute($sql);
        }
        public function xoamon($mm){
            $sql="DELETE FROM `monhoc` WHERE mamon='$mm'";

            return $this->execute($sql);
        }
        public function xeplichthi_loccn($cn){
            $sql = "select * from monhoc where chuyennganh='$cn'";
            return $this->execute($sql);
        }
        public function capnhatlichthi($mm,$nt,$ct){
            $sql = "UPDATE `monhoc` SET `ngaythi`='$nt',`cathi`='$ct' WHERE mamon='$mm'";
            return $this->execute($sql);
        }
        public function timlichthi($key){
            $sql=" SELECT * FROM monhoc where monhoc.tenmon like '%$key%' or monhoc.mamon like '%$key%' ";
            return $this->execute($sql);
        }
        public function timlichthi_loccn($key,$machuyennganh){
            $sql=" SELECT * FROM monhoc where (monhoc.tenmon like '%$key%' or monhoc.mamon like '%$key%') and monhoc.chuyennganh='$machuyennganh' ";
            
            return $this->execute($sql);
        }

        public function selectchuyennganh($timkiem)
        {
            $sql = "select * from  `chuyennganh`  where  machuyennganh = '$timkiem' ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function selectlistchuyennganh()
        {
            $sql = "select * from  `chuyennganh`   ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function getsinhvien($ma)
        {
            $sql = "select * from sinhvien where `masinhvien`='$ma' ";
            
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function capnhatchuyennganh($machuyennganh,$tenchuyennganh)
        {
            $sql = "UPDATE `chuyennganh` SET `machuyennganh`='$machuyennganh',`tenchuyennganh`='$tenchuyennganh' WHERE machuyennganh = '$machuyennganh'";
            return $this->execute($sql);
        }
        public function capnhatmonhoc($mamon,$tenmon,$st,$cn,$thu,$ca)
        {
            $sql = "UPDATE `monhoc` SET `mamon`='$mamon',`tenmon`='$tenmon',`sotinchi`='$st',`chuyennganh`='$cn' ,`thu`='$thu',`ca`='$ca' WHERE mamon = '$mamon'";
            return $this->execute($sql);
        }

        public function selectlistmonhocdaotao()
        {
            $sql = "select * from  `monhoc`";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function updatestudentdaotao1($masinhvien,$hovaten,$gioitinh,$CMND,$ngaysinh,$phone,$email,$chuyennganh,$giaovien,$diachi,$lop){
            $sql="UPDATE `sinhvien` SET `masinhvien` = '$masinhvien', `hovaten` = '$hovaten', `gioitinh`= '$gioitinh',`diachi` ='$diachi', `email`='$email', `dienthoai`= '$phone', 
            `cmnd` ='$CMND', `ngaysinh` ='$ngaysinh', `GVCN` ='$giaovien', `chuyennganh`= '$chuyennganh' ,`lop`='$lop' WHERE masinhvien='$masinhvien'";
            
            return $this->execute($sql);
        }
        public function selectlistsinhviendaotao()
        {
            $sql = "select * from  `sinhvien`";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function timkiemchuyennganh($timkiem)
        {
            $sql = "select * from  `chuyennganh`  where  (machuyennganh like '%$timkiem%' or tenchuyennganh like '%$timkiem%') ";
           
            $this->execute($sql);
            if($this->dem()==0){
                $data=0;
            }
            else{
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }

        public function createchuyennganh($machuyennganh,$tenchuyennganh){
            $sql="INSERT INTO `chuyennganh`(`machuyennganh`, `tenchuyennganh`) VALUES ('$machuyennganh','$tenchuyennganh')";
           
            return $this->execute($sql);
        }

        public function getinfochuyennganh($machuyennganh)
        {
            $sql = "select * from chuyennganh where `machuyennganh`='$machuyennganh' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function checkchuyennganh($machuyennganh)
        {
            $sql = "select * from chuyennganh where `machuyennganh`='$machuyennganh' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function getinfomonhoc($mamonhoc)
        {
            $sql = "select * from monhoc where `mamon`='$mamonhoc' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }

        public function getinfogiangvien($tk){
            $sql = "select * from giangvien where `magiangvien`='$tk' ";
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
        public function getmonhoc_cn($cn){
            $sql = "select * from monhoc where chuyennganh='$cn'";
            return $this->execute($sql);
        }
        public function locloptheocn($cn){
            if($cn=="Tất cả")
            {
                $sql = "select * from lopcn";
            }else{
                $sql = "select * from lopcn where chuyennganh='$cn'";
            }
            
            return $this->execute($sql);
        }
        public function timkiemlop($cn){
            $sql = "select * from lopcn where malop like '%$cn%' or tenlop like '%$cn%' ";
            return $this->execute($sql);
        }
        public function themlop($ml,$tl,$cn){
            $sql = "INSERT INTO `lopcn`(`malop`, `tenlop`, `chuyennganh`) VALUES ('$ml','$tl','$cn')";
            return $this->execute($sql);
        }
        public function xoalop($info){
            $sql = "DELETE FROM `lopcn` WHERE malop='$info' ";
            return $this->execute($sql);
        }
        public function getinfolophoc($ml)
        {
            $sql = "select * from lopcn where `malop`='$ml' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }
        public function capnhatlop($ml,$tl,$cn){
            $sql = "UPDATE `lopcn` SET `tenlop`='$tl',`chuyennganh`='$cn' WHERE malop= '$ml'";
            return $this->execute($sql);
        }
    }

    