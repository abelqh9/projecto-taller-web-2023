<?php include("conexion.php") ?>
<?php

  session_start();

  if ($_POST) {


    if (isset($_POST['ids'])) {

      $ids = $_POST['ids'];
    
      foreach ($ids as $id) {

        $objConexion = new conexion();

        $sql="UPDATE cursosyusuarios SET purchased = 1 WHERE id = $id";

        $objConexion -> ejecutar($sql);
      
        header("location:index.php");

      }
    }

  }

?>
?>