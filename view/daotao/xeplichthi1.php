<div id="info">
<table id="info" cellspacing="3" cellpadding="0" width="100%">
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
                            <th  class="text-center">Ngày Thi</th>
                            <th  class="text-center">Ca Thi</th>
                            <th  class="text-center">Trạng Thái</th>
                          </tr>
                          <?php $i=0; foreach($mon as $value){ $i++?>
                          <tr>
                            <td><?= $i?></td>
                            <td><?= $value['mamon']?></td>
                            <td><?= $value['tenmon']?></td>
                            <td >
                              <input id="ngaythi<?= $i?>" value="<?= date($value['ngaythi'])?>" type="date"/>
                               
                            </td>
                            <td ><select id="ca<?= $i?>" class="form-control" >
                              <option ><?= $value['cathi']?></option>
                              <option >1-2</option>
                              <option >1-3</option>
                              <option >1-5</option>
                              <option >6-7</option>
                              <option >6-9</option>
                              <option >6-10</option>
                                </select></td>
                            <td ><Button id="btcapnhalichthi<?= $i?>" class="btnTimKiem">Cập Nhập</Button></td>
                            <script>
                                $(document).ready(function(){
                                    $("#btcapnhalichthi<?= $i?>").click(function(){
                                      var data="<?= $value['mamon']?>";
                                      var data1= $(ngaythi<?= $i?>).val();
                                      var data2= $(ca<?= $i?>).val();
                                      var thongbao="Cập nhật thành công";
                                      alert(thongbao );
                                      $.get("./index.php",{controller:"daotao",action:"capnhatlichthi", mamon:data,ngaythi:data1, cathi:data2}, function(data) {
                                      
                                  })  
                                });
                                });
                            </script>
                    
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
