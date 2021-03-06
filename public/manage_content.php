<!-- RECREATE A SINGLE QUERY WHERE YOU ARE JOINING TABLES AND
LOOP THROUGH THE RESULTS -->
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/database.php");
  include("../includes/config.php");
  $db = new Database();

  $query = "SELECT * FROM subjects WHERE visible = 1 ORDER BY position ASC";
  $subjects = $db->select($query);



  $query = "SELECT * FROM pages WHERE visible = 1 ORDER BY subject_id ASC";
  $pages = $db->select($query);

?>
<?php include("../includes/layouts/header.php"); ?>
    <div id="main">
      <div id="navigation">
        <ul class="subjects">
          <?php foreach($subjects as $item) : ?>
            <li><?php echo $item['menu_name']." (".$item['id'].")"; ?>
              <ul class="pages">
                <?php foreach($pages as $page) : ?>
                  <?php if($page['subject_id'] === $item['id']) : ?>
                    <li><?php echo $page['menu_name'] ?></li>
                  <?php endif; ?>
                <?php endforeach; ?>
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
