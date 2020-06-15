<?php
  // Copyright 2019 Energize Andover.  All rights reserved.

  $aEvents =
  [
   [
      'show' => false,
      'when' =>
      [
        'text' => 'Monday, June 15, 11 am - 12:30 pm',
        'class' => 'event-text-general',
        'link' => '',
      ],
      'where' =>
      [
        'text' => 'WebEx Webinar, registration required',
        'class' => 'event-text-general',
        'link' => 'https://andover.webex.com/andover/j.php?RGID=r8a9b287593ba0f614b4a19813ba07b14',
      ],
      'topic' =>
      [
        'text' => 'Virtual Public Forum on CCA',
        'class' => 'event-text-topic',
        'link' => 'https://andoverma.gov/civicalerts.aspx?AID=362',
      ],
      'topic_details' =>
      [
        'Followed by Q&A',
      ],
      'presenters' =>
      [
        [
          'text' => 'Michael Lindstrom, Deputy Town Manager',
          'class' => 'event-text-general',
          'link' => 'https://andoverma.gov/directory.aspx?EID=128',
        ],
        [
          'text' => 'Joyce Losick-Yang, PhD, Sustainability Coordinator',
          'class' => 'event-text-general',
          'link' => 'https://andoverma.gov/816/Sustainability',
        ],
      ],
      'sponsors' =>
      [
      ],
    ],
    [
      'show' => false,
      'when' =>
      [
        'text' => 'Thursday, April 30, 7 - 8 pm',
        'class' => 'event-text-general',
        'link' => '',
      ],
      'where' =>
      [
        'text' => 'Webinar, registration required',
        'class' => 'event-text-general',
        'link' => 'https://register.gotowebinar.com/rt/7950290809783335692',
      ],
      'topic' =>
      [
        'text' => 'CCA in Massachusetts',
        'class' => 'event-text-topic',
        'link' => '',
      ],
      'topic_details' =>
      [
        'CCA promises stable prices with possible cost savings, and local, renewable sources.  Learn about how CCA can benefit our town.',
      ],
      'presenters' =>
      [
        [
          'text' => 'Larry Chretien',
          'class' => 'event-text-general',
          'link' => 'https://www.linkedin.com/in/larry-chretien-a855b87/',
        ],
        [
          'text' => 'Daria Mark',
          'class' => 'event-text-general',
          'link' => 'https://www.linkedin.com/in/dariamark/',
        ],
      ],
      'sponsors' =>
      [
        [
          'text' => 'Green Energy Consumers Alliance',
          'class' => 'event-text-general',
          'link' => 'https://www.greenenergyconsumers.org/',
        ],
      ],
    ],
  ];


  function formatOptionalLink( $aItem )
  {
    if ( $aItem['link'] )
    {
?>
      <a href="<?=$aItem['link']?>" target="_blank" class="dark-link">
<?php
    }
?>
    <span class="<?=$aItem['class']?>" >
      <?=$aItem['text']?>
    </span>
<?php
    if ( $aItem['link'] )
    {
?>
      </a>
<?php
    }
  }


  function formatEvent( $aEvent, $bList=true )
  {
    if ( $aEvent['show'] )
    {
      $sDtClass = 'class="col-sm-2"';
      $sDdClass = 'class="col-sm-10"';
      $sBulletCode = '&#9702';
      $sEventClass = $bList ? 'class="list-group-item list-group-item-action"' : '';
?>
      <div <?=$sEventClass?> >

        <dl class="row">

          <!-- When -->
          <dt <?=$sDtClass?> >
            When
          </dt>

          <dd <?=$sDdClass?> >
            <?=formatOptionalLink($aEvent['when'])?>
          </dd>

          <!-- Where, with optional link -->
          <dt <?=$sDtClass?> >
            Where
          </dt>
          <dd <?=$sDdClass?> >
            <?=formatOptionalLink($aEvent['where'])?>
          </dd>

          <!-- Topic, with optional link and details -->
          <dt <?=$sDtClass?> >
            Topic
          </dt>
          <dd <?=$sDdClass?> >
            <?=formatOptionalLink($aEvent['topic'])?>
<?php
            $sBullet = ( count( $aEvent['topic_details'] ) > 1 ) ? $sBulletCode : '';
            foreach ( $aEvent['topic_details'] as $sLine )
            {
?>
              <div>
                <small class="event-text-general" >
                  <?=$sBullet?> <?=$sLine?>
                </small>
              </div>
<?php
            }
?>
          </dd>

          <!-- Presenters, optional -->
<?php
          if ( count( $aEvent['presenters'] ) )
          {
?>
            <dt <?=$sDtClass?> >
              Presenters
            </dt>
            <dd <?=$sDdClass?> >
<?php
              foreach ( $aEvent['presenters'] as $aItem )
              {
?>
                <div>
                  <?=formatOptionalLink($aItem)?>
                </div>
<?php
              }
?>
            </dd>

<?php
          }
?>

          <!-- Sponsosrs, optional -->
<?php
          if ( count( $aEvent['sponsors'] ) )
          {
?>
            <dt <?=$sDtClass?> >
              Sponsors
            </dt>

            <dd <?=$sDdClass?> >
<?php
              foreach ( $aEvent['sponsors'] as $aItem )
              {
?>
                <div>
                  <?=formatOptionalLink($aItem)?>
                </div>
<?php
              }
?>
            </dd>
<?php
          }
?>
        </dl>
      </div>
<?php
    }

    return $aEvent['show'];
  }
?>

<style>
  .event-text-topic
  {
    color: #006600;
    font-size: 1.25rem;
  }

  .event-text-alert
  {
    color: red;
  }
</style>