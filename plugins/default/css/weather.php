li.menu-section-item-weather:before {
	/* this replaces the icon '>' or content: "\f105" */
    content: url(<?php echo ossn_site_url('components/weather/image/weather.png');?>) !important;
}

.weather-container {
    position: relative;
    padding-bottom: 75%;
    height: 0;
    overflow: hidden;
}

.weather-container iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}