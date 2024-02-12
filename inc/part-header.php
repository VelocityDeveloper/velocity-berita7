<?php $iklan_content = velocitytheme_option('image_iklan_header', '');
if ($iklan_content) { ?>
    <div class="bg-white">
        <div class="container py-3 text-center">
            <?php get_berita_iklan('iklan_header'); ?>
        </div>
    </div>
<?php } ?>


<div class="bg-dark">
<div class="container">
<div class="bg-color-theme row mx-0 align-items-center py-sm-1 py-2">
    <div class="col-sm-8 mb-2 mb-sm-0">
        <div class="velocity-marquee-content">
            <?php $headerposts = get_posts(array(
                'showposts' => 5,
                'post_type' => array('post'),
            ));
            foreach($headerposts as $post) {
                echo '<a class="text-white" href="'.get_the_permalink($post->ID).'">'.get_the_title($post->ID).'</a>';
            } ?>
        </div>
    </div>
    <div class="col-sm-4 text-sm-end ps-sm-0">
        <?php $sq = isset($_GET['s'])?$_GET['s']:''; ?>
        <form method="get" name="searchform" action="<?php echo get_home_url();?>">
            <input type="hidden" name="post_type" value="post" />
            <div class="row">
                <div class="col-9 col-md-10 pe-0">
                    <input type="text" name="s" class="form-control form-control-sm rounded-0" placeholder="Search" value="<?php echo $sq;?>" required />
                </div>
                <div class="col-3 col-md-2 ps-1">
                    <button type="submit" class="h-100 w-100 btn btn-primary btn-sm bg-dark border-0 rounded-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>


<div class="container">
    <div class="bg-white px-3 pt-3">
        <div class="row align-items-center mx-0 bg-color-theme text-white">
            <div class="col-8 col-sm-4 col-md-3 pb-1">
                <small><?php echo velocity_date(); ?></small>
            </div>
            <div class="col-4 col-sm-8 col-md-9 text-end px-0">
                <nav id="secondary-nav" class="navbar navbar-expand-md d-block navbar-dark py-0" aria-labelledby="secondary-nav-label">

                    <button class="navbar-toggler fs-6" type="button" data-bs-toggle="offcanvas" data-bs-target="#secondarynavbar" aria-controls="secondarynavbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'justg'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="secondarynavbar">

                        <div class="offcanvas-header justify-content-end">
                            <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div><!-- .offcancas-header -->

                        <!-- The WordPress Menu goes here -->
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'secondary',
                                'container_class' => 'offcanvas-body',
                                'container_id'    => '',
                                'menu_class'      => 'navbar-nav justify-content-end flex-grow-1',
                                'fallback_cb'     => '',
                                'menu_id'         => 'secondary-menu',
                                'depth'           => 4,
                                'walker'          => new justg_WP_Bootstrap_Navwalker(),
                            )
                        );
                        ?>
                    </div><!-- .offcanvas -->
            </nav>
        </div>
    </div>
</div>


<div class="bg-white py-1 px-3 text-center">
    <div class="velocity-logo position-relative py-2">
        <?php echo the_custom_logo(); ?>
    </div>
</div>


<div class="pt-0 p-3 bg-white">
	<nav id="primary-nav" class="navbar navbar-expand-md d-block navbar-dark py-0 bg-dark" aria-labelledby="main-nav-label">

		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#responsivenavbar" aria-controls="responsivenavbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'justg'); ?>">
			<span class="navbar-toggler-icon"></span>
			<small>Menu</small>
		</button>

		<div class="offcanvas bg-dark offcanvas-start" tabindex="-1" id="responsivenavbar">

			<div class="offcanvas-header justify-content-end">
				<button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div><!-- .offcancas-header -->

			<div class="offcanvas-body">
				<ul class="navbar-nav justify-content-start flex-grow-1 pe-3" id="responsive-menu">
				  <?php $responsive_menu = array(
					'theme_location'  => 'primary',
					'container'  => '',
					'walker'          => new justg_WP_Bootstrap_Navwalker(),
					'items_wrap'  => '%3$s',
				  ); ?>
				  <?php wp_nav_menu($responsive_menu); ?>
				</ul>
			</div>
		</div><!-- .offcanvas -->
	</nav>
    
</div>
</div>
