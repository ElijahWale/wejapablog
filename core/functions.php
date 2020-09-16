<?php 
// FORMAT DATE
    function formatDate($data) {
      $data = date('F j, Y, g:i a', strtotime($data));
      return $data;
    }

    function shortenText($text, $limit = 100) {
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text."...";
      
        return $text;
      
          
      }

      // function for admin
      function checkAdminCategory() {
        $_SESSION['isAdmin'] = true;
        if (isset($_SESSION['isAdmin'])) {
          echo'<li>';
             echo '<a href="categories.php"><i class="fa fa-fw fa-edit"></i> Categories</a>';
          echo '</li>';
        }
    }