<?php
  function get_pages($results)
  {
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

  function get_subjects($results)
  {
      $subjects = [];
      foreach ($results as $row) {
          $subjects[$row['id']] = $row['subject_menu_name'];
      }

      return $subjects;
  }

  function get_all_results()
  {
      global $db;
      $query = 'SELECT s.id, s.subject_menu_name, p.pages_menu_name, p.subjects_id
                FROM subjects s
                LEFT JOIN pages p ON s.id = p.subjects_id';
      $results = $db->select($query);

      return $results;
  }
