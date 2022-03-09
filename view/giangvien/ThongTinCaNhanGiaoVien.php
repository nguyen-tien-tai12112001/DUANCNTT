<?php if ($_SESSION['role_id'] == "2") {
  require_once('./view/layouts/headerGiaoVien.php');
} else {
  require_once('./view/layouts/headerDaoTao.php');
}
if ($_SESSION['role_id'] == "1") {
  require_once("./view/sinhvien/ThongTinCaNhan.php");
} ?>

<style>
  .modal-td {
    padding: 10px;
  }

  .btnTimKiem {
    z-index: 1;
    position: relative;
    font-size: inherit;
    font-family: inherit;
    color: white;
    padding: 0.5em 1em;
    outline: none;
    border: none;
    background-color: hsl(236, 32%, 26%);
    overflow: hidden;
    transition: color 0.4s ease-in-out;
  }

  .btnTimKiem::before {
    content: '';
    z-index: -1;
    position: absolute;
    top: 100%;
    right: 100%;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    background-color: #05c20f;
    transform-origin: center;
    transform: translate3d(50%, -50%, 0) scale3d(0, 0, 0);
    transition: transform 0.45s ease-in-out;
  }

  .btnTimKiem:hover {
    cursor: pointer;
    color: #161616;
  }

  .btnTimKiem:hover::before {
    transform: translate3d(50%, -50%, 0) scale3d(15, 15, 15);
  }
  
  .table td {
    font-size: 18px;
    padding:5px 0px;
  }
  .table input {
    font-size: 18px;
    padding:5px 0px;
  }
</style>
<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px;">
  <div class="title">Thông tin giáo viên</div>
  <div class="entry flex">
    <?php if ($data['image']) : ?>
      <img src="<?= $data['image']; ?>" class="avatar" alt="Avatar" width="200" height="300">
    <?php else : ?>
      <img src="data:image/jpeg;base64,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" class="avatar" alt="Avatar" width="200" height="200">
    <?php endif; ?>

    <div class="information">
      <table style="text-align: left;" width="100%">
        <tbody class="table">
          <tr>
            <td width="30%">Mã giáo viên:</td>
            <td><?= $data['magiangvien'] ?></td>
          </tr>
          <tr>
            <td width="30%">Họ Tên:</td>
            <td><?= $data['hovaten'] ?></td>
          </tr>
          <tr>
            <td width="30%">Giới tính:</td>
            <td><?= $data['gioitinh'] ?></td>
          </tr>
          <tr>
            <td width="30%">Số CMND/CCCD:</td>
            <td><?= $data['cmnd'] ?></td>
          </tr>
          <tr>
            <td width="30%">Ngày sinh:</td>
            <td><?= $data['ngaysinh'] ?></td>
          </tr>
          <!-- <tr>
                  <td width="30%">Bộ môn:</td>
                  <td>TT32h4</td>
                </tr>
                <tr>
                  <td width="30%">Chức vụ:</td>
                  <td>Giáo viên thục tập</td>
                </tr> -->
          <tr>
            <td>Điện thoại:</td>
            <td><?= $data['dienthoai'] ?></td>
          </tr>
          <tr>
            <td>Email giáo viên:</td>
            <td><?= $data['email'] ?></td>
          </tr>
          <tr>
            <td>Địa chỉ:</td>
            <td><?= $data['diachi'] ?></td>
          </tr>
        </tbody>
      </table>
      <button style="color: white;" type="button" data-toggle="modal" data-target="#myModal" class="btnTimKiem btn">Cập nhật</button>
    </div>
  </div>
</div>

<!-- End Right -->
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cập nhật thông tin giáo viên</h4>
      </div>
      <form id="update" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <!-- <p>Some text in the modal.</p> -->
          <table width="100%">
            <tbody class="table">
              <tr>
                <td class="modal-td" width="30%">Ảnh:</td>
                <td class="modal-td"> <input class="form-control" value="<?= $data['image'] ?>" name="image" type="text" id="image" placeholder="Ảnh"></td>
              </tr>
              <tr>
                <td class="modal-td" width="30%">Giới tính:</td>
                <td class="modal-td">
                  <select class="form-control" id="gioitinh" name="gioitinh">
                    <option value="Nam" <?php if ($data['gioitinh'] == 'Nam') {
                                          echo ' selected';
                                        } ?>>Nam</option>
                    <option value="Nữ" <?php if ($data['gioitinh'] == 'Nữ') {
                                          echo ' selected';
                                        } ?>>Nữ</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="modal-td" width="30%">Số CMND/CCCD:</td>
                <td class="modal-td"> <input class="form-control" value="<?= $data['cmnd'] ?>" name="cmnd" type="number" id="cmnd" placeholder="Số CMND/CCCD"></td>
              </tr>
              <tr>
                <td class="modal-td">Điện thoại:</td>
                <td class="modal-td"> <input class="form-control" value="<?= $data['dienthoai'] ?>" name="dienthoai" type="number" id="dienthoai" placeholder="Điện thoại"></td>
              </tr>
              <tr>
                <td class="modal-td">Email :</td>
                <td class="modal-td"> <input class="form-control" value="<?= $data['email'] ?>" name="email" type="text" id="email" placeholder="Email SV" readonly></td>
              </tr>
              <tr>
                <td class="modal-td">Chỗ ở hiện nay:</td>
                <td class="modal-td"> <input class="form-control" value="<?= $data['diachi'] ?>" name="diachi" type="text" id="diachi" placeholder="Chỗ ở hiện nay"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="alert"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-success" >OK</button>
        </div>
      </form>

    </div>
  </div>
  <script type="text/javascript">
	$("#update").submit(function(e){
			e.preventDefault();
		
			
			let image = $("input[name='image']").val();
			
			var gioitinh = $('#gioitinh').val();
      var CMND = $('#cmnd').val();
      
      var phone = $('#dienthoai').val();
      var email = $('#email').val();
      var diachi = $('#diachi').val();
      
			
			
			if(image == null || image == "")
			{
				$("#alert").html('<strong class="text-danger">Ảnh không được để trống</strong>'); 
				$("input[name='image']").focus();
				return;
			}
			
			else if (CMND == null || CMND == "") {
        $("#alert").html('<strong class="text-danger">CMND không được để trống</strong>');
        $("input[name='cmnd']").focus();
        return;
      } else if (CMND.length < 12 || CMND.length > 12) {
        $("#alert").html('<strong class="text-danger">CMND bao gồm 12 kí tự</strong>');
        $("input[name='cmnd']").focus();
        return;
      } else if (isNaN(CMND)) {
        $("#alert").html('<strong class="text-danger">CMND phải là số</strong>');
        $("input[name='cmnd']").focus();
        return;
      }
      else if (phone == null || phone == "") {
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
      }else if (diachi == null || diachi == "") {
            $("#alert").html('<strong class="text-danger">Địa chỉ không được để trống</strong>');
            $("input[name='diachi']").focus();
            return;
      } 
		
			else
			{
        
				const url = $(this).attr("action");
        
			    		$.ajax({		        
    				        url ,
    				        method: "POST",
    				        data: {
                                image : image,
                                gioitinh : gioitinh,
                                CMND : CMND,
                                phone : phone,
                                email : email,
                                diachi : diachi
                            },
                            
                            success: function (data) {
                              location.reload() 
				        },
				   		});		   		  
				
			}
						  
		});
	
</script>