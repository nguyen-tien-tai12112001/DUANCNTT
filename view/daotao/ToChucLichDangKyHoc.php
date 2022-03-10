<?php require_once('./view/layouts/headerDaoTao.php'); ?>

<style>
  .chuyen-nganh {
    display: flex;
    font-size: 16px;
    margin-bottom: 15px;

  }

  .chuyen-nganh p {
    width: 160px;
    font-size: 17px;

  }

  .chuyen-nganh select {
    font-size: 16px;

  }

  .list-monhoc {

    font-size: 16px;
  }

  .list-monhoc ul {
    list-style-type: none;
  }

  .ngay-dky {
    margin-top: 15px;
    font-size: 16px;
    display: flex;
    flex-direction: column;
    gap: 2rem;
  }

  .ngay-dky p {
    width: 150px;
    font-size: 17px;

  }

  .ngay-dky input {
    width: 300px;
  }

  .ngay-bdau {
    display: flex;
    gap: 2px;
  }

  .ngay-ketthuc {
    display: flex;
    gap: 2px;
  }

  .btn-xacnhan {
    z-index: 1;
    position: relative;
    font-size: inherit;
    font-family: inherit;
    color: white;
    padding: 0.5em 1em;
    margin-top: 10px;
    outline: none;
    border: none;
    border-radius: 5px;
    background-color: hsl(103, 87%, 46%);
    overflow: hidden;
    transition: color 0.4s ease-in-out;
  }

  .btn-xacnhan::before {
    content: '';
    z-index: -1;
    position: absolute;
    top: 100%;
    left: 100%;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    background-color: #a0da03;
    transform-origin: center;
    transform: translate3d(-50%, -50%, 0) scale3d(0, 0, 0);
    transition: transform 0.45s ease-in-out;
  }

  .btn-xacnhan:hover {
    cursor: pointer;
    color: #161616;
  }

  .btn-xacnhan:hover::before {
    transform: translate3d(-50%, -50%, 0) scale3d(15, 15, 15);
  }
</style>


<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px;">
  <div class="title">
    Tổ chức lịch đăng ký học cho sinh viên
  </div>
  <div class="chuyen-nganh">
    <p>Chọn chuyên ngành:</p>
    &nbsp;
    <select class="form-control" id="chuyennganh1" style="width:20%">
      <option class="a" id="Tất cả">Tất cả</option>
      <?php
      foreach ($data_cn as $CN) {
        echo '<option value="' . $CN['machuyennganh'] . '">' . $CN['tenchuyennganh'] . '</option>';
      }
      ?>
    </select>
    <script>
      $(function() {
        $('#chuyennganh1').trigger('change'); //This event will fire the change event. 
        $('#chuyennganh1').change(function() {
          var data = $(this).val();
          $.get("./index.php", {
            controller: "daotao",
            action: "getmonhoc_cn",
            info: data
          }, function(data) {
            $("#ToChucLichDangKyHoc1").html(data);
          })
        });
      });
    </script>
  </div>
  <form action="" method="POST">
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
              <td style="text-align: center"><input autocomplete="off" name="check[]" value="<?= $info['mamon'] ?>" type="checkbox"></td>
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
    <div class="ngay-dky">
      <div class="ngay-bdau">
        <p>Ngày bắt đầu:</p>
        <input name="ngaybatdau" class="form-control" type="datetime-local" />
      </div>
      <div class="ngay-ketthuc">
        <p>Ngày kết thúc:</p>
        <input name="ngayketthuc" class="form-control" type="datetime-local" />
      </div>

    </div>
    <button name="xacnhanlich" class="btn-xacnhan btnTimKiem">Xác nhận</button>
  </form>

</div>
</div>

<!-- End Right -->
</div>
<!-- End Page -->




</body>

</html>