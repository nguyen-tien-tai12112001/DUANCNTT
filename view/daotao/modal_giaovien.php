<div class="modal-dialog" style="width:60%">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Xem Chi Tiết Giáo Viên</h4>
    </div>
    <div class="modal-body flex entry">
      <div>
        <?php if ($info['image']) { ?>
          <img src="<?= $info['image']; ?>" class="avatar" alt="Avatar" width="100" height="300">
        <?php } else { ?>
          <img src="https://img.wattpad.com/8f19b412f2223afe4288ed0904120a48b7a38ce1/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f5650722d38464e2d744a515349673d3d2d3234323931353831302e313434336539633161633764383437652e6a7067?s=fit&w=720&h=720" class="avatar" alt="Avatar" width="200" height="300">
        <?php } ?>
      </div>
      <!-- <p>Some text in the modal.</p> -->
      <table width="50%">
        <tbody class="table">
          <tr>

            <td class="modal-td" width="30%">Mã GV:</td>
            <td class="modal-td">
              <p><?= $info['magiangvien'] ?></p>
            </td>
          </tr>
          <tr>

            <td class="modal-td" width="30%">Tên giáo viên:</td>
            <td class="modal-td">
              <p><?= $info['hovaten'] ?></p>
            </td>
          </tr>
          <tr>

            <td class="modal-td" width="30%">Giới tính:</td>
            <td class="modal-td">
              <p><?= $info['gioitinh'] ?></p>
            </td>
          </tr>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Số CMND/CCCD:</td>
            <td class="modal-td">
              <p><?= $info['cmnd'] ?></p>
            </td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Ngày sinh:</td>
            <td class="modal-td">
              <p><?= $info['ngaysinh'] ?></p>
            </td>
          </tr>
          <tr>
            <td class="modal-td">Điện thoại:</td>
            <td class="modal-td">
              <p><?= $info['dienthoai'] ?></p>
            </td>
          </tr>
          <tr>
            <td class="modal-td">Email GV:</td>
            <td class="modal-td">
              <p><?= $info['email'] ?></p>
            </td>
          </tr>

          <tr>
            <td class="modal-td">Địa chỉ hộ khẩu:</td>
            <td class="modal-td">
              <p><?= $info['diachi'] ?></p>

            </td>
          </tr>
          <tr>
            <td class="modal-td">Chuyên Ngành:</td>
            <td class="modal-td">
              <p><?php
                  foreach ($data_cn as $CN) {
                    if ($CN['machuyennganh'] == $info['chuyennganh']) {
                      echo  $CN['tenchuyennganh'];
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