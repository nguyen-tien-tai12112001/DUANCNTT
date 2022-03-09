<?php require_once('./view/layouts/headerSinhVien.php'); ?>
<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px;">
  <div class="title">Lịch thi sinh viên</div>
  <div class="entry">
    <div id="ctl00_c_start">
      <table cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td colspan="3" align="center">
              <span style="font-weight: bold; font-size:24px;">PHIẾU DỰ THI</span>
            </td>
          </tr>
          <tr>
            <td style="font-size:20px;">Mã sinh viên: <span id="ctl00_c_lbMaSV"><?= $data['masinhvien'] ?></span></td>
            <td style="font-size:20px;">
              Họ và tên: <span id="ctl00_c_lbTenSV"><?= $data['hovaten'] ?></span>
            </td>
            <td style="font-size:20px;">Lớp: <span id="ctl00_c_lbLop"><?= $data['lop'] ?></span></td>
          </tr>
        </tbody>
      </table>
    </div>
    <br />

    <table class="tablesv" cellpadding="0" cellspacing="0" style="
              font-size: 18px;
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              width:100%
            ">
      <thead>
        <tr>
          <th  class="text-center">STT</th>
          <th  class="text-center">Mã HP</th>
          <th  class="text-center">Tên HP</th>
          <!-- <th  class="text-center">Hình thức thi</th> -->
          <th  class="text-center">Ngày thi</th>
          <th  class="text-center">Ca thi</th>
          <th  class="text-center">Tình trạng</th>
        </tr>
      </thead>

      <tbody>
      <?php $i=0; foreach($data1 as $info){ $i++;
        if($info['trangthai']==1){
          $trangthai="";
        }
        else{
          $trangthai="CT";
        }?>
        <tr>
          <td style="text-align: center">
            <span id="ctl00_c_rptSV_ctl01_lbSTT"><?= $i?></span>
          </td>
          <td style="text-align: center"><?= $info['mamon']?></td>
          <td style="text-align: center"><?= $info['tenmon']?></td>
          <!-- <td style="text-align: center">Online</td> -->
          <td style="text-align: center"><?= date($info['ngaythi'])?></td>
          <td style="text-align: center"><?= $info['cathi']?></td>
          <td style="text-align: center"><?= $trangthai?></td>
        </tr>
      <?php }?>
      </tbody>
    </table>

    <p></p>
  </div>
</div>

<!-- End Right -->
</div>
<!-- End Page -->


</body>

</html>