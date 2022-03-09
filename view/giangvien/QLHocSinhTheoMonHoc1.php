<table class="grid" cellspacing="0" class="chitiet" id="ctl00_c_GridDC" style="
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
                    <?php if($data1!=0){ $i=0; foreach($data1 as $value){$i++; ?>
                        <tr>
                            <td  class="text-center">
                                <?= $value['masinhvien']?>
                            </td>
                            <td  class="text-center">
                                <?= $value['hovaten']?>
                            </td>
                            <td  class="text-center">
                                <script>
                                $(function(){
                                    $('#sapxep<?= $i?>').trigger('change'); //This event will fire the change event. 
                                        $('#sapxep<?= $i?>').change(function(){
                                            var data="<?= $value['masinhvien']?>";
                                            var data1="<?= $value['mamon']?>";
                                            var data2= $(this).val();
                                            var thongbao="Cập nhật thành công";
                                            alert(thongbao);
                                            $.get("./index.php",{controller:"giangvien",action:"capnhattheotrangthai", masinhvien:data, mamon:data1, trangthai:data2}, function(data) {
                                            
                                        })                                                                                     
                                    });
                                });
                                </script>
                                <select class="form-control" id="sapxep<?= $i?>">
                                    <?php if($value['trangthai']==1){?>
                                    <option>Đang học</option>
                                    <option>Cấm thi</option>
                                    <?php } else{?>
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
                                    <span style="padding: 5px; ">Đánh Giá</span>
                                </Button>

                                <Button class="chitiet" id="<?= $value['masinhvien']?>" style="margin-left: 5px;" type="button" data-toggle="modal"
                                    data-target="#myModal1">
                                    <span style="padding: 5px; ">Chi Tiêt</span>
                                </Button>

                               
                            </td>
                        </tr>
                        <?php }}?>
                        <script>
                        $(document).ready(function(){
                            $("button.chitiet").click(function(){
                                    var masinhvien=$(this).attr("id")
                                    $.get("./index.php",{controller:"giangvien",action:"QLHocSinhTheoMonHoc", msv:masinhvien}, function(data) {
                                    $("#myModal1").html(data);
                                })                                                                                     
                            });
                        });
                        </script>
                    </table>