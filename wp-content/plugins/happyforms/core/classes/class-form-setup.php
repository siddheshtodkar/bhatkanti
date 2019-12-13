<?php

class HappyForms_Form_Setup {

	/**
	 * The singleton instance.
	 *
	 * @var HappyForms_Form_Setup
	 */
	private static $instance;

	/**
	 * The singleton constructor.
	 *
	 * @return HappyForms_Form_Setup
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		self::$instance->hook();

		return self::$instance;
	}

	/**
	 * Hook into WordPress.
	 *
	 * @return void
	 */
	public function hook() {
		// Common form extensions
		add_filter( 'happyforms_meta_fields', array( $this, 'meta_fields' ) );

		// Customizer form display
		add_filter( 'happyforms_part_class', array( $this, 'part_class_customizer' ) );
		add_filter( 'happyforms_the_form_title', array( $this, 'form_title_customizer' ) );

		// Reviewable form display
		add_filter( 'happyforms_form_id', array( $this, 'form_html_id' ), 10, 2 );
		add_filter( 'happyforms_form_class', array( $this, 'form_html_class' ), 10, 2 );
		add_action( 'happyforms_do_setup_control', array( $this, 'do_control' ), 10, 3 );
	}

	public function get_fields() {
		global $current_user;

		$fields = array(
			'confirmation_message' => array(
				'default' => __( 'Thank you! Your response has been successfully submitted.', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'esc_html',
			),
			'error_message' => array(
				'default' => __( 'Oops! Your response is invalid — please review your message.', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'esc_html'
			),
			'receive_email_alerts' => array(
				'default' => 1,
				'sanitize' => 'happyforms_sanitize_checkbox'
			),
			'email_recipient' => array(
				'default' => ( $current_user->user_email ) ? $current_user->user_email : '',
				'sanitize' => 'happyforms_sanitize_emails',
			),
			'email_bccs' => array(
				'default' => '',
				'sanitize' => 'happyforms_sanitize_emails',
			),
			'email_mark_and_reply' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'alert_email_subject' => array(
				'default' => __( 'You received a new message', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'sanitize_text_field',
			),
			'send_confirmation_email' => array(
				'default' => 1,
				'sanitize' => 'happyforms_sanitize_checkbox'
			),
			'confirmation_email_from_name' => array(
				'default' => get_bloginfo( 'name' ),
				'sanitize' => 'sanitize_text_field',
			),
			'confirmation_email_subject' => array(
				'default' => __( 'We received your message', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'sanitize_text_field',
			),
			'confirmation_email_content' => array(
				'default' => __( 'Your message has been successfully sent. We appreciate you contacting us and we’ll be in touch soon.', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'esc_html',
			),
			'confirmation_email_include_values' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox'
			),
			'redirect_on_complete' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'redirect_url' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'redirect_blank' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'spam_prevention' => array(
				'default' => 1,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'required_part_label' => array(
				'default' => __( 'This field is required.', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'sanitize_text_field'
			),
			'optional_part_label' => array(
				'default' => __( '(optional)', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'sanitize_text_field',
			),
			'submit_button_label' => array(
				'default' => __( 'Submit Form', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'sanitize_text_field',
			),
			'form_expiration_datetime' => array(
				'default' => date( 'Y-m-d H:i:s', time() + 3600 * 24 * 7 ),
				'sanitize' => 'happyforms_sanitize_datetime',
			),
			'save_entries' => array(
				'default' => 1,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'captcha' => array(
				'default' => '',
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'captcha_site_key' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'captcha_secret_key' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'captcha_label' => array(
				'default' => __( 'Validate your submission', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'sanitize_text_field'
			),
			'preview_before_submit' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'review_button_label' => array(
				'default' => __( 'Review submission', HAPPYFORMS_TEXT_DOMAIN ),
				'sanitize' => 'sanitize_text_field',
			),
			'unique_id' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'unique_id_start_from' => array(
				'default' => 1,
				'sanitize' => 'intval',
			),
			'unique_id_prefix' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'unique_id_suffix' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field',
			),
			'use_html_id' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox',
			),
			'html_id' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field'
			),
			'disable_submit_until_valid' => array(
				'default' => '',
				'sanitize' => 'happyforms_sanitize_checkbox'
			),
			'submit_button_html_class' => array(
				'default' => '',
				'sanitize' => 'sanitize_text_field'
			),
			'form_hide_on_submit' => array(
				'default' => 0,
				'sanitize' => 'happyforms_sanitize_checkbox'
			),
		);

		return $fields;
	}

	public function get_controls() {
		$controls = array(
			100 => array(
				'type' => 'editor',
				'label' => __( 'Confirmation message', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'This is the message your users will see after succesfully submitting your form.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'confirmation_message',
			),
			110 => array(
				'type' => 'editor',
				'label' => __( 'Error message', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'This is the message your users will see when there are form errors preventing submission.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'error_message',
			),
			200 => array(
				'type' => 'checkbox',
				'label' => __( 'Receive submission alerts', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'receive_email_alerts',
			),
			300 => array(
				'type' => 'text',
				'label' => __( 'Email address', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'Add your email address here to receive a confirmation email for each form response. You can add multiple email addresses by separating each address with a comma.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'email_recipient',
			),
			310 => array(
				'type' => 'text',
				'label' => __( 'Email Bcc address', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'Add your Bcc email address here to receive a confirmation email for each form response  without appearing in the received message header. You can add multiple email addresses by separating each address with a comma.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'email_bccs',
			),
			400 => array(
				'type' => 'text',
				'label' => __( 'Email subject', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'Each time a user submits a message, you\'ll receive an email with this subject.', 'happyforms' ),
				'field' => 'alert_email_subject',
			),
			500 => array(
				'type' => 'checkbox',
				'label' => __( 'Send confirmation email', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'send_confirmation_email',
			),
			600 => array(
				'type' => 'text',
				'label' => __( 'Email display name', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'If your form contains an email field, recipients will receive an email with this sender name.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'confirmation_email_from_name',
			),
			700 => array(
				'type' => 'text',
				'label' => __( 'Email subject', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'If your form contains an email field, recipients will receive an email with this subject.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'confirmation_email_subject',
			),
			800 => array(
				'type' => 'editor',
				'label' => __( 'Email content', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'If your form contains an email field, recipients will receive an email with this content.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'confirmation_email_content',
			),
			810 => array(
				'type' => 'checkbox',
				'label' => __( 'Include submitted values', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'confirmation_email_include_values'
			),
			899 => array(
				'type' => 'text',
				'label' => __( 'Required part label', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'required_part_label'
			),
			900 => array(
				'type' => 'text',
				'label' => __( 'Optional part label', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'optional_part_label',
			),
			1000 => array(
				'type' => 'text',
				'label' => __( 'Submit button label', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'submit_button_label',
			),
			1100 => array(
				'type' => 'text',
				'label' => __( 'Submit button HTML class', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'submit_button_html_class'
			),
			1200 => array(
				'type' => 'checkbox',
				'label' => __( 'Set custom form HTML ID', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'use_html_id',
				'tooltip' => __( 'Add a unique HTML ID to your form. Write without a hash (#) character.', HAPPYFORMS_TEXT_DOMAIN ),
			),
			1201 => array(
				'type' => 'text',
				'label' => __( 'Form HTML ID', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'html_id',
			),
			1202 => array(
				'type' => 'checkbox',
				'label' => __( 'Hide form after submission', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'Hide all form parts and display just title and confirmation message on submit.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'form_hide_on_submit'
			),
			1400 => array(
				'type' => 'checkbox',
				'label' => __( 'Spam prevention', HAPPYFORMS_TEXT_DOMAIN ),
				'tooltip' => __( 'Protect your form against bots by using HoneyPot security.', HAPPYFORMS_TEXT_DOMAIN ),
				'field' => 'spam_prevention',
			),
		);

		$controls = apply_filters( 'happyforms_setup_controls', $controls );
		ksort( $controls, SORT_NUMERIC );

		return $controls;
	}

	public function get_control_index_by_field( $field = '' ) {
		if ( empty( $field ) ) {
			return;
		}

		$controls = $this->get_controls();

		foreach ( $controls as $key => $control ) {
			if ( isset( $control['field'] ) && $control['field'] === $field ) {
				return $key;
			}
		}

		return;
	}

	public function do_control( $control, $field, $index ) {
		$type = $control['type'];
		$path = happyforms_get_core_folder() . '/templates/customize-controls/setup';

		switch( $control['type'] ) {
			case 'editor':
			case 'checkbox':
			case 'text':
			case 'number':
			case 'radio':
			case 'select':
			case 'textarea':
				require( "{$path}/{$type}.php" );
				break;
			default:
				break;
		}
	}

	/**
	 * Filter: add fields to form meta.
	 *
	 * @hooked filter happyforms_meta_fields
	 *
	 * @param array $fields Current form meta fields.
	 *
	 * @return array
	 */
	public function meta_fields( $fields ) {
		$fields = array_merge( $fields, $this->get_fields() );

		return $fields;
	}

	/**
	 * Filter: append -editable class to part templates.
	 *
	 * @hooked filter happyforms_part_class
	 *
	 * @return void
	 */
	public function part_class_customizer( $classes ) {
		if ( ! is_customize_preview() ) {
			return $classes;
		}

		$classes[] = 'happyforms-block-editable happyforms-block-editable--part';

		return $classes;
	}

	public function form_title_customizer( $title ) {
		if ( ! is_customize_preview() ) {
			return $title;
		}

		$before = '<div class="happyforms-block-editable happyforms-block-editable--partial" data-partial-id="title">';
		$after = '</div>';
		$title = "{$before}{$title}{$after}";

		return $title;
	}

	public function form_html_id( $id, $form ) {
		if ( 1 === intval( happyforms_get_form_property( $form, 'use_html_id' ) ) && ! empty( $form['html_id'] ) ) {
			$id = $form['html_id'];
		}

		return $id;
	}

	public function form_html_class( $class, $form ) {
		if ( 1 == $form['form_hide_on_submit'] ) {
			$class[] = 'happyforms-form--hide-on-submit';
		}

		return $class;
	}
}

if ( ! function_exists( 'happyforms_get_setup' ) ):

function happyforms_get_setup() {
	return HappyForms_Form_Setup::instance();
}

endif;

happyforms_get_setup();
