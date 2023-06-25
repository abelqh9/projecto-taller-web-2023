<?php include("conexion.php") ?>
<?php

  session_start();

  if ($_POST) {


    if (isset($_POST['curso_id']) && isset($_POST['usuario_id'])) {

      $objConexion = new conexion();

      $curso_id = $_POST['curso_id'];
      $usuario_id = $_POST['usuario_id'];

      $sql="INSERT INTO `cursosyusuarios` (`id`, `curso_id`, `usuario_id`, `purchased`) VALUES (NULL, '.$curso_id.', '.$usuario_id.', 0)";

      $userFromBd = $objConexion -> ejecutar($sql);
      
      header("location:index.php");

    }

  }

?>
?>