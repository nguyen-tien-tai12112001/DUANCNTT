
        <div id="ToChucLichDangKyHoc1" class="list-monhoc">
      <p>Chọn môn học:</p>

      <table class="tabletkb" cellpadding="0" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th style="width: 40px">STT</th>

            <th style="width: 40px">Trạng thái</th>

            <th style="width: 160px">Tên môn</th>

            <th style="width: 80px">Thứ</th>

            <th style="width: 40px">Ca</th>

            <th style="width: 80px">Số TC</th>

            <th style="width: 80px">Giá tiền</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 0;
          foreach ($data as $info) {
            $i++ ?>
            <tr>
              <td style="text-align: center"><?= $i ?></td>
              <td style="text-align: center"><input name="check[]" value="<?= $info['mamon'] ?>" type="checkbox"></td>
              <td style="text-align: center"><?= $info['tenmon'] ?></td>

              <td style="text-align: center"><?= $info['thu'] ?></td>

              <td style="text-align: center"><?= $info['ca'] ?></td>

              <td style="text-align: center"><?= $info['sotinchi'] ?></td>

              <td style="text-align: center"><?= $info['giatien'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>