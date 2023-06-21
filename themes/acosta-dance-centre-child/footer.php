<?php $doro_options = get_option('doro'); ?>
<!-- Footer -->
<?php if (Doro_AfterSetupTheme::return_thme_option('footer-section') != 'no') { ?>
  <div id="doro-footer2">
    <div class="doro-narrow-content">
      <?php if (Doro_AfterSetupTheme::return_thme_option('index-footer-animate') == 'yes') { ?>
        <div class="animate-box" data-animate-effect="fadeInLeft">
        <?php } ?>
        <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <?php if (Doro_AfterSetupTheme::return_thme_option('footer-logo') != 'no') { ?>
              <?php if (Doro_AfterSetupTheme::return_thme_option('textlogo2') == 'st2') { ?>
                <h2 class="text-center footer-logo-img">
                  <a class="logo-holder logo-footer-img"
                    href="<?php if (!empty($doro_options['logopic2_url'])): ?> <?php echo esc_url($doro_options['logopic2_url']); ?> <?php else: ?> <?php echo esc_url(home_url('/')); ?> <?php endif; ?>"><img
                      src="<?php echo esc_url(Doro_AfterSetupTheme::return_thme_option('logopic2', 'url')); ?>"
                      alt="<?php bloginfo('name'); ?>"></a>
                </h2>
              <?php }
              else { ?>
                <h2 class="text-center">
                  <a class="text-logo-footer"
                    href="<?php if (!empty($doro_options['logopic2_url'])): ?> <?php echo esc_url($doro_options['logopic2_url']); ?> <?php else: ?> <?php echo esc_url(home_url('/')); ?> <?php endif; ?>">
                    <?php if (!empty($doro_options['logotext3'])): ?>
                      <?php echo esc_html(($doro_options['logotext3'])); ?>
                    <?php else: ?>
                      <?php bloginfo('name'); ?>
                    <?php endif; ?>
                  </a>
                </h2>
              <?php }
              ; ?>
            <?php }
            ; ?>
          </div>

          <div class="col-md-4">
          
          </div>
        </div>
        <?php if (Doro_AfterSetupTheme::return_thme_option('footer-copyright') != 'no') { ?>
          <div class="row">
            <div class="copyright col-12">
              <div class="doro-lead">
                <?php if (!empty($doro_options['copyright'])): ?>
                  <span><?php echo do_shortcode(($doro_options['copyright'])); ?></span>
                <?php else: ?>
                  <span><?php esc_html_e('&#169; Doro 2023 | All rights reserved.', 'doro'); ?></span>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if (Doro_AfterSetupTheme::return_thme_option('index-footer-animate') == 'yes') { ?>
        </div>
      <?php } ?>
    </div>
  </div>
<?php }
; ?>
</div>
</div>
<!-- Main end -->

<?php wp_footer(); ?>
</body>

</html>