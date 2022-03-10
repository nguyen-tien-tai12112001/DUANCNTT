<div id="info">
  <table cellspacing="3" cellpadding="0" width="100%">
    <tbody>
      <tr valign="top">
        <td style="width: 100%">
          <div>
            <table class="grid" cellspacing="0" id="ctl00_c_GridDC" style="
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

                <?php } ?>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

