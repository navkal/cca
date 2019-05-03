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
#total-kwh.alert
{
  height: 32px;
  line-height:32px;
  padding:0px 16px;
  margin-bottom: 8px;
}
</style>

<div class="container">

  <div class="pt-1 pb-3">
    <div class="row">
      <div class="h6 col">
        What would your electric bill be in a town with CCA?
      </div>
      <div class="col">
        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#help-modal">
          Help
        </button>
      </div>
    </div>
  </div>

  <!-- Input -->
  <form action="javascript:makeOutput();" style="display:none">

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
          <div class="col-2 col-md-1">
            <label for="<?=$sId1?>" class="col-form-label col-form-label-sm kwh-label" ></label>
          </div>
          <div class="col-3 col-md-4">
            <input id="<?=$sId1?>" type="text" class="form-control form-control-sm kwh-input">
          </div>
          <div class="col-2 col-md-2">
          </div>
          <div class="col-2 col-md-1">
            <label for="<?=$sId2?>" class="col-form-label col-form-label-sm kwh-label"></label>
          </div>
          <div class="col-3 col-md-4">
            <input id="<?=$sId2?>" type="text" class="form-control form-control-sm kwh-input">
          </div>
        </div>
    <?php
      }
    ?>

    <!-- Buttons -->
    <div class="row pt-3">
      <div class="col text-center">
        <button id="calculate-button" type="submit" class="btn btn-primary mr-2" >
          Calculate
        </button>
        <button id="clear-button" type="button" class="btn btn-danger ml-2" >
          Clear
        </button>
      </div>
    </div>

  </form>


  <!-- Output -->
  <div id="output" class="pt-3" style="display:none" >

    <div id="total-kwh" class="alert alert-success" role="alert">
    </div>

    <div class="card" style="padding:3px;background-color:#eef7f0">
      <table id="cca-table" class="tablesorter" >
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
  var g_aSources = 
  [
    'National Grid',
    'Billerica Standard',
    'Billerica Green', 
    'Cambridge Green', 
    'Cambridge Green Local',
    'Carlisle Standard',
    'Carlisle Green',
    'Sudbury Standard',
    'Sudbury Green',
    'Sudbury Green Local',
  ];

  var g_tRates =
  {
    'Fixed':
    {
      'Billerica Standard': 10.631,
      'Billerica Green': 10.733,
      'Cambridge Green': 11.12,
      'Cambridge Green Local': 11.94,
      'Carlisle Standard': 10.879,
      'Carlisle Green': 10.981,
      'Sudbury Standard': 10.624,
      'Sudbury Green': 10.749,
      'Sudbury Green Local': 13.124,
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

  var g_iTotalKwh = 0;

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
    initTable(
      // clearInput
      loadHouse1
      );
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
    showOutput( false );

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

  function initTable( fnReadyHandler )
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

    $( '#cca-table' ).on(
      'tablesorter-ready',
      function()
      {
        $( '#cca-table' ).off( 'tablesorter-ready' );
        fnReadyHandler();
      }
    );
    $( '#cca-table' ).tablesorter( jQuery.extend( true, { sortList: [[0,0]] }, tTableProps ) );
  }

  function makeOutput()
  {
    var nCostNg = calculateOutput( 'National Grid' );

    var sHtml = '';
    for ( var iSource = 0; iSource < g_aSources.length; iSource ++ )
    {
      var sSource = g_aSources[iSource];
      sHtml += '<tr>';
      sHtml += '<td>';
      sHtml += sSource;
      sHtml += '</td>';
      sHtml += '<td>$';
      sHtml += calculateOutput( sSource );
      sHtml += '</td>';
      sHtml += '<td>$';
      sHtml += ( nCostNg - calculateOutput( sSource ) ).toFixed( 0 );
      sHtml += '</td>';
      sHtml += '</tr>';
    }

    $( '#cca-table tbody' ).html( sHtml );

    $( '#total-kwh' ).text( 'Total kWh: ' + g_iTotalKwh.toLocaleString() );

    // Update the tablesorter
    var tTable = $( '#cca-table' );
    tTable.trigger( 'updateAll' );

    // Show the output
    showOutput( true );
  }

  function calculateOutput( sSource )
  {
    g_iTotalKwh = 0;
    var nCost = 0;

    var aLabels = $( '.kwh-label' );
    for ( var iLabel = 0; iLabel < aLabels.length; iLabel ++ )
    {
      var tLabel = $( aLabels[iLabel] );
      var sMonthYear = tLabel.text().replace( /\u00a0/g, ' ' );
      var nRate = ( sSource in g_tRates['Fixed'] ) ? g_tRates['Fixed'][sSource] : g_tRates[sMonthYear][sSource];
      var iKwh = $( '#' + tLabel.attr( 'for' ) ).val();
      g_iTotalKwh += parseInt( iKwh );
      nCost += nRate * iKwh;
    }

    nCost = nCost / 100;
    nCost = nCost.toFixed( 0 );
    console.log( '===> ' + sSource + ', ' + g_iTotalKwh + ' kWh: $' + nCost + ' from ' + $( '#kwh-1' ).parent().find('label').text() + ' to ' + $( '#kwh-13' ).parent().find('label').text() ) ;

    return nCost;
  }

  function enableCalculateButton( bEnable )
  {
    $( '#calculate-button' ).prop( 'disabled', ! bEnable ).focus();
  }

  function clearInput()
  {
    showOutput( false );

    $( '.error' ).removeClass( 'error' );
    $( '.kwh-input' ).val( '' );
    enableCalculateButton( false );

    $( '#start-month' ).focus();
  }

  function showOutput( bShow )
  {
    if ( bShow )
    {
      $( '#output' ).show();
    }
    else
    {
      $( '#output' ).hide();
    }
  }

  function loadHouse1()
  {
    $( '#start-month' ).val( '4.18' );
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
    makeOutput();
  }
</script>

<!-- tablesorter theme -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/css/theme.green.min.css" integrity="sha256-5wegm6TtJ7+Md5L+1lED6TVE+NAr0G+ZyHuPRrihJHE=" crossorigin="anonymous" />

<!-- tablesorter basic libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js" integrity="sha256-uC1JMW5e1U5D28+mXFxzTz4SSMCywqhxQIodqLECnfU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.widgets.min.js" integrity="sha256-Xx4HRK+CKijuO3GX6Wx7XOV2IVmv904m0HKsjgzvZiY=" crossorigin="anonymous"></script>

