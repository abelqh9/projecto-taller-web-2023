<?php

  class conexion {

    // private $servidor = "localhost";
    // private $usuario = "root";
    // private $db = "taller-web-23";
    // private $contrasenia = "";

    private $servidor = "localhost";
    private $usuario = "id20889319_abelqh";
    private $db = "id20889319_taller_web";
    private $contrasenia = "Que/2002";

    private $conexion;

    public function __construct(){

      try {

        // $this -> conexion = new PDO("mysql:host=$this->servidor;dbname=$this->db;port=3307",$this->usuario,$this->contrasenia); 

        $this -> conexion = new PDO("mysql:host=$this->servidor;dbname=$this->db",$this->usuario,$this->contrasenia); 
        
        $this -> conexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

      } catch (PDOException $e) {

        print_r("falló conexión con la base de datos".$e);
        return ("falló conexión con la base de datos".$e);

      }

    }

    public function ejecutar($sql){

      $this -> conexion -> exec($sql);
      return $this -> conexion -> lastInsertId();

    }

    public function consultar($sql){

      // print_r($this -> conexion);

      $sentencia = $this -> conexion -> prepare($sql);
      $sentencia -> execute();
      return $sentencia -> fetchAll();

    }

  }

?>