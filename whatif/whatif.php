<?php
  // Copyright 2019 Andover CCA.  All rights reserved.
?>

<div class="container">

  <div>
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

  <div>

    <table id="cca-table" class="tablesorter" style="display:none">
      <thead>
        <tr>
          <th>AlphaNumeric</th>
          <th>Numeric</th>
          <th>Animals</th>
          <th>Sites</th>
          <th>AlphaNumeric</th>
          <th>Numeric</th>
          <th>Animals</th>
          <th>Sites</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>aaa 000</td>
          <td>10</td>
          <td>Koala</td>
          <td>http://www.google.com</td>
          <td>abc 123</td>
          <td>10</td>
          <td>Koala</td>
          <td>http://www.google.com</td>
        </tr>
        <tr>
          <td>abc 9</td>
          <td>10</td>
          <td>Girafee</td>
          <td>http://www.facebook.com</td>
          <td>abc 9</td>
          <td>10</td>
          <td>Girafee</td>
          <td>http://www.facebook.com</td>
        </tr>
        <tr>
          <td>zyx 24</td>
          <td>767</td>
          <td>Bison</td>
          <td>http://www.whitehouse.gov/</td>
          <td>zyx 24</td>
          <td>767</td>
          <td>Bison</td>
          <td>http://www.whitehouse.gov/</td>
        </tr>
        <tr>
          <td>abc 11</td>
          <td>3</td>
          <td>Chimp</td>
          <td>http://www.ucla.edu/</td>
          <td>abc 11</td>
          <td>3</td>
          <td>Chimp</td>
          <td>http://www.ucla.edu/</td>
        </tr>
        <tr>
          <td>ABC 10</td>
          <td>87</td>
          <td>Zebra</td>
          <td>http://www.google.com</td>
          <td>ABC 10</td>
          <td>87</td>
          <td>Zebra</td>
          <td>http://www.google.com</td>
        </tr>
        <tr>
          <td>zyx 24</td>
          <td>767</td>
          <td>Bison</td>
          <td>http://www.whitehouse.gov/</td>
          <td>zyx 24</td>
          <td>767</td>
          <td>Bison</td>
          <td>http://www.whitehouse.gov/</td>
        </tr>
        <tr>
          <td>ABC 10</td>
          <td>87</td>
          <td>Zebra</td>
          <td>http://www.google.com</td>
          <td>ABC 10</td>
          <td>87</td>
          <td>Zebra</td>
          <td>http://www.google.com</td>
        </tr>
        <tr>
          <td>abc 123</td>
          <td>10</td>
          <td>Koala</td>
          <td>http://www.google.com</td>
          <td>abc 123</td>
          <td>10</td>
          <td>Koala</td>
          <td>http://www.google.com</td>
        </tr>
      </tbody>
    </table>

  </div>


</div>

<script>

  $( document ).ready( onDocumentReady );

  function onDocumentReady()
  {
    $( '#start-month' ).on( 'change', onChangeStartMonth );
    onChangeStartMonth();
  }

  function onChangeStartMonth()
  {
    var aInputs = $( 'input' );
    console.log( '==> num inputs: ' + aInputs.length );
  }

  function calculate()
  {
    var tTableProps =
    {
      theme : 'green',
      widgets : [ 'uitheme', 'resizable', 'filter' ],
      widgetOptions :
      {
        resizable: true,
        filter_reset : '.reset',
        filter_cssFilter: 'form-control'
      }
    };

    // Initialize the tablesorter
    $( '#cca-table' ).tablesorter( jQuery.extend( true, { sortList: [[0,0]] }, tTableProps ) );
    $( '#cca-table' ).show();
  }
</script>


<!-- tablesorter theme -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/css/theme.green.min.css" integrity="sha256-5wegm6TtJ7+Md5L+1lED6TVE+NAr0G+ZyHuPRrihJHE=" crossorigin="anonymous" />

<!-- tablesorter basic libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js" integrity="sha256-uC1JMW5e1U5D28+mXFxzTz4SSMCywqhxQIodqLECnfU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.widgets.min.js" integrity="sha256-Xx4HRK+CKijuO3GX6Wx7XOV2IVmv904m0HKsjgzvZiY=" crossorigin="anonymous"></script>

