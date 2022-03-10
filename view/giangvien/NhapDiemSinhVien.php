<?php require_once('./view/layouts/headerGiaoVien.php'); ?>
<style>
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
</style>

<!-- Right -->
<div id="right" style="width:100%;margin-left:10px ">
    <div class="title">Nhập điểm sinh viên</div>
    <div class="entry">
        <div class="container_timkiem">
            <div style="display: flex;">
                <p style="width:200px;font-size:18px;">Chọn môn học:</p>
                <select class="form-control"  id="mamon">
                <script>
                        $(function() {
                            $('#mamon').trigger('change'); //This event will fire the change event. 
                            $('#mamon').change(function() {
                                var data = $(this).val();
                                $.get("./index.php", {
                                    controller: "giangvien",
                                    Ajax_action: "bangdiem",
                                    info: data
                                }, function(data) {
                                    $("#bangdiem").html(data);
                                })
                            });
                        });
                    </script>
                     <option class="a" id="Tất cả">Tất cả</option>
                    <?php foreach ($mon as $monhoc) { ?>
                        <option class="a"><?php echo $monhoc['tenmon']; ?></option>
                    <?php } ?>
                    
                </select>
            </div>
            

            <div class="right_timkiem">
                <input id="timkiem_kt" style="padding-left: 20px; height: 35px;" type="text" placeholder="Nhập MSV hoặc tên" />
                <button id="bttimkiem" style=" position: absolute;right: 0px; height: 35px;bottom: 0px;top: 0px;padding: 0 10px 0 10px;">
                    Tìm
                </button>
            </div>

        </div>

        <script>
            $(function() {
                $('#bttimkiem').trigger('click'); //This event will fire the change event. 
                $('#bttimkiem').click(function() {
                    var data = $('#timkiem_kt').val();
                    $.get("./index.php", {
                        controller: "giangvien",
                        action: "timkiem",
                        info: data
                    }, function(data) {
                        $("#bangdiem").html(data);
                    })
                });
            });
        </script>


        
       
            
        
        <div style="margin-top: 10px;" class="container_timkiem">
                <div style="display: flex;">
                    <p style="width:250px;font-size:18px;">Sắp xếp theo điểm:</p>
                    <select class="form-control"  id="sapxep">
                    <script>
                        $(function() {
                            $('#sapxep').trigger('change'); //This event will fire the change event. 
                            $('#sapxep').change(function() {
                                var data = $(this).val();
                                $.get("./index.php", {
                                    controller: "giangvien",
                                    action: "sapxep",
                                    info: data
                                }, function(data) {
                                    $("#bangdiem").html(data);
                                })
                            });
                        });
                    </script>
                    <option>Thấp -> cao</option>
                    <option>Cao -> thấp</option>
                </select>
                </div>
                
            </div>


    </div>
    <div id="bangdiem">
        <table class="grid" cellspacing="0" id="ctl00_c_GridDC" style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                          margin-top:10px
                        ">

            <tr style="background-color: #e4e8e9;">
                <th style="border: 1px solid #dddddd;
                text-align: center;width:140px;
                padding: 5px;">
                    Mã SV
                </th>
                <th style="border: 1px solid #dddddd;
                text-align: center;width:16%;
                padding: 5px;">
                    Họ và tên
                </th>
                <th style="border: 1px solid #dddddd;
                text-align: center;width:200px;
                padding: 5px;">
                    Môn học
                </th>
                <th style="border: 1px solid #dddddd;
                text-align: center;width:110px;
                padding: 5px;">
                    Điểm QT
                </th>
                <th style="border: 1px solid #dddddd;
                text-align: center;width:110px;
                padding: 5px;">
                    Điểm CK
                </th>
                <th style="border: 1px solid #dddddd;
                text-align: center;width:20%;
                padding: 5px;">
                    Điểm tổng kết
                </th>
                <th style="border: 1px solid #dddddd;
                text-align: center;
                padding: 5px;">

                </th>
            </tr>
            <script>
                $(document).ready(function() {
                    $("button.capnhat").click(function() {
                        var masinhvien = ".masinhvien" + $(this).attr("id");
                        var tenmon = ".tenmon" + $(this).attr("id");
                        var diemquatrinh = "#diemquatrinh" + $(this).attr("id");
                        var diemcuoiky = "#diemcuoiky" + $(this).attr("id");
                        var infomsv = $(`${masinhvien}`).attr('id');
                        var infotm = $(`${tenmon}`).attr('id');
                        var infodqt = $(`${diemquatrinh}`).val();
                        var infodck = $(`${diemcuoiky}`).val();
                        if(infodck !='')
                        {
                            if (parseFloat(infodqt) >= 7 && parseFloat(infodck) > parseFloat(infodqt)) {
                            var infodtk = infodck;
                            } else {
                                var infodtk = infodqt * 0.4 + infodck * 0.6;
                            }
                            $.get("./index.php", {
                                controller: "giangvien",
                                action: "updiem",
                                masinhvien: infomsv,
                                diemquatrinh: infodqt,
                                tenmon: infotm,
                                diemcuoiky: infodck,
                                diemtongket: infodtk
                            }, function(data) {
                                $("#bangdiem").html(data);
                            })
                        }
                        else{
                            $.get("./index.php", {
                                controller: "giangvien",
                                action: "updiem",
                                masinhvien: infomsv,
                                diemquatrinh: infodqt,
                                tenmon: infotm,
                            }, function(data) {
                                $("#bangdiem").html(data);
                            })
                        }
                    });   
                });
            </script>
            <?php if ($svl != "0") {
                $stt = 0;
                foreach ($svl as $info) {
                    $stt++; ?>
                    <tr>
                        <td class="masinhvien<?= $stt ?>" id="<?= $info['masinhvien'] ?>" name="masinhvien" style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                            <?= $info['masinhvien'] ?>
                        </td>
                        <td class="hovaten<?= $stt ?>" id="<?= $info['hovaten'] ?>" name="hovaten" style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                            <?= $info['hovaten'] ?>
                        </td>
                        <td class="tenmon<?= $stt ?>" id="<?= $info['tenmon'] ?>" name="tenmon" style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                            <?= $info['tenmon'] ?>
                        </td>
                        <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                            <input id="diemquatrinh<?= $stt ?>" name="diemquatrinh<?= $stt ?>" style="background-color: #f3f6f7; border: none;" value="<?= $info['diemquatrinh'] ?>" type="number" step="0.01" min="0" max="10">
                        </td>
                        <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                            <input id="diemcuoiky<?= $stt ?>" name="diemcuoiky<?= $stt ?>" t style="background-color: #f3f6f7; border: none;" value="<?= $info['diemcuoiky'] ?>" type="number" step="0.01" min="0" max="10">
                        </td>
                        <td name="diemtongket" style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                            <p class="text-center" style="background-color: #f3f6f7; border: none;"><?= $info['diemtongket'] ?></p>
                        </td>
                        <td name="">
                            <button style="margin: 0 2px 0 2px;" class="btn capnhat" id="<?= $stt ?>"> Cập nhật</button>
                        </td>
                    </tr>
            <?php }
            } else {
                echo "<td >Dữ liệu rỗng </td> ";
            } ?>
    </div>

    </table>
</div>
</div>
</div>

<!-- End Right -->
</div>
<!-- End Page -->
<!-- Footer -->

</body>

</html>