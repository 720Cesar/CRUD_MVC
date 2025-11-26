
<?php

    class ReportModel{

        private $connection;

        public function __construct($connection){
            $this -> connection = $connection;
        }

        public function consultarProductos(){
            $statement_query = "SELECT * FROM producto";

            $result = $this -> connection -> query($statement_query);

            $data = [];
            while($row = $result->fetch_assoc()) {
                $data[] = [$row['nombre'], (float) $row['precio']];
            }

            return $data;
        }

        public function consultarUsuarios(){

            $sql_statement = "SELECT * FROM lista";

            // Se guardan los resultados de la consulta
            $result = $this -> connection -> query($sql_statement);
            return $result;
        }

        public function consultarMarcas() {
            $sql_statement = "SELECT marca, COUNT(*) AS total FROM producto GROUP BY marca";
            $result = $this->connection->query($sql_statement);

            $data = [];
            while ($row = $result->fetch_assoc()) {
                
                $data[] = [$row['marca'], (int)$row['total']];
            }

            return $data;
        }



    }