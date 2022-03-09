<div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xem Chi Tiết Giáo Viên</h4>
        </div>
        <div class="modal-body">
          <!-- <p>Some text in the modal.</p> -->
          <table width="100%">
            <tbody class="table">
             <tr>

               <td class="modal-td" width="30%">Mã GV:</td>
               <td class="modal-td">
                 <p><?=$info['magiangvien']?></p>
               </td>
             </tr>
             <tr>

               <td class="modal-td" width="30%">Tên giáo viên:</td>
               <td class="modal-td">
               <p><?=$info['hovaten']?></p>
               </td>
             </tr>
             <tr>

               <td class="modal-td" width="30%">Giới tính:</td>
               <td class="modal-td">
               <p><?=$info['gioitinh']?></p>
               </td>
             </tr>
              </tr>
              <tr>
                <td class="modal-td" width="30%">Số CMND/CCCD:</td>
                <td class="modal-td">
                <p><?=$info['cmnd']?></p>
                </td>
              </tr>
              <tr>
                <td class="modal-td" width="30%">Ngày sinh:</td>
                <td class="modal-td">
                <p><?=$info['ngaysinh']?></p>
                </td>
              </tr>
              <tr>
                <td class="modal-td">Điện thoại:</td>
                <td class="modal-td">
                <p><?=$info['dienthoai']?></p>
                </td>
              </tr>
              <tr>
                <td class="modal-td">Email GV:</td>
                <td class="modal-td">
                <p><?=$info['email']?></p>
                </td>
              </tr>

              <tr>
                <td class="modal-td">Địa chỉ hộ khẩu:</td>
                <td class="modal-td">
                <p><?=$info['diachi']?></p>

                </td>
              </tr>
              <tr>
                <td class="modal-td">Chuyên Ngành:</td>
                <td class="modal-td">
                <p><?php
              foreach ($data_cn as $CN) {
                  if($CN['machuyennganh'] == $info['chuyennganh'] )
                  {
                    echo  $CN['tenchuyennganh'] ;
                  }
                
            }
            ?></p>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
        </div>
      </div>

    </div>
    