<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!-- CONTENT -->
<div class="rh-container"> 
    <div class="rh-content-wrap clearfix">   
	    <!-- Main Side -->
        <div class="main-side single<?php if(get_post_meta($post->ID, 'post_size', true) == 'full_post' || rehub_option('disable_post_sidebar')) : ?> full_width<?php endif; ?> clearfix"> 
            <div class="rh-post-wrapper">           
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php $postclasses = array('post-inner', 'post');?>
                    <article <?php post_class($postclasses); ?> id="post-<?php the_ID(); ?>">
                        <div class="rh_post_layout_compare_autocontent flowhidden mb30">
                            <?php 
                                $crumb = '';
                                if( function_exists( 'yoast_breadcrumb' ) ) {
                                    $crumb = yoast_breadcrumb('<div class="breadcrumb">','</div>', false);
                                }
                                if( ! is_string( $crumb ) || $crumb === '' ) {
                                    if(rehub_option('rehub_disable_breadcrumbs') == '1' || vp_metabox('rehub_post_side.disable_parts') == '1') {echo '';}
                                    elseif (function_exists('dimox_breadcrumbs')) {
                                        dimox_breadcrumbs(); 
                                    }
                                }
                                echo ''.$crumb;  
                            ?>                         
                            <div class="title_single_area">
                            <h1 class="<?php if(rehub_option('hotmeter_disable') !='1') :?><?php echo getHotIconclass($post->ID); ?><?php endif ;?>"><?php the_title(); ?></h1>
                            </div> 
                            <?php if(rehub_option('hotmeter_disable') !='1' && function_exists('RHgetHotLike')) :?><?php echo RHgetHotLike($post->ID); ?><?php endif ;?>                                                 
                            <div class="wpsm-one-third wpsm-column-first compare-full-images">
                                <figure><?php echo re_badge_create('tablelabel'); ?>      
                                        <?php WPSM_image_resizer::show_static_resized_image(array('lazy'=>true, 'thumb'=> true, 'crop'=> false, 'width'=> 500, 'no_thumb_url' => get_template_directory_uri() . '/images/default/noimage_500_500.png'));?>
                                </figure> 
                                <?php echo rh_get_post_thumbnails(array('video'=>1, 'columns'=>4, 'height'=>50));?>                                         
                            </div>
                            <div class="wpsm-two-third wpsm-column-last">
                                <div class="flowhidden">
                                    <span class="floatleft meta post-meta">
                                        <?php rh_post_header_meta('full', false, true, true, true);?>
                                    </span>
                                </div> 
                                <div class="mb25 mt15 rh-line"></div>
                                <div class="rh_post_layout_rev_price_holder position-relative">
                                    <div class="rh_price_holder_add_links">
                                        <?php if (vp_metabox('rehub_post.rehub_framework_post_type') == 'review' && rehub_option('type_user_review') == 'full_review' && comments_open()) :?>
                                            <a href="#respond" class="rehub_scroll add_user_review_link"><?php esc_html_e("Add your review", "rehub-theme"); ?> 
                                            </a>
                                        <?php endif;?>
                                    </div>                                
                                    <?php $overall_review = rehub_get_overall_score();?>
                                    <?php if($overall_review):?>
                                        <div class="review-top floatleft">
                                        <div class="overall-score">
                                            <span class="overall r_score_4"><?php echo ''.$overall_review;?></span>
                                            <span class="overall-text"><?php esc_html_e('Total Score', 'rehub-theme'); ?></span>
                                        </div> 
                                        </div>                     
                                    <?php endif;?>

                                    <?php  
                                        $offer_post_url = get_post_meta($post->ID, 'rehub_offer_product_url', true );
                                        $offer_url = apply_filters('rh_post_offer_url_filter', $offer_post_url );
                                        $offer_price = get_post_meta($post->ID, 'rehub_offer_product_price', true );
                                        $offer_price_clean = rehub_price_clean($offer_price);
                                        $offer_btn_text = get_post_meta($post->ID, 'rehub_offer_btn_text', true );
                                        $offer_price_old = get_post_meta($post->ID, 'rehub_offer_product_price_old', true );
                                        $offer_coupon = get_post_meta( $post->ID, 'rehub_offer_product_coupon', true );
                                        $offer_coupon_date = get_post_meta( $post->ID, 'rehub_offer_coupon_date', true );
                                        $offer_coupon_mask = get_post_meta( $post->ID, 'rehub_offer_coupon_mask', true );
                                        
                                    ?>
                                    <?php $coupon_style = $expired = ''; if(!empty($offer_coupon_date)) : ?>
                                    <?php
                                        $timestamp1 = strtotime($offer_coupon_date) + 86399;
                                        $seconds = $timestamp1 - (int)current_time('timestamp',0);
                                        $days = floor($seconds / 86400);
                                        $seconds %= 86400;
                                        if ($days > 0) {
                                            $coupon_text = $days.' '.__('days left', 'rehub-theme');
                                            $coupon_style = '';
                                            $expired = 'no';
                                        }
                                        elseif ($days == 0){
                                            $coupon_text = esc_html__('Last day', 'rehub-theme');
                                            $coupon_style = '';
                                            $expired = 'no';
                                        }
                                        else {
                                            $coupon_text = esc_html__('Expired', 'rehub-theme');
                                            $coupon_style = ' expired_coupon';
                                            $expired = '1';
                                        }
                                    ?>
                                    <?php endif ;?> 
                                    <?php 
                                    do_action('post_change_expired', $expired); //Here we update our expired
                                    $coupon_mask_enabled = (!empty($offer_coupon) && ($offer_coupon_mask =='1' || $offer_coupon_mask =='on') && $expired!='1') ? '1' : '';
                                    ?>
                                    <?php $outsidelinkpart = ($coupon_mask_enabled=='1') ? 'data-codeid="'.$post->ID.'" data-dest="'.$offer_url.'" data-clipboard-text="'.$offer_coupon.'" class="masked_coupon"' : '';
                                    ?> 
                                    <?php if ($offer_url):?>
                                        <div class="compare-button-holder">
                                            <div>
                                                <p class="price">
                                                    <ins><?php echo ''.$offer_price;?></ins>
                                                    <del><?php echo ''.$offer_price_old;?></del> 
                                                </p>
                                            </div>
                                            <?php $itemsync = ''; if (defined('\ContentEgg\PLUGIN_PATH')) :?>
                                                <?php $unique_id =  get_post_meta($post->ID, '_rehub_product_unique_id', true);?>
                                                <?php $module_id = get_post_meta($post->ID, '_rehub_module_ce_id', true);?>
                                                <?php if($unique_id && $module_id):?>
                                                    <?php $itemsync = \ContentEgg\application\components\ContentManager::getProductbyUniqueId($unique_id, $module_id, $post->ID);?>
                                                <?php endif;?>
                                            <?php endif;?>                                    
                                            <?php if (!empty($itemsync)):?>
                                                <?php echo rh_best_syncpost_deal($itemsync);?>                                  
                                            <?php else :?>                            
                                                <div class="brand_logo_small"> 
                                                    <?php WPSM_Postfilters::re_show_brand_tax('logo'); //show brand logo?>
                                                </div>
                                            <?php endif;?>
                                            <?php $buy_best_text = (rehub_option('buy_best_text') !='') ? esc_html(rehub_option('buy_best_text')) : esc_html__('Buy for best price', 'rehub-theme'); ?>                                        
                                            <a href="<?php echo esc_url($offer_url);?>" class="re_track_btn wpsm-button rehub_main_btn btn_offer_block" target="_blank" rel="nofollow sponsored"><?php echo ''.$buy_best_text;?></a> 
                                        </div>  
                                        <div class="rh-line mt20 mb25"></div> 
                                        <!--Added-->
                                        <?php wp_enqueue_script('customfloatpanel'); ?> 
                                        <div id="contents-section-woo-area"></div>
                                        <div class="flowhidden rh-float-panel" id="float-panel-woo-area">
                                            <div class="rh-container rh-flex-center-align pt10 pb10">
                                                <div class="float-panel-woo-image hideonsmobile">
                                                    <?php WPSM_image_resizer::show_static_resized_image(array('lazy'=>true, 'thumb'=> true, 'width'=> 50, 'height'=> 50));?>
                                                </div>
                                                <div class="wpsm_pretty_colored rh-line-left pl15 ml15 hideonsmobile">
                                                    <div class="hideontablet mb5 font110 fontbold">
                                                            <?php the_title();?>
                                                    </div> 
                                                    <div class="float-panel-price">
                                                        <div class="fontbold font110 rehub-btn-font rehub-main-color">
                                                            <?php echo esc_html($offer_price) ?>
                                                            <?php if($offer_price_old !='') :?>
                                                            <span class="retail-old greycolor rh_opacity_5 font90">
                                                                <strike><span class="value"><?php echo esc_html($offer_price_old) ; ?></span></strike>
                                                                </span>
                                                                <?php endif;?>                                                                    
                                                        </div>                                                           
                                                    </div>            
                                                </div>
                                                <div class="float-panel-woo-btn rh-flex-columns rh-flex-right-align showonsmobile">
                                                    <div class="float-panel-woo-button rh-flex-center-align rh-flex-right-align showonsmobile">                                                    
                                                        <div class="priced_block mb5 showonsmobile clearfix">
                                                        <?php if ($coupon_mask_enabled =='1') :?>
                                                            <?php wp_enqueue_script('zeroclipboard'); ?>
                                                            <a class="coupon_btn showonsmobile re_track_btn btn_offer_block rehub_offer_coupon masked_coupon <?php if(!empty($offer_coupon_date)) {echo ''.$coupon_style ;} ?>" <?php echo ''.$outsidelinkpart;?>>
                                                                <?php if($offer_btn_text !='') :?>
                                                                    <?php echo esc_html ($offer_btn_text) ; ?>
                                                                <?php elseif(rehub_option('rehub_mask_text') !='') :?>
                                                                    <?php echo rehub_option('rehub_mask_text') ; ?>
                                                                <?php else :?>
                                                                    <?php esc_html_e('Reveal coupon', 'rehub-theme') ?>
                                                                <?php endif ;?>                 
                                                            </a>
                                                        <?php endif;?>                                                             
                                                            <a class="re_track_btn showonsmobile btn_offer_block" href="<?php echo esc_url ($offer_url) ?>" target="_blank" rel="nofollow sponsored" <?php echo ''.$outsidelinkpart;?>>
                                                                <?php if($offer_btn_text !='') :?>
                                                                    <?php echo esc_attr($offer_btn_text) ; ?>
                                                                <?php elseif(rehub_option('rehub_btn_text') !='') :?>
                                                                    <?php echo rehub_option('rehub_btn_text') ; ?>
                                                                <?php else :?>
                                                                    <?php esc_html_e('Buy this item', 'rehub-theme') ?>
                                                                <?php endif ;?>
                                                            </a> 
                                                        </div>
                                                    </div>                                        
                                                </div>                                    
                                            </div>                           
                                        </div>  
                                        <!--./Added-->                     
                                    <?php endif;?>                
                                </div>                                               
                                <?php $prosvalues = vp_metabox('rehub_post.review_post.0.review_post_pros_text');?>
                                <?php if(!empty($prosvalues)):?>
                                    <ul class="pros-list rh-flex-eq-height">        
                                        <?php $prosvalues = explode(PHP_EOL, $prosvalues);?>
                                        <?php foreach ($prosvalues as $prosvalue) {
                                            echo '<li>'.$prosvalue.'</li>';
                                        }?>
                                    </ul> 
                                    <div class="clearfix"></div>                   
                                <?php else:?>
                                    <?php $amazon_key = get_post_meta($post->ID, '_cegg_data_Amazon', true);?>
                                    <?php if(!empty($amazon_key)) :?>
                                        <?php $amazon_key = reset($amazon_key);?>
                                        <?php  $features = (!empty($amazon_key['extra']['itemAttributes']['Feature'])) ? $amazon_key['extra']['itemAttributes']['Feature'] : ''?>                        
                                        <?php if (!empty ($features)) :?>
                                            <ul class="pros-list rh-flex-eq-height">
                                                <?php $length = $maxlength = 0;?>
                                                <?php foreach ($features as $k => $feature): ?>
                                                    <?php if(is_array($feature)){continue;}?>
                                                    <?php $length = strlen($feature); $maxlength += $length; ?> 
                                                    <li><?php echo esc_attr($feature); ?></li>
                                                    <?php if($k >= 3 || $maxlength > 150) break; ?>                             
                                                <?php endforeach; ?>
                                            </ul>                                                            
                                        <?php endif ;?>                     
                                    <?php endif;?>
                                    <div class="clearfix"></div> 
                                <?php endif;?>
                                 
                                <?php if(rehub_option('rehub_disable_share_top') =='1' || vp_metabox('rehub_post_side.disable_parts') == '1')  : ?>
                                    <?php 
                                        $wishlistadd = esc_html__('Save', 'rehub-theme');
                                        $wishlistadded = esc_html__('Saved', 'rehub-theme');
                                        $wishlistremoved = esc_html__('Removed', 'rehub-theme');
                                    ?>      
                                    <div class="favour_in_row clearbox favour_btn_red">
                                        <?php echo RH_get_wishlist($post->ID, $wishlistadd, $wishlistadded, $wishlistremoved);?>
                                    </div>                                 
                                <?php else :?>
                                    <div class="top_share notextshare">
                                        <?php include(rh_locate_template('inc/parts/post_share.php')); ?>
                                    </div>
                                    <div class="clearfix"></div> 
                                <?php endif; ?>                                                                                                
                            </div> 
                        </div>

                        <div class="rh-line mb25"></div>

                        <?php $no_featured_image_layout = 1;?>
                        <?php include(rh_locate_template('inc/parts/top_image.php')); ?>

                        <?php if(rehub_option('rehub_single_before_post') && vp_metabox('rehub_post_side.show_banner_ads') != '1') : ?><div class="mediad mediad_before_content"><?php echo do_shortcode(rehub_option('rehub_single_before_post')); ?></div><?php endif; ?>                                        

                        <?php the_content(); ?>                               

                    </article>
                    <div class="clearfix"></div>
                    <?php include(rh_locate_template('inc/post_layout/single-common-footer.php')); ?>                    
                <?php endwhile; endif; ?>
                <?php comments_template(); ?>
            </div>
		</div>	
        <!-- /Main Side -->  
        <!-- Sidebar -->
        <?php if(get_post_meta($post->ID, 'post_size', true) == 'full_post' || rehub_option('disable_post_sidebar')) : ?><?php else : ?><?php get_sidebar(); ?><?php endif; ?>
        <!-- /Sidebar -->
    </div>
</div>
<!-- /CONTENT -->     