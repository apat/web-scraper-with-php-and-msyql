<?php
// Load vendors
require 'vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// Call dependency
require 'src/connector.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de Hoteles de Isla Mujeres</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Hoteles</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <main>
      <div class="jumbotron thumbnail">
        <img class="portrait" src="https://mexlike.io/wp-content/uploads/2018/06/Playa-norte-de-Isla-Mujeres.jpg" alt="">
        <div class="container">
          <h1 class="display-3 text-light">Hoteles de Isla Mujeres!</h1>
          <h3 class="bg-dark text-light">Te presentamos los hoteles más populares de Isla Mujeres. Encontrarás las mejores recomendaciones de nuestra comunidad.</h3>
        </div>
      </div>
      <div class="container-fluid">
        <div class="d-flex flex-wrap">
          <?php if ($result = $mysqli->query("SELECT id, name, image_url, href, price FROM `rooms` WHERE city_id = 1")): ?>
            <?php while ($hotel = mysqli_fetch_assoc($result)): ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                <div class="wrap-box">
                  <div class="box-img">
                    <a href="<?php echo 'https://www.tripadvisor.com/' . $hotel['href'] ?>">
                      <img src="<?php echo $hotel['image_url'] ?>" class="img-fluid" alt="<?php echo $hotel['name'] ?>">
                    </a>
                  </div>
                  <div class="rooms-content">
                    <h4><a href="<?php echo 'https://www.tripadvisor.com/' . $hotel['href'] ?>"><?php echo $hotel['name'] ?></a></h4>
                    <p class="price">$ <?php echo $hotel['price'] ?> MX / Por Noche</p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
