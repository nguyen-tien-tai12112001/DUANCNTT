
           <style>
      td {
            text-align: center;
        }
</style>
           <div id="capnhat">
            <table cellspacing="3" cellpadding="0" border="0px" width="100%">
              <tbody>
                <tr valign="top">
                  <td style="width: 100%">
                    <div id="bangdiem1">
                      <table
                        class="grid"
                        cellspacing="0"
                        border="0"
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
                            <th  class="text-center">Mã Môn</th>
                            <th  class="text-center">Tên Môn</th>
                            <th  class="text-center">Giáo Viên</th>
                            <th  class="text-center">Phòng Học</th>
                            <th  class="text-center"></th>
                          </tr>
                          <tr>
                          <?php $stt=0; 
                          if($listMonHoc1 !=  0 ){
                            foreach ($listMonHoc1 as $info){ $check=0;$stt++;
                              if($listMonHoc != 0)
                              {
                              foreach($listMonHoc as $infomonhoc)
                              {
                                if($info['mamon'] == $infomonhoc['mamon']  )
                                {?>
                                  <td><?= $stt?></td>
                                  <td class="mamon<?= $stt ?>" id="<?= $infomonhoc['mamon'] ?>" name="mamon"><?= $infomonhoc['mamon']?></td>
                                  <td class="tenmon<?= $stt ?>" id="<?= $infomonhoc['tenmon'] ?>" name="tenmon"><?= $infomonhoc['tenmon']?></td>
                                  <td >
                                    <select class="form-control" style="width: 50%"  id="magiangvien<?= $stt?>"  >
                                    <option value="<?= $infomonhoc['magiangvien'] ?>"><?= $infomonhoc['hovaten']?></option>
                                      <?php
                                        foreach($listGiangVien as $info1)
                                        {
                                          if($info['chuyennganh'] == $info1['chuyennganh'])
                                          {
                                            echo '<option value="'.$info1['magiangvien'].'">'.$info1['hovaten'].'</option>';
      
                                          }
                                          
                                        }
                                      ?>  
                                    </select>
                                  </td>
                                  <td >
                                    <select class="form-control" style="width: 50%"  id="malop<?= $stt?>"  >
                                    <option value="<?= $infomonhoc['malop'] ?>"><?= $infomonhoc['malop']?></option>
                                      <?php
                                        foreach($listLop as $info2)
                                        {
                                          
                                            echo '<option value="'.$info2['malop'].'">'.$info2['tenlop'].'</option>';
      
                                          
                                          
                                        }
                                      ?>  
                                    </select>
                                  </td>
                                  <td><Button id="<?= $stt ?>" class="btnTimKiem">Cập nhập</Button></td>
                                  <?php $check++; } 
                                  ?><?php } } if($check == 0 )
                                  {?>
                                    <td><?= $stt?></td>
                                    <td class="mamon<?= $stt ?>" id="<?= $info['mamon'] ?>" name="mamon"><?= $info['mamon']?></td>
                                    <td class="tenmon<?= $stt ?>" id="<?= $info['tenmon'] ?>" name="tenmon"><?= $info['tenmon']?></td>
                                    
                                    <td >
                                    <select class="form-control" style="width: 50%"  id="magiangvien<?= $stt?>"  >
                                    <option value="">Không có giảng viên nào</option>
                                      <?php
                                        foreach($listGiangVien as $info1)
                                        {
                                          if($info['chuyennganh'] == $info1['chuyennganh'])
                                          {
                                            echo '<option value="'.$info1['magiangvien'].'">'.$info1['hovaten'].'</option>';
      
                                          }
                                          
                                        }
                                      ?>  
                                    </select>
                                  </td>
                                  <td >
                                    <select class="form-control" style="width: 50%"  id="malop<?= $stt?>"  >
                                    <option value=" ?>">Không có lớp học nào</option>
                                      <?php
                                        foreach($listLop as $info2)
                                        {
                                          
                                            echo '<option value="'.$info2['malop'].'">'.$info2['tenlop'].'</option>';
      
                                          
                                          
                                        }
                                      ?>  
                                    </select>
                                  </td>
                                    <td><Button id="<?= $stt ?>" class="btnTimKiem">Cập nhập</Button></td>
                                   <?php } ?>
                          </tr>
                          <script>
                    $(document).ready(function() {
                        $("#<?= $stt ?>").click(function() {
                            var mamon = ".mamon" + $(this).attr("id");
                            var tenmon = ".tenmon" + $(this).attr("id");
                            var magiangvien=$('#magiangvien<?= $stt?>').val();
                            var malop=$('#malop<?= $stt?>').val();
                            var infomamon = $(`${mamon}`).attr('id');
                            var infotenmon = $(`${tenmon}`).attr('id');
                           
                            
                            if(malop == null || malop == "")
                            {
                              alert("Lớp học không được để trống");
                              return;
                            }
                            else if(magiangvien == null || magiangvien == "")
                            {
                              alert("Giáo viên không được để trống");
                              return;
                            }
                            else{
                              $.get("./index.php", {
                                  controller: "daotao",
                                  action: "capnhatmonhoc",
                                  magiangvien: magiangvien,
                                  mamon: infomamon,
                                  tenmon: infotenmon,
                                  malop: malop
                              }, function(data) {
                                  $("#bangdiem").html(data);
                                  alert("Cập nhật thành công");
                              })
                            }
                            
                        });
                    });
                </script><?php } ?>
                          <?php } ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
                  </div>  