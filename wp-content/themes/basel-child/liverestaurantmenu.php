<?php
if (!is_user_logged_in()) {
    auth_redirect();
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Jost', sans-serif !important;
    }

    #the_head {
        text-decoration: none !important;
        font-family: 'Jost', sans-serif !important;
        font-size: 15px !important;
        color: orange;
    }

    #the_description {
        font-family: 'Jost', sans-serif !important;
        font-size: 15px !important;
        text-align: justify !important;
        padding-right: 10px !important;
    }

    .down_description {
        font-family: 'Jost', sans-serif !important;
        font-size: 15px !important;
    }

    #the_image {
        border-radius: 10px !important;
        height: 50px;
        width: 70px;
    }

    .rounded-circle {
        width: 50%;
        height: 50%;
    }

    .main-page-wrapper {
        background-color: #212121 !important;
    }

    .qr_code_image {
        width: 120px !important
    }

    .inner_div {
        background-color: white;
        border-radius: 10px;
    }

    .main_data {
        width: 48% !important;
        box-shadow: rgba(60, 64, 67, 0.01) 5px 1px 2px 3px, rgba(60, 64, 67, 0.08) 2px 3px 5px 1px !important;
        border-radius: 10px;
        margin: 10px 5px;
    }

    .food_menu {
        box-shadow: rgba(60, 64, 67, 0.01) 5px 1px 2px 3px, rgba(60, 64, 67, 0.08) 2px 3px 5px 1px !important;
        width: 30% !important;
        margin-right: 30px !important;
    }

    .mapouter {
        position: relative;
        text-align: right;
        margin-left: auto !important;
        margin-right: auto !important;
        width: 100%;
        overflow: hidden;
    }

    .gmap_canvas {
        overflow: hidden;
        background: none !important;
        width: 290px;
    }

    .gmap_iframe {
        width: 290px !important;
        height: auto !important;
    }

    @media screen and (max-width:319px) {
        .qr_code_image {
            width: 50px !important;
        }

        .food_menu {
            width: 100% !important;
            box-shadow: unset !important;
        }

        .main_data {
            padding-left: 0px !important;
            width: 100% !important;
            box-shadow: unset !important;
        }

        .top_content {
            width: 100% !important;
        }

        .down_description1 {
            width: 100% !important;
        }

        .down_description2 {
            width: 100% !important;
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            overflow: hidden;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;
            height: auto !important;
        }
    }

    /* Phone */
    @media screen and (min-width:320px) and (max-width: 480px) {
        .qr_code_image {
            width: 50px !important;
        }

        .food_menu {
            width: 100% !important;
            box-shadow: unset !important;
        }

        .down_description {
            padding-left: 20px;
        }

        .main_data {
            padding-left: 0px !important;
            box-shadow: unset !important;
            width: 100% !important
        }

        .top_content {
            padding-left: 20px;
        }

        .down_description1 {
            width: 50% !important;
            padding-left: 20px !important;
        }

        .down_description2 {
            width: 50% !important;
            text-align: center;
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            overflow: hidden;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;
            height: auto !important;
        }

    }

    @media screen and (min-width:481px) and (max-width:768px) {

        .main_data {
            width: 98% !important;
            margin-left: 25px;
        }

        .food_menu {
            width: 30% !important;
            margin-right: 0px !important;
            box-shadow: unset !important;
        }

        .down_description {
            padding-left: 10px;
        }

        .top_content {
            padding-left: 10px;
        }

        .down_description1 {
            width: 50% !important;
            padding-left: 20px;
        }

        .down_description2 {
            width: 50% !important;
            text-align: center;
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100% !important;
            overflow: hidden;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;

        }

    }

    /* Tablet on LB */
    @media screen and (min-width:769px) and (max-width:1024px) {
        .food_menu {
            box-shadow: rgba(60, 64, 67, 0.01) 5px 1px 2px 3px, rgba(60, 64, 67, 0.08) 2px 3px 5px 1px !important;
            width: 30% !important;
            margin-right: 10px !important;
        }

        .main_data {
            width: 48% !important;
            box-shadow: rgba(60, 64, 67, 0.01) 5px 1px 2px 3px, rgba(60, 64, 67, 0.08) 2px 3px 5px 1px !important;
            border-radius: 10px;
            margin: 10px 4px;
        }


        .down_description {
            padding-left: 10px;
            width: 100% !important
        }

        .top_content {
            padding-left: 10px;
        }

        .down_description1 {
            width: 50% !important;
            padding-left: 20px;
        }

        .down_description2 {
            width: 50% !important;
            text-align: center;
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100% !important;
            overflow: hidden;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;
        }

    }
</style>
<?php

$current_user = wp_get_current_user();

$posts = get_posts(array('post_type' => 'fooditem', 'posts_per_page' => -1, 'author' => $current_user->ID));

$taxonomy = "foodtype";

$all_author_categories = array();
foreach ($posts as $p) {
    if ($current_user->ID == 1) {
        $author_categories_for_p = get_terms($taxonomy);
    } else {
        $author_categories_for_p = wp_get_object_terms($p->ID, $taxonomy);
    }
    if (!empty($author_categories_for_p) && !is_wp_error($author_categories_for_p)) {
        foreach ($author_categories_for_p as $author_category) {
            $all_author_categories[$author_category->name] = $author_category;
        }
    }
}
?>
<div class="row inner_div">

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

    <div class="col-md-8 main_data_top">

        <?php
        if (!empty($all_author_categories)) {

            // Then just loop over the collected categories and display them.
            echo '<div class="row mb-2 pt-4">';
            foreach ($all_author_categories as $author_category) {
                // var_dump($current_user->ID);

                echo '<div class="main_data p-2">';
                echo '<div class="top_content">';

                $term_id = $author_category->term_id;
                $foodTypeImage = get_field('food_type_image', $taxonomy . '_' . $term_id);
                $default_image = "https://www.tibs.org.tw/images/default.jpg";

                $author_category_link   = get_term_link($author_category);
                $img   = $author_categories[] = $author_category->url;
                $author_category_name   = $author_categories[] = $author_category->name;
                $author_description   = $author_categories[] = $author_category->description;
                if (!empty($foodTypeImage)) {
                    echo ' <img id="the_image"  src="' . $foodTypeImage['url'] . '" alt=""> ';
                } else {
                    echo ' <img id="the_image"  src="' . $default_image . '" alt=""> ';
                }
                echo '<a id="the_head" href="">';
                echo $author_category_name;
                echo '</a>';
                echo '<p class="pt-1" id="the_description">';
                echo $author_description;
                echo '</p>';
                echo '</div>';
                $author_id = $current_user->ID;
                $first = get_the_author_meta('user_nicename', $author_id);
                // var_dump($the_author);
                if ($current_user->ID == 1) {
                    $args = array(
                        'post_type' => 'fooditem',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'foodtype',
                                'field' => 'term_id',
                                'terms' => array($author_category->term_id),
                                'operator' => 'IN'
                            )
                        ),
                    );
                } else {
                    $args = array(
                        'post_type' => 'fooditem',
                        'author_name' => $first,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'foodtype',
                                'field' => 'term_id',
                                // 'exclude'  => array(),
                                'terms' => array($author_category->term_id),
                                'operator' => 'IN'
                            )
                        ),
                    );
                }

                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
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
                }
                echo '</div>';
            }
            ?>

            <?php
            echo '</div>';
            ?>
    </div>
</div>

<?php

        } else {
            echo '<h2 class="pt-4 text-center" style="color:orange" >No Food Items Added</h2>';
        }
?>

<!-- <div class="container-fluid" style="min-height:2vh"></div> -->