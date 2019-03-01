<?php
function CurrentPageScript($data)
 {
      $current_page =substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
      return ($current_page == $data) ? 'active':NULL;
};
   function Check_if_Logged_Profile()
   {
      $data = (isset($_SESSION['email']) && !empty($_SESSION['email'])) ?  "block":  "none";
      echo $data;
   };
    function Check_if_Logged()
   {
      $data = (isset($_SESSION['email']) && !empty($_SESSION['email'])) ?  "none":  "block";
      echo $data;
   };
 //  function IfGamePageShowRezults()
  // {
  //          $current_page =substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  //          $data = ($current_page == 'game.php' || $current_page == 'ranking.php') ? 'block':'none';
  //          echo $data;
  // };
?>