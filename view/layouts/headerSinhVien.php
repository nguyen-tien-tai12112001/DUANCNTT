<?php if (!isset($_SESSION['role_id']) or $_SESSION['role_id'] != "1") {
  header('location:index.php?controller=login&action=login');
}
else if($_SESSION['role_id'] == 4)
{
  header('location:index.php?controller=admin');
}
 ?>
<html>

<head>
  <title> </title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap.min.js"></script> -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script type="text/javascript" src="./view/js/tooltip.js"></script>
  <script type="text/javascript" src="./view/js/thickbox-compressed.js"></script>
  <script src="./view/js/java.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('input.number').keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
        }
      });
      $('#example').DataTable();

    });
  </script>

  
<link href="./App_Themes/abrasive/a10777.css" type="text/css" rel="stylesheet" />
  <link href="./App_Themes/abrasive/em.css" type="text/css" rel="stylesheet" />
 
  <link href="./App_Themes/abrasive/style.css" type="text/css" rel="stylesheet" />
  

  <style>
    .flex {
      display: flex;
      justify-content: space-between;
    }
    .table {
      color:
        #333333;
      font-size:
        12px;
      line-height:
        21.6px;
    }

    .btnUpdate {
      color: #fff;
      margin-top: 15px;
      margin-left: 2px;
      padding: 8px 15px;
      border: none;
      border-radius: 5px;
      background-color: rgb(15, 141, 3);
    }

    .btnUpdate:hover {
      /* color: #ccc; */
      cursor: pointer;
      opacity: 0.7;
    }

    .avatar {
      flex: 1;
    }

    .information {
      margin-left: 20px;
      flex: 2;
    }

    .modal-td {
      padding: 20px;
    }

    .active1 {
      background-color: #ff80c3;
    }

    /* .navSV  li:hover  a{
      background-color: #ff80c3;

    } */
    .navSV li a {
      text-decoration: none;

    }

    .red-input:focus {
      background: yellow;
      color: red;
    }

    body {
      font-size: 16px;
      font-family: 'Times New Roman', Times, serif;
    }
  </style>

</head>

<body>
  <!-- Top -->
  <div id="head">
    <!-- Center COntent -->
    <div class="center" style="width: 90%;">
      <!-- Logo -->
      <div class="logo">
        <img width=" 150px" ; height="150px" src="./App_Themes/abrasive/logo.PNG" alt="">
      </div>
      <!-- End Logo -->
      <!-- User Info -->
      <div class="right" style="width: 100%;">
        <b>Ch??o
          <span id="ctl00_lbUser" style="color: Red"><?php echo $_SESSION['name']; ?> (<?php
                                                                                        if (isset($_SESSION['msv'])) {
                                                                                          echo $_SESSION['msv'];
                                                                                        } else {
                                                                                          echo $_SESSION['mgv'];
                                                                                        }

                                                                                        ?>)</span></b>|
        <a style="text-decoration: none;color: #0f8c12" href="#">Sinh vi??n</a>
        | <a style=" text-decoration: none;" href="?controller=login&action=doimk">?????i m???t kh???u</a> |
        <a style=" text-decoration: none;" href="?controller=login&action=logout">????ng xu???t</a><br />

        <!-- End User Info -->
        <!-- Menu -->
        <div id="menu" style="width: 100%;">
          <ul class="navSV">
            <li>
              <a style=" text-decoration: none;" class="active" style="background-color:#6296C5" href="#">Trang ch??? sinh vi??n</a>
            </li>
            <li><a style=" text-decoration: none;" href="http://thanglong.edu.vn/">Trang ch??? nh?? tr?????ng</a></li>
            <li>
              <b><a style=" text-decoration: none;" class="msg" href="#"> C?? 0 tin b??o m???i </a></b>
            </li>
          </ul>
        </div>
        <!-- End Menu -->
      </div>
      <!-- End Center Content -->
    </div>
    <!-- End Top -->
    <!-- Page -->
    <div id="page" style="width: 90%; display: flex; left: 5%; margin-left: 0px;">
      <div id="left" style="width: 250px">
        <ul class="navSV">
          <li>
            <h3 class="title">To??n tr?????ng</h3>

            <ul class="sub-menu" style="display: block">
              <li class="chon">

                <a style=" text-decoration: none;" href="?controller=tkb">
                  Th???i kh??a bi???u to??n tr?????ng
                </a>

              </li>
            </ul>
          </li>

          <li>
            <h3 class="title">G??c sinh vi??n</h3>

            <ul class="sub-menu" style="display: block">
              <li class="chon">

                <a style="text-decoration: none" href="?controller=sinhvien">
                  Th??ng tin c?? nh??n</a>


              </li>

              <li>

                <a style=" text-decoration: none;" class="red-input" href="?controller=sinhvien&action=DangKyHoc"> ????ng k?? h???c</a>

              </li>

              <li>

                <a style=" text-decoration: none;" href="?controller=sinhvien&action=bangdiem"> B???ng ??i???m</a>

              </li>

              <li>

                <a style=" text-decoration: none;" href="?controller=sinhvien&action=lichthisinhvien"> L???ch thi ch??nh th???c</a>


              </li>


            </ul>
          </li>

          <li></li>
        </ul>
      </div>