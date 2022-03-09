

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
              <tbody id="info">
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
                  <th  class="text-center">Ca</th>
                  <th  class="text-center">Giáo viên</th>
                </tr>
                <?php $i = 0;
                foreach ($data as $info) {
                  $i++; ?>
                  <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td class="text-center"><?= $info['mamon'] ?></td>
                    <td class="text-center"><?= $info['tenmon'] ?></td>
                    <td class="text-center"><?= $info['sotinchi'] ?></td>
                    <td class="text-center"><?= $info['thu'] ?></td>
                    <td class="text-center"><?= $info['ca'] ?></td>
                    <td class="text-center"><?= $info['hovaten'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
    </tbody>
  </table>