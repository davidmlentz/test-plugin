<?php
   /*
   Plugin Name: Test Plugin
   */
 
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 
 function test_plugin_execute( $content ) {
     $my_string = "TESTINGzzz";
     return $content . '<br />' . $my_string;
 }
 
 add_action( 'the_content', 'test_plugin_execute' );
