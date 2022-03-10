<div class="modal-dialog">

  <!-- Modal-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Cập nhập sinh viên </h4>
    </div>

    <div class="modal-body">
      <table width="100%">
        <tbody class="table">
          <tr>
          <tr>
            <td class="modal-td" width="30%">Mã Sinh Viên:</td>
            <td class="modal-td">
              <input autocomplete="off" id="masinhvien" name="masinhvien" class="form-control" type="text" value="<?= $svid['masinhvien'] ?>" readonly />
            </td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Họ và tên:</td>
            <td class="modal-td">
              <input autocomplete="off" id="hovaten" name="hovaten" class="form-control" type="text" value="<?= $svid['hovaten'] ?>" />
            </td>
          </tr>
          <td class="modal-td" width="30%">Giới tính:</td>
          <td class="modal-td">
            <select class="form-control" id="gioitinh" name="gioitinh">
              <option value="Nam" <?php if ($svid['gioitinh'] == 'Nam') {
                                    echo ' selected';
                                  } ?>>Nam</option>
              <option value="Nữ" <?php if ($svid['gioitinh'] == 'Nữ') {
                                    echo ' selected';
                                  } ?>>Nữ</option>
            </select>
          </td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Số CMND/CCCD:</td>
            <td class="modal-td"><input autocomplete="off" value="<?= $svid['cmnd'] ?>" type="text" class="form-control" name="CMND" id="CMND"></td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Ngày sinh:</td>
            <td class="modal-td">
              <input autocomplete="off" class="form-control" type="date" id="ngaysinh" name="ngaysinh" value="<?= date($svid['ngaysinh']) ?>" />
            </td>
          </tr>
          <tr>
            <td class="modal-td">Điện thoại:</td>
            <td class="modal-td"><input autocomplete="off" type="text" class="form-control" id="phone" value="<?= $svid['dienthoai'] ?>" name="phone"></td>
          </tr>
          <tr>
            <td class="modal-td">Email SV:</td>
            <td class="modal-td"><input autocomplete="off" type="text" class="form-control" value="<?= $svid['email'] ?>" name="email" id="email" readonly></td>
          </tr>
          <tr>
            <td class="modal-td">Địa chỉ hộ khẩu:</td>
            <td class="modal-td">
              <input autocomplete="off" type="text" value="<?= $svid['diachi'] ?>" class="form-control" name="diachi" id="diachi">

            </td>
          </tr>
          <tr>
            <td class="modal-td">Lớp:</td>
            <td class="modal-td">
              <select class="form-control" id="lop" name="lop">
                <option value="">Chọn lớp</option>
                <?php foreach ($listLopCN as $infoCN) {
                  if ($svid['lop'] == $infoCN['malop'])
                    echo '<option value="' . $infoCN['malop'] . '" selected>' . $infoCN['tenlop'] . '</option>';
                  else
                    echo '<option value="' . $infoCN['malop'] . '">' . $infoCN['tenlop'] . '</option>';
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="modal-td">Chuyên Ngành:</td>
            <td class="modal-td">
              <select class="form-control" id="chuyennganh" name="chuyennganh">
                <option value="">Chọn chuyên ngành</option>
                <?php foreach ($listCN as $infoCN) {
                  if ($svid['chuyennganh'] == $infoCN['machuyennganh'])
                    echo '<option value="' . $infoCN['machuyennganh'] . '" selected>' . $infoCN['tenchuyennganh'] . '</option>';
                  else
                    echo '<option value="' . $infoCN['machuyennganh'] . '">' . $infoCN['tenchuyennganh'] . '</option>';
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="modal-td">Giáo viên CN:</td>
            <td class="modal-td">
              <select class="form-control" id="giaovien" name="giaovien">
                <option value="">Chọn giáo viên</option>

                <?php foreach ($listGVCN as $infoCN) {
                  if ($svid['GVCN'] == $infoCN['magiangvien'])
                    echo '<option value="' . $infoCN['magiangvien'] . '" selected>' . $infoCN['hovaten'] . '</option>';
                }
                ?>

              </select>
            </td>
          </tr>


        </tbody>
      </table>
    </div>
    <div id="alert"></div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      <button type="button" id="capnhatsinhvien" class="btn btn-success">Cập Nhật</button>
    </div>
  </div>


</div>
<script>
  $(document).ready(function() {
    $('#chuyennganh').on('change', function() {
      var machuyennganh = $(this).val();
      const url = $(this).attr("action");
      if (machuyennganh) {
        $.ajax({
          type: 'POST',
          url,
          data: 'machuyennganh=' + machuyennganh,
          success: function(html) {
            $('#giaovien').html(html);
          }
        });
      } else {
        $('#giaovien').html('<option value="">Chọn giáo viên </option>');

      }
    });


  });
</script>
<script>
  $(document).ready(function() {
    $("#capnhatsinhvien").click(function() {
      var masinhvien = $("input[name='masinhvien']").val();
      var hovaten = $("input[name='hovaten']").val();
      var gioitinh = $("select[name='gioitinh']").val();
      var chuyennganh = $("select[name='chuyennganh']").val();
      var lop = $("select[name='lop']").val();
      var giaovien = $("select[name='giaovien']").val();
      var CMND = $("input[name='CMND']").val();
      var ngaysinh = $("input[name='ngaysinh']").val();
      var phone = $("input[name='phone']").val();
      var email = $("input[name='email']").val();
      var diachi = $("input[name='diachi']").val();

      if (hovaten == null || hovaten == "") {
        $("#alert").html('<strong class="text-danger">Họ và tên không được để trống</strong>');
        $("input[name='hovaten']").focus();
        return;
      } else if (hovaten.length < 6) {
        $("#alert").html('<strong class="text-danger">Tối thiểu là 6 kí tự</strong>');
        $("input[name='hovaten']").focus();
        return;
      } else if (CMND == null || CMND == "") {
        $("#alert").html('<strong class="text-danger">CMND không được để trống</strong>');
        $("input[name='CMND']").focus();
        return;
      } else if (CMND.length < 12 || CMND.length > 12) {
        $("#alert").html('<strong class="text-danger">CMND bao gồm 12 kí tự</strong>');
        $("input[name='CMND']").focus();
        return;
      } else if (isNaN(CMND)) {
        $("#alert").html('<strong class="text-danger">CMND phải là số</strong>');
        $("input[name='CMND']").focus();
        return;
      } else if (ngaysinh == null || ngaysinh == "") {
        $("#alert").html('<strong class="text-danger">Ngày sinh không được để trống</strong>');
        $("input[name='ngaysinh']").focus();
        return;
      } else if (ngaysinh == null || ngaysinh == "") {
        $("#alert").html('<strong class="text-danger">CMND không được để trống</strong>');
        $("input[name='ngaysinh']").focus();
        return;
      } else if (phone == null || phone == "") {
        $("#alert").html('<strong class="text-danger">Số điện thoại không được để trống</strong>');
        $("input[name='phone']").focus();
        return;

      } else if (phone.length != 10) {
        $("#alert").html('<strong class="text-danger">Độ dài của số điện thoại là 10 ký tự</strong>');
        $("input[name='phone']").focus();
        return;
      } else if (isNaN(phone)) {
        $("#alert").html('<strong class="text-danger">Số điện thoại phải là số</strong>');
        $("input[name='phone']").focus();
        return;
      } else if (diachi == null || diachi == "") {
        $("#alert").html('<strong class="text-danger">Địa chỉ không được để trống</strong>');
        $("select[name='diachi']").focus();
        return;
      } else if (lop == null || lop == "") {
        $("#alert").html('<strong class="text-danger">Lớp không được để trống</strong>');
        $("select[name='lop']").focus();
        return;
      } else if (chuyennganh == null || chuyennganh == "") {
        $("#alert").html('<strong class="text-danger">Chuyên ngành không được để trống</strong>');
        $("select[name='chuyennganh']").focus();
        return;
      } else if (giaovien == null || giaovien == "") {
        $("#alert").html('<strong class="text-danger">Giáo viên không được để trống</strong>');
        $("select[name='giaovien']").focus();
        return;
      } else {
        $('#suasinhvien').modal('hide');
        $.get("./index.php", {
          controller: "daotao",
          action: "capnhatsinhviendaotao",
          masinhvien: masinhvien,
          hovaten: hovaten,
          gioitinh: gioitinh,
          chuyennganh: chuyennganh,
          lop: lop,
          giaovien: giaovien,
          CMND: CMND,
          ngaysinh: ngaysinh,
          phone: phone,
          email: email,
          diachi: diachi
        }, function(data) {
          $("#info").html(data);
          alert("Cập nhật thành công");
        })
      }

    });
  });
</script>