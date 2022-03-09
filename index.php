<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>WebTruong</title>
    <!-- Meta tag Keywords -->
    <style>
        th {
            text-align: center;
        }

        /* td {
            text-align: center;
        } */
        p {
            width: 250px;
        }
    </style>
</head>

<body>
    <?php
    
    session_start();
    
    use models\DatabaseConnection;
    
    include('models/DatabaseConnection.php');
    if(isset($_SESSION['expire']))
    {
        $now = time(); 
        if ($now > $_SESSION['expire']) {
            session_destroy();
            
            header('location:index.php');;
        }
    }
    DatabaseConnection::connect('localhost', 'pointmanagement', 'root', '');
    
    // $db = new database;
    // $db->connect();
    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    }
    if (empty($controller)) $controller = "login";
    $controller_name = $controller . "_controller";
    require_once("./controllers/{$controller_name}.php");
    $controllerObj = new $controller_name();
    $controllerObj->run();
    ?>


</body>

</html>