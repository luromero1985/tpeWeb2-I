<!DOCTYPE html>
<html lang="es">

<head>
  <base href="{BASE_URL}">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Empleados Eventos Serranos</title>

</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="">Eventos Serranos</a>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav d-flex">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="empleados">Empleados</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="puestos">Puestos</a>
            </li>

            {if isset($smarty.session.usuarioId)}
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="logout">Logout({$smarty.session.usuarioEmail})</a>
              </li>
            {else}
              <li class="nav-item ml-auto">
                <a class="nav-link" aria-current="page" href="login">Login</a>
              </li>
            {/if}
          </ul>

        </div>
      </div>
    </nav>
  </header>

  <!-- inicio main container -->
  <main class="container">
    <h1>Eventos Serranos</h1>
<p>Servicio de eventos festivos </p>