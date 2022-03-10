<?php require_once('./view/layouts/headerDaoTao.php'); ?>
<script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script>
<style>
  td {
    text-align: center;
  }

  .modal-td {
    padding: 10px;
  }



  a {
    text-decoration: none;
  }

  .item-monhoc {
    align-items: center;
  }

  

  .chuyen-nganh p {

    font-size: 16px;
  }

  .chuyen-nganh select {
    font-size: 16px;
    border-radius: 5px;
    /* border:none; */
  }

  .form-tkb {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
  }

  

  

  .chuyen-nganh {
    display: flex;
    gap: 5px;
    font-size: 16px;
    align-items: flex-start;
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
</style>

<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px;">
  <div class="title">
    Quản lý môn học

  </div>
  <div class="form">

    <button type="button" data-toggle="modal" data-target="#ThemMonHoc" class="btnUpdate btn" style="margin-bottom: 10px;">Thêm môn Học &nbsp;<span class="glyphicon glyphicon-plus"></span></button>
  </div>

  <div class="form-tkb">
    <div class="chuyen-nganh">
      <div style="display: flex;">
        <p>Chọn chuyên ngành:</p>
        <select class="form-control" id="chuyennganh1">
          <option class="a" id="Tất cả">Tất cả</option>
          <?php

          foreach ($chuyennganh as $CN) {
            echo '<option value="' . $CN['machuyennganh'] . '">' . $CN['tenchuyennganh'] . '</option>';
          }
          ?>
        </select>
      </div>
      <script>
        $(function() {
          $('#chuyennganh1').trigger('change'); //This event will fire the change event. 
          $('#chuyennganh1').change(function() {
            var data = $(this).val();

            $.get("./index.php", {
              controller: "daotao",
              action: "timkiemmonhoctheochuyennganh",
              info: data
            }, function(data) {
              $("#info").html(data);
            })
          });
        });
      </script>
    </div>

    <div class="tim-kiem">
      <input id="timkiem" type="text" placeholder="Nhập mã môn,tên môn">
      <button id="tntimkiem" class="btnTimKiem">Tìm kiếm</button>
    </div>

    <script>
      $(function() {
        $('#tntimkiem').trigger('click'); //This event will fire the change event. 
        $('#tntimkiem').click(function() {
          var data = $('#timkiem').val();
          $.get("./index.php", {
            controller: "daotao",
            action: "timkiemmm",
            key: data
          }, function(data) {
            $("#info").html(data);
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
                    <th class="text-center">STT</th>
                    <th class="text-center" style="white-space: nowrap">
                      Mã Môn
                    </th>
                    <th class="text-center">Tên Môn</th>
                    <th class="text-center" style="white-space: nowrap">
                      Số TC
                    </th>

                    <th class="text-center">Thứ</th>
                    <th class="text-center">Ca học</th>
                    <th class="text-center">Trạng thái</th>

                  </tr>
                  <?php $stt = 0;
                  foreach ($mon as $info) {
                    $stt++; ?>
                    <tr>
                      <td><?= $stt ?></td>
                      <td><?= $info['mamon'] ?></td>
                      <td><?= $info['tenmon'] ?></td>
                      <td class="item-monhoc"><?= $info['sotinchi'] ?></td>

                      <td class="item-monhoc"><?= $info['thu'] ?></td>
                      <td class="item-monhoc"><?= $info['ca'] ?></td>

                      <td class="item-monhoc">
                        <button class="btnTimKiem capnhat" type="button" id="<?= $info['mamon'] ?>" data-toggle="modal" data-target="#SuaMonHoc">Cập nhật</button>
                        <script>
                          $(document).ready(function() {
                            $(".capnhat").click(function() {
                              var mamon = $(this).attr("id")
                              $.get("./index.php", {
                                controller: "daotao",
                                action: "updatemonhoc",
                                mamon: mamon
                              }, function(data) {
                                $("#SuaMonHoc").html(data);
                              })
                            });
                          });
                        </script>
                        <button type="button" id="xoa<?= $stt ?>" class="btnTimKiem">Xóa</button>
                        <script>
                          $(document).ready(function() {
                            $("#xoa<?= $stt ?>").click(function() {
                              var mamon = "<?= $info['mamon'] ?>";
                              if (confirm("Bạn chắc chắn muốn xóa ???") == true) {
                                $.get("./index.php", {
                                  controller: "daotao",
                                  action: "xoamon",
                                  info: mamon
                                }, function(data) {
                                  $("#info").html(data);
                                })
                              }
                            });
                          });
                        </script>
                      </td>
                    </tr>
                  <?php } ?>
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

<script>
  $(document).ready(function() {
    $(".capnhat").click(function() {
      var mamon = $(this).attr("id")

      $.get("./index.php", {
        controller: "daotao",
        action: "updatemonhoc",
        mamon: mamon
      }, function(data) {
        $("#SuaMonHoc").html(data);
      })
    });
  });
</script>
<!-- End Right -->
</div>
<!-- End Page -->
<!-- Modal thêm môn học-->
<div class="modal fade" id="ThemMonHoc" role="dialog">
  <div class="modal-dialog">

    <!-- Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Môn Học</h4>
      </div>

      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <table width="100%">
          <tbody class="table">
            <tr>
              <td class="modal-td" width="30%">Mã Môn:</td>
              <td class="modal-td"><input id="mamon" name="mamon" type="text" class="form-control"></td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Tên Môn</td>
              <td class="modal-td"><input id="tenmon" name="tenmon" type="text" class="form-control"></td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Số TC:</td>
              <td class="modal-td"><input id="sotinchi" name="sotinchi" type="text" class="form-control"></td>
            </tr>

            <tr>
              <td class="modal-td" width="30%">Chuyên ngành:</td>
              <td class="modal-td">
                <select id="chuyennganh" name="chuyennganh" class="form-control">
                  <?php foreach ($chuyennganh as $info) { ?>
                    <option><?= $info['tenchuyennganh'] ?></option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Thứ:</td>
              <td class="modal-td"><select id="thu" name="thu" class="form-control">
                  <option>Thứ 2</option>
                  <option>Thứ 3</option>
                  <option>Thứ 4</option>
                  <option>Thứ 5</option>
                  <option>Thứ 6</option>
                  <option>Thứ 7</option>
                </select></td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Ca:</td>
              <td class="modal-td"><select id="ca" name="ca" class="form-control">
                  <option>1-2</option>
                  <option>1-3</option>
                  <option>1-5</option>
                  <option>6-7</option>
                  <option>6-9</option>
                  <option>6-10</option>
                </select></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div id="alert"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="themmon" class="btn btn-success">Xác nhận</button>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $("#themmon").click(function() {
          var mamon = $('#mamon').val();
          var tenmon = $('#tenmon').val();
          var sotinchi = $('#sotinchi').val();
          var chuyennganh = $('#chuyennganh').val();
          var thu = $('#thu').val();
          var ca = $('#ca').val();
          if (mamon == null || mamon == "") {
            $("#alert").html('<strong class="text-danger">Mã môn học không được để trống</strong>');
            $("input[name='mamon']").focus();
            return;
          } else if (mamon.length < 5) {
            $("#alert").html('<strong class="text-danger">Mã môn học gồm 5 kí tự</strong>');
            $("input[name='mamon']").focus();
            return;
          }
          <?php
          $result = "";
          foreach ($mon as $sl) {


          ?>if(mamon == "<?= $sl['mamon'] ?>") {
            $("#alert").html('<strong class="text-danger">Mã môn đã tồn tại</strong>');
            $("input[name='mamon']").focus();
            return;
          }
        <?php
          }
        ?>
        else if (tenmon == null || tenmon == "") {
          $("#alert").html('<strong class="text-danger">Tên môn học không được để trống</strong>');
          $("input[name='tenmon']").focus();
          return;
        } else if (tenmon.length < 5) {
          $("#alert").html('<strong class="text-danger">Tên môn học tối thiểu 6 kí tự</strong>');
          $("input[name='tenmon']").focus();
          return;
        } else if (sotinchi == null || sotinchi == "") {
          $("#alert").html('<strong class="text-danger">Số tín chỉ không được để trống</strong>');
          $("input[name='sotinchi']").focus();
          return;
        } else if (isNaN(sotinchi)) {
          $("#alert").html('<strong class="text-danger">Số tín chỉ là dạng số</strong>');
          $("input[name='sotinchi']").focus();
          return;
        } else if (chuyennganh == null || chuyennganh == "") {
          $("#alert").html('<strong class="text-danger">Chuyên ngành không được để trống</strong>');
          $("select[name='chuyennganh']").focus();
          return;
        } else if (thu == null || thu == "") {
          $("#alert").html('<strong class="text-danger">Thứ không được để trống</strong>');
          $("select[name='thu']").focus();
          return;
        } else if (ca == null || ca == "") {
          $("#alert").html('<strong class="text-danger">Ca không được để trống</strong>');
          $("select[name='ca']").focus();
          return;
        } else {
          $('#ThemMonHoc').modal('hide');
          $.get("./index.php", {
            controller: "daotao",
            action: "themmon",
            mamon: mamon,
            tenmon: tenmon,
            sotinchi: sotinchi,
            chuyennganh: chuyennganh,
            thu: thu,
            ca: ca
          }, function(data) {
            $("#info").html(data);
          })
        }

        });
      });
    </script>

  </div>
</div>
<!-- Modal sửa môn học-->
<div class="modal fade" id="SuaMonHoc" role="dialog">

</div>
<!-- Modal xóa môn học-->
<div class="modal fade" id="XoaMonHoc" role="dialog">
  <div class="modal-dialog">

    <!-- Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Xóa môn học</h4>
      </div>

      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <table width="100%">
          <tbody class="table">


            Bạn chắc chắn muốn xóa môn học này?

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="xacnhan" type="button" class="btn btn-danger" data-dismiss="modal">OK</button>

      </div>
    </div>


  </div>
</div>


</body>

</html>