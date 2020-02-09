<?php
  // Copyright 2019 Energize Andover.  All rights reserved.

  include $_SERVER["DOCUMENT_ROOT"]."/util/security.php";

  require_once $_SERVER["DOCUMENT_ROOT"]."/util/format_event.php";
?>

<style>
  .dark-link
  {
    color: #495057;
  }
</style>

<div class="container">

  <div class="h5 pt-2 pb-3">
    Coming Events
  </div>

  <div class="list-group" >
    <?php
      // Iterate through table of events
      foreach ( $aEvents as $aEvent )
      {
        formatEvent( $aEvent );
      }
    ?>
  </div>

</div>
