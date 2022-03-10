
 <div id="info">
    <table cellspacing="3" cellpadding="0" width="100%">
      <tbody>
        <tr valign="top">
          <td style="width: 100%">
            <div>
              <table class="grid" cellspacing="0"  id="ctl00_c_GridDC" style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                        ">
                <tbody>
                  <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center" style="white-space: nowrap">
                      Mã Lớp
                    </th>
                    <th class="text-center">Tên Lớp</th>
                    <th class="text-center">Chuyên ngành</th>
                    <th class="text-center">Trạng Thái</th>
                  </tr>
                  <?php $stt=0; 
                  foreach($lop as $info){ $stt++; ?>
                  <tr>
                    <td><?= $stt?></td>
                    <td><?= $info['malop']?></td>
                    <td><?= $info['tenlop']?></td>
                    <td><?php
                      foreach ($data_cn as $CN) {
                        if($CN['machuyennganh'] ==  $info['chuyennganh'])
                        {
                          echo $CN['tenchuyennganh'];
                        }
                          
                      }
                    ?></td>
                    <td class="item-monhoc">
                    <button class="btnTimKiem capnhat" type="button" id="<?= $info['malop'] ?>" data-toggle="modal" data-target="#SuaMonHoc">Cập nhật</button>
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
                        <button type="button" id="xoa<?= $stt ?>" class="btnTimKiem">Xóa</button>
                        <script>
                          $(document).ready(function() {
                            $("#xoa<?= $stt ?>").click(function() {
                              var malop = "<?= $info['malop'] ?>";
                              if (confirm("Bạn chắc chắn muốn xóa ???") == true) {
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

                  <?php }?>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>


<div class="modal fade" id="ThemLopHoc" role="dialog">
  <div class="modal-dialog">

    <!-- Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Lớp Học</h4>
      </div>

      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <table width="100%">
          <tbody class="table">
            <tr>
              <td class="modal-td" width="30%">Mã Lớp:</td>
              <td class="modal-td"><input id="mamon" name="mamon" type="text" class="form-control"></td>
            </tr>
              <tr>
                <td class="modal-td" width="30%">Tên Lớp</td>
                <td class="modal-td"><input id="tenmon" name="tenmon" type="text" class="form-control"></td>
                <tr>
                                <td class="modal-td">Chuyên Ngành:</td>
                                <td class="modal-td">
                                    <select class="form-control" id="chuyennganh" name="chuyennganh">
                                        <option value="">Chọn chuyên ngành</option>

                                  
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
        <button type="button" id="themmon" class="btn btn-success" >Xác nhận</button>
      </div>
    </div>

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
        <h4 class="modal-title">Xóa Lớp học</h4>
      </div>

      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->
        <table width="100%">
          <tbody class="table">


            Bạn chắc chắn muốn xóa Lớp học này?

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


