<?php

function events()
{
  ob_start();
  $args = array(
    'posts_per_page' => 3,
    'post_type'      => 'tc_events'
  );
  $query = new WP_Query($args);
  ?>
  <div class="events-holder">
    <div class="row">
      <?php while ($query->have_posts()) { ?>
        <?php
        $query->the_post();
        $event_date_time = get_post_meta(get_the_ID(), 'event_date_time', true);
        $dateformat = strtotime($event_date_time);
        //echo $ticket_date = date('D j M Y', $dateformat) . '<br>';
        //echo $ticket_time = date('g:i a', $dateformat);
    
        $event_month = date('M', $dateformat);
        $event_day = date('j', $dateformat);
        $event_time = date('g:i a', $dateformat);

        ?>
        <div class="col-lg-4">
          <pre class="d-none"><?php var_dump(get_post_meta(get_the_ID())) ?></pre>
          <div class="event-box">
            <a href="<?php the_permalink() ?>">
              <div class="image-box mb-3">
                <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" alt="">
              </div>

              <div class="title-box d-flex">
                <div class="month-day d-flex flex-column justify-content-between">
                  <span class="day d-block"><?= $event_day ?></span>
                  <span class="month d-block text-uppercase"><?= $event_month ?></span>
                </div>
                <div class="title-time d-flex flex-column">
                  <h3>
                    <?php the_title() ?>
                  </h3>
                  <span class="time text-uppercase d-block">
                    <?= $event_time ?>
                  </span>
                </div>
              </div>
            </a>
          </div>
        </div>
      <?php } ?>
      <?php wp_reset_postdata() ?>
    </div>
  </div>
  <?php

  return ob_get_clean();
}

add_shortcode('events', 'events');


function adc_classes($atts)
{
  extract(
    shortcode_atts(
      array(
        'type'    => 'featured_classes',
        'heading' => '',
        'categ'   => '',
      ),
      $atts
    )
  );
  ob_start();
  $args = array(
    'type'    => $type,
    'heading' => $heading,
    'categ'   => $categ
  );
  get_template_part('template-parts/usable/loop-classes', 'null', $args);
  return ob_get_clean();
}

add_shortcode('adc_classes', 'adc_classes');

function membership_box()
{
  ob_start();
  ?>
  <div class="membership-box <?= is_archive() ? 'membership-box-v2' : '' ?>">
    <div class="sec-title text-center">
      <span class="heading-meta">BECOME A MEMBER</span>
      <h2 class="doro-heading">OUR MEMBERSHIP PACKAGES</h2>
    </div>

    <div class="checklist">
      <ul>
        <li>Multiple Classes Per Month</li>
        <li>10% Off Events</li>
        <li>Access to our online academy</li>
      </ul>
    </div>
    <div class="button-box text-center button-bordered">
      <a href="/memberships/">
        FIND OUT MORE
      </a>
    </div>
  </div>
  <?php
  return ob_get_clean();
}

add_shortcode('membership_box', 'membership_box');