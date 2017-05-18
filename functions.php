<?php
/**
 * Functions
 *
 * @package WP Background Processing
 */

if ( ! function_exists( 'wp_queue' ) ) {
	/**
	 * WP queue.
	 *
	 * @param WP_Job $job Job.
	 * @param int    $delay Delay.
	 */
	function wp_queue( WP_Job $job, $delay = 0 ) {
		global $wp_queue;

		$wp_queue->push( $job, $delay );

		do_action( 'wp_queue_job_pushed', $job );
	}
}

if ( ! function_exists( 'wp_queue_batch' ) ) {
	/**
	 * WP queue batch.
	 *
	 * @param array $jobs Jobs.
	 * @param int   $delay Delay.
	 */
	function wp_queue_batch( $jobs, $delay = 0 ) {
		foreach ( $jobs as $job ) {
			wp_queue( $job, $delay );
		}
	}
}
