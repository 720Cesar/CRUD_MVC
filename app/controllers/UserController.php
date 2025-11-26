<?php

    include_once "config/db_connection.php";
    include_once "app/models/UserModel.php";

    class UserController{
        private $model; 

        public function __construct($connection){
            $this->model = new UserModel($connection);
        }
        
        /* Método para obtener la info del formulario y se 
        le mandan los parámetros de al modelo para insertar*/
        public function insertarUsuario(){

            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $edad = $_POST['edad'];
                $fecha = $_POST['fecha'];
                $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

                // Mandar los datos al método de insertar
                $insert = $this->model->insertarUsuario($nombre, $edad, $fecha, $pass);

                if($insert){
                    echo "<br>Registro exitoso";
                }else{
                    echo "<br>Error en el registro";
                }

            }
            include_once "app/views/form_insert.php"; //Cargar el archivo de la vista
        }

        public function consultarUsuarios(){
            $usuarios = $this -> model -> consultarUsuarios();
            include "app/views/consult.php";
        }

        public function actualizarUsuario(){

            if(isset($_GET['id'])){
                $id_browser = (int) $_GET['id'];
                $row = $this -> model -> consultarPorID($id_browser);
                include_once "app/views/edit.php";
                // Se sale para no ejecutar de forma inmediata el $_POST
                return;
            }

            if(isset($_POST['editar'])){
                $id_list = (int) $_POST['id'];
                $nombre = trim($_POST['nombre']);
                $edad = $_POST['edad'];
                $fecha = $_POST['fecha'];

                $update = $this -> model -> actualizarUsuario($id_list, $nombre, $edad, $fecha);

                if($update){
                    // Actualización exitosa
                    header('Location: index.php?action=consult');
                }else{
                    // Error al actualizar
                    header('Location: index.php?action=update');
                }

            }
            include_once "app/views/edit.php";
        }

        public function eliminarUsuario(){
            if(isset($_GET['id'])){
                $id_browser = (int) $_GET['id'];
                $delete = $this -> model -> eliminarUsuario($id_browser);

                if($delete){
                    // Eliminación exitosa
                    header('Location: index.php?action=consult');
                }else{
                    // Error al eliminar
                    header('Location: index.php?action=delete');
                }

            }
        }


        public function realizarBackup(){
            
            $server = "localhost";
            $user = "root";
            $password = "";
            $db = "prueba";

            $backup =  $this -> model -> backup_tables($server, $user, $password, $db);

            echo $backup;

            $fecha=date("Y-m-d");
            header("Content-disposition: attachment; filename=db-backup-".$fecha.".sql");
            header("Content-type: MIME");
            
            readfile("config/backups/db-backup-".$fecha.".sql");

        }

        public function realizarRestauracion(){
    
            $fecha = date("Y-m-d");

            $ruta = "config/backups/db-backup-".$fecha.".sql";

            $restore = $this -> model -> restaurarBase($ruta);

            include_once "app/views/form_insert.php";

        }

        public function realizarPDF(){
            $usuarios = $this -> model -> consultarUsuarios();
            include "app/views/pdf_report.php";
        }

    }