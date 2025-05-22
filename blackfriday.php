<?php
include 'processamenu.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Black Friday - Ofertas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="src/css/menu.css">
  <link rel="stylesheet" href="src/css/blackf.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">🔥 Black Friday</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar" aria-controls="menuNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menuNavbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="btn btn-primary me-2" href="menu.php">E-commerce</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-success me-2" href="produtos.php">Gerenciar Produtos</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-secondary" href="blackfriday.php">BlackFriday</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2 class="text-center mb-4">Ofertas Imperdíveis 🔥</h2>
    <div class="row">
      <?php
        ExibirListaProdblack();
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>