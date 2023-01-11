<style>
    .entry-header>h3 {font-size: 16px !important;}
</style>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <form role="search" method="get" class="the_form" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <div class="food_custom_search">
                    <label class="screen-reader-text" for="s"><?php esc_html_x('Search for:', 'label', 'basel'); ?></label>
                    <input class="food_custom_search_input_search" type="text" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'basel'); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off" name="s" required id="s" />
                    <input class="food_custom_search_input_search" type="hidden" name="post_type" id="post_type" value="<?php echo esc_attr(basel_get_opt('search_post_type')); ?>">
                    <button id="the_food_btn" type="submit" id="searchsubmit"> <?php echo esc_html_x('Search', 'submit button', 'basel'); ?></button>

                </div>
            </div>
        </form>
    </div>
</div>