 <div class="modal-dialog">

   <!-- Modal-->
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title">Cập nhập chuyên ngành</h4>
     </div>

     <div class="modal-body">
       <!-- <p>Some text in the modal.</p> -->
       <table width="100%">
         <tbody id="" class="table">
           <tr>
             <td class="modal-td" width="30%">Mã chuyên ngành:</td>
             <td class="modal-td"><input autocomplete="off" type="text" class="form-control" id="machuyennganh" name="machuyennganh" value="<?= $info['machuyennganh'] ?>" readonly></td>
           </tr>
           <tr>
             <td class="modal-td" width="30%">Tên chuyên ngành</td>
             <td class="modal-td"><input autocomplete="off" type="text" class="form-control" id="tenchuyennganh" name="tenchuyennganh" value="<?= $info['tenchuyennganh'] ?>"></td>
           </tr>

         </tbody>
       </table>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
       <button type="button" id="capnhatchuyennganh" class="btn btn-success" data-dismiss="modal">Cập Nhật</button>
     </div>
   </div>


 </div>
 <script>
   $(document).ready(function() {
     $("#capnhatchuyennganh").click(function() {
       var machuyennganh = $("input[name='machuyennganh']").val();
       var tenchuyennganh = $("input[name='tenchuyennganh']").val();
       //alert(tenchuyennganh);
       //alert(machuyennganh+tenchuyennganh);
       if (machuyennganh == null || machuyennganh == "") {
         alert("Mã chuyên ngành không được để trống");
         return;
       } else if (tenchuyennganh == null || tenchuyennganh == "") {
         alert("Tên chuyên nganh không được để trống");
         return;
       }
       $.get("./index.php", {
         controller: "daotao",
         action: "capnhatchuyennganh",
         machuyennganh: machuyennganh,
         tenchuyennganh: tenchuyennganh
       }, function(data) {
         $("#info").html(data);
         alert("Cập nhật thành công");
       })
     });
   });
 </script>