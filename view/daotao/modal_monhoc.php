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
            <td class="modal-td" width="30%">Mã Môn:</td>
            <td class="modal-td"><input autocomplete="off" type="text" class="form-control" id="mamon_kt" name="mamon_kt" value="<?= $info['mamon'] ?>" readonly></td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Tên Môn</td>
            <td class="modal-td"><input autocomplete="off" type="text" class="form-control" id="tenmon_kt" name="tenmon_kt" value="<?= $info['tenmon'] ?>"></td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Số TC:</td>
            <td class="modal-td"><input autocomplete="off" type="text" class="form-control" id="sotinchi_kt" name="sotinchi_kt" value="<?= $info['sotinchi'] ?>"></td>
          </tr>

          <tr>
            <td class="modal-td" width="30%">Chuyên ngành:</td>
            <td class="modal-td">
              <select id="chuyennganh_kt" name="chuyennganh_kt" class="form-control">

                <?php foreach ($chuyennganh as $info1) { ?>
                  <option value="<?= $info1['machuyennganh'] ?>" <?php if ($info['chuyennganh'] == $info1['machuyennganh']) echo 'selected'; ?>><?= $info1['tenchuyennganh'] ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Thứ:</td>
            <td class="modal-td"><select id="thu_kt" name="thu_kt" class="form-control">
                <option value="Thứ 2">Thứ 2</option>
                <option value="Thứ 3">Thứ 3</option>
                <option value="Thứ 4">Thứ 4</option>
                <option value="Thứ 5">Thứ 5</option>
                <option value="Thứ 6">Thứ 6</option>
                <option value="Thứ 7">Thứ 7</option>
              </select></td>
          </tr>
          <tr>
            <td class="modal-td" width="30%">Ca:</td>
            <td class="modal-td"><select id="ca_kt" name="ca_kt" class="form-control">
                <option value="1-2">1-2</option>
                <option value="1-3">1-3</option>
                <option value="1-5">1-5</option>
                <option value="6-7">6-7</option>
                <option value="6-9">6-9</option>
                <option value="6-10">6-10</option>
              </select></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      <button type="button" id="capnhatmonhoc" class="btn btn-success" data-dismiss="modal">Cập Nhật</button>
    </div>
  </div>


</div>

<script>
  $(document).ready(function() {
    $("#capnhatmonhoc").click(function() {
      var mamon = $("input[name='mamon_kt']").val();
      var tenmon = $("input[name='tenmon_kt']").val();
      var sotinchi = $("input[name='sotinchi_kt']").val();
      var chuyennganh = $("select[name='chuyennganh_kt']").val();
      var thu = $("select[name='thu_kt']").val();
      var ca = $("select[name='ca_kt']").val();
      $.get("./index.php", {
        controller: "daotao",
        action: "capnhatmonhocdaotao",
        mamon: mamon,
        tenmon: tenmon,
        sotinchi: sotinchi,
        chuyennganh: chuyennganh,
        thu: thu,
        ca: ca
      }, function(data) {
        $("#info").html(data);
        alert("Cập nhật thành công");
      })


    });
  });
</script>