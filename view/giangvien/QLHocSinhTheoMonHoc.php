<?php require_once('./view/layouts/headerGiaoVien.php'); ?>
<style>
        #bangdiem1 td{
            text-align: center;
        }
        #bangdiem1 th{
            text-align: center;
        }
    button {
        z-index: 1;
        position: relative;
        font-size: inherit;
        font-family: inherit;
        color: white;
        padding: 0.5em 1em;
        outline: none;
        border: none;
        background-color: hsl(236, 32%, 26%);
        border: 1px;
        border-radius: 2px;
    }

    button::before {
        content: '';
        z-index: -1;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #fc2f70;
        transform-origin: center bottom;
        transform: scaleY(0);
        transition: transform 0.25s ease-in-out;
    }

    button:hover {
        cursor: pointer;
    }

    button:hover::before {
        transform-origin: center top;
        transform: scaleY(1);
    }

    .container_timkiem {
        display: flex;
        justify-content: space-between;
    }

    .right_timkiem {
        position: relative;
    }
    .chitiet tr{
        font-size: 18px;
    }
</style>
<!-- Right -->
<div id="right" style="width: 100%; margin-left:10px;">
    <div class="title">Quản lý lớp học</div>
    <div class="entry">
        <div class="container_timkiem">
            <div style="display: flex;">
            

                <p style="width:120px;font-size:18px;">Chọn môn học:</p>
                <select class="form-control" style="width:200px" class="form-control" id="mamon">
                    <script>
                        $(function() {
                            $('#mamon').trigger('change'); //This event will fire the change event. 
                            $('#mamon').change(function() {
                                var data = $(this).val();
                                $.get("./index.php", {
                                    controller: "giangvien",
                                    action: "sxtheomon",
                                    info: data
                                }, function(data) {
                                    $("#bangdiem1").html(data);
                                })
                            });
                        });
                    </script>
                    <?php
                    if ($mon == []) {
                        echo '<option class="a" id="">Chưa được phân công</option>';
                    } else {
                        echo '<option class="a" id="Tất cả">Tất cả</option>';
                    }
                    ?>


                    <?php foreach ($mon as $monhoc) { ?>
                        <option class="a" id="<?= $monhoc['tenmon'] ?>"><?php echo $monhoc['tenmon']; ?></option>
                    <?php } ?>
                </select>
            </div>
            

            <div class="right_timkiem">
                <input id="timkiem" style="padding-left: 20px; height: 35px;" type="text" placeholder="Tìm kiếm" />
                <button id="bttimkiem" style=" position: absolute;right: 0px; height: 35px;bottom: 0px;top: 0px;padding: 0 10px 0 10px;">
                    Tìm
                </button>
            </div>

        </div>
        <div>
            <script>
                $(function() {
                    $('#timkiem').trigger('change'); //This event will fire the change event. 
                    $('#timkiem').change(function() {
                        var data = $(this).val();
                        $.get("./index.php", {
                            controller: "giangvien",
                            action: "timkiem1",
                            info: data
                        }, function(data) {
                            $("#bangdiem1").html(data);
                        })
                    });
                });
                $(function() {
                    $('#bttimkiem').trigger('click'); //This event will fire the change event. 
                    $('#bttimkiem').click(function() {
                        var data = $('#timkiem').val();
                        $.get("./index.php", {
                            controller: "giangvien",
                            action: "timkiem1",
                            info: data
                        }, function(data) {
                            $("#bangdiem1").html(data);
                        })
                    });
                });
            </script>


            <div style="margin-top: 10px;" class="container_timkiem">
                <div style="display: flex;">
                    <p style="width:120px;font-size:18px;">Chọn tình trạng:</p>
                    <select class="form-control" style="width:200px" class="form-control" id="sapxep">
                        <script>
                            $(function() {
                                $('#sapxep').trigger('change'); //This event will fire the change event. 
                                $('#sapxep').change(function() {
                                    var data = $(this).val();
                                    $.get("./index.php", {
                                        controller: "giangvien",
                                        action: "sxtheotrangthai",
                                        info1: data
                                    }, function(data) {
                                        $("#bangdiem1").html(data);
                                    })
                                });
                            });
                        </script>
                        <option>Tất cả</option>
                        <option>Đang Học</option>
                        <option>Cấm thi</option>
                    </select>
                </div>
                <button>
                    Xuất file
                </button>
            </div>


        </div>
        

        <div id="bangdiem1">
            <table class="grid" cellspacing="0" id="ctl00_c_GridDC" style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                        ">
                <tr style="background-color: #e4e8e9">
                    <th  class="text-center">
                        Mã sinh viên
                    </th>
                    <th  class="text-center">
                        Họ tên
                    </th>
                    <th  class="text-center">
                        Tình trạng
                    </th>
                    <th  class="text-center"></th>
                </tr>
                <?php $i = 0;
                foreach ($data as $value) {
                    $i++; ?>
                    <tr>
                        <td  class="text-center">
                            <?= $value['masinhvien'] ?>
                        </td>
                        <td  class="text-center">
                            <?= $value['hovaten'] ?>
                        </td>
                        <td  class="text-center">
                            <script>
                                $(function() {
                                    $('#sapxep<?= $i ?>').trigger('change'); //This event will fire the change event. 
                                    $('#sapxep<?= $i ?>').change(function() {
                                        var data = "<?= $value['masinhvien'] ?>";
                                        var data1 = "<?= $value['mamon'] ?>";
                                        var data2 = $(this).val();
                                        var thongbao = "Cập nhật thành công";
                                        alert(thongbao);
                                        $.get("./index.php", {
                                            controller: "giangvien",
                                            action: "capnhattheotrangthai",
                                            masinhvien: data,
                                            mamon: data1,
                                            trangthai: data2
                                        }, function(data) {

                                        })
                                    });
                                });
                            </script>
                            <select  class="form-control" style="width:130px" id="sapxep<?= $i ?>">
                                <?php if ($value['trangthai'] == 1) { ?>
                                    <option>Đang học</option>
                                    <option>Cấm thi</option>
                                <?php } else { ?>
                                    <option>Cấm thi</option>
                                    <option>Đang học</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td style="
                                 border: 1px solid #dddddd;
                                 text-align: center;
                                 padding: 8px;
                                ">

                            <Button type="button" data-toggle="modal" data-target="#myModal2">
                                <span">Đánh Giá</span>
                            </Button>

                            <Button class="chitiet" id="<?= $value['masinhvien'] ?>" style="margin-left: 5px;" type="button" data-toggle="modal" data-target="#myModal1">
                                <span">Chi Tiêt</span>
                            </Button>


                        </td>
                    </tr>
                <?php } ?>
                <script>
                    $(document).ready(function() {
                        $("button.chitiet").click(function() {
                            var masinhvien = $(this).attr("id")
                            $.get("./index.php", {
                                controller: "giangvien",
                                action: "QLHocSinhTheoMonHoc",
                                msv: masinhvien
                            }, function(data) {
                                $("#myModal1").html(data);
                            })
                        });
                    });
                </script>
            </table>
        </div>
        <?php if ($data == []) : ?>
            <div>Chưa có sinh viên<div>
                <?php endif; ?>

                </div>

                <!-- End Right -->
            </div>
            <!-- End Page -->

            <!-- Modal chi tiết -->
            <div class="modal fade" id="myModal1" role="dialog">
            </div>



            <!-- Modal đánh giá -->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Đánh Giá Sinh Viên</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <p>Some text in the modal.</p> -->
                            <table width="100%">
                                <tbody class="table">
                                    <tr>
                                        <td class="modal-td">Điểm rèn luyện</td>
                                        <td class="modal-td">
                                            <select class="form-control">
                                                <option value="">Giỏi</option>
                                                <option value="">Khá</option>
                                                <option value="">Trung Bình</option>
                                                <option value="">Kém</option>
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="modal-td">Ý Thức</td>
                                        <td class="modal-td">
                                            <select class="form-control">
                                                <option value="">Giỏi</option>
                                                <option value="">Khá</option>
                                                <option value="">Trung Bình</option>
                                                <option value="">Kém</option>
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="modal-td">Lời văn</td>
                                        <td class="modal-td">
                                            <textarea name="" id="" class="form-control"></textarea>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                        </div>
                    </div>


                    </body>

                    </html>