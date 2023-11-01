<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'TF_Shortcodes' ) ) {
	class TF_Shortcodes {

		private static $instance = null;

		/**
		 * Singleton instance
		 * @since 1.0.0
		 */
		public static function instance() {
			if ( self::$instance == null ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * All shortcode generator callback function
		 * @author Abu Hena
		 * @since 2.9.5
		 */
		public static function tf_shortcode_callback() {
			echo '<div class="tf-setting-dashboard">';
			//dashboard-header-include
			echo tf_dashboard_header();
			?>
            <div class="tf-shortcode-generator-section">
                <div class="tf-shortcode-generators">
                    <!--Tours Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Tours', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display tours in specific location', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Tour', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tf_tour"><?php _e( 'Tour', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Tour Count', 'bafg' ) ?></h3>
                                            <input type="number" value="5" data-count="count" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Tour Destination', 'bafg' ) ?></h3>
											<?php
											//Dynamic Taxonomy dropdown list
											tf_terms_dropdown( 'tour_destination', 'destinations', 'tf-setting-field tf-select-field', true );
											?>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Tour style', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="style='grid'"><?php _e( 'Grid', 'bafg' ); ?></option>
                                                <option value="style='slider'"><?php _e( 'Slider', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Hotels Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Hotels', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display Hotels in specific location', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hotels', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tf_hotel"><?php _e( 'Hotels', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hotel Count', 'bafg' ) ?></h3>
                                            <input type="number" value="5" data-count="count" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hotel location', 'bafg' ) ?></h3>
											<?php
											//Dynamic Taxonomy dropdown list
											tf_terms_dropdown( 'hotel_location', 'locations', 'tf-setting-field tf-select-field', true );
											?>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hotel style', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="style='grid'"><?php _e( 'Grid', 'bafg' ); ?></option>
                                                <option value="style='slider'"><?php _e( 'Slider', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Hotel locations Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Hotel Location', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display hotel locations', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hotel Locations', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="hotel_locations"><?php _e( 'Hotel Locations', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Orderby', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="orderby='name'"><?php _e( 'Name', 'bafg' ); ?></option>
                                                <option value="orderby='title'"><?php _e( 'Title', 'bafg' ); ?></option>
                                                <option value="orderby='date'"><?php _e( 'Date', 'bafg' ); ?></option>
                                                <option value="orderby='ID'"><?php _e( 'ID', 'bafg' ); ?></option>
                                                <option value="orderby='rand'"><?php _e( 'Rand', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Order', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="order='ASC'"><?php _e( 'ASC', 'bafg' ); ?></option>
                                                <option value="order='DESC'"><?php _e( 'DESC', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Location limit', 'bafg' ) ?></h3>
                                            <input type="number" value="-1" data-count="limit" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Choose Locations', 'bafg' ) ?></h3>
											<?php
											//Dynamic Taxonomy dropdown list
											tf_terms_dropdown( 'hotel_location', 'ids', 'tf-setting-field tf-select-field', true );
											?>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hide Empty', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="hide_empty='0'"><?php _e( 'No', 'bafg' ); ?></option>
                                                <option value="hide_empty='1'"><?php _e( 'Yes', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Tour Destinations Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Tour Destination', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display tour destinations', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Tour Destinations', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tour_destinations"><?php _e( 'Tour Destinations', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Orderby', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="orderby='name'"><?php _e( 'Name', 'bafg' ); ?></option>
                                                <option value="orderby='title'"><?php _e( 'Title', 'bafg' ); ?></option>
                                                <option value="orderby='date'"><?php _e( 'Date', 'bafg' ); ?></option>
                                                <option value="orderby='ID'"><?php _e( 'ID', 'bafg' ); ?></option>
                                                <option value="orderby='rand'"><?php _e( 'Rand', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Order', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="order='ASC'"><?php _e( 'ASC', 'bafg' ); ?></option>
                                                <option value="order='DESC'"><?php _e( 'DESC', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Destination limit', 'bafg' ) ?></h3>
                                            <input type="number" value="-1" data-count="limit" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Choose Destination', 'bafg' ) ?></h3>
											<?php
											//Dynamic Taxonomy dropdown list
											tf_terms_dropdown( 'tour_destination', 'ids', 'tf-setting-field tf-select-field', true );
											?>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hide Empty', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="hide_empty='0'"><?php _e( 'No', 'bafg' ); ?></option>
                                                <option value="hide_empty='1'"><?php _e( 'Yes', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Recent hotels Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Recent hotels', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display recent hotels', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hotels', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tf_recent_hotel"><?php _e( 'Recent Hotel', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Orderby', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="orderby='name'"><?php _e( 'Name', 'bafg' ); ?></option>
                                                <option value="orderby='title'"><?php _e( 'Title', 'bafg' ); ?></option>
                                                <option value="orderby='date'"><?php _e( 'Date', 'bafg' ); ?></option>
                                                <option value="orderby='ID'"><?php _e( 'ID', 'bafg' ); ?></option>
                                                <option value="orderby='rand'"><?php _e( 'Rand', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Order', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="order='ASC'"><?php _e( 'ASC', 'bafg' ); ?></option>
                                                <option value="order='DESC'"><?php _e( 'DESC', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Hotel limit', 'bafg' ) ?></h3>
                                            <input type="number" value="-1" data-count="count" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Slides to show', 'bafg' ) ?></h3>
                                            <input type="number" value="5" data-count="slidestoshow" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Recent tour Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Recent Tours', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display recent tours', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Recent Tours', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tf_recent_tour"><?php _e( 'Recent tour', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Orderby', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="orderby='name'"><?php _e( 'Name', 'bafg' ); ?></option>
                                                <option value="orderby='title'"><?php _e( 'Title', 'bafg' ); ?></option>
                                                <option value="orderby='date'"><?php _e( 'Date', 'bafg' ); ?></option>
                                                <option value="orderby='ID'"><?php _e( 'ID', 'bafg' ); ?></option>
                                                <option value="orderby='rand'"><?php _e( 'Rand', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Order', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="order='ASC'"><?php _e( 'ASC', 'bafg' ); ?></option>
                                                <option value="order='DESC'"><?php _e( 'DESC', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Tour limit', 'bafg' ) ?></h3>
                                            <input type="number" value="-1" data-count="count" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Slides to show', 'bafg' ) ?></h3>
                                            <input type="number" value="5" data-count="slidestoshow" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Search form Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Search Form', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display Search Form', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Search Form', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tf_search_form"><?php _e( 'Search form', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Style', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="style='default'"><?php _e( 'Default', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Type', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="type='all'"><?php _e( 'All', 'bafg' ); ?></option>
                                                <option value="type='hotel'"><?php _e( 'Hotel', 'bafg' ); ?></option>
                                                <option value="type='tour'"><?php _e( 'Tour', 'bafg' ); ?></option>
                                                <option value="type='booking'"><?php _e( 'Booking', 'bafg' ); ?></option>
                                                <option value="type='tp-hotel'"><?php _e( 'Travel Payout Hotels', 'bafg' ); ?></option>
                                                <option value="type='tp-flight'"><?php _e( 'Travel Payout Flights', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Fullwidth', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="fullwidth='true'"><?php _e( 'Yes', 'bafg' ); ?></option>
                                                <option value="fullwidth='false'"><?php _e( 'No', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Classes', 'bafg' ) ?></h3>
                                            <input type="text" value="" data-count="classes" placeholder="Input classes with space" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Advanced', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="advanced='disabled'"><?php _e( 'Disabled', 'bafg' ); ?></option>
                                                <option value="advanced='enabled'"><?php _e( 'Enabled', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Reviews Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Reviews', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display reviews', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Reviews', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tf_reviews"><?php _e( 'Reviews', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Type', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="type=tf_hotel"><?php _e( 'Hotel', 'bafg' ); ?></option>
                                                <option value="type=tf_tours"><?php _e( 'Tours', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Total Post Number', 'bafg' ) ?></h3>
                                            <input type="number" value="10" data-count="number" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Sliders To Show', 'bafg' ) ?></h3>
                                            <input type="number" value="3" data-count="count" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>

                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Speed', 'bafg' ) ?></h3>
                                            <input type="number" value="200" data-count="speed" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Arrows', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="arrows='true'"><?php _e( 'Yes', 'bafg' ); ?></option>
                                                <option value="arrows='false'"><?php _e( 'No', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Dots', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="dots='true'"><?php _e( 'Yes', 'bafg' ); ?></option>
                                                <option value="dots='false'"><?php _e( 'No', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Autoplay', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="autoplay='true'"><?php _e( 'Yes', 'bafg' ); ?></option>
                                                <option value="autoplay='false'"><?php _e( 'No', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Infinite', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="infinite='true'"><?php _e( 'Yes', 'bafg' ); ?></option>
                                                <option value="infinite='false'"><?php _e( 'No', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Recent blog Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Recent blog', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display Recent Blogs in specific location', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Recent Blogs', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tf_recent_blog"><?php _e( 'Recent Blogs', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Blog Count', 'bafg' ) ?></h3>
                                            <input type="number" value="5" data-count="count" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Categories', 'bafg' ) ?></h3>
											<?php
											//Dynamic Taxonomy dropdown list
											tf_terms_dropdown( 'category', 'cats', 'tf-setting-field tf-select-field', true );
											?>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Blog style', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="style='grid'"><?php _e( 'Grid', 'bafg' ); ?></option>
                                                <option value="style='slider'"><?php _e( 'Slider', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_tours]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Vendor Post Genarate Shortcodes section-->
                    <div class="tf-shortcode-generator-single">
                        <div class="tf-shortcode-generator-label">
                            <div class="tf-labels">
                                <label><?php echo __( 'Vendor Hotels & Tours', 'bafg' ); ?></label>
                                <p><?php echo __( 'Display Hotels & Tours in specific Vendor', 'bafg' ); ?></p>
                            </div>
                            <div class="tf-shortcode-btn tf-generate-tour">
                                <button><?php echo __( 'Generate Shortcode', 'bafg' ); ?></button>
                            </div>
                        </div>
                        <div class="tf-sg-form-wrapper">
                            <div class="tf-shortcode-generator-form">
                                <div class="tf-sg-close"><i class="far fa-times"></i></div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Vendor Posts', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="tf_vendor_post"><?php _e( 'Vendor Posts', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Type', 'bafg' ) ?></h3>
                                            <select class="tf-select-field tf-setting-field">
                                                <option value="type='tf_hotel'"><?php _e( 'Hotel', 'bafg' ); ?></option>
                                                <option value="type='tf_tours'"><?php _e( 'Tour', 'bafg' ); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="tf-sg-row">
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Number of Posts', 'bafg' ) ?></h3>
                                            <input type="number" value="4" data-count="count" class="post-count tf-setting-field">
                                        </div>
                                    </div>
                                    <div class="tf-col-lg-6">
                                        <div class="tf-sg-field-wrap">
                                            <h3><?php echo __( 'Vendor Name', 'bafg' ) ?></h3>
											<?php
											$tf_vendor_query_lists = get_users( array( 'role__in' => array( 'tf_vendor', 'administrator' ) ) );
											if ( ! empty( $tf_vendor_query_lists ) ) {
												?>
                                                <select class="tf-select-field tf-setting-field">
													<?php
													foreach ( $tf_vendor_query_lists as $single ) { ?>
                                                        <option value="vendor='<?php echo $single->user_nicename; ?>' vendor_id='<?php echo $single->ID; ?>' "><?php echo $single->user_nicename; ?></option>
													<?php } ?>
                                                </select>
											<?php } else {
												echo __( 'Not Found', 'bafg' );
											}
											?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-sg-row">

                                    <div class="tf-col-lg-6">
                                        <div class="tf-generate-tour">
                                            <button class="tf-btn"><?php echo __( 'Generate', 'bafg' ); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-copy-item">
                                    <div class="tf-shortcode-field copy-shortcode">
                                        <input type="text" id="tf-shortcode" name="tf_generated_shortcode" class="tf-shortcode-value" value="[tf_vendor_post]" readonly/>
                                        <button type="button" class="tf-copy-btn tf-btn">
                                            <span class="dashicons dashicons-category"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
			<?php
		}

	}
}
TF_Shortcodes::instance();