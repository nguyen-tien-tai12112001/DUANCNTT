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
                  <th class="text-center" style="
                      
                      font-size: 15px;
                      
                    ">STT</th>
                  <th style="
                      
                      font-size: 15px;
                      
                    " class="text-center">Mã SV</th>
                  <th style="
                      
                      font-size: 15px;
                      
                    " class="text-center">Tên Sinh Viên</th>
                  <th style="
                      
                      font-size: 15px;
                      
                    
                      
                    " class="text-center">Trạng thái</th>
                  <th style="
                      
                      font-size: 15px;
                      
                    " class="text-center"></th>

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


