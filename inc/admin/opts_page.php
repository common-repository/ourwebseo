<?php
/*
* File Name: opts_page.php
* Created on 11/5/2021
* (c)2021 Bill Banks
*/

function ourwebseo_seo_opts_page() {
    $ourwebseo_opts = get_option('ourwebseo_opts');
    $ourwebseo_keywords = wp_kses( $ourwebseo_opts['keywords']);
    $ourwebseo_description = wp_kses( $ourwebseo_opts['description']);
    $ourwebseo_frontpage = wp_kses( $ourwebseo_opts['only_on_homepage']);

    ?>
        <div class="wrap">
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Our SEO Options</h3>
        <?php
          if ($_GET['status'] == 1) {
              ?>    <div class="alert alert-success">Options Updated</div>    <?php
          }

        ?>
        <form method="post" action="admin-post.php">
            <input type="hidden" name="action" value="ourwebseo_save_options">
            <?php  wp_nonce_field('ourwebseo_options_verify'); ?>
            <div class="form-group">
                <label>Keywords</label>
                <input type="text" class="form-control"
                       name="ourwebseo_keywords" value="<?php echo $ourwebseo_keywords ?>">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control"
                       name="ourwebseo_description" value="<?php echo $ourwebseo_description ?>">
            </div>

            <div class="form-group">
                <label>SEO on front page only</label>
                <input type="checkbox" class="form-control" name="ourwebseo_frontpage" value="<?php echo $ourwebseo_frontpage ?>"

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><?php _e('Update'); ?></button>
            </div>
        </form>
    </div>
</div>
            <br>
            <br>
            <form action="https://www.paypal.com/donate" method="post" target="_top">
                <input type="hidden" name="hosted_button_id" value="262YFCDP8975J" />
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
            </form>

        </div>
<?php
}