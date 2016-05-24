<?php
  function get_pages($results) {
      $pages = [];
      foreach ($results as $row) {
          if (array_key_exists($row['subjects_id'], $results)) {
              if (!empty($row['pages_menu_name'])) {
                  $pages[$row['subjects_id']][] = $row['pages_menu_name'];
              }
          } else {
              $pages[$row['subjects_id']] = [];
          }
      }

      return $pages;
  }

  function get_subjects($results){
      $subjects = [];
      foreach ($results as $row) {
          $subjects[$row['id']] = $row['subject_menu_name'];
      }

      return $subjects;
  }

  function get_all_results() {
      global $db;
      $query = 'SELECT *
                FROM subjects s
                LEFT JOIN pages p ON s.id = p.subjects_id';
      $results = $db->select($query);

      return $results;
  }

  function navigation() {
    <ul class="subjects"> <?php
      $current_subject_id = 0;
      foreach ($results as $result) :
        if($result['id'] != $current_subject_id) :
          $current_subject_id = $result['id'];
          echo "<li";
          if ($result['id'] === $selected_subject_id) {
            echo " class='selected'";
          }
          echo "><a href='?subject=".$result['id']."'>".$result['subject_menu_name']."</a></li>";
      ?>
    <?php endif; ?>
     <ul class="pages">
       <?php echo "<li";
        if($result['pages_id'] === $selected_pages_id) {
          echo " class='selected'";
        }
        echo "><a href='?pages=".$result['pages_id']."'>".$result['pages_menu_name']."</a></li>"; ?>
        <?php endforeach; ?>
     </ul>
  }
