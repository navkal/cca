<?php
  // Copyright 2019 Energize Andover.  All rights reserved.

  $aEvents =
  [
    [
      'when' => 'Thursday, March 12, 7 - 9 pm',
      'where' =>
      [
        'text' => 'Public Safety Center',
        'link' => 'https://goo.gl/maps/Pzze23UuQ5uCDWv88',
      ],
      'topic' =>
      [
        'text' => 'Learn about CCA',
        'link' => '',
      ],
      'topic_details' =>
      [
        'Followed by Q&A',
      ],
      'presenters' =>
      [
        'Michael Lindstrom, Deputy Town Manager',
        'Joyce Losick-Yang, PhD, Sustainability Coordinator',
      ],
      'sponsors' =>
      [
      ],
    ],
    [
      'when' => 'Monday, March 16, 7 - 8:30 pm',
      'where' =>
      [
        'text' => 'Memorial Hall Library',
        'link' => 'https://goo.gl/maps/PgPLW7oPTGgeF7jh9',
      ],
      'topic' =>
      [
        'text' => 'Legislative Agenda on Environment',
        'link' => '',
      ],
      'topic_details' =>
      [
        'Followed by Q&A',
      ],
      'presenters' =>
      [
        'Senator Barry Finegold',
        'Representative Tram Nguyen',
        'Representative Frank Moran',
        'Moderator: Laura Gregory, Select Board Chair',
      ],
      'sponsors' =>
      [
        [
          'text' => 'Greater Andover Indivisible',
          'link' => 'http://indivisibleandoverma.com/',
        ],
        [
          'text' => 'Andover WECAN',
          'link' => 'https://www.andoverwecan.com/',
        ],
      ],
    ],
    [
      'when' => 'Monday, March 25 (time TBA)',
      'where' =>
      [
        'text' => 'Senior Center at Ballard Vale United Church',
        'link' => 'https://goo.gl/maps/f8XNMAyw1wn2HXfP8',
      ],
      'topic' =>
      [
        'text' => 'Learn about CCA',
        'link' => '',
      ],
      'topic_details' =>
      [
        'Followed by Q&A',
      ],
      'presenters' =>
      [
        'Joyce Losick-Yang, PhD, Sustainability Coordinator',
      ],
      'sponsors' =>
      [
        [
          'text' => 'Council on Aging',
          'link' => 'https://andoverma.gov/249/Council-on-Aging',
        ],
      ],
    ],
    [
      'when' => 'Wednesday, April 8, 7 - 9 pm',
      'where' =>
      [
        'text' => 'Memorial Hall Library',
        'link' => 'https://goo.gl/maps/PgPLW7oPTGgeF7jh9',
      ],
      'topic' =>
      [
        'text' => 'Learn about CCA',
        'link' => '',
      ],
      'topic_details' =>
      [
        'Followed by Q&A',
      ],
      'presenters' =>
      [
        'Michael Lindstrom, Deputy Town Manager',
        'Joyce Losick-Yang, PhD, Sustainability Coordinator',
      ],
      'sponsors' =>
      [
      ],
    ],
    // [
      // 'when' => 'Wednesday, April 22, 3 - 7 pm',
      // 'where' => 'Whole Foods Market',
      // 'where_link' => 'https://goo.gl/maps/tt1kW4pan6iE4RJC8',
      // 'topic' => 'Earth Day',
      // 'topic_link' => '',
      // 'topic_details' =>
      // [
      // ],
      // 'presenters' =>
      // [
        // 'Yashvi Gosalia, AHS junior',
        // 'Eva McKone, AHS sophomore',
      // ],
      // 'sponsors' =>
      // [
      // ],
    // ],
    [
      'when' => 'Monday, April 27, 7 - 10 pm',
      'where' =>
      [
        'text' => 'Collins Center',
        'link' => 'https://goo.gl/maps/J4cWWJZiiDj1ToVv8',
      ],
      'topic' =>
      [
        'text' => 'Annual Town Meeting',
        'link' => '',
      ],
      'topic_details' =>
      [
      ],
      'presenters' =>
      [
      ],
      'sponsors' =>
      [
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
    <?=$aItem['text']?>
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
          <?=$aEvent['when']?>
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
              <small>
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
            foreach ( $aEvent['presenters'] as $sLine )
            {
?>
              <div>
                <?=$sLine?>
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
?>
