<?php
/**
 * @package test_plugin
 * @version 1.0
 */
 
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 
 function test_plugin_execute( $content ) {
     $my_string = "TESTING!";
     return $content . '<br />' . $my_string;
 }
 
 add_action( 'the_content', 'test_plugin_execute' );
