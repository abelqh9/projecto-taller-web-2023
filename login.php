<?php include("conexion.php") ?>
<?php

  session_start();

  if ($_POST) {


    if (isset($_POST['email']) && isset($_POST['password'])) {

      $objConexion = new conexion();

      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql="SELECT * FROM `usuarios` WHERE email = '$email';";

      $userFromBd = $objConexion -> consultar($sql);
      
      if($userFromBd[0]['password'] == $password){
        $_SESSION['userLogin'] = $userFromBd[0]['id'];
        header("location:index.php");
      } else {
        header("location:index.php?Message=" . urlencode('Email o Password incorrectos'));
      };

    } else {

      header("location:index.php?Message=" . urlencode('Faltan Email o Password'));

    }

  }

?>