<div class="modal-dialog" style="width: 60%;">
<!-- Modal content chi tiết-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chi Tiết Sinh Viên</h4>
    </div>
    <div class="modal-body">
  <div class="entry flex">
  <?php if ($info['image']) { ?>
    <img src="<?= $info['image']; ?>" class="avatar" alt="Avatar" width="100" height="300">
<?php } else { ?>
    <img src="https://img.wattpad.com/8f19b412f2223afe4288ed0904120a48b7a38ce1/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f5650722d38464e2d744a515349673d3d2d3234323931353831302e313434336539633161633764383437652e6a7067?s=fit&w=720&h=720" class="avatar" alt="Avatar" width="150" height="150">
    <?php } ?>
        <table width="50%" style="margin-left:20px;">

            <tbody class="table">
                <tr>
                    <td class="modal-td" width="50%">Mã Sinh Viên:</td>
                    <td class="modal-td">
                        <p><?=$info['masinhvien']?></p>
                    </td>
                </tr>
                <td class="modal-td" width="50%">Giới tính:</td>
                <td class="modal-td">
                    <p><?=$info['gioitinh']?></p>
                </td>
                </tr>
                <tr>
                    <td class="modal-td" width="50%">Số CMND/CCCD:</td>
                    <td class="modal-td">
                        <p><?=$info['cmnd']?></p>
                    </td>
                </tr>
                <tr>
                    <td class="modal-td" width="50%">Ngày sinh:</td>
                    <td class="modal-td">
                        <p><?=$info['ngaysinh']?></p>
                    </td>
                </tr>
                <tr>
                    <td class="modal-td">Điện thoại:</td>
                    <td class="modal-td">
                        <p><?=$info['dienthoai']?></p>
                    </td>
                </tr>
                <tr>
                    <td class="modal-td">Email SV:</td>
                    <td class="modal-td">
                        <p><?=$info['email']?></p>
                    </td>
                </tr>
                <tr>
                    <td class="modal-td">Chuyên Ngành:</td>
                    <td class="modal-td">
                        <p> <?php
              foreach ($data_cn as $CN) {
                  if($CN['machuyennganh'] == $info['chuyennganh'] )
                  {
                    echo  $CN['tenchuyennganh'] ;
                  }
                
            }
            ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="modal-td">Giáo viên CN:</td>
                    <td class="modal-td">
                        <p><?=$info['hvt']?></p>
                    </td>
                </tr>

                <tr>
                    <td class="modal-td">Địa chỉ :</td>
                    <td class="modal-td">
                        <p><?=$info['diachi']?></p>

                    </td>
                </tr>
            </tbody>
        </table>

</div>
        
        
        <table cellspacing="3" cellpadding="0" width="100%">
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
                                        <th scope="col">STT</th>
                                        <th scope="col" style="white-space: nowrap">
                                            Mã HP
                                        </th>
                                        <th scope="col">Tên HP</th>
                                        <th scope="col" style="white-space: nowrap">
                                            Số TC
                                        </th>
                                        <th scope="col">Điểm quá trình</th>
                                        <th scope="col">Điểm thi</th>
                                        <th scope="col">Điểm tổng</th>
                                    </tr>
                                    <<?php
                                    $stt=1;
                                    if($data != []){
                                    foreach($data as $value){ ?>
                                        <tr>
                                        <td><?php echo $stt++;?></td>
                                        <td><?php echo $value['mamon'];?></td>
                                        <td><?php echo $value['tenmon'];?></td>
                                        <td align="center"><?php echo $value['sotinchi'];?></td>
                                        <td align="center"><?php echo $value['diemquatrinh'];?></td>
                                        <td align="center"><?php echo $value['diemcuoiky'];?></td>
                                        <td align="center"><?php echo $value['diemtongket'];?></td>
                                        </tr>
                                    <?php }}?>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <b>Tổng số tín chỉ tích lũy: </b><span id="ctl00_c_lblTongSoTinChiTichLuy"><?php echo $tongtin['tongtin']; ?></span>
        <br />
        <b>Trung bình chung tích lũy: </b><span id="ctl00_c_lblTrungBinhTrungTichLuy"><?php if($tongtin['tongtin']==0){echo "";} else{ echo round($tongdiem['tongdiem'] / $tongtin['tongtin'], 2);} ?></span>
        <br />
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
    </div>