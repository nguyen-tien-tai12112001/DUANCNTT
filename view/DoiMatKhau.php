<?php
if ($_SESSION['role_id'] == "1")
  require_once('./view/layouts/headerSinhVien.php');
if ($_SESSION['role_id'] == "2")
  require_once('./view/layouts/headerGiaoVien.php');
if ($_SESSION['role_id'] == "3")
  require_once('./view/layouts/headerDaoTao.php');
?>
<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px;">
  <div class="title">Đổi mật khẩu</div>
  <div class="entry">
    <form method="POST" role="form">
        <table id="ctl00_c_cp1" cellspacing="0" cellpadding="0"  style="height: 145px; border-collapse: collapse;margin:0 auto;">
          <tbody>
            <tr>
              <td>
                <table  cellpadding="1" cellspacing="0" style="border-collapse: collapse">
                  <tbody>
                    <tr>
                      <td>
                        <table  cellpadding="0" style="height: 145px">
                          <tbody>
                            <tr>
                              <td align="center" colspan="2"></td>
                            </tr>
                            <tr>
                              <td align="right">
                                <label>Mật khẩu cũ:</label>
                              </td>
                              <td>
                                <input name="mkc" type="password" required />
                              </td>
                            </tr>
                            <tr>
                              <td align="right">
                                <label>Mật khẩu mới:</label>
                              </td>
                              <td>
                                <input name="mkm" type="password" required/>
                              </td>
                            </tr>
                            <tr>
                              <td align="right">
                                <label>Gõ lại mật khẩu mới:</label>
                              </td>
                              <td>
                                <input name="nhaplaimk" type="password" required/>
                              </td>
                            </tr>
                            <?php if(isset($message)){
                                echo $message;
                              }?>
                            <tr>
                              
                              <td align="right" colspan="3">
                                <button class="btn btn-success mt-3" name="doimk">Xác nhận</button>
                                <!-- <button class="btn btn-warning" name="edit_sv">Thoát</button> -->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
    </form>
  </div>
</div>

<!-- End Right -->
</div>
<!-- End Page -->
<!-- Footer -->
</body>

</html>