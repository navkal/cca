<?php
  // Copyright 2019 Energize Andover.  All rights reserved.

  $aEvents =
  [
    [
      'title' => 'Introduction to CCA',
      'title_link' => '',
      'subtitle' =>
      [
        'Followed by Q&A',
      ],
      'when' => '7:00 - 8:30 p.m. on Thursday, March 12',
      'where' => 'Andover Public Safety Center',
      'where_link' => 'https://goo.gl/maps/Pzze23UuQ5uCDWv88',
    ],
    [
      'title' => 'Presentations: Legislative Agenda on Environment',
      'title_link' => '',
      'subtitle' =>
      [
        'Followed by Q&A',
        'Sponsored by Greater Andover Indivisible and Andover WECAN',
      ],
      'when' => '7:00 pm on Monday, March 16',
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
          <div class="text-title">

            <!-- Title with optional link -->
            <?php
              if ( $aEvent['title_link'] )
              {
            ?>
                <a href="<?=$aEvent['title_link']?>" target="_blank">
            <?php
              }
            ?>
                  <?=$aEvent['title']?>
            <?php
              if ( $aEvent['title_link'] )
              {
            ?>
                </a>
            <?php
              }
            ?>

          </div>

          <!-- Subtitles -->
          <?php
            foreach ( $aEvent['subtitle'] as $sSubtitle )
            {
          ?>
            <div>
              <small>
                <?=$sSubtitle?>
              </small>
            </div>
          <?php
            }
          ?>

          <!-- When -->
          <div class="pt-2" >
            <small class="pl-3">
              <?=$aEvent['when']?>
            </small>
          </div>

          <!-- Location with optional link -->
          <div>
            <small class="pl-3">
              <?php
                if ( $aEvent['where_link'] )
                {
              ?>
                  <a href="<?=$aEvent['where_link']?>" target="_blank">
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


        </div>

      </div>

  <?php
    }
  ?>

</div>
