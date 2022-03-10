<?php require_once('./view/layouts/headerSinhVien.php'); ?>
<!-- Right -->
<style>
  .tabletkb {
    font-size: 16px;
  }

  .thongbao {
    display: flex;
    flex-flow: column wrap;
  }

  .time {
    display: flex;
    width: 300px;
    justify-content: space-between;
    align-items: center;

  }

  .times_item {
    display: flex;
    flex-direction: column;
  }

  .times_item span {
    color: green;
    font-weight: bold;
    letter-spacing: 0.12rem;
  }

  body.light-theme {
    background-color: #151515;
  }

  body.light-theme .example h1 {
    color: #FFFFFF;
  }

  body.light-theme .example p {
    color: #FFFFFF;
  }

  body.light-theme .buttons .button {
    color: #FFFFFF;
    border-color: #FFFFFF;
  }

  body.light-theme .buttons .button:hover {
    color: #151515;
    background-color: #FFFFFF;
  }

  .example {
    font-family: 'Roboto', sans-serif;
    width: 550px;
    height: 378px;
    margin: auto;
    padding: 20px;
    box-sizing: border-box;
  }

  .example .flipdown {
    margin: auto;
  }

  .example h1 {
    text-align: center;
    font-weight: 100;
    font-size: 3em;
    margin-top: 0;
    margin-bottom: 10px;
  }

  .example p {
    text-align: center;
    font-weight: 100;
    margin-top: 0;
    margin-bottom: 35px;
  }

  .example .buttons {
    width: 100%;
    height: 50px;
    margin: 50px auto 0px auto;
    display: flex;
    align-items: center;
    justify-content: space-around;
  }

  .example .buttons p {
    height: 50px;
    line-height: 50px;
    font-weight: 400;
    padding: 0px 25px 0px 0px;
    color: #333;
    margin: 0px;
  }

  .example .button {
    display: inline-block;
    height: 50px;
    box-sizing: border-box;
    line-height: 46px;
    text-decoration: none;
    color: #333;
    padding: 0px 20px;
    border: solid 2px #333;
    border-radius: 4px;
    text-transform: uppercase;
    font-weight: 700;
    transition: all .2s ease-in-out;
  }

  .example .button:hover {
    background-color: #333;
    color: #FFF;
  }

  .example .button i {
    margin-right: 5px;
  }

  @media(max-width: 550px) {
    .example {
      width: 100%;
      height: 362px;
    }

    .example h1 {
      font-size: 2.5em;
    }

    .example p {
      margin-bottom: 25px;
    }

    .example .buttons {
      width: 100%;
      margin-top: 25px;
      text-align: center;
      display: block;
    }

    .example .buttons p,
    .example .buttons a {
      float: none;
      margin: 0 auto;
    }

    .example .buttons p {
      padding-right: 0px;
    }

    .example .buttons a {
      display: inline-block;
    }
  }
</style>
<div id="right" style="width: 100%; margin-left:10px;">
  <div class="title">Danh sách các môn học được đăng kí</div>
  <div class="entry">
    <div id="ctl00_c_ThongbaoPanel" class="thongbao">
      <?php if (!isset($giodk['ngaybatdau'])) { ?>
        <h2>Hiện chưa có thời gian đăng ký học:</h2>
      <?php } else { ?>
        <h2 style="padding: 0;">Thông báo thời gian đăng ký học:</h2>
        <div class="time">
          <div class="times_item">
            <span><?= substr($giodk['ngaybatdau'], 0, -8); ?></span>
            <span><?= substr($giodk['ngaybatdau'], -8); ?></span>
          </div>
          <i class="fa-solid fa-arrow-right"></i>
          <div class="times_item">
            <span><?= substr($giodk['ngayketthuc'], 0, -8); ?></span>
            <span><?= substr($giodk['ngayketthuc'], -8); ?></span>
          </div>
        </div>

    </div>
    <?php if ($giohientai < $giodk['ngaybatdau']) { ?>
      <div class="big-notice">
        Bạn chưa được đăng ký học
        <br />
      </div>
    <?php } else { ?>
      <h2 style="text-align: center; font-weight: bold;">
        Danh sách môn được đăng ký
        </h3>
        <div style="margin-bottom:30px;">
          <!-- style="width: 730px; height: 430px" -->
          <table class="tabletkb" cellpadding="0" cellspacing="0" width="100%">
            <thead>

              <tr>
                <th style="width: 40px">STT</th>
                <th style="width: 40px"></th>
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
                $i++;
                $checkmm = 1;
                foreach ($data3 as $info3) {
                  if ($info['mamon'] == $info3['mamon']) {

                    $checkmm = 0;
                  }
                }
                if ($checkmm == 1) {
              ?>

                  <tr>
                    <td style="
                      width: 30px;
                      text-align: center;
                      border-left: 1px solid #ccc;
                    ">
                      <?= $i ?>
                    </td>
                    <?php $check = "";
                    foreach ($data2 as $info2) {
                      if ($info['mamon'] == $info2['mamon']) {
                        $check = "checked";
                      } else {
                        $check = "";
                      }
                    } ?>
                    <td style="text-align: center">
                      <input id="check<?= $i ?>" style="
                        font-size: 20px;
                        width: 30px;
                        height: 30px;
                      " type="checkbox" <?= $check ?> />
                    </td>
                    <td style="text-align: center"><?= $info['tenmon'] ?></td>
                    <td style="text-align: center"><?= $info['thu'] ?></td>
                    <td style="text-align: center"><?= $info['ca'] ?></td>
                    <td style="text-align: center"><?= $info['sotinchi'] ?></td>
                    <td style="text-align: center"><?= $info['giatien'] ?></td>
                    <script>
                      $(document).ready(function() {
                        $("#check<?= $i ?>").click(function() {
                          if (check<?= $i ?>.checked == true) {
                            var mamon = "<?= $info['mamon'] ?>";
                            var magv = "<?= $info['magiangvien'] ?>";
                            var malop = "<?= $info['lop'] ?>";
                            alert("Đăng ký thành công");
                            $.get("./index.php", {
                              controller: "sinhvien",
                              action: "dangkyhoc1",
                              mamon: mamon,
                              magv: magv,
                              malop: malop
                            }, function(data) {
                              $("#TKB").html(data);
                            })
                          } else {
                            var mamon = "<?= $info['mamon'] ?>";
                            var magv = "<?= $info['magiangvien'] ?>";
                            var malop = "<?= $info['lop'] ?>";
                            alert("Hủy môn thành công");
                            $.get("./index.php", {
                              controller: "sinhvien",
                              action: "huydangkyhoc",
                              mamon: mamon,
                              magv: magv,
                              malop: malop
                            }, function(data) {
                              $("#TKB").html(data);
                            })
                          }
                        });
                      });
                    </script>
                  </tr>
            <?php }
              }
            } ?>
            </tbody>
          </table>
        </div>

        <div id="LopHocPhan"></div>
        <div id="TKB">
          <div id="dkh_msg"></div>
          <h2 style="text-align: center; font-weight: bold">
            Danh sách môn đã đăng ký
          </h2>
          <div style="width: 700px; height: 430px; margin-bottom:50px;">
            <table class="tabletkb" cellpadding="0" cellspacing="0" width="100%">
              <thead>
                <tr>

                  <th style="width: 40px">STT</th>

                  <th style="width: 160px">Tên môn</th>
                  <th style="width: 80px">Thứ</th>
                  <th style="width: 80px">Ca</th>


                </tr>
              </thead>
              <tbody>
                <?php $i = 0;
                foreach ($data1 as $info) {
                  $i++;
                  $checkmmm = 1;
                  foreach ($data3 as $info3) {
                    if ($info['mamon'] == $info3['mamon']) {

                      $checkmmm = 0;
                    }
                  }
                  if ($checkmmm == 1) { ?>
                    <tr>
                      <td style="
                      width: 30px;
                      text-align: center;
                      border-left: 1px solid #ccc;
                    ">
                        <?= $i ?>
                      </td>

                      <td style="text-align: center"><?= $info['tenmon'] ?></td>
                      <td style="text-align: center"><?= $info['thu'] ?></td>
                      <td style="text-align: center"><?= $info['ca'] ?></td>
                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>

        </div>
      <?php } ?>
  </div>
  <!-- End Right -->
</div>
<!-- End Page -->
<!-- Footer -->

<!-- End Footer -->