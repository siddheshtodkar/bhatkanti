<script type="text/template" id="customize-happyforms-email-template">
	<?php include( happyforms_get_core_folder() . '/templates/customize-form-part-header.php' ); ?>
	<p>
		<label for="<%= instance.id %>_title"><?php _e( 'Title', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
		<input type="text" id="<%= instance.id %>_title" class="widefat title" value="<%= instance.label %>" data-bind="label" />
	</p>
	<p>
		<label for="<%= instance.id %>_label_placement"><?php _e( 'Title placement', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
		<select id="<%= instance.id %>_label_placement" data-bind="label_placement">
			<option value="above"<%= (instance.label_placement == 'above') ? ' selected' : '' %>><?php _e( 'Above', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
			<option value="left"<%= (instance.label_placement == 'left') ? ' selected' : '' %>><?php _e( 'Left', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
			<option value="below"<%= (instance.label_placement == 'below') ? ' selected' : '' %>><?php _e( 'Below', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
			<option value="inside"<%= (instance.label_placement == 'inside') ? ' selected' : '' %>><?php _e( 'Inside input', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
			<option value="as_placeholder"<%= (instance.label_placement == 'as_placeholder') ? ' selected' : '' %>><?php _e( 'Display as placeholder', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
			<option value="hidden"<%= (instance.label_placement == 'hidden') ? ' selected' : '' %>><?php _e( 'Hidden', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
		</select>
	</p>
	<p class="label_placement-options" style="display: none">
		<label>
			<input type="checkbox" class="checkbox apply-all-check" value="" data-apply-to="label_placement" /> <?php _e( 'Apply to all parts', HAPPYFORMS_TEXT_DOMAIN ); ?>
		</label>
	</p>
	<p>
		<label for="<%= instance.id %>_description"><?php _e( 'Description', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
		<textarea id="<%= instance.id %>_description" data-bind="description"><%= instance.description %></textarea>
	</p>
	<p class="happyforms-description-options" style="display: <%= (instance.description != '') ? 'block' : 'none' %>">
		<label for="<%= instance.id %>_description_mode"><?php _e( 'Description appearance', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
		<select id="<%= instance.id %>_description_mode" data-bind="description_mode">
			<option value=""><?php _e( 'Standard', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
			<option value="focus-reveal"<%= (instance.description_mode == 'focus-reveal') ? ' selected' : '' %>><?php _e( 'Reveal on focus', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
			<option value="tooltip"<%= (instance.description_mode == 'tooltip' || instance.tooltip_description ) ? ' selected' : '' %>><?php _e( 'Tooltip', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
		</select>
	</p>
	<p class="happyforms-placeholder-option" style="display: <%= ( 'as_placeholder' !== instance.label_placement ) ? 'block' : 'none' %>">
		<label for="<%= instance.id %>_placeholder"><?php _e( 'Placeholder', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
		<input type="text" id="<%= instance.id %>_placeholder" class="widefat title" value="<%= instance.placeholder %>" data-bind="placeholder" />
	</p>

	<?php do_action( 'happyforms_part_customize_email_before_options' ); ?>

	<p>
		<label>
			<input type="checkbox" class="checkbox" value="1" <% if ( instance.required ) { %>checked="checked"<% } %> data-bind="required" /> <?php _e( 'This is required', HAPPYFORMS_TEXT_DOMAIN ); ?>
		</label>
	</p>

	<?php do_action( 'happyforms_part_customize_email_after_options' ); ?>

	<div class="happyforms-part-advanced-settings-wrap">
		<?php do_action( 'happyforms_part_customize_email_before_advanced_options' ); ?>

		<p>
			<label for="<%= instance.id %>_width"><?php _e( 'Width', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
			<select id="<%= instance.id %>_width" name="width" data-bind="width" class="widefat">
				<option value="full"<%= (instance.width == 'full') ? ' selected' : '' %>><?php _e( 'Full', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
				<option value="half"<%= (instance.width == 'half') ? ' selected' : '' %>><?php _e( 'Half', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
				<option value="third"<%= (instance.width == 'third') ? ' selected' : '' %>><?php _e( 'Third', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
				<option value="auto"<%= (instance.width == 'auto') ? ' selected' : '' %>><?php _e( 'Auto', HAPPYFORMS_TEXT_DOMAIN ); ?></option>
			</select>
		</p>
		<p class="width-options" style="display: none">
			<label>
				<input type="checkbox" class="checkbox apply-all-check" value="" data-apply-to="width" /> <?php _e( 'Apply to all parts', HAPPYFORMS_TEXT_DOMAIN ); ?>
			</label>
		</p>
		<p>
			<label>
				<input type="checkbox" class="checkbox" value="1" <% if ( instance.autocomplete_domains ) { %>checked="checked"<% } %> data-bind="autocomplete_domains" /> <?php _e( 'Suggest common email domains', HAPPYFORMS_TEXT_DOMAIN ); ?>
			</label>
		</p>
		<p>
			<label>
				<input type="checkbox" class="checkbox confirmation-checkbox" value="1" <% if ( instance.confirmation_field ) { %>checked="checked"<% } %> data-bind="confirmation_field" /> <?php _e( 'Require confirmation of the value', HAPPYFORMS_TEXT_DOMAIN ); ?>
			</label>
		</p>
		<p class="confirmation-field-setting" style="display: <%= (instance.confirmation_field == 1) ? 'block' : 'none' %>">
			<label for="<%= instance.id %>_confirmation_field_label"><?php _e( 'Confirmation field title', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
			<input type="text" id="<%= instance.id %>_confirmation_field_label" class="widefat title" value="<%= instance.confirmation_field_label %>" data-bind="confirmation_field_label" />
		</p>

		<?php do_action( 'happyforms_part_customize_email_after_advanced_options' ); ?>

		<p>
			<label for="<%= instance.id %>_css_class"><?php _e( 'Custom CSS class', HAPPYFORMS_TEXT_DOMAIN ); ?></label>
			<input type="text" id="<%= instance.id %>_css_class" class="widefat title" value="<%= instance.css_class %>" data-bind="css_class" />
		</p>
	</div>

	<div class="happyforms-part-logic-wrap">
		<div class="happyforms-logic-view">
			<?php happyforms_customize_part_logic(); ?>
		</div>
	</div>

	<?php happyforms_customize_part_footer(); ?>
</script>
