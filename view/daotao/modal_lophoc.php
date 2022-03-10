<div class="modal-dialog">

  <!-- Modal-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Cập nhập môn học</h4>
    </div>

    <div class="modal-body">
      <table width="100%">
        <tbody id="" class="table">
          <tr>
            <td class="modal-td" width="30%">Mã Lớp:</td>
            <td class="modal-td"><input autocomplete="off" type="text" class="form-control" id="malop_kt" name="malop_kt" value="<?= $info['malop'] ?>" readonly></td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Tên Lớp</td>
            <td class="modal-td"><input autocomplete="off" type="text" class="form-control" id="tenlop_kt" name="tenlop_kt" value="<?= $info['tenlop'] ?>"></td>
          </tr>

          <tr>
            <td class="modal-td" width="30%">Chuyên ngành:</td>
            <td class="modal-td">
              <select id="chuyennganh_kt" name="chuyennganh_kt" class="form-control">
<<<<<<< HEAD
              
                <?php foreach ($data_cn as $info1) { ?>
                  <option value="<?= $info1['machuyennganh'] ?>" <?php if($info['chuyennganh'] == $info1['machuyennganh']) echo 'selected';?>><?= $info1['tenchuyennganh'] ?></option>
=======

                <?php foreach ($data_cn as $info1) { ?>
                  <option value="<?= $info1['machuyennganh'] ?>" <?php if ($info['chuyennganh'] == $info1['machuyennganh']) echo 'selected'; ?>><?= $info1['tenchuyennganh'] ?></option>
>>>>>>> d3627d04dfc15cae2b9e99fe15c4e60caf1afc87
                <?php } ?>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      <button type="button" id="capnhatmonhoc" class="btn btn-success">Cập Nhật</button>
    </div>
  </div>


</div>

<script>
  $(document).ready(function() {
    $("#capnhatmonhoc").click(function() {
      var malop_kt = $("input[name='malop_kt']").val();
      var tenlop_kt = $("input[name='tenlop_kt']").val();
      var chuyennganh = $("select[name='chuyennganh_kt']").val();
      // alert(tenlop_kt)
      $('#SuaMonHoc').modal('hide');
      $.get("./index.php", {
        controller: "daotao",
        action: "capnhatlop",
        malop: malop_kt,
        tenlop: tenlop_kt,
        chuyennganh: chuyennganh
      }, function(data) {
        $("#info").html(data);
        location.reload();
      })


    });
  });
</script>