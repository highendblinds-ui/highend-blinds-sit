<?php
/**
 * Template Name: Service Area — City
 */
get_header();
highend_render_service_city( get_post_field( 'post_name', get_queried_object_id() ) );
get_footer();
