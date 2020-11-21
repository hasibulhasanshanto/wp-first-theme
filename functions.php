<?php 

/**
 * Functions.php
 */

## Action hooks
function imaxamauze_bootstrapping(){
    load_theme_textdomain("imaxamauze");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}
add_action("after_setup_theme", "imaxamauze_bootstrapping");

## Action hooks
function imaxamauze_assets(){

    wp_enqueue_style("style", get_stylesheet_uri());
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}
add_action("wp_enqueue_scripts", "imaxamauze_assets");


// add shortcode in wordpress without parameter
function add_shortcode1(){
   $img = '<img src="https://cdn.britannica.com/s:800x450,c:crop/72/143172-138-5F42EB87/mountains-slopes-Old.jpg" alt="mountain">';
   return $img;
}
add_shortcode("love_bd", "add_shortcode1");


// add shortcode in wordpress with parameter
function add_shortcode2($param){
    $arr = shortcode_atts(array(
        width=> '200',
        height=>'200'
    ), $param);

    $img = '<img src="https://cdn.britannica.com/s:800x450,c:crop/72/143172-138-5F42EB87/mountains-slopes-Old.jpg" alt="mountain"> width="'.arr['width'].'" height="'.arr['height'].'"';
    return $img;
}

add_shortcode("love_mountain", "add_shortcode2");


## Action hooks


## Filter hooks
function filter_exerpt_show($words){
    return 10;
}
add_filter('excerpt_length', 'filter_exerpt_show');

## Filter hooks
function filter_exerpt_more_button($more){
    $more = '<a href="'.get_the_permalink().'">More</a>';
    return $more;
}
add_filter('excerpt_more', 'filter_exerpt_more_button');