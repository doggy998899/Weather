<?php

function weather_init() {
	ossn_register_page('weather', 'weather_pages');
	  if (ossn_isLoggedin()) {       
		$icon = ossn_site_url('components/weather/image/weather.png');
    	ossn_register_sections_menu('newsfeed', array(
        	'text' => ossn_print('weather'),
        	'url' => ossn_site_url('weather'),
        	 'icon' => $icon,
		 'section' => 'links'
	    	));		
    }
}


function weather_pages($pages) {

 if (!ossn_isLoggedin()) {
            ossn_error_page();
   }
$title = ossn_print('weather');
   $contents['content'] = ossn_plugin_view('weather/weather');
   $content = ossn_set_page_layout('contents', $contents);
   echo ossn_view_page($title, $content);
}

ossn_register_callback('ossn', 'init', 'weather_init');
