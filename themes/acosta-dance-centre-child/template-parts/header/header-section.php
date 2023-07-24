<?php $doro_options = get_option('doro'); ?>
<!-- Sidebar Section -->
<aside id="doro-aside">
  <!-- Logo -->
  <?php if (Doro_AfterSetupTheme::return_thme_option('textlogo') == 'st2') { ?>
    <h1 id="doro-logo">
      <a class="logo-holder text-logo" href="<?php echo esc_url(home_url('/')); ?>"><img
          src="<?php echo esc_url(Doro_AfterSetupTheme::return_thme_option('logopic', 'url')); ?>"
          alt="<?php bloginfo('name'); ?>">
        <?php if (!empty($doro_options['logotext2'])): ?>
          <span><?php echo esc_html(($doro_options['logotext2'])); ?></span>
        <?php endif; ?></a>
    </h1>
  <?php }
  else { ?>
    <h1 id="doro-logo">
      <a class="logo-holder text-logo" href="<?php echo esc_url(home_url('/')); ?>">
        <?php if (!empty($doro_options['logotext'])): ?>
          <?php echo esc_html(($doro_options['logotext'])); ?>
        <?php else: ?>
          <?php bloginfo('name'); ?>
        <?php endif; ?>
        <?php if (!empty($doro_options['logotext2'])): ?>
          <span><?php echo esc_html(($doro_options['logotext2'])); ?></span>
        <?php endif; ?>
      </a>
    </h1>
  <?php }
  ; ?>

  <?php get_template_part('template-parts/header/menu-section'); ?>

  <!-- Woocommerce -->

  <div class="woo-icons">
    <ul class="list-inline d-flex justify-content-center align-items-center p-0">
      <li>
        <button data-toggle="modal" data-target="#searchModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="27.472" height="27.479" viewBox="0 0 27.472 27.479">
            <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search"
              d="M31.65,29.983l-7.641-7.712a10.889,10.889,0,1,0-1.653,1.674l7.591,7.662a1.176,1.176,0,0,0,1.66.043A1.184,1.184,0,0,0,31.65,29.983Zm-16.2-5.945a8.6,8.6,0,1,1,6.081-2.518A8.545,8.545,0,0,1,15.453,24.038Z"
              transform="translate(-4.5 -4.493)" fill="#0f0f0f" />
          </svg>
        </button>
      </li>
      <li>
        <a href="<?= get_permalink(wc_get_page_id('myaccount')) ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="26.419" height="29.472" viewBox="0 0 26.419 29.472">
            <g id="Icon_feather-user" data-name="Icon feather-user" transform="translate(1 1)">
              <path id="Path_2" data-name="Path 2"
                d="M30.419,31.657V28.6a6.1,6.1,0,0,0-6.1-6.1H12.1A6.1,6.1,0,0,0,6,28.6v3.052"
                transform="translate(-6 -4.185)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
              <path id="Path_3" data-name="Path 3" d="M24.21,10.6a6.1,6.1,0,1,1-6.1-6.1,6.1,6.1,0,0,1,6.1,6.1Z"
                transform="translate(-5.895 -4.5)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
            </g>
          </svg>
        </a>
      </li>
      <li>
        <a href="<?= wc_get_cart_url() ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="32.119" height="29.472" viewBox="0 0 32.119 29.472">
            <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(1 1)">
              <path id="Path_90" data-name="Path 90"
                d="M15.052,31.409A1.531,1.531,0,1,1,13.526,30,1.471,1.471,0,0,1,15.052,31.409Z"
                transform="translate(-2.527 -5.346)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
              <path id="Path_91" data-name="Path 91"
                d="M31.552,31.409A1.531,1.531,0,1,1,30.026,30,1.471,1.471,0,0,1,31.552,31.409Z"
                transform="translate(-4.486 -5.346)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
              <path id="Path_92" data-name="Path 92"
                d="M1.5,1.5H6.976l3.669,16.978a2.7,2.7,0,0,0,2.738,2.041H26.69a2.7,2.7,0,0,0,2.738-2.041L31.619,7.84H8.345"
                transform="translate(-1.5 -1.5)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
            </g>
          </svg>
        </a>
      </li>
    </ul>
  </div>

  <?php if (Doro_AfterSetupTheme::return_thme_option('nav-copyright') != 'no') { ?>
    <p><small>
        <?php if (!empty($doro_options['copyright2'])): ?>
          <span><?php echo do_shortcode(($doro_options['copyright2'])); ?></span>
        <?php else: ?>
          <span><?php esc_html_e('&#169; 2023 Doro By webRedox', 'doro'); ?></span>
        <?php endif; ?>
      </small></p>
  <?php } ?>
  </div>
</aside>