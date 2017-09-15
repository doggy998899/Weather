<?php
function weather_init() {
	ossn_register_page('weather', 'weather_pages');
	  if (ossn_isLoggedin()) {       
	  
		$icon = ossn_site_url('components/weather/image/weather.png'); /* see the folders for the correct hierarchy */
		
		/* 	this picks up components/weather/plugins/default/css/weather.php 
			where css/weather is added the .php to it
		*/
		ossn_extend_view('css/ossn.default', 'css/weather'); 

    	ossn_register_sections_menu('newsfeed', array(
			'name' => 'weather', /* this adds the name to the class thus .menu-section-item-weather */
        	'text' => ossn_print('com:ossn:site:weather'), /* this is taken from the components/weather/locale/ossn.en.php */
        	'url' => ossn_site_url('weather'), /* this results to the URL to http://yoursite.com/weather */
			/* 	setting 'icon' to true will remove the <i class="fa"></i> with the font-awesome icon 
				setting it with 'fa-sun-o' will add the <i class="fa fa-sun-o"></i>
			*/
			'icon' => true, 
			'section' => 'links'
	    ));		
		
    }
}


function weather_pages($pages) {

 if (!ossn_isLoggedin()) {
            ossn_error_page();
   }
	$title = ossn_print('weather');

	/* 	this picks up components/weather/plugins/default/weather/weather.php 
		where weather/weather is added the .php to it
	*/
	$contents['content'] = ossn_plugin_view('weather/weather');
	
	$content = ossn_set_page_layout('contents', $contents);
	echo ossn_view_page($title, $content);
}

ossn_register_callback('ossn', 'init', 'weather_init');
