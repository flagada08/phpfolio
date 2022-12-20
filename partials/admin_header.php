<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>admin_phpfolio</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  </head>

  <body>
    <div class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" role="navigation">
      <div class="container-fluid">
        <div class="nav-header">
          <a href="<?= WEBROOT; ?>admin/index.php" class="navbar-brand"><img src="https://www.php.net/images/logos/php-icon.png" alt="PHP" class="d-inline-block align-text-top"> Mon phpfolio </a>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="category.php" class="nav-link">Catégories</a>
          </li>
          <li>
            <a href="work.php" class="nav-link">Réalisations</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="container">

      <p>&nbsp</p>
      <p>&nbsp</p>
      <p>&nbsp</p>

      <?= flash() ?>