<?php
  // Copyright 2019 Energize Andover.  All rights reserved.
  include $_SERVER["DOCUMENT_ROOT"]."/util/security.php";

  require_once $_SERVER["DOCUMENT_ROOT"]."/util/format_event.php";


  $aEvents =
  [
    [
      'when' => 'Thursday, March 12, 7 - 8:30 pm',
      'where' => 'Public Safety Center',
      'where_link' => 'https://goo.gl/maps/Pzze23UuQ5uCDWv88',
      'topic' => 'Introduction to CCA',
      'topic_link' => '',
      'topic_details' =>
      [
        'Followed by Q&A',
      ],
      'presenters' =>
      [
        'Michael Lindstrom, Deputy Town Manager',
        'Joyce Losick-Yang, PhD, Sustainability Coordinator',
        'Patrick Roche, Good Energy',
      ],
      'sponsors' =>
      [
      ],
    ],
    [
      'when' => 'Monday, March 16, 7 - 8:30 pm',
      'where' => 'Memorial Hall Library',
      'where_link' => 'https://goo.gl/maps/PgPLW7oPTGgeF7jh9',
      'topic' => 'Legislative Agenda on Environment',
      'topic_link' => '',
      'topic_details' =>
      [
        'Followed by Q&A',
      ],
      'presenters' =>
      [
        'Senator Barry Finegold',
        'Representative Tram Nguyen',
        // 'Representative Frank Moran',
        'Moderator: Laura Gregory, Select Board Chair',
      ],
      'sponsors' =>
      [
        'Greater Andover Indivisible',
        'Andover WECAN',
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
      'where' => 'Collins Center',
      'where_link' => 'https://goo.gl/maps/J4cWWJZiiDj1ToVv8',
      'topic' => 'Annual Town Meeting',
      'topic_link' => '',
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

?>

<div class="container">

  <div class="h5 pt-2 pb-3">
    Coming Events
  </div>

  <div class="list-group" >

    <?php
      // Iterate through table of events
      foreach ( $aEvents as $aEvent )
      {
        formatEvent( $aEvent );
      }
    ?>

  </div>
</div>
