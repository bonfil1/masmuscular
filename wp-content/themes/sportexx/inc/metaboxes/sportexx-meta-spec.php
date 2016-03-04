<?php

$sportexx_page_metabox = new WPAlchemy_MetaBox(
	array(
		'id' 		=> '_sportexx_page_metabox',
		'title' 	=> 'Sportexx Page Attributes',
		'types' 	=> array( 'page' ),
		'context' 	=> 'normal', // same as above, defaults to "normal"
		'priority' 	=> 'high', // same as above, defaults to "high"
		'template' 	=> get_template_directory() . '/inc/metaboxes/sportexx-page-meta.php'
	)
);