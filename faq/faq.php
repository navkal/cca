<?php
  // Copyright 2019 Andover CCA.  All rights reserved.


  $aFaq =
  [
    [
      'q' => 'What is Community Choice Aggregation?',
      'a' => 'Community Choice Aggregation (CCA) is a Massachusetts state-regulated program that came out of the Restructuring Act of 1997, specifically Chapter 164, Section 134.  CCA empowers cities and towns to create large buying groups of residential and business electricity customers in order to seek bids for cheaper supply rates.'
    ],
    [
      'q' => 'What is the purpose of Community Choice Aggregation?',
      'a' => 'The law underlying CCA was enacted to ensure that the benefits of energy deregulation would be passed on to residential and business customers, by allowing them to aggregate their accounts within their municipal boundaries in order to obtain competitive bids from third-party suppliers.'
    ],
    [
      'q' => 'How does Community Choice Aggregation work?',
      'a' => 'By grouping electricity accounts within municipal boundaries, CCA creates economies of scale, enabling participating cities and towns to achieve savings for account holders as a whole.'
    ],
    [
      'q' => 'What are the objectives of Community Choice Aggregation?',
      'a' => 'CCA aims to promote rate stability, increase renewable content, and decrease costs of the electricity supply, without affecting the level of service provided by the utility delivering the supply.'
    ],
    /*************************** /
    [
      'q' => 'Where does the renewable energy for the program come from, and how do I know I\'m really getting 100% renewable energy?',
      'a' => 'Answer TBD.'
    ],
    [
      'q' => 'How does Community Choice Aggregation work?',
      'a' => 'Answer TBD.'
    ],
    /***************************/
  ];
?>

<style>
  /******************************* /
  body
  {
    background-image: url( "welcome/banner.jpg" );
    background-position: center top;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }
  /*******************************/
</style>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-10 col-lg-8 mx-auto">

      <div class="h5 py-2">
        Frequently Asked Questions
      </div>

      <div class="accordion" >
        <div id="faq">
          <?php
            foreach ( $aFaq as $iQ => $aQ )
            {
              $iCard = $iQ + 1;
          ?>
              <div class="card">
                <div class="card-header" id="q<?=$iCard?>">
                  <a class="card-link" data-toggle="collapse" href="#a<?=$iCard?>">
                    <?=$aQ['q']?>
                  </a>
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
</div>
