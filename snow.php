<?php
/*
Plugin Name: Improved Let It Snow!
Plugin URI: http://codemaster.fi/wordpress/plugins/let-it-snow/
Description: Snow on your Wordpress Blog based on the DHTML Snowstorm script by <cite><a href="http://www.schillmania.com/projects/snowstorm/" title="DHTML Snowstorm">Scott Schiller</a>.</cite> with improvements by S H Mohanjith
Version: 3.5
Author: S H Mohanjith (Code Master Oy)
Author URI: http://codemaster.fi/
*/

function improved_snow_options() {
	add_options_page(__('Improved Let It Snow! Settings', 'improved-let-it-snow'), __('Improved Let It Snow!', 'improved-let-it-snow'), 'manage_options', 'improved_snow_options', 'improved_snow_options_page');
}

function improved_snow_options_page() {
?>
<div class="wrap">
    
    <p><?php echo sprintf(__('Like Improved Let It Snow?, you should follow us on Twitter <a href="%s"><em>here</em></a>', 'improved-let-it-snow'), 'http://twitter.com/codemasteroy'); ?></p>
    <div class="icon32" id="icon-options-general"><br/></div><h2>Settings for Improved Let It Snow!</h2>
    
    <form method="post" action="options.php">
	    <?php
	        // New way of setting the fields, for WP 2.7 and newer
	        if(function_exists('settings_fields')){
	            settings_fields('snow-options');
	        } else {
	            wp_nonce_field('update-options');
	            ?>
	            <input type="hidden" name="action" value="update" />
	            <input type="hidden" name="page_options" value="sflakesMax,sflakesMaxActive,svMaxX,svMaxY,ssnowStick,sfollowMouse" />
	            <?php
	        }
	    ?>
	
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="animationInterval"><?php _e('Animation rate', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="animationInterval" id="animationInterval" value="<?php echo get_option('animationInterval'); ?>" size="5" />
					<span class="description"><?php _e('Lesser (e.g. 20) = fast + smooth, but high CPU use. More (e.g. 50) = more conservative, but slower. Default is 33.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="flakeBottom"><?php _e('Limit flakes at the bottom', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="flakeBottom" id="flakeBottom" value="<?php echo get_option('flakeBottom'); ?>" size="5" />
					<span class="description"><?php _e('Limits the "floor" (pixels) of the snow. If unspecified, snow will "stick" to the bottom of the browser window and persists through browser resize/scrolling.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="flakesMax"><?php _e('Maximum number of flakes', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="flakesMax" id="flakesMax" value="<?php echo get_option('flakesMax'); ?>" size="5" />
					<span class="description"><?php _e('Sets the maximum number of snowflakes that can exist on the screen at any given time.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="flakesMaxActive"><?php _e('Maximum number of active flakes', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="flakesMaxActive" id="flakesMaxActive" value="<?php echo get_option('flakesMaxActive'); ?>" size="5" />
					<span class="description"><?php _e('Sets the limit of "falling" snowflakes (ie. moving on the screen, thus considered to be active.)', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="followMouse"><?php _e('Follow mouse?', 'improved-let-it-snow'); ?></label></th>
				<td>
					<select name="followMouse" id="followMouse">
                		<option <?php if (get_option('followMouse') == 'true') echo 'selected="selected"'; ?> value="true"><?php _e('Yes', 'improved-let-it-snow'); ?></option>
                		<option <?php if (get_option('followMouse') == 'false') echo 'selected="selected"'; ?> value="false"><?php _e('No', 'improved-let-it-snow'); ?></option> 
                	</select>
                	<span class="description"><?php _e('Allows snow to move dynamically with the "wind", relative to the mouse\'s X (left/right) coordinates.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="freezeOnBlur"><?php _e('Freeze on blur?', 'improved-let-it-snow'); ?></label></th>
				<td>
					<select name="freezeOnBlur" id="freezeOnBlur">
                		<option <?php if (get_option('freezeOnBlur') == 'true') echo 'selected="selected"'; ?> value="true"><?php _e('Yes', 'improved-let-it-snow'); ?></option>
                		<option <?php if (get_option('freezeOnBlur') == 'false') echo 'selected="selected"'; ?> value="false"><?php _e('No', 'improved-let-it-snow'); ?></option> 
                	</select>
                	<span class="description"><?php _e('Stops the snow effect when the browser window goes out of focus, eg., user is in another tab. Saves CPU, nicer to user.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="snowColor"><?php _e('Snow color', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="snowColor" id="snowColor" value="<?php echo get_option('snowColor'); ?>" size="7" />
					<span class="description"><?php _e('Don\'t eat (or use?) yellow snow.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="snowCharacter"><?php _e('Snow character', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="snowCharacter" id="snowCharacter" value="<?php echo get_option('snowCharacter'); ?>" size="1" />
					<span class="description"><?php _e('&amp;bull; (&bull;) = bullet. &amp;middot; entity (&middot;) is not used as it\'s square on some systems etc. Changing this may result in cropping of the character and may require flakeWidth/flakeHeight changes, so be careful.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="snowStick"><?php _e('Sticky snow?', 'improved-let-it-snow'); ?></label></th>
				<td>
					<select name="snowStick" id="snowStick">
                		<option <?php if (get_option('snowStick') == 'true') echo 'selected="selected"'; ?> value="true"><?php _e('Yes', 'improved-let-it-snow'); ?></option>
                		<option <?php if (get_option('snowStick') == 'false') echo 'selected="selected"'; ?> value="false"><?php _e('No', 'improved-let-it-snow'); ?></option> 
                	</select>
                	<span class="description"><?php _e('Allows the snow to "stick" to the bottom of the window. When off, snow will never sit at the bottom.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="targetElement"><?php _e('Target element', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="targetElement" id="targetElement" value="<?php echo get_option('targetElement'); ?>" size="10" />
					<span class="description"><?php _e('Element which snow will be appended to (default: document body) - can be an element ID string eg. \'myDiv\', or a DOM node reference.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="useMeltEffect"><?php _e('Use melt effect?', 'improved-let-it-snow'); ?></label></th>
				<td>
					<select name="useMeltEffect" id="useMeltEffect">
                		<option <?php if (get_option('useMeltEffect') == 'true') echo 'selected="selected"'; ?> value="true"><?php _e('Yes', 'improved-let-it-snow'); ?></option>
                		<option <?php if (get_option('useMeltEffect') == 'false') echo 'selected="selected"'; ?> value="false"><?php _e('No', 'improved-let-it-snow'); ?></option> 
                	</select>
                	<span class="description"><?php _e('When recycling fallen snow (or rarely, when falling), have it "melt" and fade out if browser supports it.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="useTwinkleEffect"><?php _e('Use twinkle effect?', 'improved-let-it-snow'); ?></label></th>
				<td>
					<select name="useTwinkleEffect" id="useTwinkleEffect">
                		<option <?php if (get_option('useTwinkleEffect') == 'true') echo 'selected="selected"'; ?> value="true"><?php _e('Yes', 'improved-let-it-snow'); ?></option>
                		<option <?php if (get_option('useTwinkleEffect') == 'false') echo 'selected="selected"'; ?> value="false"><?php _e('No', 'improved-let-it-snow'); ?></option> 
                	</select>
                	<span class="description"><?php _e('Allow snow to randomly "flicker" in and out of view while falling.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="usePositionFixed"><?php _e('Use fixed position?', 'improved-let-it-snow'); ?></label></th>
				<td>
					<select name="usePositionFixed" id="usePositionFixed">
                		<option <?php if (get_option('usePositionFixed') == 'true') echo 'selected="selected"'; ?> value="true"><?php _e('Yes', 'improved-let-it-snow'); ?></option>
                		<option <?php if (get_option('usePositionFixed') == 'false') echo 'selected="selected"'; ?> value="false"><?php _e('No', 'improved-let-it-snow'); ?></option> 
                	</select>
                	<span class="description"><?php _e('Yes = snow not affected by window scroll. may increase CPU load, disabled by default - if enabled, used only where supported.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="vMaxX"><?php _e('Snowfall maximum speed (horizontal)', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="vMaxX" id="vMaxX" value="<?php echo get_option('vMaxX'); ?>" size="5" />
					<span class="description"><?php _e('Defines maximum X velocity for the storm; a random value in this range is selected for each snowflake.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="vMaxY"><?php _e('Snowfall maximum speed (vertical)', 'improved-let-it-snow'); ?></label></th>
				<td>
					<input type="text" name="vMaxY" id="vMaxY" value="<?php echo get_option('vMaxY'); ?>" size="5" />
					<span class="description"><?php _e('Defines maximum Y velocity for the storm; a random value in this range is selected for each snowflake.', 'improved-let-it-snow'); ?></span>
				</td>
			</tr>
		</table>
		<p class="submit">
            <input type="submit" name="Submit" value="<?php _e('Save Changes', 'improved-let-it-snow') ?>" class="button-primary" />
        </p>

    </form>
    
    <p><?php echo sprintf(__('Like Improved Let It Snow?, you should follow us on Twitter <a href="%s"><em>here</em></a>', 'improved-let-it-snow'), 'http://twitter.com/codemasteroy'); ?></p>

</div>
<?php
}

// On access of the admin page, register these variables (required for WP 2.7 & newer)
function improved_snow_init() {
	
	load_plugin_textdomain('improved-let-it-snow', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
    if (function_exists('register_setting')){
    	register_setting('snow-options', 'animationInterval');
    	register_setting('snow-options', 'flakeBottom');
    	register_setting('snow-options', 'flakesMax');
    	register_setting('snow-options', 'flakesMaxActive');
    	register_setting('snow-options', 'followMouse');
    	register_setting('snow-options', 'freezeOnBlur');
    	register_setting('snow-options', 'snowColor');
    	register_setting('snow-options', 'snowCharacter');
    	register_setting('snow-options', 'snowStick');
    	register_setting('snow-options', 'targetElement');
    	register_setting('snow-options', 'useMeltEffect');
    	register_setting('snow-options', 'useTwinkleEffect');
    	register_setting('snow-options', 'usePositionFixed');
    	register_setting('snow-options', 'vMaxX');
    	register_setting('snow-options', 'vMaxY');
    }
}

function improved_snow_wp_enqueue_scripts() {
	wp_register_script( "improved-let-it-snow", plugins_url('improved-let-it-snow/script/snowstorm-min.js'), array(), "3.5", true);
	
	wp_enqueue_script('improved-let-it-snow');     
}

// Only all the admin options if the user is an admin
if (is_admin()) {
    add_action('admin_menu', 'improved_snow_options');
    add_action('admin_init', 'improved_snow_init');
}

add_action('wp_enqueue_scripts', 'improved_snow_wp_enqueue_scripts');

//Set the default options when the plugin is activated
function improved_snow_activate() {
	add_option('animationInterval', 33);
    add_option('flakeBottom', 'null');
    add_option('flakesMax', 128);
    add_option('flakesMaxActive', 64);  
    add_option('followMouse', 1);
    add_option('freezeOnBlur', 1);  
    add_option('snowColor', '#fff');
    add_option('snowCharacter', '&bull;');
    add_option('snowStick', 0);
    add_option('targetElement', 'null');
    add_option('useMeltEffect', 1);
    add_option('useTwinkleEffect', 1);
    add_option('usePositionFixed', 0);
    add_option('vMaxX', 8);
    add_option('vMaxY', 5);
}

register_activation_hook( __FILE__, 'improved_snow_activate' );

function improved_let_it_snow() {
	// Path for snow images
	$snowPath = plugins_url('improved-let-it-snow/');
	
	$snowJS =	'<script type="text/javascript">
sitePath = "'.$snowPath.'";
snowStorm.animationInterval = '.get_option('animationInterval').';
snowStorm.flakeBottom = '.get_option('flakeBottom').';
snowStorm.flakesMax = '.get_option('flakesMax').';
snowStorm.flakesMaxActive = '.get_option('flakesMaxActive').';
snowStorm.followMouse = '.(get_option('followMouse') == 1?1:0).';
snowStorm.freezeOnBlur = '.(get_option('freezeOnBlur') == 1?1:0).';
snowStorm.snowColor = "'.(get_option('snowColor', '#fff') == 0?'#fff':get_option('snowColor', '#fff')).'";
snowStorm.snowCharacter = "'.get_option('snowCharacter').'";
snowStorm.snowStick = '.(get_option('snowStick') == 1?1:0).';
snowStorm.targetElement = '.get_option('targetElement').';
snowStorm.useMeltEffect = '.(get_option('useMeltEffect') == 1?1:0).';
snowStorm.useTwinkleEffect = '.(get_option('useTwinkleEffect') == 1?1:0).';
snowStorm.usePositionFixed = '.(get_option('usePositionFixed') == 1?1:0).';
snowStorm.vMaxX = '.(get_option('vMaxX', 8) == 0?8:get_option('vMaxX', 8)).';
snowStorm.vMaxY = '.(get_option('vMaxY', 5) == 0?5:get_option('vMaxY', 5)).';
</script>'."\n";
	
	print($snowJS);
}

add_action('wp_footer', 'improved_let_it_snow');
