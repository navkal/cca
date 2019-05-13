<?php
  // Copyright 2019 Andover CCA.  All rights reserved.
?>

<style>
.tooltip-inner
{
  background-color:#006600;
}

.table-backdrop
{
  padding: 3px;
  background-color: #eef7f0;
}

.ng-row
{
  background-color: #ffffe6;
}

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

  <div class="pt-1 pb-3">
    <div class="row">
      <div class="h5 col-10">
        What if Andover were to adopt CCA?
      </div>
      <div class="col-2">
        <button type="button" id="help-button" class="btn btn-info float-right" data-toggle="modal" data-target="#help-modal">
          Help
        </button>
      </div>
    </div>
  </div>

  <h6 class="pb-3">CCA Bill Estimator</h6>

  <!-- Input -->
  <form action="javascript:makeOutput();" style="display:none">

    <div class="form-group row">
      <div class="col-3 col-md-2">
        <label>Samples</label>
      </div>
      <div class="col-9 col-md-10">
        <div class="btn-group btn-group-sm">
          <button type="button" id="house-1" class="btn btn-outline-secondary house-button" data-toggle="tooltip" title="4 bedrooms, A/C" >House 1</button>
          <button type="button" id="house-2" class="btn btn-outline-secondary house-button" data-toggle="tooltip" title="4 bedrooms, A/C, affected by Columbia Gas event" >House 2</button>
          <button type="button" id="house-3" class="btn btn-outline-secondary house-button" data-toggle="tooltip" title="4 bedrooms, A/C" >House 3</button>
          <button type="button" id="house-4" class="btn btn-outline-secondary house-button" data-toggle="tooltip" title="3 bedrooms, no A/C" >House 4</button>
        </div>
      </div>
    </div>

    <!-- Dropdown to select start month -->
    <div class="form-group row">
      <div class="col-3 col-md-2">
        <label for="start-month">Start Month</label>
      </div>

      <div class="col-9 col-md-10">
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
    <div id="form-buttons" class="row pt-3 pb-2">
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

  <div id="error-message" class="alert alert-danger"  style="display:none" role="alert">
    There are errors.
  </div>


  <!-- Output -->
  <div id="output" style="display:none" >

    <div id="total-kwh" class="mb-1 text-center">
    </div>

    <div class="card table-backdrop">
      <table id="cca-table" class="tablesorter" >
        <thead>
          <tr>
            <th>CCA Option</th>
            <th>Cost</th>
            <th>Savings</th>
            <th data-toggle="tooltip" title="Percent of total mix derived from renewable sources" >Green Content</th>
            <th data-toggle="tooltip" title="Percent of total mix derived from renewable sources located in New England" >Local Green Content</th>
            <th>Broker</th>
            <th>Start Month</th>
            <th>End Month</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

    <?php
      include $_SERVER["DOCUMENT_ROOT"]."/disclaimer.php";
    ?>

  </div>

</div>

<!-- Help modal dialog -->
<div class="modal fade" id="help-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CCA Bill Estimator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <small>
          <p>
            The CCA Bill Estimator helps you assess the potential impact of CCA on your electric bill.
            It uses your meter readings to show what you would have paid under actual CCA contracts negotiated by nearby towns.
          </p>

          <div>
            <b>
              Instructions
            </b>
            <p>
              View results for sample Andover homes by clicking the <i>House</i> buttons, or follow the steps below to enter readings from your own bill:
            </p>
            <ol>
              <li>
                Find the <i>Electric Usage History</i> on your National Grid bill.
              </li>
              <li>
                Set <b>Start Month</b> to the first month in the <i>Electric Usage History</i>.
              </li>
              <li>
                Enter monthly <i>kWh</i> readings as listed in the <i>Electric Usage History</i>.
              </li>
              <li>
                Click <b>Calculate</b>.
              </li>
            </ol>
          </div>
        </small>

        <img src="whatif/bill.png" class="img-fluid" ></img>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  var g_iHouse = 0;

  var g_tSampleHouses =
  [
    [ '4.18',  659,  599,  988, 1569, 2132, 1736,  797,  608,  777, 1119,  709,  715,  695 ],
    [ '3.18',  660,  508,  552,  712,  737,  680,  768,  745, 1973, 1382, 1059,  786,  793 ],
    [ '4.18', 1033,  974, 1254, 1128, 1445, 1461, 1206, 1055, 1160, 1219, 1198, 1056, 1034 ],
    [ '4.18',  380,  372,  621,  654,  785,  883,  527,  572,  459,  619,  681,  676,  353 ],
  ];

  var g_tCcaOptions =
  {
    'Acton Power Choice Standard':
    {
      url: 'http://masspowerchoice.com/acton',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '24.94%',
      local: '19%',
      start: '2017-09',
      end: '2019-09',
      rate: 10.72
    },
    'Acton Power Choice Green':
    {
      url: 'http://masspowerchoice.com/acton',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '100%',
      local: '100%',
      start: '2017-09',
      end: '2019-09',
      rate: 12.712
    },
    'Arlington Basic':
    {
      url: 'https://arlingtoncca.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '24.94%',
      local: '14%',
      start: '2017-08',
      end: '2019-12',
      rate: 10.631
    },
    'Arlington Local Green':
    {
      url: 'https://arlingtoncca.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '24.94%',
      local: '19%',
      start: '2017-08',
      end: '2019-12',
      rate: 10.756
    },
    'Arlington Premium 50% Local Green':
    {
      url: 'https://arlingtoncca.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '50%',
      local: '50%',
      start: '2017-08',
      end: '2019-12',
      rate: 11.881
    },
    'Arlington Premium 100% Local Green':
    {
      url: 'https://arlingtoncca.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '100%',
      local: '100%',
      start: '2017-08',
      end: ' 2019-12',
      rate: 13.131
    },
    'Ashland Green':
    {
      url: 'https://colonialpowergroup.com/ashland/',
      broker: 'Colonial Power Group',
      broker_url: 'https://colonialpowergroup.com/',
      green: '100%',
      local: '23%',
      start: '2018-06',
      end: '2020-12',
      rate: 10.947
    },
    'Billerica Standard':
    {
      url: 'https://colonialpowergroup.com/billerica/',
      broker: 'Colonial Power Group',
      broker_url: 'https://colonialpowergroup.com/',
      green: '24.94%',
      local: '14%',
      start: '2019-01',
      end: '2021-01',
      rate: 10.631
    },
    'Billerica Optional Green':
    {
      url: 'https://colonialpowergroup.com/billerica/',
      broker: 'Colonial Power Group',
      broker_url: 'https://colonialpowergroup.com/',
      green: '100%',
      local: '0%',
      start: '2019-01',
      end: '2021-01',
      rate: 10.733
    },
    'Cambridge Standard Green':
    {
      url: 'http://masspowerchoice.com/cambridge',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '24.94%',
      local: '14%',
      start: '2019-01',
      end: '2021-01',
      rate: 11.12
    },
    'Cambridge 100% Green Plus':
    {
      url: 'http://masspowerchoice.com/cambridge',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '100%',
      local: '100%',
      start: '2019-01',
      end: '2021-01',
      rate: 11.94
    },
    'Carlisle Basic Supply':
    {
      url: 'https://colonialpowergroup.com/carlisle/',
      broker: 'Colonial Power Group',
      broker_url: 'https://colonialpowergroup.com/',
      green: '24.94%',
      local: '14%',
      start: '2018-07',
      end: '2021-01',
      rate: 10.879
    },
    'Carlisle Green Supply':
    {
      url: 'https://colonialpowergroup.com/carlisle/',
      broker: 'Colonial Power Group',
      broker_url: 'https://colonialpowergroup.com/',
      green: '100%',
      local: '0%',
      start: '2018-07',
      end: '2021-01',
      rate: 10.981
    },
    'Chelmsford Choice':
    {
      url: 'http://masspowerchoice.com/chelmsford',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '24.94%',
      local: '14%',
      start: '2018-02',
      end: '2020-11',
      rate: 9.403
    },
    'Chelmsford Choice Plus':
    {
      url: 'http://masspowerchoice.com/chelmsford',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '100%',
      local: '34%',
      start: '2018-02',
      end: '2020-11',
      rate: 10.089
    },
    'Dracut Standard':
    {
      url: 'https://masscea.com/dracut/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '24.94%',
      local: '14%',
      start: '2018-09',
      end: '2021-01',
      rate: 10.43
    },
    'Lexington Basic':
    {
      url: 'http://masspowerchoice.com/lexington',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '24.94%',
      local: '14%',
      start: '2018-12',
      end: '2020-12',
      rate: 11.494
    },
    'Lexington 100% Green':
    {
      url: 'http://masspowerchoice.com/lexington',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '100%',
      local: '19%',
      start: '2018-12',
      end: '2020-12',
      rate: 11.624
    },
    'Lexington New England Green':
    {
      url: 'http://masspowerchoice.com/lexington',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '100%',
      local: '100%',
      start: '2018-12',
      end: '2020-12',
      rate: 12.428
    },
    'Natick Basic/Brown':
    {
      url: 'http://masspowerchoice.com/natick',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '24.94%',
      local: '14%',
      start: '2019-07',
      end: ' 2020-12',
      rate: 11.026
    },
    'Natick Standard Green':
    {
      url: 'http://masspowerchoice.com/natick',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '35%',
      local: '10%',
      start: '2019-07',
      end: '2020-12',
      rate: 11.263
    },
    'Natick 100% Green':
    {
      url: 'http://masspowerchoice.com/natick',
      broker: 'Mass Power Choice',
      broker_url: 'https://masspowerchoice.com/',
      green: '100%',
      local: '100%',
      start: '2019-07',
      end: '2020-12',
      rate: 13.063
    },
    'North Andover Standard':
    {
      url: 'https://colonialpowergroup.com/north-andover-further-pricing/',
      broker: 'Colonial Power Group',
      broker_url: 'https://colonialpowergroup.com/',
      green: '24.94%',
      local: '14%',
      start: '2019-07',
      end: '2022-07',
      rate: 10.79
    },
    'North Andover Green':
    {
      url: 'https://colonialpowergroup.com/north-andover-further-pricing/',
      broker: 'Colonial Power Group',
      broker_url: 'https://colonialpowergroup.com/',
      green: '100%',
      local: '0%',
      start: '2019-07',
      end: '2022-07',
      rate: 10.885
    },
    'Sudbury Basic':
    {
      url: 'https://sudbury-cea.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '24.94%',
      local: '14%',
      start: '2017-08',
      end: '2020-08',
      rate: 10.624
    },
    'Sudbury Local Green':
    {
      url: 'https://sudbury-cea.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '100%',
      local: '19%',
      start: '2017-08',
      end: '2020-08',
      rate: 10.749
    },
    'Sudbury Premium One Hundred Local Green':
    {
      url: 'https://sudbury-cea.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '100%',
      local: '100%',
      start: '2017-08',
      end: '2020-08',
      rate: 13.124
    },
    'Williamsburg Green':
    {
      url: 'https://colonialpowergroup.com/williamsburg/',
      broker: 'Colonial Power Group',
      broker_url: 'https://colonialpowergroup.com/',
      green: '100%',
      local: '0%',
      start: '2019-05',
      end: '2022-05',
      rate: 10.249
    },
    'Winchester WinPower':
    {
      url: 'https://winpowerma.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '18%',
      local: '13%',
      start: '2017-07',
      end: '2020-01',
      rate: 10.898
    },
    'Winchester WinPower 100':
    {
      url: 'https://winpowerma.com/',
      broker: 'Good Energy',
      broker_url: 'http://goodenergy.com/',
      green: '100%',
      local: '0%',
      start: '2017-07',
      end: '2020-01',
      rate: 13.558
    },
  };

  var g_tRatesNg =
  {
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
    $( '#house-1' ).on( 'click', loadHouse1 );
    $( '#house-2' ).on( 'click', loadHouse2 );
    $( '#house-3' ).on( 'click', loadHouse3 );
    $( '#house-4' ).on( 'click', loadHouse4 );
    $( '#start-month' ).on( 'change', onChangeStartMonth );
    $( '.kwh-input' ).on( 'input', onInputKwhInput );
    $( '#clear-button' ).on( 'click', clearInput );
    $( '[data-toggle="tooltip"]' ).tooltip(
      {
        template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner" ></div></div>'
      }
    );

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
  }

  function initTabOrder()
  {
    $( '#help-button' ).prop( 'tabindex', 1 );
    $( '.house-button' ).prop( 'tabindex', 1 );
    $( '#start-month' ).prop( 'tabindex', 1 );

    var aInputs = $( '.kwh-input' );
    for ( var iInput = 0; iInput < aInputs.length; iInput ++ )
    {
      $( aInputs[iInput] ).prop( 'tabindex', ( iInput % 2 ) + 1 );
    }

    $( '#calculate-button' ).prop( 'tabindex', 10 );
    $( '#clear-button' ).prop( 'tabindex', 10 );
  }

  function onChangeStartMonth()
  {
    showOutput( false );

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

  function onInputKwhInput( tEvent )
  {
    showOutput( false );

    var tTarget = $( tEvent.target );

    // Trim the input
    tTarget.val( tTarget.val().trim() );
    var sInput = tTarget.val();

    // Validate the input
    if ( ( sInput == '' ) || /^\d+$/.test( sInput ) )
    {
      highlightError( tTarget, false );
    }
    else
    {
      highlightError( tTarget, true );
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

    $( '#cca-table' ).on(
      'tablesorter-ready',
      function()
      {
        $( '#cca-table' ).off( 'tablesorter-ready' );
        $( '#cca-table' ).on( 'tablesorter-ready', hideTooltips );
        clearInput();
      }
    );
    $( '#cca-table' ).tablesorter( jQuery.extend( true, { sortList: [[0,0]] }, tTableProps ) );
  }

  function makeOutput()
  {
    showErrorMessage( false );

    if ( isInputReady() )
    {
      var nCostNg = calculateCost( 'National Grid' );

      var aCcaOptions = Object.keys( g_tCcaOptions );
      aCcaOptions.push( 'National Grid' );

      // Generate the table
      var sHtml = '';
      for ( var iCcaOption = 0; iCcaOption < aCcaOptions.length; iCcaOption ++ )
      {
        // CCA option
        var sCcaOption = aCcaOptions[iCcaOption];
        var nCostCcaOption = calculateCost( sCcaOption );
        var tCcaOption = ( sCcaOption in g_tCcaOptions ) ? ( g_tCcaOptions[sCcaOption] ) : null;
        if ( tCcaOption && tCcaOption.url )
        {
          sHtml += '<tr>';
          sHtml += '<td>';
          sHtml += '<a href="' + tCcaOption.url + '" target="_blank" >' + sCcaOption + '</a>';
        }
        else
        {
          sHtml += '<tr class="ng-row">';
          sHtml += '<td>';
          sHtml += '<a href="https://www.nationalgridus.com/media/pdfs/billing-payments/electric-rates/ma/resitable.pdf" target="_blank">' + sCcaOption + '<a>';
        }
        sHtml += '</td>';

        // Cost
        sHtml += '<td>';
        sHtml += '$' + nCostCcaOption;
        sHtml += '</td>';

        // Savings
        sHtml += '<td>';
        sHtml += '$' + ( nCostNg - nCostCcaOption );
        sHtml += '</td>';

        // Percent green
        sHtml += '<td>';
        sHtml += ( tCcaOption && tCcaOption.green ) ? tCcaOption.green : '24.94%';
        sHtml += '</td>';

        // Local
        sHtml += '<td>';
        sHtml += ( tCcaOption && tCcaOption.local ) ? tCcaOption.local : '14%';
        sHtml += '</td>';

        // Broker
        sHtml += '<td>';
        if ( tCcaOption && tCcaOption.broker )
        {
          if ( tCcaOption.broker_url )
          {
            sHtml += '<a href="' + tCcaOption.broker_url + '" target="_blank" >' + tCcaOption.broker + '</a>';
          }
          else
          {
            sHtml += tCcaOption.broker;
          }
        }
        sHtml += '</td>';

        // Start month
        sHtml += '<td>';
        if ( tCcaOption )
        {
          sHtml += tCcaOption.start;
        }
        sHtml += '</td>';

        // End month
        sHtml += '<td>';
        if ( tCcaOption )
        {
          sHtml += tCcaOption.end;
        }
        sHtml += '</td>';

        sHtml += '</tr>';
      }

      $( '#cca-table tbody' ).html( sHtml );

      // Update the tablesorter
      var tTable = $( '#cca-table' );
      tTable.trigger( 'updateAll' );

      // Show total kWh
      var sHouse = g_iHouse ? '<i>House ' + g_iHouse + '</i>': 'You';
      $( '#total-kwh' ).html( sHouse + ' used ' + g_iTotalKwh.toLocaleString() + ' kWh from ' + $( 'label[for="kwh-1"]' ).text() + ' through ' + $( 'label[for="kwh-13"]' ).text() );
      g_iHouse = 0;

      // Show the output
      showOutput( true );
    }
    else
    {
      showErrorMessage( true );
    }
  }

  function isInputReady()
  {
    var aInputs = $( '.kwh-input' );

    // Highlight empty fields, if any
    for ( var iInput = 0 ; iInput < aInputs.length; iInput ++ )
    {
      var tInput = $( aInputs[iInput] );
      if ( tInput.val() == '' )
      {
        highlightError( tInput, true );
      }
    }

    var bReady = $( '.error' ).length == 0;
    return bReady;
  }

  function calculateCost( sCcaOption )
  {
    g_iTotalKwh = 0;
    var nCost = 0;

    var aLabels = $( '.kwh-label' );
    for ( var iLabel = 0; iLabel < aLabels.length; iLabel ++ )
    {
      var tLabel = $( aLabels[iLabel] );
      var sMonthYear = tLabel.text().replace( /\u00a0/g, ' ' );
      var nRate = ( sCcaOption in g_tCcaOptions ) ? g_tCcaOptions[sCcaOption].rate : g_tRatesNg[sMonthYear][sCcaOption];
      var iKwh = $( '#' + tLabel.attr( 'for' ) ).val();
      g_iTotalKwh += parseInt( iKwh );
      nCost += nRate * iKwh;
    }

    nCost = nCost / 100;
    nCost = nCost.toFixed( 0 );

    return nCost;
  }

  function clearInput()
  {
    showErrorMessage( false );
    showOutput( false );

    $( '.error' ).removeClass( 'error' );
    $( '.kwh-input' ).val( '' );

    $( 'body,html' ).animate( { scrollTop: 0 }, 300 );
  }

  function highlightError( tInput, bHighlight )
  {
    if ( bHighlight )
    {
      tInput.addClass( 'error' );
      tInput.parent().addClass( 'error' );
    }
    else
    {
      tInput.removeClass( 'error' );
      tInput.parent().removeClass( 'error' );
    }
  }

  function showErrorMessage( bShow )
  {
    if ( bShow )
    {
      $( '#error-message' ).show();
      scrollToResults();
    }
    else
    {
      $( '#error-message' ).hide();
    }
  }

  function showOutput( bShow )
  {
    if ( bShow )
    {
      $( '#output' ).show();
      scrollToResults();
    }
    else
    {
      $( '#output' ).hide();
    }
  }

  function scrollToResults()
  {
    hideTooltips();

    var iScrollTop = $( '#form-buttons' ).offset().top - $( '.fixed-top' ).outerHeight( true );
    $( 'body,html' ).animate( { scrollTop: iScrollTop }, 500 );
  }

  function hideTooltips()
  {
    $('.tooltip').tooltip( 'hide' );
  }

  function loadHouse1()
  {
    loadHouse( 1 );
  }

  function loadHouse2()
  {
    loadHouse( 2 );
  }

  function loadHouse3()
  {
    loadHouse( 3 );
  }

  function loadHouse4()
  {
    loadHouse( 4 );
  }

  function loadHouse( iHouse )
  {
    clearInput();

    g_iHouse = iHouse;

    var aReadings = g_tSampleHouses[iHouse-1];

    $( '#start-month' ).val( aReadings[0] ).change();

    for ( var iReading = 1; iReading < aReadings.length; iReading ++ )
    {
      $( '#kwh-' + iReading ).val( aReadings[iReading] );
    }

    makeOutput();
  }

</script>

<!-- tablesorter theme -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/css/theme.green.min.css" integrity="sha256-5wegm6TtJ7+Md5L+1lED6TVE+NAr0G+ZyHuPRrihJHE=" crossorigin="anonymous" />

<!-- tablesorter basic libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js" integrity="sha256-uC1JMW5e1U5D28+mXFxzTz4SSMCywqhxQIodqLECnfU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.widgets.min.js" integrity="sha256-Xx4HRK+CKijuO3GX6Wx7XOV2IVmv904m0HKsjgzvZiY=" crossorigin="anonymous"></script>

