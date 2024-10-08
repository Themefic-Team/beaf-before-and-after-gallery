<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

/**
 * Field: text
 */
if ( ! class_exists( 'BEAF_gallery' ) ) {
	class BEAF_gallery extends BEAF_Fields {

		public function __construct( $field, $value = '', $settings_id = '', $parent_field = '' ) {
			parent::__construct( $field, $value, $settings_id, $parent_field );
		}

		public function render() {
			$type = ( ! empty( $this->field['type'] ) ) ? $this->field['type'] : 'text';

			echo '<div class="tf-fieldset-gallery-preview ' . esc_attr( str_replace( array( "[", "]", "-" ) ), "_", esc_attr( $this->field_name() ) ) . '">';
			if ( ! empty( $this->value ) ) {
				$tf_gallery_ids = explode( ',', $this->value );
				foreach ( $tf_gallery_ids as $key => $gallery_item_id ) {
					$image_url = wp_get_attachment_url( $gallery_item_id, 'full' );
					echo '<img src="' . esc_attr( $image_url ) . '" alt="">';
				}
			}
			echo '
			</div>
			<div class="tf-fieldset-gallery">
			<a href="#" tf-field-name="' . esc_attr( $this->field_name() ) . '" class="tf-gallery-upload button button-primary button-large">' . esc_html__( "Add Gallery", "bafg" ) . '</a>';
			if ( ! empty( $this->value ) ) {
				echo '<a href="#" tf-field-name="' . esc_attr( $this->field_name() ) . '" class="tf-gallery-edit button button-primary button-large ' . esc_attr( str_replace( array( "[", "]", "-" ) ), "_", esc_attr( $this->field_name() ) ) . '">' . esc_html__( "Edit Gallery", "bafg" ) . '</a><a href="#" tf-field-name="' . esc_attr( $this->field_name() ) . '" class="tf-gallery-remove button button-warning button-large ' . esc_attr( str_replace( array( "[", "]", "-" ) ), "_", esc_attr( $this->field_name() ) ) . '" style="display:inline-block">' . esc_html__( "Clear", "bafg" ) . '</a>';
			} else {
				echo '<a href="#" tf-field-name="' . esc_attr( $this->field_name() ) . '" class="tf-gallery-edit button button-primary button-large ' . esc_attr( str_replace( array( "[", "]", "-" ) ), "_", esc_attr( $this->field_name() ) ) . '" style="display:none">' . esc_html__( "Edit Gallery", "bafg" ) . '</a><a href="#" tf-field-name="' . esc_attr( $this->field_name() ) . '" class="tf-gallery-remove button button-warning button-large ' . esc_attr( str_replace( array( "[", "]", "-" ) ), "_", esc_attr( $this->field_name() ) ) . '" style="display:none">' . esc_html__( "Clear", "bafg" ) . '</a>';
			}
			echo '</div>
			<input type="hidden" name="' . esc_attr( $this->field_name() ) . '" id="' . esc_attr( $this->field_name() ) . '" value="' . esc_attr( $this->value ) . '"  />';
		}



	}
}