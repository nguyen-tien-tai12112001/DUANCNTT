<?php require_once('./view/layouts/headerDaoTao.php'); ?>
<style>
 
  .modal-td {
    padding: 10px;
  }

 
  a {
    text-decoration: none;
  }

  .item-monhoc {
    align-items: center;
  }

  .chuyen-nganh {
    display: flex;
    gap: 5px;
    align-items: baseline;
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

  .tim-kiem {
    font-size: 14px;
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
  td {
    text-align: center;
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
    Quản lý chuyên ngành

  </div>
  <div class="form">

    <button type="button" data-toggle="modal" data-target="#ThemMonHoc" class="btnUpdate btn" style="margin-bottom: 10px;">Thêm chuyên ngành &nbsp;<span class="glyphicon glyphicon-plus"></span></button>

  </div>
  <div class="form-tkb">
    <div class="chuyen-nganh" >
      <div style="display: flex;">
      <p >Chọn chuyên ngành:</p>
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
              action: "bangchuyennganh",
              info: data
            }, function(data) {
              $("#bangdiem1").html(data);
            })
          });
        });
      </script>
    </div>

    <div class="tim-kiem">
      <input id="timkiem" type="text" placeholder="Nhập mã chuyên ngành,tên chuyên ngành">
      <button id="tntimkiem" class="btnTimKiem">Tìm kiếm</button>

    </div>
    <script>
      $(function() {
        $('#timkiem').trigger('change'); //This event will fire the change event. 
        $('#timkiem').change(function() {
          var data = $(this).val();
          $.get("./index.php", {
            controller: "daotao",
            action: "timkiemchuyennganh",
            info: data
          }, function(data) {
            $("#bangdiem1").html(data);
          })
        });
      });
    </script>
  </div>
  <div id="info">
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
                  <tr>
                    <th  class="text-center">STT</th>
                    <th  class="text-center" style="white-space: nowrap">
                      Mã chuyên ngành
                    </th>
                    <th  class="text-center">Tên chuyên ngành</th>
                    <th  class="text-center"></th>
                  <tr>
                    <?php $stt = 0;
                    foreach ($chuyennganh as $info) {
                      $stt++; ?>
                      <td><?= $stt ?></td>
                      <td><?= $info['machuyennganh'] ?></td>
                      <td><?= $info['tenchuyennganh'] ?></td>

                      <td class="item-monhoc">
                        <button class="btnTimKiem capnhat" type="button" id="<?= $info['machuyennganh'] ?>" data-toggle="modal" data-target="#SuaMonHoc">Cập nhật</button>



                      </td>
                  </tr>
                <?php } ?>
        </tr>


      </tbody>
      <script>
        $(document).ready(function() {
          $(".capnhat").click(function() {
            var machuyennganh = $(this).attr("id")

            $.get("./index.php", {
              controller: "daotao",
              action: "updatechuyennganh",
              machuyennganh: machuyennganh
            }, function(data) {
              $("#SuaMonHoc").html(data);
            })
          });
        });
      </script>
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
<!-- End Page -->
<!-- Modal thêm môn học-->
<div class="modal fade" id="ThemMonHoc" role="dialog">
  <div class="modal-dialog">

    <!-- Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm chuyên ngành</h4>
      </div>

      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <table width="100%">
          <tbody class="table">
            <tr>
              <td class="modal-td" width="30%">Mã chuyên ngành:</td>
              <td class="modal-td"><input id="machuyennganh" type="text" class="form-control"></td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">Tên chuyên ngành</td>
              <td class="modal-td"><input id="tenchuyennganh" type="text" class="form-control"></td>
            </tr>

          </tbody>
        </table>
      </div>
      <div id="alert"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" id="themmon" class="btn btn-success">Xác nhận</button>

      </div>
    </div>
    <script>
      $(document).ready(function() {
        $("#themmon").click(function() {
          var machuyennganh = $('#machuyennganh').val();
          var tenchuyennganh = $('#tenchuyennganh').val();
          if (machuyennganh == null || machuyennganh == "") {
            $("#alert").html('<strong class="text-danger">Mã chuyên ngành không được để trống</strong>');
            $("input[name='machuyennganh']").focus();
            return;
          }  <?php 
                      $result = "";
                      foreach ($chuyennganh as $sl)
                      {
                          
                          
                          ?>if(machuyennganh == "<?=$sl['machuyennganh']?>")
                                    {
                                  $("#alert").html('<strong class="text-danger">Mã chuyên ngành đã tồn tại</strong>'); 
                            $("input[name='machuyennganh']").focus();
                            return;
                                    }<?php
                      }
                  ?>
           else if (tenchuyennganh == null || tenchuyennganh == "") {
            $("#alert").html('<strong class="text-danger">Tên chuyên ngành không được để trống</strong>');
            $("input[name='tenchuyennganh']").focus();
            return;
          } else {
            $('#ThemMonHoc').modal('hide');
            $.get("./index.php", {
              controller: "daotao",
              action: "themchuyennganh",
              machuyennganh: machuyennganh,
              tenchuyennganh: tenchuyennganh
            }, function(data) {
              $("#bangdiem1").html(data);
              location.reload();
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