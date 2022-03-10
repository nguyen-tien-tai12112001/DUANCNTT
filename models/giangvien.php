<?php
    class giangvien{

        private $conn ;
        private $result = null;
        
        public function __construct($conn) {
            $this->conn = $conn;
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
        public function tongtin($msv){
            $sql = "select SUM(sotinchi) as tongtin from `sinhvien-diemmon` inner join `monhoc` on `sinhvien-diemmon`.mamon=`monhoc`.mamon WHERE masinhvien='$msv' and `sinhvien-diemmon`.diemcuoiky!='' ";
            $this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
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

        public function getinfogiangvien($tk){
            $sql = "select * from giangvien where `magiangvien`='$tk' and trangthai = 1";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
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
        public function mkcheckgiangvien($tk,$pass){
            $sql = "select * from `giangvien` where `magiangvien`='$tk' and `password`='$pass' and `trangthai` = 1";
            $data=$this->execute($sql);
            return $data;
        }
        public function listTeacherLogin(){
            $sql = "select * from `giangvien` where `trangthai` = 1";
            $data=$this->execute($sql);
            return $data;
        }
        public function updategiangvien($mgv,$img,$gioitinh,$cmnd,$dienthoai,$email,$diachi){
            $sql="UPDATE giangvien SET `image`='$img', gioitinh='$gioitinh', cmnd='$cmnd', dienthoai='$dienthoai', email='$email', diachi='$diachi' WHERE magiangvien='$mgv'";
            return $this->execute($sql);
        }  

       
        public function updatemkgiangvien($mgv,$mk){
            $sql="UPDATE giangvien SET password='$mk' WHERE magiangvien='$mgv'";
          
            return $this->execute($sql);
        }
        public function getinfo_mon($mgv){
            $sql = "select DISTINCT tenmon from `gv-sv-lop` inner join monhoc on `gv-sv-lop`.mamon=monhoc.mamon where `magiangvien`='$mgv' ";
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
        public function getinfo_svl($mgv){
            $sql = "select DISTINCT * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 ORDER BY diemtongket ASC ";
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
        public function getinfo_svl_tt($mgv,$mm,$tt){
            if($tt=="Tất cả" && $mm=="Tất cả")
            {
                $sql = "select DISTINCT * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' ";
            }
            if($tt=="Tất cả" && $mm!="Tất cả")
            {
                $sql = "select DISTINCT * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mm'";
            }
            if($tt!="Tất cả" && $mm=="Tất cả")
            {
                if($tt=="Đang Học"){
                    $sql = "select DISTINCT * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.trangthai=1 ";
                }
                else{
                    $sql = "select DISTINCT * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.trangthai=0  ";
                }
            }
            if($tt!="Tất cả" && $mm!="Tất cả")
            {
                if($tt=="Đang Học"){
                    $sql = "select DISTINCT * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.trangthai=1 and gv.mamon='$mm'";
                }
                else{
                    $sql = "select DISTINCT * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.trangthai=0 and gv.mamon='$mm' ";
                }
            }

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
        public function getinfo_svmon($mgv,$mamon){
            $sql = "select DISTINCT * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien 
            INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon 
            where gv.`magiangvien`='$mgv' 
            AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 and gv.mamon='$mamon' ";
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
        public function getinfo_svmon_tt($mgv,$mamon,$tt){
            if($tt=="Tất cả")
            {
                $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien 
            INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv'
            and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien`";
            }
            else{
                if($tt=="Đang Học"){
                    $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien 
                    INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv'
                    and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1";
                }
                else{
                    $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien 
                    INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv'
                    and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=0";
                }
            }
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
        public function getinfo_mamon($tm){
            $sql = "select * from monhoc where `tenmon`='$tm' ";
            $data=$this->execute($sql);
            if($this->dem()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = [];
            }
            return $data;
        }

        public function getinfo_thapcao($mgv,$mamon){
            if($mamon=="Tất cả")
            {
                $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 ORDER BY diemtongket ASC";
            }
            else{
                $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 ORDER BY diemtongket ASC";
            }
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
        
        public function getinfo_caothap($mgv,$mamon){
            if($mamon=="Tất cả")
            {
                $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 ORDER BY diemtongket DESC";
            }
            else{
                $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 ORDER BY diemtongket DESC";
            }
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
        public function getinfo_tkcaothap($mgv,$mamon,$info){
            $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 and (gv.masinhvien LIKE '%$info%' or sv.hovaten LIKE '%$info%') ORDER BY diemtongket DESC";
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

        public function getinfo_tkthapcao($mgv,$mamon,$info){
            $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 and (gv.masinhvien LIKE '%$info%' or sv.hovaten LIKE '%$info%')";
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

        public function updiem($mm,$msv,$dqt,$dck,$dtk){
            $sql="UPDATE `sinhvien-diemmon` SET `diemquatrinh`='$dqt',`diemcuoiky`='$dck',`diemtongket`='$dtk' WHERE `masinhvien`='$msv'and `mamon`='$mm'";
            return $this->execute($sql);
        }
        public function updiemqt($mm,$msv,$dqt){
            $sql="UPDATE `sinhvien-diemmon` SET `diemquatrinh`='$dqt' WHERE `masinhvien`='$msv'and `mamon`='$mm'";
            return $this->execute($sql);
        }
        public function capnhattt($msv,$mm,$tt){
            if($tt=='Đang học')
            {
                $sql="UPDATE `gv-sv-lop` SET `trangthai`=1 WHERE masinhvien='$msv'and mamon='$mm'";
            }
            else{
                $sql="UPDATE `gv-sv-lop` SET `trangthai`=0 WHERE masinhvien='$msv'and mamon='$mm'";
            }

            return $this->execute($sql);
        } 
        // public function getinfo_all($mgv,$mamon,$info){
        //     if($info=="Tất cả" && $mamon=="Tất cả")
        //     {
        //         $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien`";
        //     }
        //     else{
        //         if($mamon=="Tất cả"){
        //             if($info=="Đang Học"){
        //                 $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 ";
        //             }
        //             else{
        //                 $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=0 ";
        //             }
        //         }
        //         else{
        //             if($info=="Đang Học"){
        //                 $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 ";
        //             }
        //             else{
        //                 $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=0 ";
        //             }
        //         }
        //     }
        //     $this->execute($sql);
        //     if($this->dem()==0){
        //         $data=0;
        //     }
        //     else{
        //         while($datas = $this->getData()) {
        //             $data[] = $datas;
        //         }
        //     }
        //     return $data;
        // }
        public function getinfo_tk($mgv,$mamon,$info,$info_tt){
            if($info_tt=="Tất cả" && $mamon=="Tất cả")
            {
                $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` and (gv.masinhvien LIKE '%$info%' or sv.hovaten LIKE '%$info%')";
            }
            else{
                if($mamon=="Tất cả"){
                    if($info_tt=="Đang Học"){
                        $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 and (gv.masinhvien LIKE '%$info%' or sv.hovaten LIKE '%$info%')";
                    }
                    else{
                        $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=0 and (gv.masinhvien LIKE '%$info%' or sv.hovaten LIKE '%$info%')";
                    }
                }
                else{
                    if($info_tt=="Đang Học"){
                        $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=1 and (gv.masinhvien LIKE '%$info%' or sv.hovaten LIKE '%$info%')";
                    }
                    else{
                        $sql = "select * from  `gv-sv-lop` as gv INNER join sinhvien sv on gv.masinhvien = sv.masinhvien INNER join `sinhvien-diemmon` on `sinhvien-diemmon`.`mamon` = gv.mamon INNER JOIN monhoc on gv.mamon=monhoc.mamon where gv.`magiangvien`='$mgv' and gv.mamon='$mamon' AND gv.masinhvien=`sinhvien-diemmon`.`masinhvien` AND gv.trangthai=0 and (gv.masinhvien LIKE '%$info%' or sv.hovaten LIKE '%$info%')";
                    }
                }
            }
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
    }