<?php
  // Copyright 2019 Energize Andover.  All rights reserved.

  $aEvents =
  [
    [
      'title' => 'Introduction to CCA',
      'title_link' => '',
      'subtitle' => 'Followed by Q&A',
      'when' => '7:00 - 8:30 p.m. on Thursday, March 12',
      'where' => 'Andover Public Safety Center',
      'where_link' => 'https://goo.gl/maps/Pzze23UuQ5uCDWv88',
    ],
    [
      'title' => 'Happy Birthday Baba/Baby!',
      'title_link' => 'http://www.google.com',
      'subtitle' => 'Subtitle Subtitle Subtitle',
      'when' => '5:52 - 11:59 pm on Saturday, February 8',
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

          <!-- Subtitle -->
          <div>
            <small>
              <?=$aEvent['subtitle']?>
            </small>
          </div>

          <!-- When -->
          <div>
            <small>
              <?=$aEvent['when']?>
            </small>
          </div>

          <!-- Location with optional link -->
          <div>
            <small>
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
