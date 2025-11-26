
<?php
    include_once "config/db_connection.php";
    include_once "app/models/ProductModel.php";

    class ProductController{
        private $model;

        public function __construct($connection){
            $this -> model = new ProductModel($connection);
        }
        
        public function insertarProducto(){

            if(isset($_POST['enviar'])){
                $nombre = trim($_POST['nombre']);
                $precio =  $_POST['precio'];
                $marca = $_POST['marca'];

                $insert = $this -> model -> insertarProducto($nombre, $precio, $marca);

                if($insert){
                    echo "<br> Registro exitoso";
                }else{
                    echo "<br> Error en el registro";
                }
            }

            include_once "app/views/product_insert.php";

        }

    }
