<?php

function add_submenu() {
		add_submenu_page( 'themes.php', 'My Super Awesome Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'add_submenu' );


function settings_init() {
	register_setting( 'theme_options', 'options_settings' );

	add_settings_section(
		'options_page_section',
		'Your section description',
		'options_page_section_callback',
		'theme_options'
	);

	function options_page_section_callback() {
		echo 'A description and detail about the section.';
	}

	add_settings_field(
		'radio_field',
		'Options for the Background colour of the Header',
		'radio_field_render',
		'theme_options',
		'options_page_section'
	);

	add_settings_field(
		'radio2_field',
		'Options for Paragraph Font',
		'radio2_field_render',
		'theme_options',
		'options_page_section'
	);

	add_settings_field(
		'select_field',
		'Options for the Paragraph Font Size',
		'select_field_render',
		'theme_options',
		'options_page_section'
	);

	function radio_field_render() {
		$options = get_option( 'options_settings' );
		?>
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 1 ); ?> value="#83A7BC" /> <label>Defaut Colour</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 2 ); ?> value="#00CDCD" /> <label>Tiffany Blue</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 3 ); ?> value="#B7B5E7" /> <label>Grape</label><br />
		<input type="radio" name="options_settings[radio_field]" <?php if (isset($options['radio_field'])) checked( $options['radio_field'], 4 ); ?> value="#E99CCE" /> <label>Kate Pink</label>
		<?php
	}
	function radio2_field_render() {
		$options = get_option( 'options_settings' );
		?>
		<input type="radio" name="options_settings[radio2_field]" <?php if (isset($options['radio2_field'])) checked( $options['radio2_field'], 1 ); ?> value="sans-serif;" /> <label>Default Font</label><br />
		<input type="radio" name="options_settings[radio2_field]" <?php if (isset($options['radio2_field'])) checked( $options['radio2_field'], 2 ); ?> value="'Raleway', sans-serif;" /> <label>Raleway Font</label><br />
		<input type="radio" name="options_settings[radio2_field]" <?php if (isset($options['radio2_field'])) checked( $options['radio2_field'], 3 ); ?> value="'Londrina Outline', cursive;" /> <label>Londrina Outline Font</label><br />
		<input type="radio" name="options_settings[radio2_field]" <?php if (isset($options['radio2_field'])) checked( $options['radio2_field'], 4 ); ?> value="'Amatic SC', cursive;" /> <label>Amatic Font</label>
		<?php
	}

	function select_field_render() {
		$options = get_option( 'options_settings' );
		?>
		<select name="options_settings[select_field]">
			<option value="1em" <?php if (isset($options['select_field'])) selected( $options['select_field'], 1 ); ?>>Default Size Font</option>
			<option value="3em" <?php if (isset($options['select_field'])) selected( $options['select_field'], 1 ); ?>>Large Size Font</option>
			<option value="2em" <?php if (isset($options['select_field'])) selected( $options['select_field'], 2 ); ?>>Medium Size Font</option>
			<option value="0.5em" <?php if (isset($options['select_field'])) selected( $options['select_field'], 3 ); ?>>Small Size Font</option>
		</select>
	<?php
	}

	function my_theme_options_page(){
		?>
		<form action="options.php" method="post">
			<h2>Options Page For Portfolio (Assignment 1)</h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'settings_init' );
