<?php
/*
  * Template Name: Resources Page Template
*/
get_header(); 

global $church_options;
?>

<section class="banner-div clearfix">
    <div class="sub-banner" style="background:url(<?php echo $church_options['blog_common_banner']['url']; ?>) no-repeat center center; background-size:cove;">
     <div class="overlay">
      <div class="container">
        <h3>RESOURCES</h3>
      </div>
     </div>
    </div>
</section>

<!-- inner content -->
<section class="inner-div">
    <div class="inner-box">
      <div class="container">
	 	<div class="row">
         <div class="event-pages">

              <?php 
                $resources_args = array( 'post_type' => 'church_resources', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'date' );
                $resources_query = new WP_Query( $resources_args ); 

                while ( $resources_query->have_posts() ) { $resources_query->the_post();
              ?>
                               
                	<div class="col-sm-4">
                     <div class="resources-box">
                		<div class="resources-image">
                  			<?php
			                    if ( has_post_thumbnail() ) { ?>
			                    <img src="<?php echo the_post_thumbnail_url( 'full' ); ?>" class="img-responsive">
			                <?php } ?>
			            </div>
                 		<div class="resources-content">
	                  		<h5><?php echo get_the_date( 'F Y' ); ?></h5>
	                  		<?php if( !empty( resource_pdf_get_meta( 'resource_pdf_pdf_downloadable_link' ) ) ){ ?>
                            <?php the_excerpt(); ?>
	                  		<a class="btn-donate black-btn btn-big" href="<?php echo resource_pdf_get_meta( 'resource_pdf_pdf_downloadable_link' ); ?>" target="_blank">Download <span> <i class="fa fa-long-arrow-right"></i> </span></a>
	                  		<?php } ?>
                 		</div>
                     </div>    
                	</div>
               
              
             <?php } wp_reset_query(); ?>

          </div>
          
         </div>
        </div>  
	  </div>
    </div>
</section>



<?php get_footer(); ?>