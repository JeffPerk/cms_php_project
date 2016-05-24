<!-- RECREATE A SINGLE QUERY WHERE YOU ARE JOINING TABLES AND
LOOP THROUGH THE RESULTS -->
<?php require_once '../vendor/autoload.php'; ?>
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
        <?php echo navigation($results, $selected_subject_id, $selected_pages_id); ?>
      </div>
      <div id="page">
        <?php if($selected_subject_id) : ?>
          <h2>Manage Subject</h2>
          <?php $specified_subject = find_subject_by_id($selected_subject_id); //function will return the subject related to the specific subject that user clicked?>
          <?php $current_subject = flatten_array($specified_subject); //This sends the current subject to the flatten array function.?>
          Menu name: <?php echo $current_subject[1]; //Specified sub array is the flattened array and the index 1 represents subject menu name?>
        <?php elseif($selected_pages_id) : ?>
          <h2>Manage Page</h2>
          <?php $specified_page = find_page_by_id($selected_pages_id); //function will return the page related to the specific page that user clicked?>
          <?php $current_page = flatten_array($specified_page); //function will return a flattened array for easier access of values?>
          Page name: <?php echo $current_page[2]; //index relates to the pages_menu_name key in array?>
        <?php else : ?>
          <p>Please select a subject or a page.</p>
        <?php endif; ?>
      </div>
    </div>
<?php include '../includes/layouts/footer.php'; ?>
