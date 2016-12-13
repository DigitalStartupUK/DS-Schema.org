<?php
/**
 * Plugin Name: Digital Startup - Schema
 * Plugin URI: http://digitalstartup.co.uk
 * Description: This plugin will automatically insert http://schema.org/BlogPosting Microdata within your blog.
 * Version: 1.0.2
 * Author: Craig Nammontri
 * Author URI: http://digitalstartup.co.uk
 * License: GPL2
 */

add_action( 'wp_footer', 'ds_schema' );
function ds_schema() {
  if( is_single() ) {
  ?>
	<div itemscope itemType="http://schema.org/BlogPosting">
		<meta itemprop="inLanguage" content="en-GB"/>
		<meta itemprop="headline" content="<?php the_title() ?>">
		<meta itemprop="mainEntityOfPage" content="<?php the_permalink() ?>"/>
		<meta itemprop="datePublished" content="<?php the_date('Y-m-d'); ?>">
		<meta itemprop="dateModified" content="<?php the_modified_time('Y-m-d');?>">
		<meta itemprop="articleBody" content="<?php the_excerpt() ?>">
	  <div itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject"/>
		<meta itemprop="url" content="<?php the_post_thumbnail_url( 'medium' ); ?>">
		<meta itemprop="width" content="300">
		<meta itemprop="height" content="300">
	  </div>
	  <div itemprop="author" itemscope="" itemtype="http://schema.org/Person">
		<meta itemprop="name" content="<?php the_author(); ?>">
	  </div>
	  <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
		<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
		<meta itemprop="url" href="<?php bloginfo( 'wpurl' ); ?>">
		<meta itemprop="description" content="<?php bloginfo('description'); ?>">
		<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
		  <meta itemprop="image" content="https://digitalstartup.co.uk/wp-content/uploads/2016/05/digitalstartup-logo-2.png">
		  <meta itemprop="url" content="https://digitalstartup.co.uk/wp-content/uploads/2016/05/digitalstartup-logo-2.png">
		  <meta itemprop="width" content="208">
		  <meta itemprop="height" content="48">
		</span>
	</div>
    
  <?php
  }
}

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

function ds_schema_settings() {
	register_setting( 'ds-schema-settings-group', 'logo' );
}