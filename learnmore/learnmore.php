<?php
  // Copyright 2019 Andover CCA.  All rights reserved.

  $aLinks =
  [
    [
      'url' => 'https://www.mass.gov/info-details/municipal-aggregation',
      'title' => 'Massachusetts Department of Public Utilities (DPU)',
      'descr' => 'DPU explains Community Choice Aggregation (a.k.a. Municipal Aggregation)'
    ],
    [
      'url' => 'https://www.mapc.org/resource-library/start-a-community-choice-aggregation-program/',
      'title' => 'Metropolitan Area Planning Council (MAPC)',
      'descr' => 'How to start a Community Choice Aggregation program'
    ],
    [
      'url' => 'https://drive.google.com/open?id=1D7E_xN45nHt2MoVBcy5JylLRv0Ek5q7B',
      'title' => 'CCA in Merrimack Valley',
      'descr' => 'Map of Merrimack Valley communities that have adopted CCA'
    ],
    [
      'url' => 'https://docs.google.com/spreadsheets/d/1wNX4zTMuKPAL0QSGVU3hSx6O6sE8keQXy8Zwx2Tbh0c/edit?usp=sharing',
      'title' => 'Current CCA pricing',
      'descr' => 'CCA pricing in nearby towns'
    ],
    [
      'url' => 'http://energyswitchma.gov/',
      'title' => 'Selecting an electrical energy supplier',
      'descr' => 'Consumers can choose'
    ],
    [
      'url' => 'https://commonwealthmagazine.org/opinion/municipal-electricity-aggregation-really-works/',
      'title' => 'Commonwealth Magazine',
      'descr' => 'Newton Mayor Ruthanne Fuller explains benefits of CCA program (Dec. 29, 2018)'
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

  <p class="h5 mt-1 list-group-item">
    Learn about <i>Community Choice Aggregation</i>
  </p>

  <?php
    foreach ( $aLinks as $aLink )
    {
      ?>

      <div class="list-group">
        <a href="<?=$aLink['url']?>" target="_blank" class="list-group-item list-group-item-action">
          <div class="text-title">
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
