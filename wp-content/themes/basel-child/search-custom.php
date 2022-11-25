<style>
    .input_search {
        border-radius: 5px !important;
        height: 5vh !important;
        padding: 5px 10px !important;
        width: 100% !important;
        margin-left: auto !important;
    }


    .entry-header>h3 {
        font-size: 16px !important;
    }

    #the_btn {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        background-color: #3EABAA;
        color: #ffffff;
        padding: 5px 5px;
        height: 5vh !important;
        font-size: 13px
    }

    .search {
        position: relative;
        box-shadow: 0 0 40px rgba(51, 51, 51, .1);

    }

    .search input:focus {

        box-shadow: none;
        border: 1px solid #3EABAA;


    }


    .search button {

        position: absolute;

        right: 1px;
        width: 80px;
        background: #3EABAA;

    }

    @media screen and (max-width:425px) {
        #the_btn {
            display: none !important;
        }

        .input_search {
            border-radius: 5px !important;
            height: 8vh !important;
            padding: 10px 10px !important;
        }

        .the_form {
            float: left !important;
        }
    }
</style>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <form role="search" method="get" class="the_form" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <div class="search">
                    <label class="screen-reader-text" for="s"><?php esc_html_x('Search for:', 'label', 'basel'); ?></label>
                    <input class="input_search" type="text" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'basel'); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off" name="s" id="s" />
                    <input class="input_search" type="hidden" name="post_type" id="post_type" value="<?php echo esc_attr(basel_get_opt('search_post_type')); ?>">
                    <button id="the_btn" type="submit" id="searchsubmit"> <?php echo esc_html_x('Search', 'submit button', 'basel'); ?></button>

                </div>
            </div>
        </form>
    </div>
</div>