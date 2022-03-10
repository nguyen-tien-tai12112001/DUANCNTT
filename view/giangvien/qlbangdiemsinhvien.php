
<table class="grid" cellspacing="0" id="ctl00_c_GridDC" style="
                          border-style: None;
                          width: 100%;
                          border-collapse: collapse;
                        ">

                <tr style="background-color: #e4e8e9;">
                <th style="border: 1px solid #dddddd;
            text-align: center;
            padding: 5px;">
                    Mã SV
                </th>
                    <th style="border: 1px solid #dddddd;
                text-align: center;
                padding: 5px;">
                        Họ và tên
                    </th>
                    <th style="border: 1px solid #dddddd;
                text-align: center;
                padding: 5px;">
                        Môn học
                    </th>
                    <th style="border: 1px solid #dddddd;
                text-align: center;
                padding: 5px;">
                        Điểm QT
                    </th>
                    <th style="border: 1px solid #dddddd;
                text-align: center;
                padding: 5px;">
                        Điểm CK
                    </th>
                    <th style="border: 1px solid #dddddd;
                text-align: center;
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
                <?php if($svl2!=0){ $stt=0; foreach ($svl2 as $info){ $stt++; ?>
                    <tr>
                <td class="masinhvien<?= $stt?>" id="<?= $info['masinhvien']?>" name="masinhvien" style="border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;">
                    <?= $info['masinhvien']?>
                </td>
                    <td class="hovaten<?= $stt?>" id="<?= $info['hovaten']?>"name="hovaten" style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                        <?= $info['hovaten']?>
                    </td>
                    <td class="tenmon<?= $stt?>" id="<?= $info['tenmon']?>" name="tenmon" style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                        <?= $info['tenmon']?>
                    </td>
                    <td  style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                        <input id="diemquatrinh<?= $stt?>" name="diemquatrinh<?= $stt?>" style="background-color: #f3f6f7; border: none;" value="<?= $info['diemquatrinh']?>" type="number" step="0.01" min="0"
                            max="10">
                    </td>
                    <td  style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                        <input id="diemcuoiky<?= $stt?>" name="diemcuoiky<?= $stt?>"t style="background-color: #f3f6f7; border: none;" value="<?= $info['diemcuoiky']?>" type="number" step="0.01" min="0"
                            max="10">
                    </td>
                    <td name="diemtongket" style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">
                        <p class="text-center" style="background-color: #f3f6f7; border: none;" ><?= $info['diemtongket']?></p>
                    </td>
                    <td name="">
                            <button style="margin: 0 2px 0 2px;" class="btn capnhat" id="<?= $stt ?>"> Cập nhật</button>
                        </td>
                </tr>      
                <?php }} ?>
                </div>
                
            </table>