<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<script data-cfasync="false">

// executes this when the DOM is ready
jQuery(document).ready(function() { 
	// handles the click event of the submit button
	jQuery('#submit').click(function(){
		// defines the options and their default values
		// again, this is not the most elegant way to do this
		// but well, this gets the job done nonetheless
        		var ImgUrl = jQuery('#ImgUrl').val();
				var ImgTitle = jQuery('#ImgTitle').val();
				var ImgContent = jQuery('#ImgContent').val();
					if( ! tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
					 var contentlight = jQuery("textarea.wp-editor-area").selection('get');
					}
					else {
			        	var contentlight = tinyMCE.activeEditor.selection.getContent();  
			        }				
				var shortcode = '[wpsm_lightbox';
				
				if(ImgUrl) {
					shortcode += ' full="'+ImgUrl+'"';
				}
				if(ImgTitle) {
					shortcode += ' title="'+ImgTitle+'"';
				}

				shortcode += ']'

				if ( ImgContent !== '' )
					shortcode += ImgContent;
				else if	( contentlight !== '' )
					shortcode += contentlight;
				else 
					shortcode += 'Sample Text';

				shortcode += '[/wpsm_lightbox]'
		
        window.send_to_editor(shortcode);
		
		// closes Thickbox
		tb_remove();
	});
}); 
</script>
<form action="/" method="get" id="form" name="form" accept-charset="utf-8">
	
	<p>
		<label for="ImgUrl"><?php esc_html_e('Full Image or Youtube Video URL : ', 'rehub-theme') ;?></label>
		<input id="ImgUrl" name="ImgUrl" type="text" value="http://" />

	</p>
	<p>
		<label for="ImgTitle"><?php esc_html_e('Title for link:', 'rehub-theme') ;?> </label>
		<input id="ImgTitle" name="ImgTitle" type="text" value="" />

	</p>
	<p>
		<label for="ImgContent"><?php esc_html_e('Content :', 'rehub-theme') ;?> </label>
		<textarea id="ImgContent" name="ImgContent" cols="10" ></textarea><br />
		<small><?php esc_html_e('Leave blank if you selected text in visual editor', 'rehub-theme') ;?></small>
	</p>
	 <p>
        <label>&nbsp;</label>
        <input type="button" id="submit" class="button" value="<?php esc_html_e('Insert', 'rehub-theme') ;?>" name="submit" />
    </p>
</form>