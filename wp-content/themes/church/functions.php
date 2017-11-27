<?php
	//church enqueue scripts
	function sb_church_enqueue_script() {
		//styles
		wp_enqueue_style( 'fontawesome',  get_template_directory_uri() . '/css/font-awesome.min.css' );
		wp_enqueue_style( 'gfont-lora', 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' );	
		wp_enqueue_style( 'gfont-lato', 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' );	
		wp_enqueue_style( 'gfont-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );	
		wp_enqueue_style( 'gfont-fjalla', 'https://fonts.googleapis.com/css?family=Fjalla+One' );
		wp_enqueue_style( 'gfont-SansPro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900' );

		wp_enqueue_style( 'bootstrap-css',  get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'main-css',  get_template_directory_uri() . '/css/main-blue.css' );					
		wp_enqueue_style( 'custom',  get_template_directory_uri() . '/css/custom-blue.css' );
		wp_enqueue_style( 'animate',  get_template_directory_uri() . '/css/animate.css' );	
		wp_enqueue_style( 'skin-css',  get_template_directory_uri() . '/css/skin.css' );
		wp_enqueue_style( 'responsive',  get_template_directory_uri() . '/css/responsive.css' );
		wp_enqueue_style( 'site',  get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'video-js',  get_template_directory_uri() . '/css/video-js.css' );
		
		
		//js
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), true );
		wp_enqueue_script( 'flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), true );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'), true );
		wp_enqueue_script( 'main-js', get_template_directory_uri().'/js/main.js', array('jquery'), true );
		wp_enqueue_script( 'isotope', get_template_directory_uri().'/js/jquery.isotope.min.js', array('jquery'), true );
		wp_enqueue_script( 'magnific-popup-js', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array('jquery'), true );
		wp_enqueue_script( 'videojs-ie8', get_template_directory_uri().'/js/videojs-ie8.min.js', array('jquery'), true );
		wp_enqueue_script( 'video-js', get_template_directory_uri().'/js/video.js', array('jquery'), true );
		//wp_enqueue_script( 'fp-jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', true );
		//wp_enqueue_script( 'flowplayer-js', get_template_directory_uri().'/js/flowplayer.min.js', array('jquery'), true );
		//wp_enqueue_script( 'quality-js', 'http://releases.flowplayer.org/vod-quality-selector/flowplayer.vod-quality-selector.min.js', array('jquery'), true );
		
		
	}
	add_action( 'wp_enqueue_scripts', 'sb_church_enqueue_script' );
	
	//thumbnail support in church theme
	add_theme_support( 'post-thumbnails' );
	
	//customized image size for post slider
	//add_image_size( 'blog-single', 267, 194 );

	//Enables the Excerpt meta box in Page
	function sb_church_add_excerpt_support_for_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}
	add_action( 'init', 'sb_church_add_excerpt_support_for_pages' );
	
	//church menus
	function sb_church_register_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'footer-menu' => __( 'Footer Menu' ),
				'useful-menu' => __( 'Useful Links Menu' ),
				'links-menu' => __( 'Links Menu' ),
				)
			);
	}
	add_action( 'init', 'sb_church_register_menus' );

	//church dynamic sidebars
	function sb_church_widgets() {
		register_sidebar( array(
			'name' => __( 'Church Blog Widget', 'church' ),
			'id' => 'church-blog-sidebar',
			'description' => __( 'This widget displayed in right sidebar of blog pages', 'church' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Church Twitter Widget', 'church' ),
			'id' => 'church-twitter-widget',
			'description' => __( 'This widget displays twitter feeds in footer', 'church' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Church Facebook Widget', 'church' ),
			'id' => 'church-facebook-widget',
			'description' => __( 'This widget displays facebook feeds in footer', 'church' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'sb_church_widgets' );
	
	//church theme options
	function sb_church_redux_framework(){
		if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/includes/ReduxFramework/ReduxCore/framework.php' ) ) {
			require_once( dirname( __FILE__ ) . '/includes/ReduxFramework/ReduxCore/framework.php' );
		}
		if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/includes/ReduxFramework/sample/sample-config.php' ) ) {
			require_once( dirname( __FILE__ ) . '/includes/ReduxFramework/sample/barebones-config.php' );
		}
	}
	add_action('after_setup_theme', 'sb_church_redux_framework');

	//church customized exceprt word limit
	//use excerpt(25) or the_excerpt()
	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'[...]';
		} else {
			$excerpt = implode(" ",$excerpt);
		} 
		//$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}

	//church shortcontent with word limit
	//use custom_content(25)
	function custom_content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content);
		} else {
			$content = implode(" ",$content);
		} 
		//$content = preg_replace('`\[[^\]]*\]`','',$content);
		return $content;
	}

	//church excerpt read more link
	function new_excerpt_more($more) {
		global $post;
		return '<a class="getDetails" href="'. get_permalink($post->ID) . '">' . 'Get Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i>' . '</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	//search highlighter for excerpt
	function search_excerpt_highlight() {
		$excerpt = get_the_excerpt();
		$keys = implode('|', explode(' ', get_search_query()));
		$excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);
		echo '<p>' . $excerpt . '</p>';
	}
	//search highlighter for title
	function search_title_highlight() {
		$title = get_the_title();
		$keys = implode('|', explode(' ', get_search_query()));
		$title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);
		echo $title;
	}
	
	//church woocommerce support
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'woocommerce_support' );

	//shortcode support in excerpt
	add_filter('the_excerpt', 'do_shortcode');

	//stop update of portfolio gallery plugin
	function sb_filter_plugin_updates( $value ) {
	    unset( $value->response['portfolio-filter-gallery/portfolio-filter-gallery.php'] );
	    return $value;
	}
	add_filter( 'site_transient_update_plugins', 'sb_filter_plugin_updates' );

	//pagination for CPT
	function paginate() {
	    global $wp_query, $wp_rewrite;
	    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	    $pagination = array(
	        'base' => @add_query_arg('page','%#%'),
	        'format' => '',
	        'total' => $wp_query->max_num_pages,
	        'current' => $current,
	        'show_all' => true,
	        'type' => 'plain'
	    );
	    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
	    echo paginate_links( $pagination );
	}

	//pagination:post per page
	function flowplayer5_per_page( $query ) {
	    if ( $query->query_vars['post_type'] == 'flowplayer5' ) $query->query_vars['posts_per_page'] = 5;
	    return $query;
	}
	if ( !is_admin() ) {
		add_filter( 'pre_get_posts', 'flowplayer5_per_page' );
	}

	//disable toolbar for non-admins
	if (!current_user_can('manage_options')) {
		show_admin_bar(false);
	}

	function sb_youtube_videocount($atts) {
	  extract(shortcode_atts(array(
	    'apikey' => 'AIzaSyDldMUM_iPuLrsfqF2JBdmp0CB1dj8_LFo',
	    'channel' => 'UCc8FiMyAQvrcpmInH1pMopA',
	    'n' => 0, /* Number format 1 or 0 */
	    'cache' => 3600 * 24 * 3
	  ), $atts));

	 $sharestransient = 'ytc_' . md5($apikey.$channel.$n.$cache);
	 $cachedresult =  get_transient($sharestransient);

	 if ($cachedresult !== false ) {
	  return $cachedresult;

	  } else {

	   $json_string = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $channel . '&key=' . $apikey);
	   $json = json_decode($json_string, true);

	   /* Viewcount */
	   $videocount = $json['items']['0']['statistics']['videoCount'];
	   if ($n) $videocount = number_format($videocount);

	  set_transient($sharestransient, $videocount, $cache);
	  return $videocount;
	 }
	}
	add_shortcode('youtube_video_count', 'sb_youtube_videocount');	

	//featured video shortcode
	function sb_featured_video_link( $atts ) {
		$video_link = the_field('featured_webm_video_link');
		return $video_link;
	}
	//add_shortcode( 'featured-video', 'sb_featured_video_link' );

	//Allow shortcodes in Contact Form 7 
	function shortcodes_in_cf7( $form ) {
		$form = do_shortcode( $form );
		return $form;
	}
	//add_filter( 'wpcf7_form_elements', 'shortcodes_in_cf7' );
/*--write your codes above this end tag--*/ ?>