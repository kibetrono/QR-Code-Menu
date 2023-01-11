<?php
if (!is_user_logged_in()) {
    auth_redirect();
}
?>

<style>
    .main-page-wrapper {background-color: #212121 !important;}

    .pagination>.page-numbers {border: 1px solid #ddd;padding: 2px 15px;margin: 2px;}

    .pagination>.page-numbers:hover {background-color: #42ADA3;color: white}
</style>
<?php

$current_user = wp_get_current_user();
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$per_page = 6;
$number_of_series = count(get_terms('foodtype'));
$offset = ($page - 1) * $per_page;
$term_args = array('number' => $per_page, 'offset' => $offset);
$posts = get_posts(array('post_type' => 'fooditem', 'posts_per_page' => -1, 'author' => $current_user->ID));
$taxonomy = "foodtype";
$all_author_categories = array();
foreach ($posts as $p) {

    $author_categories_for_p = get_terms($taxonomy, $term_args);
    if (!empty($author_categories_for_p) && !is_wp_error($author_categories_for_p)) {
        foreach ($author_categories_for_p as $author_category) {
            $all_author_categories[$author_category->name] = $author_category;
        }
    }
}
?>
<div class="row food_menu_inner_div">

    <div class="col-md-4 food_menu_food_menu">
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
        if (!empty($all_author_categories)) {

            echo '<div class="row mb-2 pt-4">';
            foreach ($all_author_categories as $author_category) {

                echo '<div class="food_menu_main_data p-2">';
                echo '<div class="food_menu_top_content">';
                $term_id = $author_category->term_id;
                $foodTypeImage = get_field('food_type_image', $taxonomy . '_' . $term_id);
                $default_image = "https://www.tibs.org.tw/images/default.jpg";
                $author_category_link   = get_term_link($author_category);
                $img   = $author_categories[] = $author_category->url;
                $author_category_name   = $author_categories[] = $author_category->name;
                $author_description   = $author_categories[] = $author_category->description;
                if (!empty($foodTypeImage)) {
                    echo ' <img id="food_menu_the_image"  src="' . $foodTypeImage['url'] . '" alt="' . $author_category_name . '"> ';
                } else {
                    echo ' <img id="food_menu_the_image"  src="' . $default_image . '" alt="' . $author_category_name . '"> ';
                }
                echo '<a id="food_menu_the_head" href="">';
                echo $author_category_name;
                echo '</a>';
                echo '<p class="pt-1" id="food_menu_the_description">';
                echo $author_description;
                echo '</p>';
                echo '</div>';
                $author_id = $current_user->ID;
                $first = get_the_author_meta('user_nicename', $author_id);

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


                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
        ?>
                        <div class="row mt-0 pt-0 food_menu_down_description">
                            <div class="col-md-6 food_menu_down_description1" style="text-transform: capitalize;">
                                <?php the_title(); ?>
                            </div>
                            <div class="col-md-6 food_menu_down_description2">
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
            echo '<div class="pagination">';

            $big = 999999999;
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => $paged,
                'show_all' => true,
                'total' => ceil($number_of_series / $per_page)
            ));

            echo '</div><!--// end .pagination -->';

            echo '</div>';
            ?>
    </div>
</div>

<?php

    } else {
        echo '<h2 class="pt-4 text-center" style="color:orange" >No Food Items Added</h2>';
    }
?>