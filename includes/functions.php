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
  //navigation takes 2 arguments
  function navigation($results, $subject_id, $pages_id) {
    $output = "<ul class=\"subjects\">";
    $current_subject_id = 0;
      foreach ($results as $result) {
        if($result['id'] != $current_subject_id) {
          $current_subject_id = $result['id'];
          $output .= "<li";
          if ($result['id'] === $subject_id) {
            $output .= " class='selected'";
          }
          $output .= "><a href='?subject=";
          $output .= $result['id'];
          $output .= "'>";
          $output .= $result['subject_menu_name'];
          $output .= "</a></li>";
        }
        $output .= "<ul class=\"pages\">";
        $output .= "<li";
        if($result['pages_id'] === $pages_id) {
          $output .= " class='selected'";
        }
        $output .= "><a href='?pages=".$result['pages_id']."'>".$result['pages_menu_name']."</a></li>";
        $output .= "</ul>";
      }
      $output .= "</ul>";
      return $output;
  }
