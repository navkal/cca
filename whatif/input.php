<?php
  // Copyright 2019 Andover CCA.  All rights reserved.
?>

<div class="container">

  <form action="javascript:calculate();">

    <!-- Dropdown to select start month -->
    <div class="form-group">
      <label for="start-month">Start Month</label>
      <select id="start-month" class="form-control" >
        <?php

          // Get upper boundary: this month last year
          $iTime = time();
          $iThisMonth = intval( date( 'm', $iTime ) );
          $iLastYear = intval( date( 'y', $iTime ) ) - 1;

          // Initialize month and year counters
          $iMonth = 1;
          $iYear = 18;

          // Generate dropdown options
          do
          {
            // Format option display text
            $sOptionText = date( 'M', mktime( 0, 0, 0, $iMonth, 1 ) ) . ' ' . $iYear;

            // Increment month and year counters
            $iMonth ++;
            if ( $iMonth > 12 )
            {
              $iMonth = 1;
              $iYear ++;
            }

            // Determine loop status
            $bLastOption = ( $iYear >= $iLastYear ) && ( $iMonth > $iThisMonth );

            // Echo option
            echo( '<option ' . ( $bLastOption ? 'selected' : '' ) . ' >' . $sOptionText . '</option>' );
          }
          while( ! $bLastOption );
        ?>

      </select>
    </div>

    <!-- 13 input fields -->
    <div class="form-group">
      <?php
        for ( $iRow = 1; $iRow <= 7; $iRow ++ )
        {
          $sId1 = 'kwh-' . $iRow;
          $sId2 = 'kwh-' . ( $iRow + 7 );
      ?>
          <label for="<?=$sId1?>"><?=$sId1?></label>
          <input id="<?=$sId1?>" type="text">
          <?php
            if ( $iRow < 7 )
            {
          ?>
              <label for="<?=$sId2?>"><?=$sId2?></label>
              <input id="<?=$sId2?>" type="text">
          <?php
            }
          ?>
          <br/>
      <?php
        }
      ?>
    </div>

  </form>

</div>

<script>
  $( document ).ready( onInputReady );

  function onInputReady()
  {
    $( '#start-month' ).on( 'change', onChangeStartMonth );
    onChangeStartMonth();
  }

  function onChangeStartMonth()
  {
    console.log( 'selected=' + $( '#start-month' ).val() );
    var aInputs = $( 'input' );
    console.log( '==> num inputs: ' + aInputs.length );
  }

  function calculate()
  {
    alert( 'calculcate()' );
  }
</script>