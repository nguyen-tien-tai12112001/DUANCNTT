<div id="info"></div>
<table cellspacing="3" cellpadding="0" width="100%">
              <tbody>
                <tr valign="top">
                  <td style="width: 100%">
                    <div>
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
                              Mã Môn
                            </th>
                            <th  class="text-center">Tên Môn</th>
                            <th  class="text-center" style="white-space: nowrap">
                              Số TC
                            </th>
                            
                            <th  class="text-center">Thứ</th>
                            <th  class="text-center">Ca học</th>
                            <th  class="text-center">Trạng thái</th>

                          </tr>
                          <?php $stt=0; 
                          foreach($mon as $info){ $stt++; ?>
                          <tr>
                            <td><?= $stt ?></td>
                            <td ><?= $info['mamon'] ?></td>
                            <td><?= $info['tenmon'] ?></td>
                            <td class="item-monhoc"><?= $info['sotinchi'] ?></td>
                            
                            <td class="item-monhoc"><?= $info['thu'] ?></td>
                            <td class="item-monhoc"><?= $info['ca'] ?></td>
                            
                            <td class="item-monhoc">
                              <button class="btnTimKiem" type="button" data-toggle="modal" data-target="#SuaMonHoc">Cập nhập</button>
                              <button type="button" id="xoa<?= $stt ?>" class="btnTimKiem" >Xóa</button>
                              <script>
                                $(document).ready(function(){
                                    $("#xoa<?= $stt ?>").click(function(){
                                        var mamon="<?= $info['mamon'] ?>";
                                        if (confirm("Bạn chắc chắn muốn xóa ???") == true) {
                                          $.get("./index.php",{controller:"daotao",action:"xoamon", info:mamon}, function(data) {
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