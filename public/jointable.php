<!-- RECREATE A SINGLE QUERY WHERE YOU ARE JOINING TABLES AND
LOOP THROUGH THE RESULTS -->
<?php require_once '../includes/functions.php'; ?>
<?php include '../includes/database.php';
  include '../includes/config.php';
  $db = new Database();
?>
 <?php
  $results = get_all_results();
  // $subjects = get_subjects($results);
  echo '<pre>'.print_r($results, true).'</pre>';
  // $pages = get_pages($results);
  ?>
<?php include '../includes/layouts/header.php'; ?>
    <div id="main">
      <div id="navigation">
        <ul class="subjects"> <?php
          $current_subject_id = 0;
          foreach ($results as $result) :
            if($result['id'] != $current_subject_id) :
              $current_subject_id = $result['id'];
              // echo "<li>".$result['subject_menu_name']."</li>";
         ?>
          <li><?php echo $result['subject_menu_name']; ?></li>
        <?php endif; ?>
         <ul>
           <?php echo "<li><a href='?id=".$result['pages_id']."'>".$result['pages_menu_name']."</a></li>"; ?>
         </ul>
       <?php endforeach; ?>
        </ul>
      </div>
      <div id="page">
        <h2>Manage Content</h2>

      </div>
    </div>
<?php include '../includes/layouts/footer.php'; ?>
