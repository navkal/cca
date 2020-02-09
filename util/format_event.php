<?php
  // Copyright 2019 Energize Andover.  All rights reserved.

  function formatEvent( $aEvent )
  {
    $sDtClass = 'class="col-sm-2"';
    $sDdClass = 'class="col-sm-10"';
    $sBulletCode = '&#9702';
?>
    <div class="list-group-item list-group-item-action">

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
        </dd>

        <!-- Topic, with optional link -->
        <dt <?=$sDtClass?> >
          Topic
        </dt>

        <dd <?=$sDdClass?> >
          <?php
            if ( $aEvent['topic_link'] )
            {
          ?>
              <a href="<?=$aEvent['topic_link']?>" target="_blank">
          <?php
            }
          ?>
                <span class="blockquote">
                  <?=$aEvent['topic']?>
                </span>
          <?php
            if ( $aEvent['topic_link'] )
            {
          ?>
              </a>
          <?php
            }
          ?>

          <!-- Topic details -->
          <?php
            $sBullet = ( count( $aEvent['topic_details'] ) > 1 ) ? $sBulletCode : '';
            foreach ( $aEvent['topic_details'] as $sLine )
            {
          ?>
            <div>
              <small class="text-muted">
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
              foreach ( $aEvent['sponsors'] as $sLine )
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

      </dl>
    </div>

<?php
  }
?>
