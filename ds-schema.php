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
