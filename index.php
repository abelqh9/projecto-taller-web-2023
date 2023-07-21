<?php include("conexion.php") ?>
<?php

  session_start();

  $objConexion = new conexion();

  if(isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])){
    $userIdFromBd = $_SESSION['userLogin'];
  
    // Get cursosyusuarios
    $cursosDelusuarioFromBd = $objConexion -> consultar("SELECT * FROM cursosyusuarios JOIN cursos ON cursosyusuarios.curso_id = cursos.id WHERE cursosyusuarios.usuario_id = $userIdFromBd");
  
    $cursosComprados = array_filter($cursosDelusuarioFromBd, 'filterPurchaseds');
    $cursosNoComprados = array_filter($cursosDelusuarioFromBd, 'filterNoPurchaseds');
  
    $cursosCompradosIds = array_column(array_map(function ($object) {return $object['id'];}, $cursosComprados), null);
    $cursosNoCompradosIds = array_column(array_map(function ($object) {return $object['id'];}, $cursosNoComprados), null);
  }

  // Get tecnologias
  $tecnologiasFromBd = $objConexion -> consultar("SELECT * FROM `tecnologias`");
  // print_r($tecnologiasFromBd);

  // Get proyectos
  $proyectosFromBd = $objConexion -> consultar("SELECT * FROM `proyectos`");
  // print_r($proyectosFromBd);

  // Get cursos
  $cursosFromBd = $objConexion -> consultar("SELECT * FROM `cursos`");
  // print_r($cursosFromBd);

  function filterPurchaseds($curso){
    return $curso['purchased'] > 0;
  }

  function filterNoPurchaseds($curso){
    return $curso['purchased'] == 0;
  }

  if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hi, I'm Abel Quezada and I made this website so you can get to know me better, I hope you like it.">
    <meta name="theme-color" content="#000000">
    <!--  -->
    <meta property="og:title" content="Abel Quezada">
    <meta property="og:description" content="Hi, I'm Abel Quezada and I made this website so you can get to know me better, I hope you like it.">
    <meta property="og:image" content="https://abelquezada-website-client.vercel.app/assets/preview.png">
    <meta property="og:url" content="https://abelquezada-website-client.vercel.app">
    <!--  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Dumbix9">
    <meta name="twitter:image" content="https://abelquezada-website-client.vercel.app/assets/preview.png" />
    <!--  -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@200;700&display=swap" rel="stylesheet">
    <!--  -->
    <link rel="canonical" href="https://abelquezada-website-client.vercel.app">
    <link rel="icon" href="./assets/favicon.png">
    <link rel="apple-touch-icon" href="./assets/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/keyframes.css">
    <link rel="stylesheet" href=<?php echo '"./styles/index.css?v=' .rand() .'"'; ?>>
    <!--  -->
    <title>Abel Quezada</title>

    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="body">

  <header class="header">
    
    <nav>
      <img src="./assets/favicon.png" width="50" alt="">

      <a href="#who-i-am">Who i am?</a>
      <a href="#education">Education</a>
      <a href="#technologies">Technologies</a>
      <a href="#projects">Projects</a>
      <a href="#courses">Courses i sell</a>
      <a href="#contact-me">Contact me</a>
    </nav>

    <nav>
      <?php
        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] > 0) {
          echo "
            <button id='yourCoursesOppenButton'>Your courses</button>
            <button id='shoppingCartOpenButton'>shopping cart</button>

            <!-- Logout Form -->
            <form action='logout.php' method='post' style='margin: 0;'>
              <input type='hidden' name='logout'>
              <button>logout</button>
            </form>
            <!-- Logout Form -->

            
          "."<span> userId: ".$_SESSION['userLogin']."<span>";
        } else {
          echo "
            <button id='loginOpenButton'>login</button>
          ";
        }
      ?>

    </nav>
  </header>

  <main class="main">

    <section class="principal-section">
        <img class="principal-section__img principal-section__img_principal" src="./assets/myFace.jpeg" width="120" alt="abel quezada" loading="lazy">
        <h1 class="principal-section__h1">Abel Quezada</h1>
        <p class="principal-section__p">Full-Stack Developer</p>
        <div class="social-medias principal-section__social-medias">
            <a class="social-medias__a" href="https://github.com/abelqh9" target="_blank"><img src="./assets/github.svg" alt="git" loading="lazy"></a>
            <a class="social-medias__a" href="https://twitter.com/Dumbix9" target="_blank"><img src="./assets/twitter.svg" alt="twitter" loading="lazy"></a>
            <a class="social-medias__a" href="https://www.linkedin.com/in/abelquezada/" target="_blank"><img src="./assets/linkeding.svg" alt="linkeding" loading="lazy"></a>
        </div>
        <a href="#who-i-am"><img class="principal-section__img principal-section__img_slide-down" src="./assets/expand_more.svg" alt="slide down" loading="lazy"></a>
    </section>

    <section class="secundary-section" data-scroll-spy>
      <h2 class="secundary-section__h2" id="who-i-am">Who i am?</h2>
      <p class="secundary-section__p">Hi :) I'm a 20-year-old guy who loves programming, currently, I'm more focused on web development as a Full-Stack dev, but in the future, I would love to learn more about the other branches of programming.</p>
    </section>

    <section id="education" class="secundary-section" data-scroll-spy>
      <h2 class="secundary-section__h2">Education</h2>
      <p class="secundary-section__p">I am currently studying software engineering and, recently, with the help of a government scholarship, I finished the "Full-Stack" Coding Dojo Bootcamp, but also, one of my favorite things to do is to learn on my own by reading docs and taking courses on different platforms.</p>
    </section>

    <section id="technologies" class="secundary-section" data-scroll-spy>
      <h2 class="secundary-section__h2">Technologies</h2>
        <ul class="p-0 d-flex justify-center gap-4 flex-wrap">
          <?php foreach ($tecnologiasFromBd as $tecnologias) { ?>
            <li class="project-card">
                <img class="project-card__img" style="height: 12.5rem; object-fit: cover; width: 100%" src=<?php echo $tecnologias['imagen'] ?> alt=<?php echo $tecnologias['nombre'] ?> loading="lazy"/>
                <div class="project-card__div">
                    <h3 class="project-card__h3"><?php echo $tecnologias['nombre'] ?></h3>
                    <p class="project-card__p"><?php echo $tecnologias['descripcion'] ?></p>
                </div>
            </li>
          <?php } ?>
        </ul>
    </section>

    <section id="projects" class="secundary-section" data-scroll-spy>
      <h2 class="secundary-section__h2">Projects</h2>
      <ul class="p-0 d-flex gap-4 flex-wrap">
          <?php foreach ($proyectosFromBd as $proyecto) { ?>
            <li class="project-card">
                <img class="project-card__img" style="height: 12.5rem; object-fit: cover;" src=<?php echo $proyecto['imagen'] ?> alt=<?php echo $proyecto['nombre'] ?> loading="lazy"/>
                <div class="project-card__div">
                    <h3 class="project-card__h3"><?php echo $proyecto['nombre'] ?></h3>
                    <p class="project-card__p"><?php echo $proyecto['descripcion'] ?></p>
                </div>
            </li>
          <?php } ?>
        </ul>
    </section>

    <section id="courses" class="secundary-section" data-scroll-spy>
      <h2 class="secundary-section__h2">Courses i sell</h2>
      <ul class="p-0 d-flex gap-4 flex-wrap">
          <?php foreach ($cursosFromBd as $curso) { ?>
            <li class="project-card">
                <img class="project-card__img" style="height: 12.5rem; object-fit: cover;" src=<?php echo $curso['imagen'] ?> alt=<?php echo $curso['nombre'] ?> loading="lazy"/>
                <div class="project-card__div">
                    <h3 class="project-card__h3"><?php echo $curso['nombre'] ?></h3>
                    <p class="project-card__p"><?php echo $curso['descripcion'] ?></p>
                </div>
                <?php
                  if (isset($cursosCompradosIds) && in_array($curso['id'], $cursosCompradosIds)) {
                    ?>
                      <button type='button' class='btn btn-primary'>En tus cursos</button>
                    <?php
                  } else if (isset($cursosNoCompradosIds) && in_array($curso['id'], $cursosNoCompradosIds)) {
                    ?>
                      <button type='button' class='btn btn-primary'>En tu carrito</button>
                    <?php
                  } else if (isset($cursosNoCompradosIds)) {
                    ?>
                      <form action='add_curso_usuario.php' method='post' style='margin: 0;'>
                        <input type='hidden' name='curso_id' value=<?php echo $curso['id']; ?>>
                        <input type='hidden' name='usuario_id' value=<?php echo $userIdFromBd; ?>>
                        <button type='submit' class='btn btn-primary'>Comprar</button>
                      </form>
                    <?php
                  }
                ?>
            </li>
          <?php } ?>
      </ul>
    </section>

    <section id="contact-me" class="secundary-section" data-scroll-spy>
      <h2 class="secundary-section__h2">Contact me</h2>
      <p class="secundary-section__p">You can email me later at <span class="secundary-section__span">abelqh9@gmail.com</span></p>
      <p class="secundary-section__p">Or you can email me now:</p>
      <form class="contact-me-form" action="https://formsubmit.co/abelqh9@gmail.com" method="POST" >
          <div class="contact-me-form__div">
              <label class="contact-me-form__label" for="name">your name:</label>
              <input class="contact-me-form__input" type="text" name="name" id="name" placeholder="name" required title="Only letters and white spaces" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$">
          </div>
          <div class="contact-me-form__div">
              <label class="contact-me-form__label" for="email">your email:</label>
              <input class="contact-me-form__input" type="email" name="email" id="email" placeholder="email" required title="Only valid emails" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$">
          </div>
          <div class="contact-me-form__div">
              <label class="contact-me-form__label" for="email">your message:</label>
              <textarea class="contact-me-form__textarea" name="message" id="message" placeholder="message" required></textarea>
          </div>
          <button class="contact-me-form__button" type="submit">Send</button>
      </form>
    </section>

  </main>

  <footer>
    version: 1.0.0
  </footer>

  <div id="shoppingCartModal" class="modal hide">
    <div class="card">
      <h2>Shopping Cart</h2>
      <button id="shoppingCartCloseButton">X</button>
    </div>
  </div>

  <!-- Login Modal -->
  <div id="loginM" class="my-modal rounded hide">
    <div class="card container col-4">

      <!-- Modal Header -->
      <div class="my-modal-header d-flex align-items-center justify-content-between mb-3">
        <h2 class="secundary-section__h2">Login</h2>
        <button id="loginCloseButton" class="close-modal-btn">X</button>
      </div>
      <!-- Modal Header -->

      <!-- Login Form -->
      <form action="login.php" method="post" class="contact-me-form" data-contact-me-form>
          <div class="contact-me-form__div">
              <label class="contact-me-form__label" for="email">your email:</label>
              <input class="contact-me-form__input" type="email" name="email" id="loginEmail" placeholder="email" required title="Only valid emails" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$">
          </div>
          <div class="contact-me-form__div">
              <label class="contact-me-form__label" for="name">your password:</label>
              <input class="contact-me-form__input" type="password" name="password" id="password" placeholder="password" required">
          </div>
          <!-- Actions -->
          <div class="w-100 d-flex align-items-center justify-content-between">
            <span id="creatUserOpenButton" class="my-link">Create User</span>
            <button class="contact-me-form__button" type="submit">Send</button>
          </div>
          <!-- / Actions -->
      </form>
      <!-- / Login Form -->

    </div>
  </div>
  <!-- / Login Modal -->

  <!-- Create User Modal -->
    <div id="creatUserM" class="my-modal rounded hide">
    <div class="card container col-4">

      <!-- Modal Header -->
      <div class="my-modal-header d-flex align-items-center justify-content-between mb-3">
        <h2 class="secundary-section__h2">Create User</h2>
        <button id="creatUserCloseButton" class="close-modal-btn">X</button>
      </div>
      <!-- Modal Header -->

      <!-- Login Form -->
      <form action="create-user.php" method="post" class="contact-me-form" data-contact-me-form>
          <div class="contact-me-form__div">
              <label class="contact-me-form__label" for="email">your email:</label>
              <input class="contact-me-form__input" type="email" name="email" id="loginEmail" placeholder="email" required title="Only valid emails" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$">
          </div>
          <div class="contact-me-form__div">
              <label class="contact-me-form__label" for="name">your password:</label>
              <input class="contact-me-form__input" type="password" name="password" id="password" placeholder="password" required">
          </div>
          <!-- Actions -->
          <div class="w-100 d-flex align-items-center justify-content-between">
            <span id="loginOpenButtonAndCreatUserCloseButton" class="my-link">Login</span>
            <button class="contact-me-form__button" type="submit">Send</button>
          </div>
          <!-- / Actions -->
      </form>
      <!-- / Create User Form -->

    </div>
  </div>
  <!-- / Create User Modal -->

  <!-- Your courses Modal -->
  <div id="yourCoursesM" class="my-modal rounded hide">
    <div class="card container col-4">

      <!-- Modal Header -->
      <div class="my-modal-header d-flex align-items-center justify-content-between mb-3">
        <h2 class="secundary-section__h2">Your courses</h2>
        <button id="yourCoursesCloseButton" class="close-modal-btn">X</button>
      </div>
      <!-- Modal Header -->

      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">IMAGE</th>
            <th scope="col">NAME</th>
            <th scope="col">DESCIPTION</th>
            <th scope="col">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cursosComprados as $curso): ?>
            <tr>
              <th scope="row"><?php echo $curso[0]; ?></th>
              <td> <img width=150 src="<?php echo $curso['imagen']; ?>"></td>
              <td><?php echo $curso['nombre']; ?></td>
              <td><?php echo $curso['descripcion']; ?></td>
              <td class="">
                <form action='delete-curso-usuario.php' method='post' style='margin: 0;'>
                  <input type='hidden' name='id' value=<?php echo $curso[0]; ?>>
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>
  <!-- / Your courses Modal -->

  <!-- Your shopping cart Modal -->
  <div id="shoppingCartM" class="my-modal rounded hide">
    <div class="card container col-4">

      <!-- Modal Header -->
      <div class="my-modal-header d-flex align-items-center justify-content-between mb-3">
        <h2 class="secundary-section__h2">Your shopping car</h2>
        <button id="my4CloseButton" class="close-modal-btn">X</button>
      </div>
      <!-- Modal Header -->

      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">IMG</th>
            <th scope="col">NAME</th>
            <th scope="col">DESCIPTION</th>
            <th scope="col">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cursosNoComprados as $curso): ?>
            <tr>
              <th scope="row"><?php echo $curso[0]; ?></th>
              <td> <img width=150 src="<?php echo $curso['imagen']; ?>"></td>
              <td><?php echo $curso['nombre']; ?></td>
              <td><?php echo $curso['descripcion']; ?></td>
              <td class="">
                <form action='delete-curso-usuario.php' method='post' style='margin: 0;'>
                  <input type='hidden' name='id' value=<?php echo $curso[0]; ?>>
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <form action='edit_curso_usuario.php' method='post' style='margin: 0;'>
        <?php foreach ($cursosNoComprados as $curso): ?>
          <input type='hidden' name='ids[]' value=<?php echo $curso[0]; ?>>
        <?php endforeach; ?>
        <button type="submit" class="mt-3 ms-auto btn btn-success">Comprar</button>
      </form>


    </div>
  </div>
  <!-- / Your shopping cart Modal -->

  <script src=<?php echo '"./scripts/index.js?v=' .rand().'"' ?> type="module"></script>
</body>
</html>