<?php include("conexion.php") ?>
<?php

  session_start();

  if ($_POST) {


    if (isset($_POST['id'])) {

      $objConexion = new conexion();

      $id = $_POST['id'];

      $sql="DELETE FROM cursosyusuarios WHERE id = $id";

      $objConexion -> consultar($sql);
      
      header("location:index.php");

    }

  }

?>