<!DOCTYPE html>
<html lang="en">
<head>
  <title>Split.js</title>
  <link rel="stylesheet" href="/split/split.css?version=<?=time()?>">
</head>
<body>
  <div class="backdrop">
    <div id="a" class="split split-horizontal">
      <div class="split content">
        <?php
          include 'tbl.php';
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
</body>
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
