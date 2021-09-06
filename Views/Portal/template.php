<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/bootstrap4/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles/dashboard.css" />
</head>

<body>
    <div class="d-flex" id="wrapper">

        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom"><i class="bi bi-bank2 me-2"></i>Tienda CJ</div>
            <div class="list-group list-group-flush">
                <a href="admin.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="bi bi-three-dots-vertical me-2"></i>Dashboard</a>
                <a href="../inicio/cerrarSesion.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="bi bi-box-arrow-left me-2"></i>Cerrar Sesión</a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-list primary-text fs-3 me-2" id="menu-toggle"></i>
                    <p class="fs-3 m-0 second-text">Dashboard</p>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <!--<a class="nav-link dropdown-toggle second-text fw-bold ms-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person me-2"></i><?php echo $_SESSION['usuario']->nombres ?>
                            </a>-->
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4 py-4">