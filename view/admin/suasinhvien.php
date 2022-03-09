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

                    <h4 class="modal-title">Sửa Sinh Viên</h4>
                    <a href="?controller=admin&action=danhsachsinhvien" type="button" class="close">&times;</a>
                </div>
                <form id="createStudent" method="POST">
                    <table width="100%">
                        <tbody class="table">
                            <tr>
                            <tr>
                                <td class="modal-td" width="30%">Mã Sinh Viên:</td>
                                <td class="modal-td">
                                    <input id="masinhvien" name="masinhvien" class="form-control" type="text" value="<?= $svid['masinhvien'] ?>" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td class="modal-td" width="30%">Họ và tên:</td>
                                <td class="modal-td">
                                    <input id="hovaten" name="hovaten" class="form-control" type="text" value="<?= $svid['hovaten'] ?>" />
                                </td>
                            </tr>
                            <td class="modal-td" width="30%">Giới tính:</td>
                            <td class="modal-td">
                                <select class="form-control" id="gioitinh" name="gioitinh">
                                    <option value="Nam" <?php if ($svid['gioitinh'] == 'Nam') {
                                                            echo ' selected';
                                                        } ?>>Nam</option>
                                    <option value="Nữ" <?php if ($svid['gioitinh'] == 'Nữ') {
                                                            echo ' selected';
                                                        } ?>>Nữ</option>
                                </select>
                            </td>
                            </tr>
                            <tr>
                                <td class="modal-td" width="30%">Số CMND/CCCD:</td>
                                <td class="modal-td"><input value="<?= $svid['cmnd'] ?>" type="text" class="form-control" name="CMND" id="CMND"></td>
                            </tr>
                            <tr>
                                <td class="modal-td" width="30%">Ngày sinh:</td>
                                <td class="modal-td">
                                    <input class="form-control" type="date" id="ngaysinh" name="ngaysinh" value="<?= date($svid['ngaysinh']) ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="modal-td">Điện thoại:</td>
                                <td class="modal-td"><input type="text" class="form-control" id="phone" value="<?= $svid['dienthoai'] ?>" name="phone"></td>
                            </tr>
                            <tr>
                                <td class="modal-td">Email SV:</td>
                                <td class="modal-td"><input type="text" class="form-control" value="<?= $svid['email'] ?>" name="email" id="email" readonly></td>
                            </tr>
                            <tr>
                                <td class="modal-td">Mật khẩu:</td>
                                <td class="modal-td"><input type="text" class="form-control" value=" <?= $svid['password'] ?>" name="password" id="password"></td>
                            </tr>
                            <tr>
                                <td class="modal-td">Lớp:</td>
                                <td class="modal-td">
                                    <select class="form-control" id="lop" name="lop">
                                        <option value="">Chọn lớp</option>
                                        <?php foreach ($listLopCN as $infoCN) {
                                            if ($svid['lop'] == $infoCN['malop'])
                                                echo '<option value="' . $infoCN['malop'] . '" selected>' . $infoCN['tenlop'] . '</option>';
                                            else
                                                echo '<option value="' . $infoCN['malop'] . '">' . $infoCN['tenlop'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="modal-td">Chuyên Ngành:</td>
                                <td class="modal-td">
                                    <select class="form-control" id="chuyennganh" name="chuyennganh">
                                        <option value="">Chọn chuyên ngành</option>
                                        <?php foreach ($listCN as $infoCN) {
                                            if ($svid['chuyennganh'] == $infoCN['machuyennganh'])
                                                echo '<option value="' . $infoCN['machuyennganh'] . '" selected>' . $infoCN['tenchuyennganh'] . '</option>';
                                            else
                                                echo '<option value="' . $infoCN['machuyennganh'] . '">' . $infoCN['tenchuyennganh'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="modal-td">Giáo viên CN:</td>
                                <td class="modal-td">
                                    <select class="form-control" id="giaovien" name="giaovien">
                                    <option value="">Chọn giáo viên</option>

                                    <?php foreach ($listGVCN as $infoCN) {
                                            if ($svid['GVCN'] == $infoCN['magiangvien'])
                                                echo '<option value="' . $infoCN['magiangvien'] . '" selected>' . $infoCN['hovaten'] . '</option>';
                                        }
                                        ?>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="modal-td">Địa chỉ hộ khẩu:</td>
                                <td class="modal-td">
                                    <input type="text" value="<?= $svid['diachi'] ?>" class="form-control" name="diachi" id="diachi">

                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <a href="?controller=admin&action=danhsachsinhvien" type="button" class="btn btn-default">Close</a>
                        <input type="submit" class="btn btn-success" name="suastudent" value="oke">
                    </div>
                </form>

            </div>
        </div>
        <?php require_once("./view/admin/footeradmin.php"); ?>
    </div>
</div>
<script>
              $(document).ready(function() {
                $('#chuyennganh').on('change', function() {
                  var machuyennganh = $(this).val();
                  const url = $(this).attr("action");
                  if (machuyennganh) {
                    $.ajax({
                      type: 'POST',
                      url,
                      data: 'machuyennganh=' + machuyennganh,
                      success: function(html) {
                        $('#giaovien').html(html);
                      }
                    });
                  } else {
                    $('#giaovien').html('<option value="">Chọn giáo viên </option>');

                  }
                });


              });
            </script>
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
    