<?php
/**
 * Pattern 
 */
namespace BPT\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class BPT_Pattern{

    /**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialize plugin
	 */
	private function init() {
		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'bpt_register_block_patterns' ] );
		add_action( 'init', [ $this, 'bpt_register_block_pattern_categories' ] );
	}

	/**
	 * Register Block Patterns.
	 */
	public function bpt_register_block_patterns() {
		if ( function_exists( 'register_block_pattern' ) ) {

			// Get the two column pattern content.
			$two_columns_content = bbt_features_get_template( 'patterns/two-columns' );

			/**
			 * Register Two Column Pattern
			 */
			register_block_pattern(
				'bpt/two-columns',
				[
					'title'       => __( 'Two Column side images', 'bpt' ),
					'description' => __( 'Two Column side images Patterns', 'bpt' ),
					'categories'  => [ 'bpt-columns' ],
					'content'     => $two_columns_content,
				]
			);

			/**
			 * Two Columns Secondary Pattern
			 */
			$two_columns_secondary_content = bbt_features_get_template( 'patterns/two-columns-secondary' );

			register_block_pattern(
				'bpt/two-columns-secondary',
				[
					'title'       => __( 'Two Column side images Secondary', 'bpt' ),
					'description' => __( 'Two Column side images Block with image and text', 'bpt' ),
					'categories'  => [ 'bpt-columns' ],
					'content'     => $two_columns_secondary_content,
				]
			);
		}
	}

	/**
	 * Register Block Pattern Categories.
	 */
	public function bpt_register_block_pattern_categories() {

		$pattern_categories = [
			'bpt-columns' => __( 'Two Column side images', 'bpt' ),
		];

		if ( ! empty( $pattern_categories ) ) {
			foreach ( $pattern_categories as $pattern_category => $pattern_category_label ) {
				register_block_pattern_category(
					$pattern_category,
					[ 'label' => $pattern_category_label ]
				);
			}
		}
	}
}