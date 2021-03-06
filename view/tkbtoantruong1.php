<style>
  .chuyen-nganh {
    display: flex;
    gap: 5px;
    align-items: baseline;
  }

  .chuyen-nganh p {

    font-size: 16px;
  }

  .chuyen-nganh select {
    font-size: 16px;
    border-radius: 5px;
    /* border:none; */
  }

  .form-tkb {
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;
  }

  .tim-kiem {
    font-size: 16px;
  }

  .tim-kiem input {
    padding: 6px 10px;
    border-radius: 3px;
    /* border-color: #333; */

  }

  .btnTimKiem {
    padding: 6px 10px;
    margin-left: -6px;

  }

  .btnTimKiem {
    z-index: 1;
    position: relative;
    font-size: inherit;
    font-family: inherit;
    color: white;
    padding: 0.5em 0.7em;
    outline: none;
    border: none;
    background-color: hsl(236, 32%, 26%);
    overflow: hidden;
    cursor: pointer;
  }

  .btnTimKiem::after {
    content: '';
    z-index: -1;
    background-color: hsla(0, 0%, 100%, 0.2);
    position: absolute;
    top: -50%;
    bottom: -50%;
    width: 1.25em;
    transform: translate3d(-525%, 0, 0) rotate(35deg);
  }

  .btnTimKiem:hover::after {
    transition: transform 0.45s ease-in-out;
    transform: translate3d(200%, 0, 0) rotate(35deg);
  }
  table td{
    font-size: 18px;
  }
  table th{
    font-size: 18px;
  }
</style>

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