<?php
  // Copyright 2019 Energize Andover.  All rights reserved.

  include $_SERVER["DOCUMENT_ROOT"]."/util/security.php";

  require_once $_SERVER["DOCUMENT_ROOT"]."/util/format_event.php";

  function showComingEvents( $aEvents )
  {
  ?>
    <!-- Coming event -->
    <hr/>
    <div class="pl-4">
      <h6>
        <u>Coming Event</u>
      </h6>
      <?php
        formatEvent( $aEvents[0], false );
      ?>
    </div>
    <hr/>

    <!-- Link to Events page -->
    <h6>
      <a href="/?page=events">All Events</a>
    </h6>
  <?php
  }
?>

<style>
  body
  {
    background-image: url( "welcome/banner.jpg" );
    background-position: center top;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }

  .jumbotron
  {
    padding-top: .75rem;
    background-color: transparent;
    color: #384897;
  }

  .dark-link
  {
    color: #384897;
  }

  hr
  {
    border-top: 1px dotted #384897;
  }

  .event-text-alert
  {
    font-weight: bold;
    color: red;
  }

  .event-text-general
  {
    font-weight: 500;
  }

  .event-text-topic
  {
    font-weight: 500;
    color: #006600;
    font-size: 1.25rem;
  }

</style>

<div class="jumbotron jumbotron-fluid">
  <div class="container">

    <!-- Title -->
    <h4>
      Let's bring
    </h4>
    <h3>
      <span class="font-weight-bold"><a href="/?page=overview" class="dark-link" ><i>Community Choice Aggregation</i></a></span>
    </h3>
    <h4>
      to Andover.
    </h4>

    <!-- Link to sign-up form -->
    <h6>
      <a href="https://docs.google.com/forms/d/e/1FAIpQLScP7_LHHiBiykztDq8usdPlBrmZCGDSoFgIJYOxIUuwByxegw/viewform?usp=pp_url&entry.238260412=No&entry.1029755686=No" target="_blank" >Sign up</a> for Andover CCA updates.
    </h6>

    <!-- Coming events -->
    <?php
      // showComingEvents( $aEvents );
    ?>

    <!-- Vertical space so text can be scrolled above background clip art -->
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>

  </div>
</div>
