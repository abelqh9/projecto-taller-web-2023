<?php include("conexion.php") ?>
<?php

  session_start();

  if ($_POST) {


    if (isset($_POST['email']) && isset($_POST['password'])) {

      $objConexion = new conexion();

      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $sql="INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES (NULL, '.$email.', '.$password.');";
      $_SESSION['userLogin'] = $objConexion -> ejecutar($sql);

      header("location:index.php?Message=" . urlencode('Usuario Creado'));

    }

  }

?>