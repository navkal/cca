<?php
  // Copyright 2019 Andover CCA.  All rights reserved.
?>

<style>
div.error
{
  color: #b30000;
}
input.error
{
  border: solid 1px #b30000;
  color: #b30000;
}
</style>

<div class="container">

  <form action="javascript:calculateOutput();" style="display:none">

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
            $sOptionValue = $iMonth . '.' . $iYear;

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
            echo( '<option ' . ( $bLastOption ? 'selected' : '' ) . ' value="' . $sOptionValue . '" >' . $sOptionText . '</option>' );
          }
          while( ! $bLastOption );
        ?>

      </select>
    </div>

    <!-- kWh input fields -->
    <?php
      for ( $iRow = 1; $iRow <= 7; $iRow ++ )
      {
        $sId1 = 'kwh-' . $iRow;
        $sId2 = 'kwh-' . ( $iRow + 7 );
    ?>
        <div class="form-group row">
          <div class="col">
            <label for="<?=$sId1?>" class="col-sm-2 col-form-label col-form-label-sm" ></label>
            <input id="<?=$sId1?>" type="text" class="form-control form-control-sm kwh-input">
          </div>
          <div class="col">
            <label for="<?=$sId2?>" class="col-sm-2 col-form-label col-form-label-sm"></label>
            <input id="<?=$sId2?>" type="text" class="form-control form-control-sm kwh-input">
          </div>
        </div>
    <?php
      }
    ?>

    <button id="calculate-button" type="submit" class="btn btn-primary" disabled >Calculate</button>
    <button id="clear-button" type="button" class="btn btn-secondary" >Clear</button>

  </form>

  <div class="mt-5">

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

  var aMonths = [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ];

  $( document ).ready( onDocumentReady );

  function onDocumentReady()
  {
    // Set up event handlers
    $( '#start-month' ).on( 'change', onChangeStartMonth );
    $( '.kwh-input' ).on( 'change', onChangeKwhInput );
    $( '#clear-button' ).on( 'click', clearInput );

    // Hide the last label and input
    $( "label[for='kwh-14']" ).hide();
    var aInputs = $( '.kwh-input' );
    var tDummy = $( aInputs[aInputs.length-1] );
    tDummy.hide();
    tDummy.removeClass( 'kwh-input' );

    // Set the tab order
    initTabOrder();

    // Handle initial dropdown selection
    onChangeStartMonth();

    // Show the form
    $( 'form' ).show();

    // Focus on the dropdown
    $( '#start-month' ).focus();
  }

  function initTabOrder()
  {
    $( '#start-month' ).prop( 'tabindex', 1 );

    var aInputs = $( '.kwh-input' );
    for ( var iInput = 0; iInput < aInputs.length; iInput ++ )
    {
      $( aInputs[iInput] ).prop( 'tabindex', ( iInput % 2 ) + 1 );
    }

    $( '#calculate-button' ).prop( 'tabindex', 2 );
    $( '#clear-button' ).prop( 'tabindex', 3 );
  }

  function onChangeStartMonth()
  {
    var aMonthYear = $( '#start-month' ).val().split( '.' );
    var iStartMonth = aMonthYear[0];
    var iStartYear = aMonthYear[1];

    var aInputs = $( '.kwh-input' );
    for ( var iInput = 1; iInput <= aInputs.length; iInput ++ )
    {
      // Set next label
      var tLabel = $( "label[for='kwh-" + iInput + "']" );
      tLabel.html( aMonths[ iStartMonth - 1 ] + '&nbsp;' +  iStartYear );

      // Increment month and year counters
      iStartMonth = ( iStartMonth % 12 ) + 1;
      if ( iStartMonth == 1 )
      {
        iStartYear ++;
      }
    }
  }

  function onChangeKwhInput( tEvent )
  {
    var tTarget = $( tEvent.target );
    var tParent = tTarget.parent();

    // Trim the input
    tTarget.val( tTarget.val().trim() );

    // Validate the input
    if ( /^\d+$/.test( tTarget.val() ) )
    {
      tTarget.removeClass( 'error' );
      tParent.removeClass( 'error' );

      // If all inputs contain integers, enable the calculate button
      var bReady = $( '.error' ).length == 0;
      var aInputs = $( '.kwh-input' );
      for ( var iInput = 0 ; bReady && ( iInput < aInputs.length ); iInput ++ )
      {
        bReady = $( aInputs[iInput] ).val() != '';
      }

      if ( bReady )
      {
        enableCalculateButton( true );
      }
    }
    else
    {
      tTarget.addClass( 'error' );
      tParent.addClass( 'error' );
      enableCalculateButton( false );
    }
  }

  function calculateOutput()
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

  function enableCalculateButton( bEnable )
  {
    $( '#calculate-button' ).prop( 'disabled', ! bEnable );
  }

  function clearInput()
  {
    $( '.kwh-input' ).val( '' );
    $( '.error' ).removeClass( 'error' );
    enableCalculateButton( false );
    $( '#cca-table' ).hide();
    $( '#start-month' ).focus();
  }
</script>

<!-- tablesorter theme -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/css/theme.green.min.css" integrity="sha256-5wegm6TtJ7+Md5L+1lED6TVE+NAr0G+ZyHuPRrihJHE=" crossorigin="anonymous" />

<!-- tablesorter basic libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js" integrity="sha256-uC1JMW5e1U5D28+mXFxzTz4SSMCywqhxQIodqLECnfU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.widgets.min.js" integrity="sha256-Xx4HRK+CKijuO3GX6Wx7XOV2IVmv904m0HKsjgzvZiY=" crossorigin="anonymous"></script>

