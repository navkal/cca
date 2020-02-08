<?php
  // Copyright 2019 Energize Andover.  All rights reserved.

  $aEvents =
  [
    [
      'when' => 'Thursday, March 12, 7:00 - 8:30 p.m.',
      'topic' => 'Introduction to CCA',
      'topic_link' => '',
      'details' =>
      [
        'Followed by Q&A',
      ],
      'presenters' =>
      [
        'Michael Lindstrom, Deputy Town Manager',
        'Joyce Losick-Yang, PhD, Sustainability Coordinator',
        'Patrick Roche, Good Energy',
      ],
      'where' => 'Andover Public Safety Center',
      'where_link' => 'https://goo.gl/maps/Pzze23UuQ5uCDWv88',
    ],
    [
      'when' => 'Monday, March 16, 7:00 pm',
      'topic' => 'Legislative Agenda on Environment',
      'topic_link' => '',
      'details' =>
      [
        'Followed by Q&A',
        'Sponsored by Greater Andover Indivisible and Andover WECAN',
      ],
      'presenters' =>
      [
        'Big Bird, Sesame Street',
        'Mr. Rogers, The Neighborhood',
      ],
      'where' => 'Andover Memorial Hall Library',
      'where_link' => 'https://goo.gl/maps/PgPLW7oPTGgeF7jh9',
    ],

  ];
?>

<style>

  .list-group-item
  {
    border: none;
  }

  .text-title
  {
    color: #397947;
  }

</style>


</style>

<div class="container">

  <div class="h5 py-2 list-group-item">
    Coming Events
  </div>

  <?php
    foreach ( $aEvents as $aEvent )
    {
  ?>

      <div class="list-group">
        <div class="list-group-item">

          <!-- When -->
          <div>
            <small>
              <?=$aEvent['when']?>
            </small>
          </div>

          <!-- Where, with optional link -->
          <div>
            <small>
              <?php
                if ( $aEvent['where_link'] )
                {
              ?>
                  <a href="<?=$aEvent['where_link']?>" target="_blank" class="text-dark">
              <?php
                }
              ?>
                    <?=$aEvent['where']?>
              <?php
                if ( $aEvent['where_link'] )
                {
              ?>
                  </a>
              <?php
                }
              ?>
            </small>
          </div>

          <div class="text-title pt-1">

            <!-- topic, with optional link -->
            <?php
              if ( $aEvent['topic_link'] )
              {
            ?>
                <a href="<?=$aEvent['topic_link']?>" target="_blank">
            <?php
              }
            ?>
                  <?=$aEvent['topic']?>
            <?php
              if ( $aEvent['topic_link'] )
              {
            ?>
                </a>
            <?php
              }
            ?>

          </div>

          <!-- Subtitles -->
          <div class="text-title pb-1 pl-3">
            <?php
              foreach ( $aEvent['details'] as $sDetail )
              {
            ?>
              <div>
                <small>
                  <?=$sDetail?>
                </small>
              </div>
            <?php
              }
            ?>
          </div>

          <!-- Subtitles -->
          <div class="text-title pb-1 pl-3">
            <?php
              foreach ( $aEvent['presenters'] as $sPresenter )
              {
            ?>
              <div>
                <small>
                  <?=$sPresenter?>
                </small>
              </div>
            <?php
              }
            ?>
          </div>



        </div>

      </div>

  <?php
    }
  ?>

</div>
