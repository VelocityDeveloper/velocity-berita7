<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = velocitytheme_option('justg_container_type', 'container');
?>

<div class="container">
    <div class="row px-1">
        <div class="col-md-6 pe-md-0">
            <div id="velocity-home-slider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                <?php // berita-kateori
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                );
                $posts = get_posts($args);
                $i = 1;
                foreach ($posts as $post) {
                    $no = $i++;
                    $class = $no == 1 ? ' active' : '';
                    $post_id = $post->ID;
                    echo '<div class="carousel-item'.$class.'">';
                        echo do_shortcode('[resize-thumbnail width="480" height="320" linked="true" class="w-100" post_id="'.$post_id.'"]');
                        echo '<div class="bg-dark bg-opacity-75 position-absolute bottom-0 start-0">';
                            echo '<a href="'.get_the_permalink($post_id).'" class="d-inline-block py-2 px-3 text-white">'.$post->post_title.'</a>';
                        echo '</div>';
                    echo '</div>';
                }
                ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#velocity-home-slider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#velocity-home-slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6 ps-md-0">
                <?php // berita-kateori
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                );
                $posts = get_posts($args);
                $i = 1;
                echo '<div class="row mx-0">';
                foreach ($posts as $post) {
                    $no = $i++;
                    $post_id = $post->ID;
                    echo '<div class="p-0 col-sm-4 col-6 position-relative">';
                        echo do_shortcode('[resize-thumbnail width="300" height="300" linked="true" class="w-100" post_id="'.$post_id.'"]');
                        echo '<div class="position-absolute bottom-0 start-0">';
                            echo '<a href="'.get_the_permalink($post_id).'" class="text-shadow lh-sm d-inline-block py-2 px-3 text-white"><small>'.$post->post_title.'</small></a>';
                        echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                ?>
        </div>
    </div>

    <div class="row pt-3 ps-1">
        <div class="col-md-8 pt-2">
            <?php velocity_posts(velocitytheme_option('cat_berita1')); ?>
            <?php velocity_posts2(velocitytheme_option('cat_berita2')); ?>
            <?php velocity_posts(velocitytheme_option('cat_berita3')); ?>
        </div>
        <div class="col-md-4 pt-2">
            <?php get_sidebar('main');?>
        </div>
    </div>
</div>

<?php
get_footer();