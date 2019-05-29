<?php
  // Copyright 2019 Andover CCA.  All rights reserved.


  $aFaq =
  [
    [
      'q' => 'What is Community Choice Aggregation (CCA)?',
      'a' => 'CCA is a Massachusetts state-regulated program that came out of the Restructuring Act of 1997, specifically <a href="https://malegislature.gov/Laws/GeneralLaws/PartI/TitleXXII/Chapter164/Section134" target="_blank">Chapter 164, Section 134</a>.  CCA empowers cities and towns to create large buying groups of residential and business electricity customers in order to seek bids for cheaper supply rates.'
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
      'a' => 'If enacted, Andover CCA will offer one or more electrical supply options to National Grid customers.  When the program takes effect, you will be enrolled initially in the default option.  If the program offers other supply options - for example, with higher renewable content than the default - you can switch (<i>opt up</i>) at any time.  You can also return to National Grid Basic Service (<i>opt out</i>) at any time, without penalty or cost.'
    ],
    [
      'q' => 'How will CCA affect my electric bill?',
      'a' => 'Your electric utility bill has two cost components – delivery and supply.  CCA affects only the supply component.  CCA does not affect the price of delivery, which is set by the utility and regulated by MA DPU.  As before, you will continue to receive one bill for both delivery and supply from National Grid, and National Grid will continue to provide the same level of service.  (While CCA aims to offer favorable supply prices, savings relative to National Grid Basic Service is not guaranteed, due to possible unforeseen fluctuations in National Grid pricing.)'
    ],
    [
      'q' => 'Will there be a change to my electric meter?',
      'a' => 'No, there will be no change to your meter.  National Grid will continue to read your meter to determine how much energy you consume.'
    ],
    [
      'q' => 'Will I have to pay a deposit to participate in CCA?',
      'a' => 'No, you will not have to pay a deposit.'
    ],
    [
      'q' => 'Do I have to participate in CCA if I don\’t want to?',
      'a' => 'No, residents and businesses can opt out of the CCA program at any time without penalty.'
    ],
    [
      'q' => 'What if I choose to leave the CCA program early?',
      'a' => 'You may terminate your CCA participation (<i>opt out</i>) at any time without any early termination or exit fee.  After opting out, you may return at any time with no associated re-enrollment fee; but upon returning, you are not guaranteed the original contract rate.'
    ],
    [
      'q' => 'If I opt out, can I opt back in at a later date?',
      'a' => 'After opting out, you may return to the CCA program at any time with no associated re-enrollment fee; but upon returning, you are not guaranteed the original contract rate.  After you re-enroll, the CCA program rate will appear on your utility bill in the next available billing cycle.  Since National Grid takes at least two days to process a change of supplier, you are encouraged to re-enroll at least five business days before the meter read date indicated on your utility bill, to help ensure that re-enrollment occurs on a timely basis.'
    ],
    [
      'q' => 'Where does the renewable energy for CCA come from?',
      'a' => 'The <a href="http://www.greenenergyconsumers.org/" target="_blank">Green Energy Consumers Alliance</a>, a Boston-based nonprofit, supplies local renewable energy to a number of CCA programs in Greater Boston.  The Green Energy Consumers Alliance purchases renewable energy wholesale, mostly from community-based wind power projects located in Massachusetts and Rhode Island. The Andover CCA program has not yet decided its renewable energy supplier.'
    ],
    [
      'q' => 'What is a Third-Party Supplier (TPS)?',
      'a' => 'A TPS is a for-profit company that sells electricity supply into the grid which may be purchased by individual electricity customers under contract.'
    ],
    [
      'q' => 'I have received offers from Third-Party Suppliers promising lower electricity rates. What should I do?',
      'a' => 'Third-Party Suppliers are currently very active in Massachusetts, due to recent increases in utilities\' Basic Service rates.  Before agreeing to purchase electricity from a TPS, you should read the complete contract fine print and have a clear understanding of rate details and any termination penalties.'
    ],
  ];
?>

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
