     <!-- Meta tag Keywords -->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?controller=admin&action=dashboardadmin" >
    <img style="width: 60px; height:60px; border-radius: 100px" src="./img/logotlu.jpg" alt="logo">
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item  <?php 
        if(isset($_GET['action']))
        if($_GET['action'] == 'dashboardadmin'  ){echo 'active';}
        
    ?>">
    <a class="nav-link" href="?controller=admin&action=dashboardadmin">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Bảng điều khiển</span></a>
  </li>


  <hr class="sidebar-divider">
  <!-- Nav Item - Tables -->
  <li class="nav-item  <?php  if(isset($_GET['action'])) if($_GET['action'] == 'danhsachgiangvien'){echo ' active';}?>">
    <a class="nav-link" href="?controller=admin&action=danhsachgiangvien">
      <i class="fas fa-fw fa-table"></i>
      <span>Danh sách giảng viên</span></a>
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item <?php  if(isset($_GET['action'])) if($_GET['action'] == 'danhsachnhanvien'){echo ' active';}?>">
    <a class="nav-link" href="?controller=admin&action=danhsachnhanvien">
      <i class="fas fa-fw fa-table"></i>
      <span>Danh sách nhân viên</span></a>
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item  <?php  if(isset($_GET['action'])) if($_GET['action'] == 'danhsachsinhvien'){echo ' active';}?>">
    <a class="nav-link" href="?controller=admin&action=danhsachsinhvien">
      <i class="fas fa-fw fa-table"></i>
      <span>Danh sách sinh viên</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>


<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>