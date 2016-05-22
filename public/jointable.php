<!-- RECREATE A SINGLE QUERY WHERE YOU ARE JOINING TABLES AND
LOOP THROUGH THE RESULTS -->
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/database.php");
  include("../includes/config.php");
  $db = new Database();
  //$query = "SELECT * FROM subjects WHERE visible = 1 ORDER BY position ASC";
  //$subject_name = $db->select($query);
  // echo "<pre>".print_r($subject_name, true)."</pre>";
  $query = "SELECT * FROM subjects LEFT JOIN pages ON subjects.subjects_id = pages.subjects_id";
  $results = $db->select($query);
  echo "<pre>".print_r($results, true)."</pre>";
  // foreach($results as $item) {
  //
  //   "<li>".
    // $subject = 0;
  //   if($item['subjects_id'] === $subject) {
  //     $subject = $item['subjects_id'];
  //     echo $item['subject_menu_name'];
  //   }
  // }



?>
<?php include("../includes/layouts/header.php"); ?>
    <div id="main">
      <div id="navigation">
        <ul class="subjects">
          <?php foreach($results as $item) : ?>
            <li><?php echo $item['subject_menu_name']; ?>
              <ul class="pages">
                <li><?php
                  $subject = 0;
                  if ($item['subjects_id'] !== $subject) {
                    $subject = $item['subjects_id'];
                    echo $item['pages_menu_name'];
                  }
                ?></li>
              </ul>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div id="page">
        <h2>Manage Content</h2>

      </div>
    </div>
<?php include("../includes/layouts/footer.php"); ?>
