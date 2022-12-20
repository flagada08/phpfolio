<?php
$auth = 0;
include 'lib/includes.php';
include 'lib/image.php';

$condition = '';
$category = false;
if(isset($_GET['category'])){
  $slug = $db->quote($_GET['category']);
  $select = $db->query("SELECT * FROM categories Where slug=$slug");
  if(!isset($_GET['category'])){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location:" . WEBROOT);
    die();
  }
  $category = $select->fetch();
  $condition = "WHERE works.category_id={$category['id']}";
}
$works = $db->query(
"SELECT works.name, works.id, works.slug, works.content, images.name as image_name 
FROM works 
LEFT JOIN images ON images.id = works.image_id
$condition"
)->fetchAll();

$categories = $db->query('SELECT slug, name FROM categories')->fetchAll();

if($category){
  $title = "Mes réalisations {$category['name']}";
}else{
  $title = "Mon phpfolio";
}

include 'partials/header.php'; 

?>

<h1><?= $title; ?></h1>

<p>&nbsp</p>

<div class="row">

  <div class="col-sm-8">
    <div class="row">
      <?php foreach($works as $k => $work): ?>
        <div class="col-sm-6">
        
          <div class="card" style="width: 20rem;">
              <img src="<?= WEBROOT; ?>img/works/<?= resizedName($work['image_name'], 150, 150); ?>" class="card-img-top" alt="<?= $work['name']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $work['name']; ?></h5>
                <p class="card-text"><?= substr($work['content'], 0, 30) . "..." ?></p>
              <a href="<?= WEBROOT; ?>realisation/<?= $work['slug']; ?>" class="btn btn-primary">
                <?= $work['name']; ?>
              </a>
            </div>
          </div>

          <p>&nbsp</p>

        </div>
      <?php endforeach; ?>
    </div>
  </div>

    <div class="col-sm-2">

      <div class="list-group">
        
          <?php foreach($categories as $category): ?>
            
            <a href="<?= WEBROOT; ?>categorie/<?= $category['slug']; ?>" class="list-group-item list-group-item-action<?php if(isset($_GET['category']) && $_GET['category'] == $category['slug']){
              echo ' active';
            } ?>">
              <?= $category['name']; ?>
            </a>
            
          <?php endforeach ?>
        
      </div>

    </div>

</div>

<?php include 'partials/footer.php'; ?>