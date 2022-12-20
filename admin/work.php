<?php
include '../lib/includes.php';
include '../partials/admin_header.php';

/**
 * SUPPRESSION
 */
if(isset($_GET['delete'])){
  checkCsrf();
  $id = $db->quote($_GET['delete']);
  $db->query("DELETE FROM works WHERE id=$id");
  setFlash('Réalisation supprimée');
  header('Location:work.php');
  die();
}

/**
 * works
 */
$select = $db->query("SELECT id, name, slug FROM works");
$works = $select->fetchAll();
?>

<h1>Mes réalisations</h1>

<p><a href="work_edit.php" class="btn btn-success">Ajouter une réalisation</a></p>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($works as $category): ?>
      <tr>
        <td><?= $category['id']; ?></td>
        <td><?= $category['name']; ?></td>
        <td>
          <a href="work_edit.php?id=<?= $category['id'] ?>" class="btn btn-warning">Edit</a>
          <a href="?delete=<?= $category['id'] ?>&<?= csrf(); ?>" class="btn btn-danger" onclick="return confirm('Confirmer la suppression');">Supprimer</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../partials/footer.php'; ?>