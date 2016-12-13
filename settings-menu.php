<?php

add_action('admin_menu', 'ds_schema_menu');

function ds_schema_menu() {
    add_submenu_page(
        'options-general.php',
        'DS Schema',
        'DS Schema',
        'manage_options',
        'ds-schema-plugin-settings',
        'ds_schema_settings_page'
    );
} 

function ds_schema_settings() {
	register_setting( 'ds-schema-settings-group', 'logo' );
}

function ds_schema_settings_page() {
	add_action( 'admin_init', 'ds_schema_settings' );
?>

<div class="wrap">
<h2>Schema.org Details</h2>

<p>All of the Schema.org Microdata will automatically be picked up from your Blog Post.</p>
<p>However you will need to assign your own Website/Organization Logo below.</p>
<p>To verify that your Schema.org Microdata is working correctly, please visit <a href="https://search.google.com/structured-data/testing-tool" target="_blank">Google Structured Data Testing Tool</a> for verification.</p>

<form method="post" action="options.php">
    <?php settings_fields( 'ds-schema-settings-group' ); ?>
    <?php do_settings_sections( 'ds-schema-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Website Logo</th>
        <td><input type="text" name="logo" value="<?php echo esc_attr( get_option('logo') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>

<?php }
