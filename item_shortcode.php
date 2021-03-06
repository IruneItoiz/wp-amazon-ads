<?php
//Carousel shortcode
class itemShortcode {
    public static function do_shortcode( $atts ) {
        $atts = shortcode_atts( array(
            'item_id' => '',
        ), $atts, 'ns_item' );


        //Try to locate the carousel with that ID
        $item = itemShortcode::getItem($atts['item_id']);



        if (!$item) return 'Item not found';

        else {


            $item_template = plugin_dir_path(  __FILE__  ).'/templates/single_item.php';
            if(has_filter('ns_single_template_item')) {
                $item_template = apply_filters('ns_single_template_item', $item_template);
            }

            ob_start();
            include $item_template;
            $result = ob_get_clean();
            return $result;

        }

        return  print_r($carousel, true);
    }

    private static function getItem($id)
    {
        $post_id = get_the_ID();

        if  ( have_rows('amazon_single_items', $post_id) ) {
            $rows = get_field('amazon_single_items', $post_id)  ;
            // loop through the rows of data
            foreach  ( $rows as $item ) {

                // display a sub field value
                if ($item['amazon_item_id'] == $id)
                {
                    return $item;
                }
            }
        }

        return false;
    }
}

add_shortcode( 'ns_item', array( 'itemShortcode', 'do_shortcode' ) );
