<!-- RECREATE A SINGLE QUERY WHERE YOU ARE JOINING TABLES AND
LOOP THROUGH THE RESULTS -->
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/database.php");
  include("../includes/config.php");
  $db = new Database();
  $query = "SELECT s.id, s.subject_menu_name, p.pages_menu_name, p.subjects_id FROM subjects s LEFT JOIN pages p ON s.id = p.subjects_id";
  $results = $db->select($query);
  echo "<pre>".print_r($results, true)."</pre>";
?>
<?php
  $subjects = [];
  foreach($results as $row) {
    $subjects[$row['subjects_id']] = $row['subject_menu_name'];
  }
  $subjects_clean = array_unique($subjects);
  echo "<pre>".print_r($subjects_clean,true)."</pre>";
 ?>
 <?php
  $pages = [];
  foreach($results as $row) {
    if(array_key_exists($row['subjects_id'], $pages)) {
      $pages[$row['subjects_id']][] = $row['pages_menu_name'];
    } else {
      if(!empty($row['pages_menu_name'])) {
        $pages[$row['subjects_id']] = [$row['pages_menu_name']];
      } else {
        $pages[$row['subjects_id']] = [];
      }
  }
  }
  echo "<pre>".print_r($pages,true)."</pre>";
  ?>
<?php include("../includes/layouts/header.php"); ?>
    <div id="main">
      <div id="navigation">
        <ul class="subjects">
          <?php foreach($subjects_clean as $item) : ?>
            <li><?php
            echo $item;
             ?></li>
              <ul class="pages">
                <?php foreach ($pages as $row): ?>
                <li><?php
                    echo $row;

                ?></li>
              <?php endforeach; ?>
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
<?php include("../includes/layouts/footer.php"); ?>
