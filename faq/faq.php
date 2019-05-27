<?php
  // Copyright 2019 Andover CCA.  All rights reserved.


  $aFaq =
  [
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
    ],
    [
      'q' => 'Whahhh?',
      'a' => 'Duhhhh!'
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
    <div class="col-10 mx-auto">
      <div class="h5 py-1">
        Frequently Asked Questions
      </div>
      <div class="accordion" id="faq">

        <?php
          foreach ( $aFaq as $iQ => $aQ )
          {
            $iCard = $iQ + 1;
            ?>

              <div class="card">
                <div class="card-header p-2" id="q<?=$iCard?>">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#a<?=$iCard?>" aria-expanded="true" aria-controls="a<?=$iCard?>">
                      <?=$aQ['q']?>
                    </button>
                  </h5>
                </div>
                <div id="a<?=$iCard?>" class="collapse" aria-labelledby="q<?=$iCard?>" data-parent="#faq">
                  <div class="card-body">
                    <b>Answer:</b> <?=$aQ['a']?>
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
