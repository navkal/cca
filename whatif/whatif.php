
<!-- tablesorter theme -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.29.0/css/theme.dropbox.min.css" integrity="sha256-VFOuP1wPK9H/EeQZEmYL0TZlkMtUthqMBdrqfopliF4=" crossorigin="anonymous" />

<!-- tablesorter basic libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.29.0/js/jquery.tablesorter.min.js" integrity="sha256-UD/M/6ixbHIPJ/hTwhb9IXbHG2nZSiB97b4BSSAVm6o=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.29.0/js/jquery.tablesorter.widgets.min.js" integrity="sha256-/3WKCLORjkqCd7cddzHbnXGR31qqys81XQe2khfPvTY=" crossorigin="anonymous"></script>

<!-- flot libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js" integrity="sha256-LMe2LItsvOs1WDRhgNXulB8wFpq885Pib0bnrjETvfI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.symbol.min.js" integrity="sha256-Bm23OLMJlgAQ1BPlnkQZeAaRzEdEJXPakaKte3tujaw=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.resize.min.js" integrity="sha256-EM0o7Qv7O213xqRbn8IFc6QsSr02kAX1/z7musSfxx8=" crossorigin="anonymous"></script>


<!-- split libraries -->
<link rel="stylesheet" href="/split/split.css?version=<?=time()?>">
<script src="/split/split.min.js"></script>


<!-- bootstrap-datepicker libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" integrity="sha256-JDBcnYeV19J14isGd3EtnsCQK05d8PczJ5+fvEvBJvI=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js" integrity="sha256-tW5LzEC7QjhG0CiAvxlseMTs2qJS7u3DRPauDjFJ3zo=" crossorigin="anonymous"></script>


<div class="backdrop">
  <div id="a" class="split split-horizontal">
    <div id="table_pane" class="split content">
      <?php
        include 'table_pane.php';
      ?>
    </div>
  </div>
  <div id="b" class="split split-horizontal">
    <div id="e" class="split content">
        <?php
          include 'bar.php';
        ?>
    </div>
    <div id="f" class="split content">
        <?php
          include 'bar.php';
        ?>
    </div>
  </div>
</div>

<script src="/split/split.min.js"></script>
<script>
    Split(['#a', '#b'], {
      gutterSize: 8,
      minSize: 0,
      cursor: 'col-resize'
    })

    Split(['#e', '#f'], {
      direction: 'vertical',
      sizes: [50, 50],
      minSize: 0,
      gutterSize: 8,
      cursor: 'row-resize'
    })
</script>
</html>
