<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Revolve
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php $revolve_port_category = absint(get_theme_mod('revolve_port_category')); ?>
		<?php
		while ( have_posts() ) : the_post();
            $revolve_p_cats = get_the_category();
            $revolve_port_cats = array();
            foreach($revolve_p_cats as $revolve_p_cat) {
                $revolve_port_cats[] = $revolve_p_cat->term_id;
            }
            
            if($revolve_port_category != 0) {
                if(in_array($revolve_port_category, $revolve_port_cats)){
                    get_template_part( 'template-parts/content', 'portfolio' );
                }else {
                    get_template_part( 'template-parts/content', get_post_format() );
                    echo wp_kses( get_the_post_navigation(array('in_same_term' => true)), array(
                        'nav' => array(
                            'class' => array(),
                            'role' => array()
                        ),
                        'h2' => array(
                            'class' => array()
                        ),
                        'div' => array(
                            'class' => array(),
                        ),
                        'a' => array(
                            'href' => array(),
                            'rel' => array(),
                        )
                    ) );
                }
            } else {
                get_template_part( 'template-parts/content', get_post_format() );
                echo wp_kses( get_the_post_navigation(array('in_same_term' => true)), array(
                    'nav' => array(
                        'class' => array(),
                        'role' => array()
                    ),
                    'h2' => array(
                        'class' => array()
                    ),
                    'div' => array(
                        'class' => array(),
                    ),
                    'a' => array(
                        'href' => array(),
                        'rel' => array(),
                    )
                ) );
            }

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();