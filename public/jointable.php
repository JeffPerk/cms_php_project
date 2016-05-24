<!-- RECREATE A SINGLE QUERY WHERE YOU ARE JOINING TABLES AND
LOOP THROUGH THE RESULTS -->
<?php require_once '../includes/functions.php'; ?>
<?php include '../includes/database.php';
  include '../includes/config.php';
  $db = new Database();
?>
 <?php
  $results = get_all_results();
  if(isset($_GET['subject'])) {
    $selected_subject_id = $_GET['subject'];
    $selected_pages_id = null;
  } elseif(isset($_GET['pages'])) {
    $selected_pages_id = $_GET['pages'];
    $selected_subject_id = null;
  } else {
    $selected_subject_id = null;
    $selected_pages_id = null;
  }
  ?>
<?php include '../includes/layouts/header.php'; ?>
    <div id="main">
      <div id="navigation">
      </div>
      <div id="page">
        <h2>Manage Content</h2>
        <?php echo $selected_subject_id; ?><br />
        <?php echo $selected_pages_id; ?>
      </div>
    </div>
<?php include '../includes/layouts/footer.php'; ?>
