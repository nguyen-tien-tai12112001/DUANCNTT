<?php require_once('./view/layouts/headerDaoTao.php'); ?>
<style>
  a {
    text-decoration: none;
  }

  .chuyen-nganh {
    display: flex;
    gap: 5px;
    font-size: 16px;
    align-items: baseline;

  }

  .chuyen-nganh select {

    font-size: 16px;
    border-radius: 5px;
  }

  .chuyen-nganh p {
    width: 200px;
    font-size: 16px;
  }


  .trang-thai {
    display: flex;
    gap: 5px;
    font-size: 16px;
    align-items: baseline;

    margin-bottom: 2rem;
  }

  .trang-thai select {
    font-size: 16px;

    border-radius: 5px;
  }

  .trang-thai p {
    width: 140px;
    font-size: 16px;


  }

  .tim-kiem {
    display: flex;
    /* gap:10px; */
  }

  .tim-kiem input {
    padding: 5px 8px;
    font-size: 15px;


  }

  .form {
    display: flex;
    gap: 10px;
    justify-content: space-between;
    margin-bottom: 2rem;
  }

  .btnTimKiem {
    z-index: 1;
    position: relative;
    font-size: inherit;
    font-family: inherit;
    color: white;
    padding: 0.5em 1em;
    outline: none;
    border: none;
    background-color: hsl(236, 32%, 26%);
    overflow: hidden;
    transition: color 0.4s ease-in-out;
  }

  .btnTimKiem::before {
    content: '';
    z-index: -1;
    position: absolute;
    top: 100%;
    right: 100%;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    background-color: #05c20f;
    transform-origin: center;
    transform: translate3d(50%, -50%, 0) scale3d(0, 0, 0);
    transition: transform 0.45s ease-in-out;
  }

  .btnTimKiem:hover {
    cursor: pointer;
    color: #161616;
  }

  .btnTimKiem:hover::before {
    transform: translate3d(50%, -50%, 0) scale3d(15, 15, 15);
  }

  .text-center {
    text-align: center;
  }

  .modal-td {
    padding: 8px;
  }
</style>


<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px;">
  <div class="title">
    Quản lý giáo viên

  </div>
  <button type="button" data-toggle="modal" data-target="#myModal" class="btnUpdate btn " style="margin-bottom: 10px">Thêm Giáo Viên &nbsp;<span class="glyphicon glyphicon-plus"></span></button>
  <div class="form">
    <div class="chuyen-nganh">
      <p>Chọn chuyên ngành:</p>
      <select class="form-control" id="chuyennganh1">
        <option class="a" id="Tất cả">Tất cả</option>
        <?php

        foreach ($listChuyenNganh as $CN) {
          echo '<option value="' . $CN['machuyennganh'] . '">' . $CN['tenchuyennganh'] . '</option>';
        }
        ?>

      </select>
      <script>
        $(function() {
          $('#chuyennganh1').trigger('change'); //This event will fire the change event. 
          $('#chuyennganh1').change(function() {
            var data = $(this).val();

            $.get("./index.php", {
              controller: "daotao",
              action: "banggiangvien",
              info: data
            }, function(data) {
              $("#bangdiem1").html(data);
            })
          });
        });
      </script>
    </div>

    <div class="tim-kiem">
      <input autocomplete="off" type="text" id="timkiem" name="timkiem" placeholder="Nhập mã giáo viên,tên giáo viên">
      <button class="btnTimKiem">Tìm kiếm</button>
    </div>
    <script>
      $(function() {
        $('#timkiem').trigger('change'); //This event will fire the change event. 
        $('#timkiem').change(function() {
          var data = $(this).val();
          $.get("./index.php", {
            controller: "daotao",
            action: "timkiemgiangvien",
            info: data
          }, function(data) {
            $("#bangdiem1").html(data);
          })
        });
      });
    </script>
  </div>
  <script>
    $(function() {
      $('#chontrangthai').trigger('change'); //This event will fire the change event. 
      $('#chontrangthai').change(function() {
        var data = $(this).val();
        $.get("./index.php", {
          controller: "daotao",
          action: "sxtheotrangthai",
          info1: data
        }, function(data) {
          $("#bangdiem1").html(data);
        })
      });
    });
  </script>
  <div class="trang-thai">
    <p>Chọn trạng thái:</p>
    <select class="form-control" style="width:20%;" id="chontrangthai">
      <option>Tất cả</option>
      <option>Đang dạy</option>
      <option>Đã nghỉ</option>
    </select>
  </div>

  <table cellspacing="3" cellpadding="0" width="100%">
    <tbody>
      <tr valign="top">
        <td style="width: 100%">
          <div id="bangdiem1">
            <table class="grid" cellspacing="0" id="ctl00_c_GridDC" style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                        ">
              <tbody>
                <tr class="text-center">
                  <th class="text-center">STT</th>
                  <th class="text-center">Mã Giáo Viên</th>
                  <th class="text-center">Tên Giáo Viên</th>
                  <th class="text-center">Trạng thái</th>

                  <th class="text-center">Hành động</th>

                </tr>
                <tr>
                  <?php $stt = 0;
                  foreach ($listGiangVien as $info) {
                    $stt++; ?>
                    <td class="text-center"><?= $stt ?></td>
                    <td class="text-center"><?= $info['magiangvien'] ?></td>

                    <td class="text-center"><?= $info['hovaten'] ?></td>
                    <td class="text-center">
                      <script>
                        $(function() {
                          $('#sapxep<?= $stt ?>').trigger('change'); //This event will fire the change event. 
                          $('#sapxep<?= $stt ?>').change(function() {
                            var data = "<?= $info['magiangvien'] ?>";
                            var data2 = $(this).val();
                            var thongbao = "Cập nhật thành công";
                            alert(thongbao);
                            $.get("./index.php", {
                              controller: "daotao",
                              action: "capnhattheotrangthai1",
                              magiangvien: data,
                              trangthai: data2
                            }, function(data) {})
                          });
                        });
                      </script>
                      <select class="form-control" id="sapxep<?= $stt ?>">
                        <?php if ($info['trangthai'] == 1) { ?>
                          <option>Đang dạy</option>
                          <option>Đã nghỉ</option>
                        <?php } else { ?>
                          <option>Đã nghỉ</option>
                          <option>Đang dạy</option>
                        <?php } ?>
                      </select>
                    </td>
                    <td class="text-center">

                      <Button class="btn xemchitiet" id="<?= $info['magiangvien'] ?>" type="btnTimKiem" data-toggle="modal" data-target="#myModal1">Xem Chi Tiêt</Button>
                      &nbsp;
                    </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
    </tbody>
    <script>
      $(document).ready(function() {
        $(".xemchitiet").click(function() {
          var magiangvien = $(this).attr("id")

          $.get("./index.php", {
            controller: "daotao",
            action: "giangvien",
            mgv: magiangvien
          }, function(data) {
            $("#myModal1").html(data);
          })
        });
      });
    </script>
  </table>

</div>
</div>

<!-- End Right -->
</div>
<!-- End Page -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Giáo Viên</h4>
      </div>
      <div class="modal-body">

        <table width="100%">
          <tbody class="table">
            <tr>
              <td class="modal-td" width="30%">Mã GV:</td>
              <td class="modal-td"><input autocomplete="off" type="text" id="magiangvien" name="magiangvien" class="form-control" value="GV<?= $getmgv + 1 ?>" readonly></td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Tên giáo viên:</td>
              <td class="modal-td"><input autocomplete="off" type="text" id="hovaten" name="hovaten" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td class="modal-td" width="30%">Giới tính:</td>
              <td class="modal-td">
                <select class="form-control" id="gioitinh" name="gioitinh">
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Số CMND/CCCD:</td>
              <td class="modal-td"><input autocomplete="off" type="text" class="form-control" name="CMND" id="CMND"></td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Ngày sinh:</td>
              <td class="modal-td">
                <input autocomplete="off" class="form-control" id="ngaysinh" name="ngaysinh" type="date" />
              </td>
            </tr>
            <tr>
              <td class="modal-td">Điện thoại:</td>
              <td class="modal-td"><input autocomplete="off" type="text" id="phone" name="phone" class="form-control"></td>
            </tr>
            <tr>
              <td class="modal-td">Email SV:</td>
              <td class="modal-td"><input type="text" class="form-control" value="GV<?= $getmgv + 1 ?>@thanglong.edu.vn" name="email" id="email" readonly></td>
            </tr>
            <tr>
              <td class="modal-td">Địa chỉ hộ khẩu:</td>
              <td class="modal-td">
                <input type="text" class="form-control" autocomplete="off" name="diachi" id="diachi">

              </td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Chuyên ngành:</td>
              <td class="modal-td">
                <select class="form-control" id="chuyennganhgiaovien" name="chuyennganhgiaovien">
                  <option value="">Chọn chuyên ngành</option>
                  <?php foreach ($listChuyenNganh as $infoCN) {
                    echo '<option value="' . $infoCN['machuyennganh'] . '">' . $infoCN['tenchuyennganh'] . '</option>';
                  }
                  ?>
                </select>
              </td>
            </tr>

            <tr>
              <td class="modal-td" width="30%">Lớp chủ nhiệm:</td>
              <td class="modal-td">
                <select class="form-control" id="lop" name="lop">
                  <option value="">Chọn lớp</option>

                </select>
              </td>
            </tr>

            <script>
              $(document).ready(function() {
                $('#chuyennganhgiaovien').on('change', function() {
                  var machuyennganh = $(this).val();
                  const url = $(this).attr("action");

                  if (machuyennganh) {
                    $.ajax({
                      type: 'POST',
                      url,
                      data: 'machuyennganh=' + machuyennganh,
                      success: function(html) {
                        $('#lop').html(html);
                      }
                    });
                  } else {
                    $('#lop').html('<option value="">Chọn lớp </option>');

                  }
                });


              });
            </script>
          </tbody>
        </table>
      </div>
      <div id="bangdiem2"></div>
      <div id="alert"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" id="create1" class="btn btn-success">Xác nhận</button>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $("#create1").click(function() {
          var magiangvien = $('#magiangvien').val();
          var hovaten = $('#hovaten').val();
          var gioitinh = $('#gioitinh').val();
          var CMND = $('#CMND').val();
          var ngaysinh = $('#ngaysinh').val();
          var phone = $('#phone').val();
          var email = $('#email').val();
          var chuyennganh = $('#chuyennganhgiaovien').val();

          var diachi = $('#diachi').val();
          var lop = $('#lop').val();
          if (hovaten == null || hovaten == "") {
            $("#alert").html('<strong class="text-danger">Họ và tên không được để trống</strong>');
            $("input[name='hovaten']").focus();
            return;
          } else if (hovaten.length < 6) {
            $("#alert").html('<strong class="text-danger">Tối thiểu là 6 kí tự</strong>');
            $("input[name='hovaten']").focus();
            return;
          } else if (CMND == null || CMND == "") {
            $("#alert").html('<strong class="text-danger">CMND không được để trống</strong>');
            $("input[name='CMND']").focus();
            return;
          } else if (CMND.length < 12 || CMND.length > 12) {
            $("#alert").html('<strong class="text-danger">CMND bao gồm 12 kí tự</strong>');
            $("input[name='CMND']").focus();
            return;
          } else if (isNaN(CMND)) {
            $("#alert").html('<strong class="text-danger">CMND phải là số</strong>');
            $("input[name='CMND']").focus();
            return;
          } else if (ngaysinh == null || ngaysinh == "") {
            $("#alert").html('<strong class="text-danger">Ngày sinh không được để trống</strong>');
            $("input[name='ngaysinh']").focus();
            return;
          } else if (ngaysinh == null || ngaysinh == "") {
            $("#alert").html('<strong class="text-danger">CMND không được để trống</strong>');
            $("input[name='ngaysinh']").focus();
            return;
          } else if (phone == null || phone == "") {
            $("#alert").html('<strong class="text-danger">Số điện thoại không được để trống</strong>');
            $("input[name='phone']").focus();
            return;

          } else if (phone.length != 10) {
            $("#alert").html('<strong class="text-danger">Độ dài của số điện thoại là 10 ký tự</strong>');
            $("input[name='phone']").focus();
            return;
          } else if (isNaN(phone)) {
            $("#alert").html('<strong class="text-danger">Số điện thoại phải là số</strong>');
            $("input[name='phone']").focus();
            return;
          } else if (diachi == null || diachi == "") {
            $("#alert").html('<strong class="text-danger">Địa chỉ không được để trống</strong>');
            $("select[name='diachi']").focus();
            return;
          } else if (chuyennganh == null || chuyennganh == "") {
            $("#alert").html('<strong class="text-danger">Chuyên ngành không được để trống</strong>');
            $("select[name='chuyennganh']").focus();
            return;
          } else {
            $('#myModal').modal('hide');
            $.get("./index.php", {
              controller: "daotao",
              action: "creategiangvien",
              magiangvien: magiangvien,
              hovaten: hovaten,
              gioitinh: gioitinh,
              CMND: CMND,
              ngaysinh: ngaysinh,
              phone: phone,
              email: email,
              chuyennganh: chuyennganh,
              diachi: diachi,
              lop: lop
            }, function(data) {
              $("#bangdiem2").html(data);
              location.reload();
            })
          }

        });
      });
    </script>
  </div>
</div>







<div class="modal fade" id="myModal1" role="dialog">

</div>

</body>

</html>