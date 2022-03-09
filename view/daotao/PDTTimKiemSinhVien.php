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
                      <th  class="text-center" style="
                      
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
                    <?php $stt=0; 
                    if($listStudent != '')
                    {
                        foreach ($listStudent as $info){ $stt++;?>
                            <tr>
                              <td><?= $stt?></td>
                              <td class="item-monhoc"><?= $info['masinhvien']?></td>
                              <td class="item-monhoc"><?= $info['hovaten']?></td>
                              
                              <td class="item-monhoc">
                                <select name="" id="">
                                  <option ><?= $info['trangthai_sv']?></option>
                                  <option value="">Đang học</option>
                                  <option value="">Đã tốt nghiệp</option>
                                  <option value="">Đang bảo lưu</option>
                                  <option value="">Đã thôi học</option>
                                </select>
                              </td>
        
        
                              <td class="item-monhoc">
                                <Button class="btnTimKiem" type="button" data-toggle="modal"
                                  data-target="#myModal1">Xem Chi Tiêt</Button>
                                &nbsp;
                                <Button class="btnTimKiem" type="button" data-toggle="modal"
                                  data-target="#myModal2">Đánh Giá</Button>
                                  <Button class="btnTimKiem" type="button" data-toggle="modal"
                                  data-target="#myModal2">Cập Nhật</Button>
                              </td>
                            </tr><?php } ?>
                    
                    
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </td>
          </tr>
        </tbody>
      </table>