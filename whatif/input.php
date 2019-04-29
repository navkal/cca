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
        ?>
          <option value="" >
            <?=date( 'M', mktime( 0, 0, 0, $iMonth, 1 ) )?> <?=$iYear?>
          </option>
        <?php

            // Increment counters
            $iMonth ++;
            if ( $iMonth > 12 )
            {
              $iMonth = 1;
              $iYear ++;
            }
          }
          while( ( $iYear < $iLastYear ) || ( $iMonth <= $iThisMonth ) );
        ?>

      </select>
    </div>

    <!-- 13 input fields -->
    <div class="form-group">
      <?php
        for ( $iMonth = 0; $iMonth < 13; $iMonth ++ )
        {
          $sId = 'kwh-' . $iMonth;
      ?>
          <label for="<?=$sId?>">Moo</label>
          <input id="<?=$sId?>" type="text">
      <?php
        }
      ?>
    </div>



  </form>

</div>

<script>
  function calculate()
  {
    alert( 'calculcate()' );
  }
</script>