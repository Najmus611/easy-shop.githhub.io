<?php

defined( 'ABSPATH' ) OR exit;

register_block_pattern_category(
    'rehubaff',
    array( 'label' => __( 'Rehub Profitable', 'rehub-framework' ) )
);

register_block_pattern_category(
    'rehubcontent',
    array( 'label' => __( 'Content Helpers', 'rehub-framework' ) )
);

register_block_pattern(
    'rehubtheme/versusblock',
    array(
        'title'       => __( 'Versus Block', 'rehub-framework' ),
        'categories' => array('rehubaff'),
        'content'     => '<!-- wp:rehub/versus-table {"heading":"Mavic 2 vs Mavic 1","subheading":"Epic battle","bg":"#f0f0f0","firstColumn":{"type":"image","isGrey":false,"content":"Value 1","image":"https://remag.wpsoul.net/wp-content/uploads/2018/12/95224951074647_small10.jpeg","imageId":4256},"secondColumn":{"type":"image","isGrey":false,"content":"Value 2","image":"https://remag.wpsoul.net/wp-content/uploads/2018/12/EVERGREEN-Best-drones-to-buy-in-2018-Top-picks-including-DJI-Parrot-and-Xiro.jpg","imageId":4266}} /-->
<!-- wp:rehub/versus-table {"heading":"HD Video","subheading":"4k and 8k","firstColumn":{"type":"tick","isGrey":false,"content":"Value 1","image":"","imageId":""},"secondColumn":{"type":"times","isGrey":false,"content":"Value 2","image":"","imageId":""}} /--><!-- wp:rehub/versus-table {"heading":"SmartFocus","subheading":"Focus and tracking","firstColumn":{"type":"tick","isGrey":false,"content":"Value 1","image":"","imageId":""},"secondColumn":{"type":"times","isGrey":false,"content":"Value 2","image":"","imageId":""}} /--><!-- wp:rehub/versus-table {"heading":"Quick Shots","subheading":"Functional blocks","firstColumn":{"type":"tick","isGrey":false,"content":"Value 1","image":"","imageId":""},"secondColumn":{"type":"tick","isGrey":false,"content":"Value 2","image":"","imageId":""}} /--><!-- wp:rehub/versus-table {"heading":"Flight Time","subheading":"Average flight time","firstColumn":{"type":"text","isGrey":false,"content":"40min","image":"","imageId":""},"secondColumn":{"type":"text","isGrey":true,"content":"20min","image":"","imageId":""}} /--><!-- wp:rehub/versus-table {"heading":"FPS","subheading":"Frame rate per second","firstColumn":{"type":"text","isGrey":false,"content":"240","image":"","imageId":""},"secondColumn":{"type":"text","isGrey":true,"content":"120","image":"","imageId":""}} /--><!-- wp:spacer {"height":33} --><div style="height:33px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->',
    )
);

register_block_pattern(
    'rehubtheme/ctablockheading',
    array(
        'title'       => __( 'Heading and CTA block', 'rehub-framework' ),
        'categories' => array('rehubaff'),
        'content'     => '<!-- wp:rehub/review-heading {"title":"My custom heading","subtitle":"My custom subheading"} /-->

<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://dummyimage.com/600x250/000/fff" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:rehub/promo-box {"title":"\u003cstrong\u003eCheck Prices of Product\u003c/strong\u003e","content":"and find best price for your needs","showHighlightBorder":true,"highlightColor":"#7c03fc","showButton":true,"buttonText":"Find Best Price Now","buttonLink":"#"} /-->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->',
    )
);

register_block_pattern(
    'rehubtheme/twocolumnslider',
    array(
        'title'       => __( 'Two column group with slider', 'rehub-framework' ),
        'categories' => array('rehubaff'),
        'description' => _x( 'Will show you two columns with full width button and slider', 'Block pattern description', 'rehub-framework' ),
        'content'     => '<!-- wp:group --><div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><!-- wp:rehub/titlebox {"title":"Title Box","text":"If you are looking for a new DJI drone, Mavic series drones offer an excellent combination of power and portability at a great price. Mavic Air 2 is the latest addition to the Mavic series lineup, which comes with improved performance compared to the original Mavic Air."} /--><!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"borderRadius":6,"backgroundColor":"vivid-purple","className":"full_width"} --><div class="wp-block-button full_width"><a class="wp-block-button__link has-vivid-purple-background-color has-background" href="https://dji.com" style="border-radius:6px" target="_blank" rel="noreferrer noopener">BUY THIS ITEM</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:rehub/slider {"slides":[{"image":{"id":4257,"url":"https://remag.wpsoul.net/wp-content/uploads/2018/12/mavic_air_2_main.jpg","width":700,"height":700,"alt":""}},{"image":{"id":4256,"url":"https://remag.wpsoul.net/wp-content/uploads/2018/12/95224951074647_small10.jpeg","width":480,"height":320,"alt":""}},{"image":{"id":4254,"url":"https://remag.wpsoul.net/wp-content/uploads/2018/12/71C2WbBW6L._AC_SL1500_.jpg","width":1500,"height":1078,"alt":""}}]} /--></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->',
    )
);

register_block_pattern(
    'rehubtheme/imagecitate',
    array(
        'title'       => __( 'Quote with image', 'rehub-framework' ),
        'categories' => array('rehubcontent'),
        'content'     => '<!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"align":"center","width":164,"height":164,"sizeSlug":"large","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-large is-resized"><img src="https://s.w.org/images/core/5.5/don-quixote-03.jpg" alt="Pencil drawing of Don Quixote" width="164" height="164"/></figure></div>
<!-- /wp:image -->

<!-- wp:quote {"align":"center","className":"is-style-large"} -->
<blockquote class="wp-block-quote has-text-align-center is-style-large"><p>"Do you see over yonder, friend Sancho, thirty or forty hulking giants? I intend to do battle with them and slay them."</p><cite>— Don Quixote</cite></blockquote>
<!-- /wp:quote -->

<!-- wp:separator {"className":"is-style-dots"} -->
<hr class="wp-block-separator is-style-dots"/>
<!-- /wp:separator --></div></div>
<!-- /wp:group -->',
    )
);

register_block_pattern(
    'rehubtheme/tablecontent',
    array(
        'title'       => __( 'Table of Content Shortcode', 'rehub-framework' ),
        'categories' => array('rehubcontent'),
        'content'     => '<!-- wp:rehub/titlebox {"title":"Table of content","text":"[contents h2 h3]"} /-->',
    )
);

register_block_pattern(
    'rehubtheme/toplistshortcode',
    array(
        'title'       => __( 'Top list shortcode', 'rehub-framework' ),
        'categories' => array('rehubaff'),
        'content'     => '<!-- wp:shortcode -->[wpsm_toplist]<!-- /wp:shortcode -->',
    )
);

register_block_pattern(
    'rehubtheme/stickycontentshortcode',
    array(
        'title'       => __( 'Sticky panel Contents shortcode', 'rehub-framework' ),
        'categories' => array('rehubcontent'),
        'content'     => '<!-- wp:shortcode -->[wpsm_stickypanel][contents h2][/wpsm_stickypanel]<!-- /wp:shortcode -->',
    )
);