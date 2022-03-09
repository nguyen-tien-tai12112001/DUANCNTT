 <!-- Meta tag Keywords -->
 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
<div id="wrapper">
    <?php require_once("./view/admin/headeradminLeft.php"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php require_once("./view/admin/headeradminTop.php"); ?>
            <div class="container-fluid">



                <div class="modal-header">

                    <h4 class="modal-title">Sửa Giảng Viên</h4>
                    <a href="?controller=admin&action=danhsachsinhvien" type="button" class="close">&times;</a>
                </div>
                <form  method="POST">
                <table width="100%">
                        <tbody class="table">
                            <tr>
                                <td class="modal-td" width="30%">Mã GV:</td>
                                <td class="modal-td"><input type="text" id="magiangvien" name="magiangvien" class="form-control" value="<?= $gvid['magiangvien'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="modal-td" width="30%">Tên giáo viên:</td>
                                <td class="modal-td"><input type="text" id="hovaten" name="hovaten" value="<?= $gvid['hovaten'] ?>" class="form-control"></td>
                            </tr>

                            <tr>
                                <td class="modal-td" width="30%">Giới tính:</td>
                                <td class="modal-td">
                                <select class="form-control" id="gioitinh" name="gioitinh">
                                    <option value="Nam" <?php if ($gvid['gioitinh'] == 'Nam') {
                                                            echo ' selected';
                                                        } ?>>Nam</option>
                                    <option value="Nữ" <?php if ($gvid['gioitinh'] == 'Nữ') {
                                                            echo ' selected';
                                                        } ?>>Nữ</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="modal-td" width="30%">Số CMND/CCCD:</td>
                                <td class="modal-td"><input type="text" class="form-control" name="CMND"  value="<?= $gvid['cmnd'] ?>" id="CMND"></td>
                            </tr>
                            <tr>
                                <td class="modal-td" width="30%">Ngày sinh:</td>
                                <td class="modal-td">
                                    <input class="form-control" id="ngaysinh"  value="<?= date($gvid['ngaysinh']) ?>" name="ngaysinh" type="date" />
                                </td>
                            </tr>
                            <tr>
                                <td class="modal-td">Điện thoại:</td>
                                <td class="modal-td"><input type="text" id="phone"  value="<?= $gvid['dienthoai'] ?>" name="phone" class="form-control"></td>
                            </tr>
                            <tr>
                                <td class="modal-td">Email SV:</td>
                                <td class="modal-td"><input type="text" class="form-control" value=" <?= $gvid['magiangvien'] ?>@thanglong.edu.vn" name="email" id="email" readonly></td>
                            </tr>
                            <tr>
                                <td class="modal-td">Mật khẩu:</td>
                                <td class="modal-td"><input type="text" class="form-control" value=" <?= $gvid['password'] ?>" name="password" id="password"></td>
                            </tr>
                            <tr>
                                <td class="modal-td">Địa chỉ hộ khẩu:</td>
                                <td class="modal-td">
                                    <input type="text" class="form-control" value="<?= $gvid['diachi'] ?>"  name="diachi" id="diachi">

                                </td>
                            </tr>
                            <tr>
                                <td class="modal-td" width="30%">Chuyên ngành:</td>
                                <td class="modal-td">
                                <select class="form-control" id="chuyennganh" name="chuyennganh">
                                        <option value="">Chọn chuyên ngành</option>
                                        <?php foreach ($listChuyenNganh as $infoCN) {
                                            if ($gvid['chuyennganh'] == $infoCN['machuyennganh'])
                                                echo '<option value="' . $infoCN['machuyennganh'] . '" selected>' . $infoCN['tenchuyennganh'] . '</option>';
                                            else
                                                echo '<option value="' . $infoCN['machuyennganh'] . '">' . $infoCN['tenchuyennganh'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <a href="?controller=admin&action=danhsachgiangvien" type="button" class="btn btn-default">Close</a>
                        <input type="submit" class="btn btn-success" name="suagiangvien" value="oke">
                    </div>
                </form>

            </div>
        </div>
        <?php require_once("./view/admin/footeradmin.php"); ?>
    </div>
</div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    