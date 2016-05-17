<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/database.php");
  include("../includes/config.php");
  $db = new Database();

  $query = "SELECT * FROM subjects WHERE visible = 1 ORDER BY position ASC";
  $subjects = $db->select($query);

  $query = "SELECT * FROM pages WHERE visible = 1 AND subject_id =  ORDER BY position ASC";
  $pages = $db->select($query);

  // $menu_name = "Today's Widget Trivia";
  // $position = 4;
  // $visible =  1;
  // $query = "INSERT INTO subjects (menu_name, position, visible) VALUES (:menu_name, :position, :visible)";
  // $run = $db->insert($query, array(':menu_name'=>$menu_name, ':position'=>$position, ':visible'=>$visible));
?>
<?php include("../includes/layouts/header.php"); ?>
    <div id="main">
      <div id="navigation">
        <ul class="subjects">
          <?php foreach($subjects as $item) : ?>
            <li><?php echo $item['menu_name']." (".$item['id'].")"; ?>
              <ul class="pages">
                <?php foreach($pages as $page) : ?>
                  <li><?php echo $page['menu_name'] ?></li>
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
