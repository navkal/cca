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

  <div class="mt-1 mb-5">
    <div class="row">
      <div class="h6 col">
        What would your electric bill be with CCA?
      </div>
      <div class="col">
        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#help-modal">
          Help
        </button>
      </div>
    </div>
  </div>

  <!-- Input -->
  <form action="javascript:calculateOutput();" style="display:none">

    <!-- Dropdown to select start month -->
    <div class="form-group">
      <label for="start-month">Start Month</label>
      <select id="start-month" class="form-control form-control-sm" >
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
            <label for="<?=$sId1?>" class="col-sm-2 col-form-label col-form-label-sm kwh-label" ></label>
            <input id="<?=$sId1?>" type="text" class="form-control form-control-sm kwh-input">
          </div>
          <div class="col">
            <label for="<?=$sId2?>" class="col-sm-2 col-form-label col-form-label-sm kwh-label"></label>
            <input id="<?=$sId2?>" type="text" class="form-control form-control-sm kwh-input">
          </div>
        </div>
    <?php
      }
    ?>

    <!-- Buttons -->
    <div class="row mt-4">
      <div class="col text-center">
        <button id="calculate-button" type="submit" class="btn btn-primary" >
          Calculate
        </button>
        <button id="clear-button" type="button" class="btn btn-secondary" >
          Clear
        </button>
      </div>
    </div>

  </form>


  <!-- Output -->
  <div class="mt-5">

    <table id="cca-table" class="tablesorter" style="display:none">
      <thead>
        <tr>
          <th>Source</th>
          <th>Cost</th>
          <th>Savings</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div>

</div>

<!-- Help modal dialog -->
<div class="modal fade" id="help-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Instructions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info" role="alert">
          Enter <b>Electric Usage History</b> readings, listed on page 2 of your National Grid bill.  Then click 'Calculate'.
        </div>

        <img src="whatif/bill.png" class="img-fluid" ></img>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  var g_aSources = [ 'National Grid', 'Billerica Standard', 'Billerica Green', 'Cambridge Green', 'Cambridge Green Local' ];

  var g_tRates =
  {
    'All':
    {
      'Billerica Standard': 10.631,
      'Billerica Green': 10.733,
      'Cambridge Green': 11.12,
      'Cambridge Green Local': 11.94
    },
    'Jan 18':
    {
      'National Grid': 12.673,
    },
    'Feb 18':
    {
      'National Grid': 12.673,
    },
    'Mar 18':
    {
      'National Grid': 12.673,
    },
    'Apr 18':
    {
      'National Grid': 12.673,
    },
    'May 18':
    {
      'National Grid': 12.673,
    },
    'Jun 18':
    {
      'National Grid': 10.87,
    },
    'Jul 18':
    {
      'National Grid': 10.87,
    },
    'Aug 18':
    {
      'National Grid': 10.87,
    },
    'Sep 18':
    {
      'National Grid': 10.87,
    },
    'Oct 18':
    {
      'National Grid': 10.87,
    },
    'Nov 18':
    {
      'National Grid': 13.718,
    },
    'Dec 18':
    {
      'National Grid': 13.718,
    },
    'Jan 19':
    {
      'National Grid': 13.718,
    },
    'Jan 19':
    {
      'National Grid': 13.718,
    },
    'Feb 19':
    {
      'National Grid': 13.718,
    },
    'Mar 19':
    {
      'National Grid': 13.718,
    },
    'Apr 19':
    {
      'National Grid': 13.718,
    },
    'May 19':
    {
      'National Grid': 13.718,
    },
  };

  $( document ).ready( onDocumentReady );

  function onDocumentReady()
  {
    // Set up event handlers
    $( '#start-month' ).on( 'change', onChangeStartMonth );
    $( '.kwh-input' ).on( 'change', onChangeKwhInput );
    $( '#clear-button' ).on( 'click', clearInput );

    // Hide the last label and input
    $( 'label[for="kwh-14"]' ).hide().removeClass( 'kwh-label' );
    $( '#kwh-14' ).hide().removeClass( 'kwh-input' );;

    // Set the tab order
    initTabOrder();

    // Handle initial dropdown selection
    onChangeStartMonth();

    // Show the form
    $( 'form' ).show();

    // Initialize the table
    initTable();

    // Clear the input
    clearInput();
  }

  function initTabOrder()
  {
    $( '#start-month' ).prop( 'tabindex', 1 );

    var aInputs = $( '.kwh-input' );
    for ( var iInput = 0; iInput < aInputs.length; iInput ++ )
    {
      $( aInputs[iInput] ).prop( 'tabindex', ( iInput % 2 ) + 1 );
    }

    $( 'form button' ).prop( 'tabindex', 2 );
  }

  function onChangeStartMonth()
  {
    var aMonthYear = $( '#start-month' ).val().split( '.' );
    var iStartMonth = aMonthYear[0];
    var iStartYear = aMonthYear[1];

    var aInputs = $( '.kwh-input' );
    var aMonths = [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ];
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

  function initTable()
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

    $( '#cca-table' ).tablesorter( jQuery.extend( true, { sortList: [[0,0]] }, tTableProps ) );
  }

  function calculateOutput()
  {
    var nCostNg = calculateCost( 'National Grid' );

    var sHtml = '';
    for ( var iSource = 0; iSource < g_aSources.length; iSource ++ )
    {
      var sSource = g_aSources[iSource];
      sHtml += '<tr>';
      sHtml += '<td>';
      sHtml += sSource;
      sHtml += '</td>';
      sHtml += '<td>$';
      sHtml += calculateCost( sSource );
      sHtml += '</td>';
      sHtml += '<td>$';
      sHtml += ( nCostNg - calculateCost( sSource ) ).toFixed( 0 );
      sHtml += '</td>';
      sHtml += '</tr>';
    }

    $( '#cca-table tbody' ).html( sHtml );

    // Initialize the tablesorter
    var tTable = $( '#cca-table' );
    tTable.trigger( 'updateAll' );
    tTable.show();
  }

  function calculateCost( sSource )
  {
    var nCost = 0;

    var aLabels = $( '.kwh-label' );
    for ( var iLabel = 0; iLabel < aLabels.length; iLabel ++ )
    {
      var tLabel = $( aLabels[iLabel] );
      var sMonthYear = tLabel.text().replace( /\u00a0/g, ' ' );
      var nRate = ( sSource in g_tRates['All'] ) ? g_tRates['All'][sSource] : g_tRates[sMonthYear][sSource];
      nCost += nRate * $( '#' + tLabel.attr( 'for' ) ).val();
    }

    nCost = nCost / 100;
    nCost = nCost.toFixed( 0 );
    console.log( '===> ' + sSource + ': $' + nCost + ' from ' + $( '#kwh-1' ).parent().find('label').text() + ' to ' + $( '#kwh-13' ).parent().find('label').text() ) ;

    return nCost;
  }

  function enableCalculateButton( bEnable )
  {
    $( '#calculate-button' ).prop( 'disabled', ! bEnable ).focus();
  }

  function clearInput()
  {
    $( '.kwh-input' ).val( '' );
    $( '.error' ).removeClass( 'error' );
    enableCalculateButton( false );
    $( '#cca-table' ).hide();
    $( '#start-month' ).focus();

    // For testing
    // House 1
    $( '#kwh-1' ).val( 659 );
    $( '#kwh-2' ).val( 599 );
    $( '#kwh-3' ).val( 988 );
    $( '#kwh-4' ).val( 1569 );
    $( '#kwh-5' ).val( 2132 );
    $( '#kwh-6' ).val( 1736 );
    $( '#kwh-7' ).val( 797 );
    $( '#kwh-8' ).val( 608 );
    $( '#kwh-9' ).val( 777 );
    $( '#kwh-10' ).val( 1119 );
    $( '#kwh-11' ).val( 709 );
    $( '#kwh-12' ).val( 715 );
    $( '#kwh-13' ).val( 695 );
    enableCalculateButton( true );
  }
</script>

<!-- tablesorter theme -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/css/theme.green.min.css" integrity="sha256-5wegm6TtJ7+Md5L+1lED6TVE+NAr0G+ZyHuPRrihJHE=" crossorigin="anonymous" />

<!-- tablesorter basic libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js" integrity="sha256-uC1JMW5e1U5D28+mXFxzTz4SSMCywqhxQIodqLECnfU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.widgets.min.js" integrity="sha256-Xx4HRK+CKijuO3GX6Wx7XOV2IVmv904m0HKsjgzvZiY=" crossorigin="anonymous"></script>

