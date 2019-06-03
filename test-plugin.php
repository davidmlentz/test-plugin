<?php
   /*
   Plugin Name: Test Plugin
   */
 
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 
 function test_plugin_execute( $content ) {
     $my_string = "TESTINGzzz1234";
     return $content . '<br />' . $my_string;
 }

dd_trace($this, "test_plugin_execute", function ( $content ) {
    // Start a new span
    $scope = GlobalTracer::get()->startActiveSpan('TestPlugin.test_plugin_execute');
    $span = $scope->getSpan();

    // Access object members via $this
    // $span->setTag(Tags\RESOURCE_NAME, $this->workToDo);

    try {
        // Execute the original method
        $result = $this->doWork( $content );
        // Set a tag based on the return value
        $span->setTag('test_plugin_execute.size', -1);
        return $result;
    } catch (Exception $e) {
        // Inform the tracer that there was an exception thrown
        $span->setError($e);
        // Bubble up the exception
        throw $e
    } finally {
        // Close the span
        $span->finish();
    }
});
 
 add_action( 'the_content', 'test_plugin_execute' );
