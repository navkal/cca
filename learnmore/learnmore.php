<?php
  // Copyright 2019 Andover CCA.  All rights reserved.

  // Description list layout
  $sDtClass = 'dl-title col-6 col-md-4';
  $sDdClass = 'col-6 col-md-8';
?>
<style>
.list-group-item
{
  border: none;
}
.text-darkgreen
{
  color: #397947;
}
</style>

<div class="container">

  <p class="h5 mt-1 list-group-item">
    Learn about <i>Community Choice Aggregation</i>
  </p>

  <?php
    $aLinks =
    [
      [
        'url' => 'https://www.mass.gov/info-details/municipal-aggregation',
        'title' => 'Mass.gov - CCA',
        'descr' => 'CCA (a.k.a. Municipal Aggregation) explained'
      ],
      [
        'url' => 'https://www.mapc.org/resource-library/start-a-community-choice-aggregation-program/',
        'title' => 'MAPC',
        'descr' => 'Metropolitan Area Planning Council - smart growth'
      ],
      [
        'url' => 'https://drive.google.com/open?id=1D7E_xN45nHt2MoVBcy5JylLRv0Ek5q7B',
        'title' => 'Merrimack Valley Map',
        'descr' => 'Nearby towns offering CCA'
      ],
      [
        'url' => 'https://docs.google.com/spreadsheets/d/1wNX4zTMuKPAL0QSGVU3hSx6O6sE8keQXy8Zwx2Tbh0c/edit?usp=sharing',
        'title' => 'Current contracts',
        'descr' => 'CCA pricing in nearby towns'
      ],
      [
        'url' => 'http://energyswitchma.gov/',
        'title' => 'Energy Switch',
        'descr' => 'Choosing an electrical energy source'
      ],
      [
        'url' => 'https://commonwealthmagazine.org/opinion/municipal-electricity-aggregation-really-works/',
        'title' => 'Commonwealth Magazine',
        'descr' => 'Municipal electricity aggregation really works (Dec. 29, 2018)'
      ],
    ];

    foreach ( $aLinks as $aLink )
    {
      ?>

      <div class="list-group">
        <a href="<?=$aLink['url']?>" target="_blank" class="list-group-item list-group-item-action">
          <div class="text-darkgreen">
            <?=$aLink['title']?>
          </div>
          <small>
            <?=$aLink['descr']?>
          </small>
        </a>
      </div>

      <?php
    }
  ?>

</div>
