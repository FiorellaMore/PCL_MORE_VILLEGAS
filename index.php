<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda D'SAMI STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
	<link rel="stylesheet" href="./public/css/estilos.css">
</head>
<body>
    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
<div class="container w-75 pt-3 rounded">
        <div class="row align-items-stretch">
            <div class="text-center text-info my-4"> <h1>"D'SAMI STORE"</h1> </div>
            <div id="carouselExampleSlidesOnly" class="col align-items-center d-none d-lg-flex col-md-5 col-lg-5 col-xl-6 rounded carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/inicio.svg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/inicio2.svg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/inicio3.svg" class="d-block w-100" alt="...">
                </div>
                </div>
            </div>
            <div class="col px-5 rounded-end">
                <h2 class="text-center x-5">Bienvenido</h2>
                    <form class="mt-5 mx-auto" style="max-width: 512px;" action="controlador/login.php" method="POST">
                    <div>
                    <div class="mb-4">
                        <label for="username" class="form-label fw-bold">Usuario</label>
                        <input  class="form-control" id="username" placeholder="Ingresa tu usuario" required name="username">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="ingrese su clave" required name="password">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-info fw-bold">Iniciar sesión</button>
                    </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
    <!-- Cookies -->
	<div class="aviso-cookies" id="aviso-cookies">
		<img class="galleta" src="./img/cookie.svg" alt="Galleta">
		<h3 class="titulo">Cookies</h3>
		<p class="parrafo">Utilizamos cookies propias y de terceros para mejorar nuestros servicios.</p>
		<button class="boton" id="btn-aceptar-cookies">De acuerdo</button>
		<a class="enlace" href="aviso-cookies.html">Aviso de Cookies</a>
	</div>
	<div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div>

	<script src="./public/js/aviso-cookies.js"></script>
</body>
</html>