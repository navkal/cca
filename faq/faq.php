<?php
  // Copyright 2019 Andover CCA.  All rights reserved.


  $aFaq =
  [
    [
      'q' => 'Whahhh whahhh whahhh whahhh whahhh whahhh whahhh whahhh?',
      'a' => 'Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  '
    ],
    [
      'q' => 'Whahhh whahhh whahhh whahhh whahhh whahhh whahhh whahhh?',
      'a' => 'Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  '
    ],
    [
      'q' => 'Whahhh whahhh whahhh whahhh whahhh whahhh whahhh whahhh?',
      'a' => 'Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  '
    ],
    [
      'q' => 'Whahhh whahhh whahhh whahhh whahhh whahhh whahhh whahhh?',
      'a' => 'Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  '
    ],
    [
      'q' => 'Whahhh whahhh whahhh whahhh whahhh whahhh whahhh whahhh?',
      'a' => 'Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  '
    ],
    [
      'q' => 'Whahhh whahhh whahhh whahhh whahhh whahhh whahhh whahhh?',
      'a' => 'Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  '
    ],
    [
      'q' => 'Whahhh whahhh whahhh whahhh whahhh whahhh whahhh whahhh?',
      'a' => 'Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  '
    ],
    [
      'q' => 'Whahhh whahhh whahhh whahhh whahhh whahhh whahhh whahhh?',
      'a' => 'Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  Blah blah blah blah blah blah blah.  '
    ],
  ];
?>

<style>
  body
  {
    background-image: url( "welcome/banner.jpg" );
    background-position: center top;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }
</style>

<div class="container">

  <div class="row">
    <div class="col-12 col-md-10 col-lg-8 mx-auto">

      <div class="h5 py-2">
        Frequently Asked Questions
      </div>

      <div class="accordion" id="faq">

        <?php
          foreach ( $aFaq as $iQ => $aQ )
          {
            $iCard = $iQ + 1;
            ?>

              <div class="card">
                <div class="card-header" id="q<?=$iCard?>">
                  <div class="btn-link collapsed" data-toggle="collapse" data-target="#a<?=$iCard?>" aria-expanded="true" aria-controls="a<?=$iCard?>">
                    <?=$aQ['q']?>
                  </div>
                </div>
                <div id="a<?=$iCard?>" class="collapse" aria-labelledby="q<?=$iCard?>" data-parent="#faq">
                  <div class="card-body">
                    <?=$aQ['a']?>
                  </div>
                </div>
              </div>

            <?php
          }
        ?>

      </div>
    </div>
  </div>
</div>
