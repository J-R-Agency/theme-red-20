<?php
/**
 * Template Name: Our Values Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php include(get_template_directory() . '/global-templates/template-parts/hero-banner.tpl'); ?>

<?php include(get_template_directory() . '/global-templates/template-parts/banner-cta.tpl'); ?>
<?php get_footer(); ?>
