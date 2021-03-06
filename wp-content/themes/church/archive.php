<?php
/**
 * Template for displaying Archive pages
 *
 */

get_header(); ?>

<!-- inner banner -->
<section class="banner-div clearfix">
    <div class="sub-banner" style="background:url(<?php echo $church_options['blog_common_banner']['url']; ?>) no-repeat center center;">
     <div class="overlay">
      <div class="container">
        <h3>RECENT<span> BLOG</span></h3>
        
        <!--======= BREADCRUMB =========-->
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
          <li class="active">Blog</li>
        </ol>
      </div>
     </div>
    </div>
</section>

<section class="inner-div">
<?php

	/*

	 * Queue the first post, that way we know

	 * what date we're dealing with (if that is the case).

	 *

	 * We reset this later so we can run the loop

	 * properly with a call to rewind_posts().

	 */

	if ( have_posts() )
		the_post(); ?>
  <div class="container">
    	
   <div class="col-md-9 col-sm-9"> 
    <!--<div class="inner-page-heading">
      <h2 class="inner-page-heading"><span><?php //the_title(); ?></span></h2>
    </div> -->
    <h2 class="page-title inner-page-heading"><span>
                <?php if ( is_day() ) : ?>
                    <?php printf( __( 'Daily Archives: %s', 'church' ), get_the_date() ); ?>
                <?php elseif ( is_month() ) : ?>
                    <?php printf( __( 'Monthly Archives: %s', 'church' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'church' ) ) ); ?>
                <?php elseif ( is_year() ) : ?>
                    <?php printf( __( 'Yearly Archives: %s', 'church' ), get_the_date( _x( 'Y', 'yearly archives date format', 'church' ) ) ); ?>
                <?php else : ?>
                    <?php _e( 'Blog Archives', 'church' ); ?>
                <?php endif; ?>
    </span></h2>
    
    <div class="left-content">
                <?php
                    /*
                     * Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();
                    /*
                     * Run the loop for the archives page to output the posts.
                     * If you want to overload this in a child theme then include a file
                     * called loop-archive.php and that will be used instead.
                     */
                    get_template_part( 'loop', 'archive' );
                ?>
            </div>
  </div>  
   <div class="col-md-3 col-sm-3">  
    <div class="right-content">
                <?php get_sidebar(); ?>
            </div>
  </div>  
  </div>
</section>




            

<?php get_footer(); ?>

