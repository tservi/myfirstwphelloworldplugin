<?php
/*
Plugin Name: myfirstwphelloworldplugin
Version: 0.0.1
Plugin URI: https://code.google.com/p/myfirstwphelloworldplugin/
Description: Adds a "Hello world" text.
Author: Jean Tinguely Awais
Author URI: http://www.t-servi.com
*/

/*
Change Log

0.0.1
  * First public release.
*/ 


/* what the enduser will see is here */

/* the trigger to put in your pages to see the code if you have to process data	*/
function hello_world($data){
	global $post;
	$current_options = get_option('helloworld_options');
	$text_style = $current_options['text_style'];
	$text_color = $current_options['text_color'];
	echo "<div id=''><font color='$text_color' style='font-weight:$text_style;'>Hello world!</font></div>";
	return $data;
}

function activate_hello_world(){
	global $post;
	add_filter('the_content', 'hello_world', 10);
	add_filter('the_excerpt', 'hello_world', 10);
}

activate_hello_world();

/* the trigger to put in your pages to see the code 				*/
function helloworld(){
	global $post;
	$current_options = get_option('helloworld_options');
	$text_style = $current_options['text_style'];
	$text_color = $current_options['text_color'];
	echo "<div id=''><font color='$text_color' style='font-weight:$text_style;'>Hello world!</font></div>";

}



/* admininstration of the plugin's options 				*/

/* this is the option page you will see in the administration panel 	*/
function helloworld_options_page() { 
	$current_options = get_option('helloworld_options');
	$textColor = $current_options["text_color"];
	$textStyle = $current_options["text_style"];
	if ($_POST['action']){ ?>
		<div id="message" class="updated fade"><p><strong>Options saved.</strong></p></div>
	<?php } ?>
	<div class="wrap" id="fp-options">
		<h2>Hello world plugin Options</h2>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>">
			<fieldset>
				<legend>Options:</legend>
				<input type="hidden" name="action" value="save_helloworld_options" />
				<table width="100%" cellspacing="2" cellpadding="5" class="editform">
					<tr>
						<th valign="top" scope="row"><label for="link_type">Text Color:</label></th>
						<td><select name="text_color">
						<option value ="red"<?php if ($textColor == "red") { print " selected"; } ?>>red</option>
						<option value ="green"<?php if ($textColor == "green") { print " selected"; } ?>>green</option>
						<option value ="blue"<?php if ($textColor == "blue") { print " selected"; } ?>>blue</option>
						</select></td>
					</tr>
					<tr>
						<th valign="top" scope="row"><label for="insertion_type">Text Style:</label></th>
						<td><select name="text_style">
						<option value ="bold"<?php if ($textStyle == "bold") { print " selected"; } ?>>bold</option>
						<option value ="normal"<?php if ($textStyle == "normal") { print " selected"; } ?>>normal</option>
						</select></td>
					</tr>
				</table>
			</fieldset>
			<p class="submit">
				<input type="submit" name="Submit" value="Update Options &raquo;" />
			</p>
		</form>
	</div>
<?php 
}

/* linking the page to the options page 				*/
function helloworld_add_options_page() {
	// Add a new menu under Options:
	add_options_page('Hello World', 'Hello world', 10, __FILE__, 'helloworld_options_page');
}

/* saving the options 							*/
function helloworld_save_options() {
	// create array
	$helloworld_options["text_color"] = $_POST["text_color"];
	$helloworld_options["text_style"] = $_POST["text_style"];
	
	update_option('helloworld_options', $helloworld_options);
	$options_saved = true;
}

/* refreshing the admin pane 						*/
add_action('admin_menu', 'helloworld_add_options_page');

/* initializing the options 						*/
if (!get_option('helloworld_options')){
	// create default options
	$helloworld_options["text_color"] = 'red';
	$helloworld_options["text_style"] = 'bold';
	
	update_option('helloworld_options', $helloworld_options);
}

/* trigger to the save function 					*/
if ($_POST['action'] == 'save_helloworld_options'){
	helloworld_save_options();
}

/* linking the css on the header of the wordpress website in two step 	*/
/* this works only if you leave the wp_head() call in your template 	*/

/* first : defining a function 						*/
function myfirsthelloworldplugincss() {
	?>
	<link rel="stylesheet" href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/myfirstwphelloworldplugin/myfirstwphelloworldplugin.css" type="text/css" media="screen" />
	<?php
}

/* second : adding the funtion to the call 				*/
add_action('wp_head', 'myfirsthelloworldplugincss');


?>
