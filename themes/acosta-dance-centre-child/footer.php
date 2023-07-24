<?php $doro_options = get_option('doro'); ?>
<!-- Footer -->
</div>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="searchModalLabel">Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-lg-7">
              <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
            </div>
            <div class="col-lg-5">
               <button type="submit" class="btn btn-primary mb-2">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="newsletter-box">
  <?= do_shortcode('[contact-form-7 id="832" title="Newsletter"]') ?>
</div>
<?php if (Doro_AfterSetupTheme::return_thme_option('footer-section') != 'no') { ?>
  <div id="doro-footer2">
    <div class="container">
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