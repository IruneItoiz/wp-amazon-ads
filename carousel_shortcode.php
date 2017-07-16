<?php
//Carousel shortcode
class carouselShortcode {
    public static function do_shortcode( $atts ) {
        $atts = shortcode_atts( array(
            'carousel_id' => '',
        ), $atts, 'ns_carousel' );


        //Try to locate the carousel with that ID
        $carousel = carouselShortcode::getCarousel($atts['carousel_id']);



        if (!$carousel) return '<!--- Carousel ID not found -->';

        else {

            $wrapper_template = plugin_dir_path( __FILE__ ).'/templates/carousel.php';
            if(has_filter('ns_carousel_template')) {
                $wrapper_template = apply_filters('ns_carousel_template', $wrapper_template);
            }

            $item_template = plugin_dir_path(  __FILE__  ).'/templates/carousel_item.php';
            if(has_filter('ns_carousel_template_item')) {
                $item_template = apply_filters('ns_carousel_template', $item_template);
            }

            ob_start();
            include $wrapper_template;
            $result = ob_get_clean();
            return $result;

        }

        return  print_r($carousel, true);
    }

    private static function getCarousel($id)
    {
        $post_id = get_the_ID();

        $carousels = array();
        if  ( have_rows('amazon_carousels', $post_id) ) {

            // loop through the rows of data
            while ( have_rows('amazon_carousels', $post_id) ) {

                the_row();

                // display a sub field value
                $carousels[get_sub_field('carousel_id', $post_id)]['contents'] = get_sub_field('contents', $post_id);
                $carousels[get_sub_field('carousel_id', $post_id)]['title'] = get_sub_field('carousel_title', $post_id);
            }
        }

        $carousel = isset($carousels[$id]) ? $carousels[$id] : false ;
        return $carousel;
    }
}

add_shortcode( 'ns_carousel', array( 'carouselShortcode', 'do_shortcode' ) );
