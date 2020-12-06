<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php 
global $post;
$branded_banner_image = $cat_id = '';
if( is_category() || is_singular('post') ){
	if( is_category() ) {
        $cat_id = get_query_var('cat') ;
    }
	elseif( is_singular('post')){ 
		$categories = get_the_category( $post->ID );
        if (!empty($categories)){
            $cat_id = $categories[0]->term_id ;     
        }
    }
}
?>
<?php if (!empty($cat_id) ) :?>
    <?php 
        $cat_data = get_option("category_$cat_id");
        $branded_banner_image = (!empty($cat_data['cat_image_url'])) ? $cat_data['cat_image_url'] : '';
    ?>
<?php endif;?>
<?php 
    if(!$branded_banner_image && rehub_option('rehub_branded_banner_image')){
        $branded_banner_image = rehub_option('rehub_branded_banner_image');
    }
?>
<?php if ($branded_banner_image) :?>
    <div class="text-center">
        <div id="branded_img">
            <?php if (stripos($branded_banner_image, 'http') === 0) : ?>
        	   <img alt="image" src="<?php echo esc_url($branded_banner_image); ?>">
            <?php else :?>
        	    <?php echo do_shortcode ($branded_banner_image);?>
            <?php endif;?>
        </div>  
    </div>
<?php endif; ?>