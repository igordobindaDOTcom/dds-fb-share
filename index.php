<?php
/*
Plugin Name: Buton pentru facebook
Plugin URI: http://igordobinda.com
Description: Buton pentru facebook ca pe dozadesucces.ro
Version: 1.0
Author: Igor Dobinda
Author URI: http://igordobinda.com
License: GPL2
*/
function ddscss(){
    wp_register_style( 'dds-fb-share-css', plugins_url( 'dds-fb-share/dds.css' ) );
    wp_enqueue_style( 'dds-fb-share-css' );   
}
add_action('wp_head', 'ddscss');

function ddsshare_add_post_content($content) {
	if (is_single()) {
        if ( ! $content ) {
          $content = '';
        }
        $ddsurl = 'https://www.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink());
        $ddsimgfb = plugins_url().'/dds-fb-share/FB-f-white.png';
		$content .= '<div class="dds-h20px"></div><a class="ddsfbshare" href="'.$ddsurl.'" target="_blank" rel="nofollow"  onclick="window.open(\''.$ddsurl.'\',\'facebook-share-dialog\',\'width=626,height=436\');return false;"><img src="'.$ddsimgfb.'" alt="Distribuie pe facebook" width="15" height="15" /> Distribuie pe facebook</a><div class="dds-h20px"></div>';
	}
	return $content;
}
add_filter ('the_content', 'ddsshare_add_post_content');
?>