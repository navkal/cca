<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/../bgt/util/tablesorter.php';
?>

<table id="bgt_table" class="tablesorter">
  <thead>

  <!-- Title -->
  <tr>
    <th class="sorter-false tablesorter-headerRow" colspan="8" >
      <span class="btn btn-sm" style="cursor:default; font-size:0.9375rem" >
        <?=$navbarItems[$navbarItemKey][0]?>
      </span>
    </th>
  </tr>

  <!-- Toolbar -->
  <tr>
    <th class="sorter-false tablesorter-headerRow" colspan="8" >
      <span class="btn btn-sm" style="cursor:default;" >
        <span id="bgt_table_row_count"></span> row<span id="bgt_table_row_count_s">s</span>
      </span>
      <span class="float-right">
        <button id="refreshButton" class="btn btn-sm btn-link" onclick="toggleRefresh()" disabled >
          <i id="startRefreshIcon" class="fas fa-sync-alt text-success"></i>
          <i id="stopRefreshIcon" class="far fa-stop-circle text-danger" style="display:none"></i>
          Refresh
        </button>
        <button class="btn btn-sm btn-link" onclick="uploadSnapshot()">
          <i class="fas fa-download"></i> Download
        </button>
      </span>
    </th>
  </tr>

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
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
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
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
    </tr>
    <tr>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
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
    <tr>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
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
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
    </tr>
    <tr>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
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
    <tr>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
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
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
    </tr>
    <tr>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
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
    <tr>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
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
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
    </tr>
    <tr>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
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
    <tr>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
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
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
    </tr>
    <tr>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
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
    <tr>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
      <td>abc 1</td>
      <td>234</td>
      <td>Ox</td>
      <td>http://www.yahoo.com</td>
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
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
      <td>abc 2</td>
      <td>56</td>
      <td>Elephant</td>
      <td>http://www.wikipedia.org/</td>
    </tr>
    <tr>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
      <td>abc 9</td>
      <td>155</td>
      <td>Lion</td>
      <td>http://www.nytimes.com/</td>
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
      <td>zyx 12</td>
      <td>0</td>
      <td>Llama</td>
      <td>http://www.nasa.gov/</td>
      <td>zyx 12</td>
      <td>0</td>
      <td>Llama</td>
      <td>http://www.nasa.gov/</td>
    </tr>
  </tbody>
</table>

<script>
  var g_tTablePane = null;
  var g_tTable = null;
  var g_tStickyWrapper = null;
  var g_iTablesorterThemeTopShift = 0;

  var g_tViewTableProps = jQuery.extend( true, { sortList: [[0,0]] }, g_tTableProps );
  var g_tFirstColParser =
  {
    id: 'firstcol',
    is: function(){return false;},
    format: function(s){return s;},
    parsed: false,
    type: 'text'
  };

  $( document ).ready( init );

  function init()
  {
    g_tTable = $( '#bgt_table' );
    g_tTablePane = g_tTable.parent();

    // Set event handlers
    g_tTablePane.on( 'resize', onResizeTablePane );
    g_tTablePane.on( 'scroll', onScrollTablePane );
    $( window ).on( 'scroll', onScrollWindow );

    // Initialize the tablesorter
    $.tablesorter.addParser( g_tFirstColParser );
    g_tViewTableProps.widgetOptions.stickyHeaders_offset = g_tTable.offset().top;
    //g_tViewTableProps.theme='blue';
    var iTopBf = g_tTable.offset().top;
    g_tTable.tablesorter( g_tViewTableProps );
    g_iTablesorterThemeTopShift = g_tTable.offset().top - iTopBf;
    g_tTable.css( { marginTop: '-=' + g_iTablesorterThemeTopShift + 'px' } );

    // Get the sticky wrapper
    g_tStickyWrapper = $( '.tablesorter-sticky-wrapper' );

    // Handle possibility that window is initially scrolled
    onScrollWindow();
  }

  function onResizeTablePane()
  {
    // Clip the wrapper
    var iWidth = g_tTablePane.width() - scrollbarWidth();
    var iHeight = g_tStickyWrapper.height();
    g_tStickyWrapper.css( 'clip', 'rect(0px,' + iWidth + 'px,' + iHeight + 'px,0px)' );
  }

  function onScrollTablePane()
  {
    // Fire resize event
    g_tTablePane.resize();
  }

  function onScrollWindow()
  {
    // Fire resize event
    g_tTablePane.resize();

    // Move the wrapper
    var tOffset =
    {
      top: g_tTablePane.offset().top + g_iTablesorterThemeTopShift,
      left: g_tStickyWrapper.offset().left
    };

    g_tStickyWrapper.offset( tOffset );
  }

  function scrollbarWidth()
  {
    var div = $('<div style="width:50px;height:50px;overflow:hidden;position:absolute;top:-200px;left:-200px;"><div style="height:100px;"></div>');
    // Append our div, do our calculation and then remove it
    $('body').append(div);
    var w1 = $('div', div).innerWidth();
    div.css('overflow-y', 'scroll');
    var w2 = $('div', div).innerWidth();
    $(div).remove();
    return (w1 - w2);
  }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.blue.min.css" integrity="sha256-Xj5kQBWJMyOV0+sPr+wIBUHXdoZ00TPgT+RuiyOXtzo=" crossorigin="anonymous" />
