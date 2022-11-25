    <?php

 
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Jost', sans-serif !important;
        }

        #food_title {
            text-decoration: none;
            font-size: 16px;
        }

        #food_title:hover {
            color: #215641
        }

        .title_name {
            text-align: start;
        }

        #common_color {
            color: #215641 !important;
        }

        .pageLinks {
            color: #215641 !important;
            text-decoration: none;
        }

        .mynutrition_facts {
            border-radius: 15px !important;
            box-shadow: rgba(60, 64, 67, 0.01) 5px 1px 2px 3px, rgba(60, 64, 67, 0.08) 2px 3px 5px 1px !important;
        }

        .the_nutrition_facts {
            box-shadow: rgba(60, 64, 67, 0.01) 5px 1px 2px 3px, rgba(60, 64, 67, 0.08) 2px 3px 5px 1px !important;
            border-radius: 15px !important;
        }

        #hr_one {
            border: 5px solid #000000 !important;
            width: 98% !important;
            margin: 0px !important;
        }

        hr {
            margin: 7px 0px !important;
        }

        #hr_two {
            border: 3px solid #000000 !important;
            width: 98% !important;
            margin: 0px !important;
        }

        .basel-sticky-sidebar-opener {
            display: none !important
        }

        .taxonomy_table {
            margin-bottom: 12px !important;
        }

        @media screen and (max-width: 1024px) {
            .main_row {
                line-height: 15px !important;
            }
        }
    </style>
    <div class="wrapper">
        <div class="primary-content">

            <div class="row">

                <div class="col-md-4">
                    <div class="col-md-4 food_menu">
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
                </div>
                <div class="col-md-8 main_data_top">

                    <?php


                    // Then just loop over the collected categories and display them.
                    echo '<div class="row mb-2 pt-4">';
                    get_template_part('search', 'custom');

                    // var_dump($current_user->ID);

                    echo '<div class="main_data p-2">';
                    echo '<div class="top_content">';



                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                    ?>
                            <div class="row mt-0 pt-0 down_description">
                                <div class="col-md-6 down_description1" style="text-transform: capitalize;">
                                    <?php the_title(); ?>
                                </div>
                                <div class="col-md-6 down_description2">
                                    <?php
                                    $price = get_field('product_price');
                                    $prices = $price ? $price : '-';
                                    echo ' Kshs. ' . $prices;
                                    echo '<br>';
                                    ?>
                                </div>
                            </div>

                    <?php
                        }
                        wp_reset_postdata();
                    }else {
                        echo "No Search Records Found";
                    }
                            
                                    
                    echo '</div>';

                    ?>

                    <?php
                    echo '</div>';
                    ?>
                </div>


            </div>
        </div>
    </div>
    <!--// end .primary-content -->

    <div class="secondary-content">
        <?php //get_sidebar(); 
        ?>
    </div>
    <!--// end .secondary-content -->

