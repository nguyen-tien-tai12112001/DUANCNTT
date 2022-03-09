<?php require_once('./view/layouts/headerDaoTao.php'); ?>
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

  td {
    text-align: center;
  }
</style>
<div id="right" style="width: 100%;margin-left:10px;">
  <div class="title">
    Xếp Lịch Thi

  </div>
  <div class="form form-tkb">
    <div class="chuyen-nganh">
      <p>Chọn chuyên ngành:</p>
      <select class="form-control" id="sapxep_loclt">
        <script>
          $(function() {
            $('#sapxep_loclt').trigger('change'); //This event will fire the change event. 
            $('#sapxep_loclt').change(function() {
              var data = $(this).val();
              $.get("./index.php", {
                controller: "daotao",
                action: "xeplichthi_loccn",
                info1: data
              }, function(data) {
                $("#info").html(data);
              })
            });
          });
        </script>
        <option>Tất cả</option>
        <?php foreach ($datacn as $cn) { ?>
          <option><?= $cn['tenchuyennganh'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="tim-kiem">
      <input id="timkiem" type="text" placeholder="Nhập mã môn,tên môn">
      <button id="timkiemlich" class="btnTimKiem">Tìm kiếm</button>
      <script>
        $(document).ready(function() {
          $("#timkiemlich").click(function() {
            var data = $('#timkiem').val();
            $.get("./index.php", {
              controller: "daotao",
              action: "lichthi_timkiem",
              key: data
            }, function(data) {
              $("#info").html(data);
            })
          });
        });
      </script>
    </div>
  </div>


  <table id="info" cellspacing="3" cellpadding="0" width="100%">
    <tbody>
      <tr valign="top">
        <td style="width: 100%">
          <div>
            <table class="grid" cellspacing="0" id="ctl00_c_GridDC" style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                        ">
              <tbody>
                <tr>
                  <th class="text-center">STT</th>
                  <th class="text-center" style="white-space: nowrap">
                    Mã Môn
                  </th>
                  <th class="text-center">Tên Môn</th>
                  <th class="text-center">Ngày Thi</th>
                  <th class="text-center">Ca Thi</th>
                  <th class="text-center">Trạng Thái</th>
                </tr>
                <?php $i = 0;
                foreach ($mon as $value) {
                  $i++ ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $value['mamon'] ?></td>
                    <td><?= $value['tenmon'] ?></td>
                    <td>
                      <input id="ngaythi<?= $i ?>" value="<?= date($value['ngaythi']) ?>" type="date" />

                    </td>
                    <td><select id="ca<?= $i ?>" class="form-control">
                        <?php if($value['cathi'] == '')
                        {
                          
                          echo '<option >Chưa có ca thi</option>'; 
                        }
                        else{
                          echo '<option >'.$value['cathi'].'</option>'; 
                        }?>
                        
                        <option>1-2</option>
                        <option>1-3</option>
                        <option>1-5</option>
                        <option>6-7</option>
                        <option>6-9</option>
                        <option>6-10</option>
                      </select></td>
                    <td><Button id="btcapnhalichthi<?= $i ?>" class="btnTimKiem">Cập Nhập</Button></td>
                    <script>
                      $(document).ready(function() {
                        $("#btcapnhalichthi<?= $i ?>").click(function() {
                          var data = "<?= $value['mamon'] ?>";
                          var data1 = $(ngaythi<?= $i ?>).val();
                          var data2 = $(ca<?= $i ?>).val();
                          
                          if(data == null || data == "")
                          {
                            alert("Môn học không được để trống");
                            return;
                          }
                          else if(data1 == null || data1 == "")
                          {
                            alert("Ngày thi không được để trống");
                            return;
                          }
                          else if(data2 == "Chưa có ca thi" )
                          {
                            alert("Ca thi không được để trống");
                            return;
                          }
                          else
                          {
                            var thongbao = "Cập nhật thành công";
                          alert(thongbao);
                          $.get("./index.php", {
                            controller: "daotao",
                            action: "capnhatlichthi",
                            mamon: data,
                            ngaythi: data1,
                            cathi: data2
                          }, function(data) {})
                          }
                         
                        });
                      });
                    </script>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

</div>
</div>

<!-- End Right -->
</div>

</body>

</html>