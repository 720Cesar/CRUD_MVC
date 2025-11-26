<?php

class AuthController {

    private $model;

    public function __construct($connection) {
        $this->model = new UserModel($connection);
    }

    public function login() {
        session_start();

        if (isset($_POST['enviar'])) {
            $usuario = trim($_POST['usuario']);
            $password = trim($_POST['pass']);

            $user = $this->model->verificarUsuario($usuario, $password);

            if ($user) {
                // Guardar datos en la sesión
                $_SESSION['usuario'] = $user['nombre'];
                $_SESSION['id'] = $user['id_list'];

                // Redirigir al dashboard
                header("Location: index.php?controller=auth&action=dashboard");
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos.";
                echo "FF";
                include "app/views/login.php";
                return;
            }
        }

        include "app/views/login.php";
    }

    public function dashboard() {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        include "app/views/dashboard.php";
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
    }
}
