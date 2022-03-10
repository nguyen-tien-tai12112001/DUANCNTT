<?php require_once('./view/layouts/headerDaoTao.php'); ?>
<style>
  td {
    text-align: center;
  }

  th {
    text-align: center;
  }

  .modal-td {
    padding: 10px;
  }



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
    border-radius: 5px;
  }

  .tim-kiem {
    font-size: 14px;
    height: 41px;
    display: flex;
  }

  .tim-kiem input {
    padding: 5px 9px;
    margin-right: -5px;
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

  .item-monhoc {
    text-align: center;
  }

  .scroll {
    height: 80%;
    overflow: scroll;
  }
</style>




<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px">
  <div class="title">
    Quản lý sinh viên

  </div>
  <div>
    <button type="button" data-toggle="modal" data-target="#myModal" class="btnUpdate btn" style="margin-bottom: 10px">Thêm Sinh Viên &nbsp;<span class="glyphicon glyphicon-plus"></span></button>
  </div>
  <div class="form">
    <script>
      $(function() {
        $('#chuyennganh1').trigger('change'); //This event will fire the change event. 
        $('#chuyennganh1').change(function() {
          var data = $(this).val();

          $.get("./index.php", {
            controller: "daotao",
            action: "select",
            info: data
          }, function(data) {
            $("#bangdiem1").html(data);
          })
        });
      });
    </script>
    <div style="display: flex; flex-direction: column;">
      <div style="display: flex;" class="chuyen-nganh">
        <p style="width:250px">Chọn chuyên ngành:</p>
        <select style="padding: 6px 22px;" class="form-control" id="chuyennganh1">
          <option class="a" id="Tất cả">Tất cả</option>
          <?php

          foreach ($listCN as $CN) {
            echo '<option  value="' . $CN['machuyennganh'] . '">' . $CN['tenchuyennganh'] . '</option>';
          }
          ?>
        </select>

      </div>
      <div style="display: flex;" class="trangthai">
        <p style="width:250px">Chọn Trạng Thái:</p>
        <select class="form-control" id="trangthai">
          <option>Tất cả</option>
          <option>Đang học</option>
          <option>Đã tốt nghiệp</option>
          <option>Đang bảo lưu</option>
          <option>Đã thôi học</option>
        </select>
        <script>
          $(function() {
            $('#trangthai').trigger('change'); //This event will fire the change event. 
            $('#trangthai').change(function() {
              var data = $(this).val();
              $.get("./index.php", {
                controller: "daotao",
                action: "loctheotrangthai",
                info: data
              }, function(data) {
                $("#bangdiem1").html(data);
              })
            });
          });
        </script>
      </div>
    </div>

    <div class="tim-kiem">
      <input type="text" id="timkiem" name="timkiem" placeholder="Nhập mã sinh viên">
      <button class="btnTimKiem">Tìm kiếm</button>
    </div>
    <script>
      $(function() {
        $('#timkiem').trigger('change'); //This event will fire the change event. 
        $('#timkiem').change(function() {
          var data = $(this).val();
          $.get("./index.php", {
            controller: "daotao",
            action: "timkiem",
            info: data
          }, function(data) {
            $("#bangdiem1").html(data);
          })
        });
      });
    </script>
  </div>
  <div id="info">
    <table cellspacing="3" cellpadding="0" border="0px" width="100%">
      <tbody>
        <tr valign="top">
          <td style="width: 100%">
            <div id="bangdiem1">
              <table class="grid" cellspacing="0" border="0" id="ctl00_c_GridDC" style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                        ">
                <tbody>

                  <tr>
                    <th scope="col" style="
                      
                      font-size: 15px;
                      
                    ">STT</th>
                    <th style="
                      
                      font-size: 15px;
                      
                    " scope="col">Mã SV</th>
                    <th style="
                      
                      font-size: 15px;
                      
                    " scope="col">Tên Sinh Viên</th>
                    <th style="
                      
                      font-size: 15px;
                      
                    
                      
                    " scope="col">Trạng thái</th>
                    <th style="
                      
                      font-size: 15px;
                      
                    " scope="col"></th>

                  </tr>
                  <?php $stt = 0;
                  foreach ($listStudent as $info) {
                    $stt++; ?>
                    <tr>
                      <td><?= $stt ?></td>
                      <td class="item-monhoc"><?= $info['masinhvien'] ?></td>
                      <td class="item-monhoc"><?= $info['hovaten'] ?></td>

                      <td class="item-monhoc">
                        <script>
                          $(function() {
                            $('#sapxep<?= $stt ?>').trigger('change'); //This event will fire the change event. 
                            $('#sapxep<?= $stt ?>').change(function() {
                              var data = "<?= $info['masinhvien'] ?>";
                              var data2 = $(this).val();
                              var thongbao = "Cập nhật thành công";
                              alert(thongbao);
                              $.get("./index.php", {
                                controller: "daotao",
                                action: "uptrangththai",
                                masinhvien: data,
                                trangthai: data2
                              }, function(data) {

                              })
                            });
                          });
                        </script>
                        <select class="form-control" id="sapxep<?= $stt ?>">
                          <option><?= $info['trangthai_sv'] ?></option>
                          <option>Đang học</option>
                          <option>Đã tốt nghiệp</option>
                          <option>Đang bảo lưu</option>
                          <option>Đã thôi học</option>
                        </select>
                      </td>


                      <td class="item-monhoc">
                        <Button class="chitiet btnTimKiem" id="<?= $info['masinhvien'] ?>" style="margin-left: 5px;" type="button" data-toggle="modal" data-target="#myModal1">
                          <span">Chi Tiêt</span>
                        </Button>
                        &nbsp;
                        <Button id="<?= $info['masinhvien'] ?>" class="btnTimKiem" type="button" data-toggle="modal" data-target="#myModal2">Đánh Giá</Button>
                        <Button class="btnTimKiem capnhapsinhvien" id="<?= $info['masinhvien'] ?>" type="button" data-toggle="modal" data-target="#suasinhvien">Cập Nhật</Button>
                      </td>
                    </tr>
                  <?php } ?>
                  <script>
                    $(document).ready(function() {
                      $(".capnhapsinhvien").click(function() {
                        var masinhvien = $(this).attr("id")
                        $.get("./index.php", {
                          controller: "daotao",
                          action: "updatestudentdaotao",
                          masinhvien: masinhvien
                        }, function(data) {
                          $("#suasinhvien").html(data);
                        })
                      });
                    });
                  </script>
                  <script>
                    $(document).ready(function() {
                      $("button.chitiet").click(function() {
                        var masinhvien = $(this).attr("id")
                        $.get("./index.php", {
                          controller: "giangvien",
                          action: "QLHocSinhTheoMonHoc",
                          msv: masinhvien
                        }, function(data) {
                          $("#myModal1").html(data);
                        })
                      });
                    });
                  </script>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>

<!-- End Right -->
</div>



<div class="modal fade" id="suasinhvien" role="dialog">

</div>
<!-- End Page -->
<!-- Modal -->
<div class="modal fade " id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Sinh Viên</h4>
      </div>

      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <table width="100%">
          <tbody class="table">
            <tr>
            <tr>
              <td class="modal-td" width="30%">Mã Sinh Viên:</td>
              <td class="modal-td">
                <input id="masinhvien" name="masinhvien" class="form-control" type="text" value="A<?= $getmasv + 1 ?>" readonly />
              </td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Họ và tên:</td>
              <td class="modal-td">
                <input id="hovaten" name="hovaten" class="form-control" type="text" />
              </td>
            </tr>
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
              <td class="modal-td"><input type="text" class="form-control" name="CMND" id="CMND"></td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Ngày sinh:</td>
              <td class="modal-td">
                <input class="form-control" type="date" id="ngaysinh" name="ngaysinh" />
              </td>
            </tr>
            <tr>
              <td class="modal-td">Điện thoại:</td>
              <td class="modal-td"><input type="text" class="form-control" id="phone" name="phone"></td>
            </tr>
            <tr>
              <td class="modal-td">Email SV:</td>
              <td class="modal-td"><input type="text" class="form-control" value="A<?= $getmasv + 1 ?>@thanglong.edu.vn" name="email" id="email" readonly></td>
            </tr>

            <tr>
              <td class="modal-td">Địa chỉ hộ khẩu:</td>
              <td class="modal-td">
                <input type="text" class="form-control" name="diachi" id="diachi">

              </td>
            </tr>
            <tr>
              <td class="modal-td">Chuyên Ngành:</td>
              <td class="modal-td">
                <select class="form-control" id="chuyennganh" name="chuyennganh">
                  <option value="">Chọn chuyên ngành</option>
                  <?php foreach ($listCN as $infoCN) {
                    echo '<option value="' . $infoCN['machuyennganh'] . '">' . $infoCN['tenchuyennganh'] . '</option>';
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="modal-td">Lớp:</td>
              <td class="modal-td">
                <select class="form-control" id="lop" name="lop">
                  <option value="">Chọn lớp</option>


                </select>
              </td>
            </tr>
            <tr>
              <td class="modal-td">Giáo viên CN:</td>
              <td class="modal-td">
                <select class="form-control" id="giaovien" name="giaovien">
                  <option value="">Chọn giáo viên</option>


                </select>
              </td>
            </tr>

            <script>
              $(document).ready(function() {
                $('#chuyennganh').on('change', function() {
                  var machuyennganh = $(this).val();
                  const url = "index.php?controller=daotao&action=GVcn";
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
                $('#chuyennganh').on('change', function() {
                  var machuyennganh = $(this).val();
                  const url = "index.php?controller=daotao&action=lopcn";
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
                    $('#giaovien').html('<option value="">Chọn lớp </option>');

                  }
                });
              });
            </script>


          </tbody>
        </table>

      </div>
      <div id="bangdiem1"></div>
      <div id="alert"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="create" class="btn btn-success">OK</button>

      </div>
    </div>
    <script>
      $(document).ready(function() {
        $("#create").click(function() {
          var masinhvien = $('#masinhvien').val();
          var hovaten = $('#hovaten').val();
          var gioitinh = $('#gioitinh').val();
          var CMND = $('#CMND').val();
          var ngaysinh = $('#ngaysinh').val();
          var phone = $('#phone').val();
          var email = $('#email').val();
          var diachi = $('#diachi').val();
          var lop = $('#lop').val();
          var chuyennganh = $('#chuyennganh').val();
          var giaovien = $('#giaovien').val();
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
          } else if (lop == null || lop == "") {
            $("#alert").html('<strong class="text-danger">Lớp không được để trống</strong>');
            $("select[name='lop']").focus();
            return;
          } else if (giaovien == null || giaovien == "") {
            $("#alert").html('<strong class="text-danger">Giáo viên không được để trống</strong>');
            $("select[name='giaovien']").focus();
            return;
          } else {
            $('#myModal').modal('hide');
            $.get("./index.php", {
              controller: "daotao",
              action: "createstudent",
              masinhvien: masinhvien,
              hovaten: hovaten,
              gioitinh: gioitinh,
              CMND: CMND,
              ngaysinh: ngaysinh,
              phone: phone,
              email: email,
              chuyennganh: chuyennganh,
              giaovien: giaovien,
              diachi: diachi,
              lop: lop
            }, function(data) {
              $("#bangdiem").html(data);
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