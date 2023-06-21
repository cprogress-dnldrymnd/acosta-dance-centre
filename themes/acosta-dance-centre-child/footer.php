<?php $doro_options = get_option('doro'); ?>
<!-- Footer -->
<?php if (Doro_AfterSetupTheme::return_thme_option('footer-section') != 'no') { ?>
  <div id="doro-footer2">
    <div class="doro-narrow-content">
      <?php if (Doro_AfterSetupTheme::return_thme_option('index-footer-animate') == 'yes') { ?>
        <div class="animate-box" data-animate-effect="fadeInLeft">
        <?php } ?>
        <div class="row g-5">
          <?php if (is_active_sidebar('footer_column_1')) { ?>
            <div class="col footer-column-1">
              <div class="column-holder  ">
                <?php dynamic_sidebar('footer_column_1') ?>
              </div>
            <?php } ?>
          </div>
          <?php if (is_active_sidebar('footer_column_2')) { ?>

            <div class="col footer-column-2">
              <div class="column-holder">
                <?php dynamic_sidebar('footer_column_2') ?>
              </div>
            </div>
          <?php } ?>

          <?php if (is_active_sidebar('footer_column_3')) { ?>
            <div class="col footer-column-3">
              <div class="column-holder">
                <?php dynamic_sidebar('footer_column_3') ?>
              </div>
            </div>
          <?php } ?>
          <?php if (is_active_sidebar('footer_column_4')) { ?>
            <div class="col footer-column-4">
              <div class="column-holder">
                <?php dynamic_sidebar('footer_column_4') ?>
              </div>
            </div>
          <?php } ?>
          <?php if (is_active_sidebar('footer_column_5')) { ?>
            <div class="col footer-column-5">
              <div class="column-holder ">
                <?php dynamic_sidebar('footer_column_5') ?>
              </div>
            </div>
          <?php } ?>
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