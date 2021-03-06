<?php require_once('./view/layouts/headerDaoTao.php'); ?>
<script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script>
<style>
  .form-tkb {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
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

  .chuyen-nganh {
    display: flex;

    font-size: 16px;

  }

  .chuyen-nganh p {
    width: 150px;

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
    gap: 10px;
    margin-bottom: 2rem;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
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

  .tim-kiem {
    font-size: 14px;
    height: 41px;
  }

  .tim-kiem input {
    padding: 5px 9px;
    margin-right: -5px;
  }
</style>

<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px;">
  <div class="title">
    Qu???n l?? l???p chuy??n ng??nh

  </div>
  <div class="form">

    <button type="button" data-toggle="modal" data-target="#ThemLopHoc" class="btnUpdate btn" style="margin-bottom: 10px;">Th??m l???p h???c &nbsp;<span class="glyphicon glyphicon-plus"></span></button>
  </div>

  <div class="form-tkb">
    <div class="chuyen-nganh">
      <div style="display: flex;">
        <p>Ch???n chuy??n ng??nh:</p>
        <select class="form-control" id="chuyennganh1" style="width:60%;">
          <option class="a" id="T???t c???">T???t c???</option>
          <?php
          foreach ($data_cn as $CN) {
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
              action: "locloptheocn",
              info: data
            }, function(data) {
              $("#info").html(data);
            })
          });
        });
      </script>
    </div>

    <div class="tim-kiem">
      <input id="timkiem" type="text" placeholder="Nh???p m?? l???p,t??n l???p">
      <button id="tntimkiem" class="btnTimKiem">T??m ki???m</button>
    </div>
    <script>
      $(function() {
        $('#tntimkiem').trigger('click'); //This event will fire the change event. 
        $('#tntimkiem').click(function() {
          var data = $('#timkiem').val();
          $.get("./index.php", {
            controller: "daotao",
            action: "timkiemlop",
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
            <div>
              <table class="grid" cellspacing="0" border="0" id="ctl00_c_GridDC" style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                        ">
                <tbody>
                  <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center" style="white-space: nowrap">
                      M?? L???p
                    </th>
                    <th class="text-center">T??n L???p</th>
                    <th class="text-center">Chuy??n ng??nh</th>
                    <th class="text-center">Tr???ng Th??i</th>
                  </tr>
                  <?php $stt = 0;
                  foreach ($lop as $info) {
                    $stt++; ?>
                    <tr>
                      <td><?= $stt ?></td>
                      <td><?= $info['malop'] ?></td>
                      <td><?= $info['tenlop'] ?></td>
                      <td><?php
                          foreach ($data_cn as $CN) {
                            if ($CN['machuyennganh'] ==  $info['chuyennganh']) {
                              echo $CN['tenchuyennganh'];
                            }
                          }
                          ?></td>
                      <td class="item-monhoc">
                        <button class="btnTimKiem capnhat" type="button" id="<?= $info['malop'] ?>" data-toggle="modal" data-target="#SuaMonHoc">C???p nh???t</button>
                        <script>
                          $(document).ready(function() {
                            $(".capnhat").click(function() {
                              var malop = $(this).attr("id")
                              $.get("./index.php", {
                                controller: "daotao",
                                action: "updatelophoc",
                                malop: malop
                              }, function(data) {
                                $("#SuaMonHoc").html(data);
                              })
                            });
                          });
                        </script>
                        <button type="button" id="xoa<?= $stt ?>" class="btnTimKiem">X??a</button>
                        <script>
                          $(document).ready(function() {
                            $("#xoa<?= $stt ?>").click(function() {
                              var malop = "<?= $info['malop'] ?>";
                              if (confirm("B???n ch???c ch???n mu???n x??a ???") == true) {
                                $.get("./index.php", {
                                  controller: "daotao",
                                  action: "xoalop",
                                  info: malop
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

<!-- End Right -->
</div>
<!-- End Page -->
<!-- Modal th??m m??n h???c-->
<div class="modal fade" id="ThemLopHoc" role="dialog">
  <div class="modal-dialog">

    <!-- Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Th??m L???p H???c</h4>
      </div>

      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <table width="100%">
          <tbody class="table">
            <tr>
              <td class="modal-td" width="30%">M?? L???p:</td>
              <td class="modal-td"><input id="malop" autocomplete="off" name="malop" type="text" class="form-control"></td>
            </tr>
            <tr>
              <td class="modal-td" width="30%">T??n L???p</td>
              <td class="modal-td"><input id="tenlop" autocomplete="off" name="tenlop" type="text" class="form-control"></td>
            <tr>
              <td class="modal-td">Chuy??n Ng??nh:</td>
              <td class="modal-td">
                <select class="form-control" id="chuyennganh">
                  <option value="">Ch???n chuy??n ng??nh</option>
                  <?php
                  foreach ($data_cn as $CN) {
                    echo '<option value="' . $CN['machuyennganh'] . '">' . $CN['tenchuyennganh'] . '</option>';
                  }
                  ?>
                </select>
              </td>
            </tr>
            </tr>
          </tbody>
        </table>
      </div>
      <div id="alert"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="themmon" class="btn btn-success">X??c nh???n</button>
      </div>
      <script>
        $(function() {
          $('#themmon').trigger('click'); //This event will fire the change event. 
          $('#themmon').click(function() {
            var malop = $('#malop').val();
            var tenlop = $('#tenlop').val();
            var chuyennganh = $('#chuyennganh').val();
            if (malop == null || malop == "") {
              $("#alert").html('<strong class="text-danger">M?? l???p h???c kh??ng ???????c ????? tr???ng</strong>');
              $("input[name='malop']").focus();
              return;
            }
            <?php
            $result = "";
            foreach ($lop as $sl) {


            ?>if(malop == "<?= $sl['malop'] ?>") {
              $("#alert").html('<strong class="text-danger">M?? l???p ???? t???n t???i</strong>');
              $("input[name='malop']").focus();
              return;
            }
          <?php
            }
          ?>
          if (tenlop == null || tenlop == "") {
            $("#alert").html('<strong class="text-danger">T??n l???p h???c kh??ng ???????c ????? tr???ng</strong>');
            $("input[name='tenlop']").focus();
            return;
          } else if (chuyennganh == null || chuyennganh == "") {
            $("#alert").html('<strong class="text-danger">Chuy??n ng??nh kh??ng ???????c ????? tr???ng</strong>');
            $("select[name='chuyennganh']").focus();
            return;
          } else {
            $('#ThemLopHoc').modal('hide');
            $.get("./index.php", {
              controller: "daotao",
              action: "themlop",
              malop: malop,
              tenlop: tenlop,
              chuyennganh: chuyennganh
            }, function(data) {
              $("#info").html(data);
              location.reload();
            })
          }
          });
        });
      </script>
    </div>

  </div>
</div>
<div class="modal fade" id="SuaMonHoc" role="dialog">

</div>
<!-- Modal x??a m??n h???c-->
<div class="modal fade" id="XoaMonHoc" role="dialog">
  <div class="modal-dialog">

    <!-- Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">X??a L???p h???c</h4>
      </div>

      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <table width="100%">
          <tbody class="table">


            B???n ch???c ch???n mu???n x??a L???p h???c n??y?

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