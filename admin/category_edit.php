<?php
include '../lib/includes.php';

if(isset($_POST['name']) && isset($_POST['slug'])){
  checkCsrf();
  $slug = $_POST['slug'];
  if(preg_match('/^[a-z\-0-9]+$/', $slug)){
    $name = $db->quote($_POST['name']);
    $slug = $db->quote($_POST['slug']);
    if(isset($_GET['id'])){
      $id = $db->quote($_GET['id']);
      $db->query("UPDATE categories SET name=$name, slug=$slug WHERE id=$id");
    }else{
      $db->query("INSERT INTO categories SET name=$name, slug=$slug");
    }
    setFlash('La catégorie a été ajoutée');
    header('Location:category.php');
    die();
  }else{
    setFlash('Le slug n\'est pas valide', 'danger');
  }
}

if(isset($_GET['id'])){
  $id = $db->quote($_GET['id']);
  $select = $db->query("SELECT * FROM categories WHERE id=$id");
  if($select->rowCount() == 0){
    setFlash("ID de la catégorie inconnu", 'danger');
    header('Location:category.php');
    die();
  }
  $_POST = $select->fetch();
}

include '../partials/admin_header.php';;
?>

<h1>Éditer une catégorie</h1>

<form action="#" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Nom de la catégorie</label>
    <?= input('name'); ?>
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">URL de la catégorie</label>
    <?= input('slug'); ?>
  </div>
  <?= csrfInput(); ?>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php include '../partials/footer.php'; ?>