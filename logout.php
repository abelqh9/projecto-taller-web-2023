<?php

  session_start();

  if ($_POST) {

    $_SESSION['userLogin'] = 0;
    header("location:index.php");

  }

?>