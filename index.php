<?php
// index.php

    include_once "config/db_connection.php";
    include_once "app/controllers/UserController.php";
    include_once "app/controllers/AuthController.php";
    include_once "app/controllers/ProductController.php";
    include_once "app/controllers/ReportController.php";

    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'user';
    $action = isset($_GET['action']) ? $_GET['action'] : 'insert';

    switch($controller){
        case 'user':
            $controllerInstance = new UserController($connection);
            break;
        case 'auth':
            $controllerInstance = new AuthController($connection);
            break;
        case 'product':
            $controllerInstance = new ProductController($connection);
            break;
        case 'report':
            $controllerInstance = new ReportController($connection);
            break;
        default:
            echo "Error al encontrar el controlador";
            exit();
    }

    // Verificar la acción en la URL
    switch($action){
    // Para usuarios
    case 'insert':
        $controllerInstance->insertarUsuario();
        break;

    case 'consult':
        $controllerInstance->consultarUsuarios();
        break;

    case 'update':
        $controllerInstance->actualizarUsuario();
        break;

    case 'delete':
        $controllerInstance->eliminarUsuario();
        break;
    case 'login':
        $controllerInstance -> login();
        break;
    case 'dashboard':
        $controllerInstance -> dashboard();
        break;
    case 'logout':
        $controllerInstance -> logout();
        break;
    case 'backup':
        $controllerInstance->realizarBackup();
        break;
    case 'restore':
        $controllerInstance -> realizarRestauracion();
        break;
    case 'pdf_report':
        $controllerInstance -> generarPDF();
        break;
    // Para productos
    case 'insertProduct':
        $controllerInstance->insertarProducto();
        break;

    case 'consultProduct':
        $controllerInstance->consultarProductos();
        break;
    // Para reportes
    case 'graphReport':
        $controllerInstance -> generarGrafica();
        break;
    case 'pieReport':
        $controllerInstance -> generarPastel();
        break;
    default:
        echo "Acción no encontrada";
        break;
    }

    
