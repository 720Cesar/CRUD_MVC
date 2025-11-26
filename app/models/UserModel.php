<?php

    class UserModel{

        private $connection;

        // Constructor para tener el parámetro de la conexión
        public function __construct($connection){
            $this->connection = $connection;
        }

        // Método para insertar usuarios 
        public function insertarUsuario($nombre, $edad, $fecha, $pass){
            
            $sql_statement = "INSERT INTO lista (nombre, edad, fecha, pass) VALUES (?, ?, ?, ?)";

            $statement = $this->connection->prepare($sql_statement);
            $statement -> bind_param("siss", $nombre, $edad, $fecha, $pass);

            return $statement->execute();

        }

        public function consultarUsuarios(){

            $sql_statement = "SELECT * FROM lista";

            // Se guardan los resultados de la consulta
            $result = $this -> connection -> query($sql_statement);
            return $result;
        }

        public function consultarPorID($id_browser){
            $sql_statement = "SELECT * FROM lista WHERE id_list = ?";
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);
            
            $statement -> execute();
            $result = $statement -> get_result();
            return $result -> fetch_assoc();
            
        }

        public function actualizarUsuario($id_list, $nombre, $edad, $fecha){

            $sql_statement = "UPDATE lista SET nombre = ?, edad = ?, fecha = ? WHERE id_list = ?";
            
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("sisi", $nombre, $edad, $fecha, $id_list);

            return $statement -> execute();
        }

        public function eliminarUsuario($id_browser){
            $sql_statement = "DELETE FROM lista WHERE id_list = ?";
            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);

            return $statement -> execute();

        }

         public function verificarUsuario($usuario, $password) {
            $statement = $this->connection->prepare("SELECT * FROM lista WHERE nombre = ?");
            $statement->bind_param("s", $usuario);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();

                if (password_verify($password, $row['pass'])) {
                    return $row;
                }
            }

            return false;
        }

        public function backup_tables($host,$user,$pass,$name,$tables = '*'){
            $return='';
            $link = new mysqli($host,$user,$pass,$name);
            
            // Se obtienen los nombres de las tablas de datos si se eligen todas
            if($tables == '*')
            {
                $tables = array();
                $result = $link->query('SHOW TABLES');
                // Guardar tablas de la base de datos
                while($row = mysqli_fetch_row($result))
                {
                    $tables[] = $row[0];
                }
            }
            else
            {
                $tables = is_array($tables) ? $tables : explode(',',$tables);
            }
            
            // Obtener los registros de la tabla de datos
            foreach($tables as $table)
            {
                $result = $link->query('SELECT * FROM '.$table);
                $num_fields = mysqli_num_fields($result);

                
                $row2 = mysqli_fetch_row($link->query('SHOW CREATE TABLE '.$table));
                
                $return .= "\n\nDROP TABLE IF EXISTS `$table`;\n";
                
                $return.= "\n\n".$row2[1].";\n\n";
                
                for ($i = 0; $i < $num_fields; $i++)
                {
                    while($row = mysqli_fetch_row($result))
                    {
                        $return.= 'INSERT INTO '.$table.' VALUES(';
                        for($j=0; $j<$num_fields; $j++) 
                        {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = preg_replace("/\n/","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j<($num_fields-1)) { $return.= ','; }
                        }
                        $return.= ");\n";
                    }
                }
                $return.="\n\n\n";
            }

            // Guardar el nombre de la tabla de datos
            $fecha=date("Y-m-d");
            // Abrir el archivo para escribir las consultas. 
            $handle = fopen('config/backups/db-backup-'.$fecha.'.sql','w+');
                fwrite($handle,$return);
                fclose($handle);
        }

        public function restaurarBase($ruta){
            // Obtiene el contenido del archivo backup
            $query_archivo = file_get_contents($ruta);
            // Ejecuta todos los query separados por ;
            if($this -> connection -> multi_query($query_archivo)){
                do{ // Almacena la resultado de la consulta
                    if($result = $this -> connection -> store_result()){
                        $result -> free(); // Libera el resultado anterior
                    }
                }while($this -> connection -> more_results() && $this -> connection -> next_result());  

                return "Restauración exitosa";
            } else{
                return "Error en la restauración";
            }
        }


    }

