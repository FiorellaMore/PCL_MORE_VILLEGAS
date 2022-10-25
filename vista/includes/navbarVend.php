<nav class="app-navbar navbar border-bottom bg-white">
    <div class="container-fluid">
    <a class="ps-5 d-flex text-decoration-none">
        <h4 class="fw-bold text-info m-0">D'SAMI STORE</h4>
    </a>
    <div class="app-sidebar p-3 ">
    <div class="nav nav-pills flex-file mb-auto">
        <li class='nav-item'>
            <a class="nav-link link-dark" href="../../vista/ventas">Ventas</a>
        </li>
        <li class='nav-item' >
            <a class="nav-link link-dark" href="../../vista/detalleVentas">Detalle de ventas</a>
        </li>
    </div>
</div>
        <div class="pe-5 btn-group">
            <p class="d-flex align-items-center h-100 mt-2 my-2 mx-2"><?php $username = $_SESSION['username'];
                echo "{$username}"; ?></p>
            <div class="rounded-circle overflow-hidden" style="width: 42px; height: 42px; cursor: pointer;"
                 data-bs-toggle="dropdown" aria-expanded="false">
                <img src=../../img/avatar2.png class="w-100 h-100"/>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="../../controlador/logout.php">Cerrar sesión</a></li>
            </ul>
        </div>

    </div>
</nav>