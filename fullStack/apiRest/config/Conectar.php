<?php
    class Conectar {
        protected $db;
    
        protected function Conexion() {
            try {
                $conectar = $this->db = new PDO("mysql:host=localhost;dbname=AlquilerArtemis", "campus", "campus2023");
                return $conectar;
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
                die();
            }
        }
    
        public function set_name() {
            $this->Conexion(); 
            return $this->db->query("SET NAMES 'utf8'");
        }
    }
?>
