<?php

/*

* The template for index page of blog

*/
get_header(); 

global $church_options;
?>

<!-- inner banner -->
<section class="banner-div clearfix">
    <div class="sub-banner" style="background:url(<?php echo $church_options['blog_common_banner']['url']; ?>) no-repeat center center;">
     <div class="overlay">
      <div class="container">
        <h3>RECENT <span> BLOG</span></h3>
      </div>
     </div>
    </div>
</section>

<section class="inner-div">
  <div class="container">
    	
          <div class="col-md-9 col-sm-9"> 
            <!--<div class="inner-page-heading">
              <h2 class="inner-page-heading"><span><?php //the_title(); ?></span></h2>
            </div> -->
			<div class="left-content">
				<ul>
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
						<div class="blog-box">
                              <div class="blog-details-image-box">
                                <?php
                                  if ( has_post_thumbnail() ) { 
                                ?>
                                <div class="blog-details-img">
                                    <a href="<?php the_permalink(); ?>">								
                                      <img class="img-responsive" src="<?php echo the_post_thumbnail_url(); ?>" alt="" > 
                                    </a>
                                    <div class="single-post-meta">
                                       <p>Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?></p>
                                    </div>
                                </div>
                                <?php 
                                  }
                                ?>
                              </div>  
			                
							<div class="blog-content">
                            
								 <h3 class="inner-page-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
								<p><?php echo excerpt(50); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn-donate black-btn btn-big blog-btn"> LEARN MORE <span> <i class="fa fa-long-arrow-right"></i> </span></a>
							</div>
						</div>
                    
                    <?php 
                    endwhile; 

                    wp_pagenavi();

                    endif; 
                    ?>
				</ul>				
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