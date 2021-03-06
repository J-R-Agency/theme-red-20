<?php
/**
 * Template Name: News Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>
<section class="header-wave"></section>
<section class="top-section bg-light-grey"></section>
<?php include(get_template_directory() . '/global-templates/template-parts/latest-news.tpl'); ?>
<?php include(get_template_directory() . '/global-templates/template-parts/videos.tpl'); ?>
<section class="bottom-section"></section>
<?php get_footer(); ?>
