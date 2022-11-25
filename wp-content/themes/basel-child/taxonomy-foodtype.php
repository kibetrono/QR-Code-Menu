<?php

/**
 * Locations taxonomy archive
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header();
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Jost', sans-serif !important;}
</style>
<div class="wrapper">
    <div class="primary-content">
        <div class="row">
            <div class="row">
                <div class="col-md-3 fs-6" style="color:orange"><?php echo apply_filters('the_title', $term->name); ?></div>
                <div class="col-md-6 fs-6" style="color:orange">Amount</div>
            </div>
            <div class="col-md-12">
                <!-- <div class="row my-2">
                    <div class="col-md-7 fs-3"> </div>
                    <div class="col-md-5"><?php //get_template_part('search', 'custom'); ?></div>
                </div>  -->

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
                    <div class="row">
                        <div class="col-md-3">
                            <?php the_title(); ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $price = get_field('product_price');
                            $prices = is_null($price) ? '-' : 'Kshs. ' . $price;
                            echo $prices;
                            ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                    <h2 class="post-title"><?php echo apply_filters('the_title', $term->name) . ' is an empty Food Type.'; ?></h2>
                <?php endif; ?>

                <div class="navigation clearfix mb-4">
                    <div class="row">
                        <div class="col-md-4 text-start">
                            <?php previous_posts_link('« Previous Entries') ?>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-end">
                            <?php next_posts_link('Next Entries »') ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>