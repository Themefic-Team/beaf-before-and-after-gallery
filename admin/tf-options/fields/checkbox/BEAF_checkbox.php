<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'BEAF_checkbox' ) ) {
	class BEAF_checkbox extends BEAF_Fields {

		public function __construct( $field, $value = '', $settings_id = '', $parent_field = '' ) {
			parent::__construct( $field, $value, $settings_id, $parent_field );
		}

		public function render() {
			//added 'options_callback' callback support @ah
			if ( isset( $this->field['options_callback'] ) && is_callable( $this->field['options_callback'] ) ) {
				$this->field['options'] = call_user_func( $this->field['options_callback'] );
			}
			if ( isset( $this->field['options'] ) ) {
				$inline = ( isset( $this->field['inline'] ) && $this->field['inline'] ) ? 'tf-inline' : '';
				echo '<ul class="tf-checkbox-group ' . esc_attr( $inline ) . '">';
				foreach ( $this->field['options'] as $key => $value ) {
					$checked = ( is_array( $this->value ) && in_array( $key, $this->value ) ) ? ' checked' : '';
					if ( $key !== '' ) {
						echo '<li><input type="checkbox" id="' . esc_attr( $this->field_name() . '[' . $key . ']' ) . '" name="' . esc_attr( $this->field_name() ) . '[]" data-depend-id="' . esc_attr( $this->field['id'] ) . '" class="tf-group-checkbox" value="' . esc_attr( $key ) . '" ' . esc_attr( $checked ) . ' ' . esc_attr( $this->field_attributes() ) . '/><label for="' . esc_attr( $this->field_name() . '[' . $key . ']' ) . '">' . esc_html__( $value, "bafg" ) . '</label></li>';
					} else {
						//disabled checkbox
						echo '<li><input type="checkbox" id="' . esc_attr( $this->field_name() . '[' . $key . ']' ) . '" name="' . esc_attr( $this->field_name() ) . '[]" data-depend-id="' . esc_attr( $this->field['id'] ) . '" class="tf-group-checkbox" value="' . esc_attr( $key ) . '" ' . esc_attr( $checked ) . ' ' . esc_attr( $this->field_attributes() ) . ' disabled/><label for="' . esc_attr( $this->field_name() . '[' . $key . ']' ) . '">' . esc_html__( $value, "bafg" ) . '</label></li>';
					}

				}
				echo '</ul>';
			} else {
				echo '<input type="checkbox" id="' . esc_attr( $this->field_name() ) . '" name="' . esc_attr( $this->field_name() ) . '" value="1" ' . checked( $this->value, 1, false ) . ' ' . esc_attr( $this->field_attributes() ) . '/><label for="' . esc_attr( $this->field_name() ) . '">' . esc_html__( $this->field['title'], 'bafg' ) . '</label>';

			}
		}
		public function sanitize() {
			$value = ( is_array( $this->value ) ) ? array_map( 'sanitize_text_field', $this->value ) : sanitize_text_field( $this->value );

			return $value;
		}
	}
}