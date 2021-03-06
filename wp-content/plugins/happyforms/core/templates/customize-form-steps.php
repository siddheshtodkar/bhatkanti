<script type="text/template" id="happyforms-form-steps-template">
	<div class="happyforms-action-buttons">
		<% if ( step.index > 1 ) { %>
			<%
			var previousStepTitle = '<?php _e( 'Build', HAPPYFORMS_TEXT_DOMAIN ); ?>';

			if ( 3 === step.index ) {
				previousStepTitle = '<?php _e( 'Setup', HAPPYFORMS_TEXT_DOMAIN ); ?>';
			}
			%>
			<button class="button button-secondary button-hero happyforms-step-previous"><i class="fa fa-lg fa-arrow-circle-o-left" aria-hidden="true"></i> <%= previousStepTitle %></button>
		<% } %>
		<% if ( step.index < step.count ) { %>
			<%
			var nextStepTitle = '<?php _e( 'Setup', HAPPYFORMS_TEXT_DOMAIN ); ?>';

			if ( 2 === step.index ) {
				nextStepTitle = '<?php _e( 'Style', HAPPYFORMS_TEXT_DOMAIN ); ?>';
			}
			%>
			<button class="button button-primary button-hero button-forwards happyforms-step-next"><%= nextStepTitle %> <i class="fa fa-lg fa-arrow-circle-o-right" aria-hidden="true"></i></button>
		<% } else { %>
			<button class="button button-primary button-hero button-forwards happyforms-step-save"><?php _e( 'Save & Close', HAPPYFORMS_TEXT_DOMAIN ); ?></button>
		<% } %>
	</div>

	<div class="happyforms-step-progress">
		<div class="happyforms-step-progress-bar" style="width: <%= step.progress %>%;"></div>
	</div>
	<p class="happyforms-step-progress-counter"><?php _e( 'Step', HAPPYFORMS_TEXT_DOMAIN ) ?> <%= step.index %> <?php _e( 'of', HAPPYFORMS_TEXT_DOMAIN ) ?> <%= step.count %></p>
</script>
