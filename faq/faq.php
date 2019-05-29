<?php
  // Copyright 2019 Andover CCA.  All rights reserved.


  $aFaq =
  [
    [
      'q' => 'What is Community Choice Aggregation?',
      'a' => 'Community Choice Aggregation (CCA) is a Massachusetts state-regulated program that came out of the Restructuring Act of 1997, specifically <a href="https://malegislature.gov/Laws/GeneralLaws/PartI/TitleXXII/Chapter164/Section134" target="_blank">Chapter 164, Section 134</a>.  CCA empowers cities and towns to create large buying groups of residential and business electricity customers in order to seek bids for cheaper supply rates.'
    ],
    [
      'q' => 'What is the purpose of Community Choice Aggregation?',
      'a' => 'The law underlying CCA was enacted to ensure that the benefits of energy deregulation would be passed on to residential and business customers, by allowing them to aggregate their accounts within their municipal boundaries in order to obtain competitive bids from third-party suppliers.'
    ],
    [
      'q' => 'How does Community Choice Aggregation work?',
      'a' => 'By grouping electricity customer accounts within municipal boundaries, CCA creates economies of scale, enabling participating cities and towns to achieve savings for account holders as a whole.'
    ],
    [
      'q' => 'What are the objectives of Community Choice Aggregation?',
      'a' => 'CCA aims to promote rate stability, increase renewable content, and decrease costs of the electricity supply, without affecting the level of service provided by the utility delivering the supply.'
    ],
    [
      'q' => 'What are the steps for implementing a CCA program in Andover?',
      'a' =>
        '
          <ol>
            <li>
              Approval by voters at Fall Town Meeting
            </li>
            <li>
              Development of plan by town government
            </li>
            <li>
              Public review of plan
            </li>
            <li>
              Approval of plan by Select Board
            </li>
            <li>
              Submittal of plan to MA DPU for final approval
            </li>
          </ol>
        '
    ],
    [
      'q' => 'How do I participate in the CCA program?',
      'a' => 'If enacted, Andover CCA will offer one or more electrical supply options to National Grid customers.  When the program takes effect, all National Grid Basic Service customers will be enrolled initially in the default option.  If the program offers other supply options - for example, with higher renewable content than the default - customers can switch ("opt up") at any time.  Customers can also return to National Grid Basic Service ("opt out") at any time, without penalty or cost.'
    ],
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
