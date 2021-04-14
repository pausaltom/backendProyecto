<?php

class Productos_modelo{

    private $db;
    private $productos;

    public function __construct()
    {
        require_once("modelo/conexion.php");
        $this->db=Conectar::conexion();

        $this->productos=array();

    }
    public function get_Productos(){
        $consulta=$this->db->query("SELECT * FROM producto");
        while ($filas=$consulta->fetch_array(MYSQLI_ASSOC)) {
            $this->productos[]=$filas;
        }
        return $this->productos;
    }
    
    public function updateProducto(){
        
    }

}







?>