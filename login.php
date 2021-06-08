<?php $auth = 0;
include 'lib/includes.php';

/**
* TRAITEMENT DU FORM
**/
if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $db->quote($_POST['username']);
  $password = sha1($_POST['password']);
  $sql = "SELECT * FROM users WHERE username=$username AND password='$password'";
  // var_dump($sql);
  $select = $db->query($sql);
  if($select->rowCount() > 0){
    $_SESSION['Auth'] = $select->fetch();
    setFlash('Connecté avec succès');
    header('Location:' . WEBROOT . 'admin/index.php');
    die();
  };
}

$categories = $db->query('SELECT slug, name FROM categories')->fetchAll();

/**
* INCLUSION DU HEADER
**/
include 'partials/header.php';
?>

<form action="#" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Nom d'utilisateur</label>
    <?= input('username'); ?>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php include 'partials/footer.php'; ?>