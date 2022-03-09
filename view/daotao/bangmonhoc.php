<div id="info">
        <table  cellspacing="3" cellpadding="0"  width="100%">
              <tbody>
                <tr valign="top">
                  <td style="width: 100%">
                    <div id="bangdiem1">
                      <table
                        class="grid"
                        cellspacing="0"
                     
                        id="ctl00_c_GridDC"
                        style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                        "
                      >
                        <tbody>
                          <tr>
                            <th  class="text-center">STT</th>
                            <th  class="text-center" style="white-space: nowrap">
                              Mã môn
                            </th>
                            <th  class="text-center">Tên môn</th>
                            <th  class="text-center">Số TC</th>
                            <th  class="text-center">Thứ</th>
                            <th  class="text-center">Ca học</th>
                            <th  class="text-center">Trạng thái</th>
                            <?php $stt=0; 
                            if($monhoc != '' )
                            {
                            foreach ($monhoc as $info){ $stt++;?>
                            <tr>
                           
                            <td><?= $stt?></td>
                            <td ><?= $info['mamon']?></td>
                            <td><?= $info['tenmon']?></td>
                            <td ><?= $info['sotinchi']?></td>
                            <td><?= $info['thu']?></td>
                            <td ><?= $info['ca']?></td>

                            <td class="item-monhoc">
                            <button class="btnTimKiem capnhat" type="button" id="<?= $info['mamon']?>" data-toggle="modal" data-target="#SuaMonHoc">Cập nhật</button>
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
                          <?php } ?>
                          </tr>
                          
                       
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
                <script>
                        $(document).ready(function(){
                            $("button.capnhat").click(function(){
                                    var mamon=$(this).attr("id")
                                   
                                    $.get("./index.php",{controller:"daotao",action:"updatemonhoc", mamon:mamon}, function(data) {
                                    $("#SuaMonHoc").html(data);
                                })                                                                                     
                            });
                        });
                        </script>
              </tbody>
            </table>
        </div>