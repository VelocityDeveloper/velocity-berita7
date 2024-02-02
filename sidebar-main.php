<?php if (is_active_sidebar('main-sidebar')) {
	echo '<div class="main-seidebar pe-md-1">';
		dynamic_sidebar( 'main-sidebar' );
	echo '</div>';
}