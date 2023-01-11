<?php get_header() ?>

<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<style>
    body {font-family: 'Jost', sans-serif !important;}

    .breadcrumbs {display: none !important;}

    .main-page-wrapper {background-color: #212121 !important;}

    @media screen and (max-width:319px) {.breadcrumbs {display: none !important;}}

    /* Phone */
    @media screen and (min-width:320px) and (max-width: 480px) {.breadcrumbs {display: none !important;}}

    /* Tablet(iPad Air 2) on LB */
    @media screen and (min-width:481px) and (max-width:768px) {.breadcrumbs {display: none !important;}}

    /* Tablet on LB */
    @media screen and (min-width:769px) and (max-width:1024px) {.breadcrumbs {display: none !important;}}
</style>

<div class="row food_search_inner_div">

    <div class="col-md-4 food_search_food_menu">
        <div class="text-center pt-4">
            <p style="line-height: 30px;"><span style="color:orange">The Food</span> <br> <span class="fs-1" style="text-shadow: 1px 1px green;"> MENU</span></p>
        </div>
        <div class="text-center pt-1">
            <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhLyB2gDsuxGNjZyUmiiMKo_5RZHlXIVhTXA&usqp=CAU" alt="">
        </div>

        <div class="text-center pt-3 fw-bold">
            <p>Open hours: 4AM - 11PM <br> <span>Location</span> </p>
        </div>
        <div class="mapouter mb-2">
            <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=358&amp;height=242&amp;hl=en&amp;q=Karen Nairobi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://piratebay-proxys.com/"></a></div>

        </div>
    </div>

    <div class="col-md-8">

        <?php

        echo '<div class="row mb-2 pt-4">';
        ?>
        <div class="row">
            <div class="col-md-12"><?php get_template_part('search', 'custom'); ?></div>
        </div>
        <?php
        echo '<div class="food_search_main_data p-2">';

        if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
                <div class="row mt-0 pt-0 my-2 food_search_down_description">
                    <div class="food_search_inner_description m-2 p-1">
                        <div class="col-md-4 food_search_data1">
                            <?php
                            $theimage  = get_the_post_thumbnail_url();
                            $thetitle  = get_the_title();
                            $default_image = "https://www.tibs.org.tw/images/default.jpg";
                            if (empty($theimage)) {
                                echo ' <img class="food_search_search_image"  src="' . $default_image . '" alt="' . $thetitle . '"> ';
                            } else {
                                echo ' <img class="food_search_search_image"  src="' . $theimage . '" alt="' . $thetitle . '"> ';
                            }

                            ?>
                        </div>
                        <div class="col-md-4 food_search_down_description1 mt-3" style="text-transform: capitalize;">
                            <?php the_title(); ?>
                        </div>

                        <div class="col-md-4 mt-3 food_search_data2">

                            <?php
                            $price = get_field('product_price');
                            $prices = $price ? $price : '-';
                            echo ' Kshs. ' . $prices;
                            echo '<br>';
                            ?>


                        </div>

                    </div>
                </div>

        <?php

            }
            wp_reset_postdata();
        } else {
            echo "No Search Records Found";
        }

        echo '</div>';

        echo '</div>';
        ?>
    </div>
</div>