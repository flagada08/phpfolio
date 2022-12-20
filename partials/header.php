<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= isset($title) ? $title : 'Mon phpfolio'; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  </head>

  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" role="navigation">
      <div class="container-fluid">
        
          <a href="<?= WEBROOT; ?>" class="navbar-brand"><img src="https://www.php.net/images/logos/php-icon.png" alt="PHP" class="d-inline-block align-text-top"> Mon phpfolio </a>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <?php foreach($categories as $category): ?>
                <li class="nav-item">
                  <a class="nav-link<?php if(isset($_GET['category']) && $_GET['category'] == $category['slug']){ echo ' active'; } ?>" href="<?= WEBROOT; ?>categorie/<?= $category['slug']; ?>">
                  <?= $category['name']; ?>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        
      </div>
    </nav>

    <div class="container">

      <p>&nbsp</p>
      <p>&nbsp</p>
      <p>&nbsp</p>

      <?= flash() ?>