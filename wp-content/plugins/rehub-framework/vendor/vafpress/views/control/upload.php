<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php if(!$is_compact) echo VP_View::instance()->load('control/template_control_head', $head_info); ?>

<input class="vp-input" type="text" readonly id="<?php echo ''.$name; ?>" name="<?php echo ''.$name; ?>" value="<?php echo ''.$value; ?>" />
<div class="buttons">
	<input class="vp-js-upload vp-button button" type="button" value="<?php esc_html_e('Choose File', 'rehub-framework'); ?>" />
	<input class="vp-js-remove-upload vp-button button" type="button" value="x" />
</div>
<div class="image">
	<img src="<?php echo ''.$preview; ?>" alt="image" />
</div>

<?php if(!$is_compact) echo VP_View::instance()->load('control/template_control_foot', $head_info); ?>