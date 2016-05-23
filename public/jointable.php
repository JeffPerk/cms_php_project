<!-- RECREATE A SINGLE QUERY WHERE YOU ARE JOINING TABLES AND
LOOP THROUGH THE RESULTS -->
<?php require_once '../includes/functions.php'; ?>
<?php include '../includes/database.php';
  include '../includes/config.php';
  $db = new Database();
?>
 <?php
  $results = get_all_results();
  $subjects = get_subjects($results);
  echo '<pre>'.print_r($results, true).'</pre>';
  $pages = get_pages($results);
  ?>
<?php include '../includes/layouts/header.php'; ?>
    <div id="main">
      <div id="navigation">
        <ul class="subjects">
          <?php foreach ($subjects as $id => $subject) : ?>

            <a href="jointable.php?subject="<?); ?>><li>

              <?php
              echo $subject;
              ?></li></a>
              <ul class="pages">
                <?php if (array_key_exists($id, $pages)) :?>
                  <?php foreach ($pages[$id] as $page): ?>
                    <a href="jointable.php?page="<?php echo urlencode($page);?>><li><?php
                    echo $page;
                  ?></li></a>
                <?php endforeach; ?>
              <?php endif; ?>
              </ul>
            </li>
          <?php
         endforeach; ?>
        </ul>
      </div>
      <div id="page">
        <h2>Manage Content</h2>

      </div>
    </div>
<?php include '../includes/layouts/footer.php'; ?>
