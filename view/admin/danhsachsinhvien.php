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

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách sinh viên</h1>

        <div class="card shadow mb-4">

          <div class="card-body">
            <div class="table-responsive">
              <a href="?controller=admin&action=themsinhvien" type="button" data-target="#myModal" class="btn-success btn" style="margin-bottom: 10px">Thêm Sinh Viên &nbsp;<span class="glyphicon glyphicon-plus"></span></a>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã SV</th>
                    <th>Họ và Tên</th>
                    <th>Giới tính</th>
                    <th>Điện thoại</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>Sửa / Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $stt = 0;
                  if ($listStudent != '') {
                    foreach ($listStudent as $info) {
                      $stt++; ?>
                      <tr>
                        <td><?= $stt ?></td>
                        <td class="item-monhoc"><?= $info['masinhvien'] ?></td>
                        <td class="item-monhoc"><?= $info['hovaten'] ?></td>

                        <td class="item-monhoc"><?= $info['gioitinh'] ?></td>
                        <td class="item-monhoc"><?= $info['dienthoai'] ?></td>
                        <td class="item-monhoc"><?= $info['ngaysinh'] ?></td>
                        <td class="item-monhoc"><?= $info['lop'] ?></td>
                        <td class="item-monhoc">
                          <a class="btn btn-warning" href="?controller=admin&action=suasinhvien&id=<?= $info['id'] ?>">Sửa</a>
                          &nbsp;
                          <a class="btn btn-danger" href="?controller=admin&action=xoasinhvien&id=<?= $info['id'] ?>">Xóa</a>
                        </td>
                      </tr><?php } ?>


                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>