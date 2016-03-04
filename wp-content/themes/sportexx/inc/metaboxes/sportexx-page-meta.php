<div class="sportexx-metabox sportexx-page-meta">
	<div class="form-group">
		<?php $mb->the_field( 'hide_page_title' ); ?>
		<div class="checkbox">
			<label><input type="checkbox" name="<?php echo esc_attr( $mb->get_the_name( 'hide_page_title' ) ); ?>" value="1" <?php $mb->the_checkbox_state( '1' ); ?>/> <?php echo __( 'Hide Page Title', 'sportexx' ); ?></label>
		</div>
		<span class="help-block"><em><?php echo __( 'Check this if you want to hide page title.', 'sportexx' ); ?></em></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'hide_breadcrumb' ); ?>
		<div class="checkbox">
			<label><input type="checkbox" name="<?php echo esc_attr( $mb->get_the_name( 'hide_breadcrumb' ) ); ?>" value="1" <?php $mb->the_checkbox_state( '1' ); ?>/> <?php echo __( 'Hide Breadcrumb', 'sportexx' ); ?></label>
		</div>
		<span class="help-block"><em><?php echo __( 'Check this if you want to hide breadcrumb.', 'sportexx' ); ?></em></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'do_not_wrap_page' ); ?>
		<div class="checkbox">
			<label><input type="checkbox" name="<?php echo esc_attr( $mb->get_the_name( 'do_not_wrap_page' ) ); ?>" value="1" <?php $mb->the_checkbox_state( '1' ); ?> /> <?php echo __( 'Do not wrap the page in a container', 'sportexx' ); ?></label>
		</div>
		<span class="help-block"><em><?php echo __( 'Check this box if you do not want your content to be contained', 'sportexx' ); ?></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'site_content_classes' ); ?>
		<label for="page-site-content-classes"><?php echo __( 'Page Site Content Classes', 'sportexx' ); ?></label>
		<input id="page-site-content-classes" class="form-control" type="text" name="<?php echo esc_attr( $mb->get_the_name( 'site_content_classes' ) ); ?>" value="<?php echo esc_attr( $mb->get_the_value( 'site_content_classes' ) ); ?>">
		<span class="help-block"><em><?php echo __( 'You can type your additional classes to the <strong>Site Content div</strong>', 'sportexx' );?>.</em></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'container_classses' ); ?>
		<label for="page-container-classes"><?php echo __( 'Additional Page Container Classes', 'sportexx' ); ?></label>
		<input id="page-container-classes" class="form-control" type="text" name="<?php echo esc_attr( $mb->get_the_name( 'container_classes' ) ); ?>" value="<?php echo esc_attr( $mb->get_the_value( 'container_classes' ) ); ?>">
		<span class="help-block"><em><?php echo __( 'You can type your additional classes to the <strong>Container div</strong>', 'sportexx' );?>.</em></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'content_area_classes' ); ?>
		<label for="page-content-area-classes"><?php echo __( 'Additional Page Content Area Classes', 'sportexx' ); ?></label>
		<input id="page-content-area-classes" class="form-control" type="text" name="<?php echo esc_attr( $mb->get_the_name( 'content_area_classes' ) ); ?>" value="<?php echo esc_attr( $mb->get_the_value( 'content_area_classes' ) ); ?>">
		<span class="help-block"><em><?php echo __( 'You can type your additional classes to the <strong>Content Area div</strong>', 'sportexx' );?>.</em></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'sidebar_area_classes' ); ?>
		<label for="page-sidebar-area-classes"><?php echo __( 'Additional Page Sidebar Area Classes', 'sportexx' ); ?></label>
		<input id="page-sidebar-area-classes" class="form-control" type="text" name="<?php echo esc_attr( $mb->get_the_name( 'sidebar_area_classes' ) ); ?>" value="<?php echo esc_attr( $mb->get_the_value('sidebar_area_classes') ); ?>">
		<span class="help-block"><em><?php echo __( 'If your layout has a sidebar, you can type your additional classes to the <strong>Sidebar div</strong>', 'sportexx' );?>.</em></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'header_classes' ); ?>
		<label for="page-header-classes"><?php echo __( 'Additional Page Header Classes', 'sportexx' ); ?></label>
		<input id="page-header-classes" class="form-control" type="text" name="<?php echo esc_attr( $mb->get_the_name( 'header_classes' ) ); ?>" value="<?php echo esc_attr( $mb->get_the_value('header_classes') ); ?>">
		<span class="help-block"><em><?php echo __( 'You can type your additional classes to the <strong>Header element</strong>', 'sportexx' );?>.</em></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'body_classes' ); ?>
		<label for="page-body-classes"><?php echo __( 'Additional Page Body Classes', 'sportexx' ); ?></label>
		<input id="page-body-classes" class="form-control" type="text" name="<?php echo esc_attr( $mb->get_the_name( 'body_classes' ) ); ?>" value="<?php echo esc_attr( $mb->get_the_value('body_classes') ); ?>">
		<span class="help-block"><em><?php echo __( 'You can type your additional classes to the <strong>Body element</strong>', 'sportexx' );?>.</em></span>
	</div>
	<div class="form-group">
		<?php $mb->the_field( 'footer_classes' ); ?>
		<label for="page-footer-classes"><?php echo __( 'Page Footer Classes', 'sportexx' ); ?></label>
		<input id="page-footer-classes" class="form-control" type="text" name="<?php echo esc_attr( $mb->get_the_name( 'footer_classes' ) ); ?>" value="<?php echo esc_attr( $mb->get_the_value('footer_classes') ); ?>">
		<span class="help-block"><em><?php echo __( 'You can type your classes to the <strong>Footer element</strong>', 'sportexx' );?>.</em></span>
	</div>
	<?php 
	if( post_type_exists( 'static_block' ) ) :
		
		$args = apply_filters( 'static_block_get_posts_args', array(
			'posts_per_page'	=> -1,
			'orderby'			=> 'title',
			'post_type'			=> 'static_block',
		) );
		
		$static_blocks = get_posts( $args );

		if( !empty( $static_blocks ) ) :
		?>
			<div class="form-group">
				<?php $mb->the_field( 'header_content_static_block_ID' ); ?>
				<label for="header-content-static-block-id"><?php echo __( 'Before Breadcrumb Content', 'sportexx' ); ?></label>
				<select id="header-content-static-block-id" class="form-control" name="<?php $mb->the_name( 'header_content_static_block_ID' ); ?>">
					<option value=""><?php echo __( 'Select a Static Block', 'sportexx' ); ?></option>
				<?php foreach( $static_blocks as $static_block ) : ?>
					<option value="<?php echo esc_attr( $static_block->ID ); ?>"<?php $mb->the_select_state( $static_block->ID ); ?>><?php echo get_the_title( $static_block->ID ); ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		<?php
		endif;
	endif;
	?>
</div>
<style type="text/css">
	.sportexx-metabox input,
	.sportexx-metabox button,
	.sportexx-metabox select,
	.sportexx-metabox textarea {
	    font-family: inherit;
	    font-size: inherit;
	    line-height: inherit;
	}
	.sportexx-metabox fieldset {
	    min-width: 0;
	    padding: 0;
	    margin: 0;
	    border: 0;
	}
	.sportexx-metabox legend {
	    display: block;
	    width: 100%;
	    padding: 0;
	    margin-bottom: 20px;
	    font-size: 21px;
	    line-height: inherit;
	    color: #333;
	    border: 0;
	    border-bottom: 1px solid #e5e5e5;
	}
	.sportexx-metabox label {
	    display: inline-block;
	    max-width: 100%;
	    margin-bottom: 5px;
	    font-weight: bold;
	}
	.sportexx-metabox input[type="search"] {
	    -webkit-box-sizing: border-box;
	    -moz-box-sizing: border-box;
	    box-sizing: border-box;
	}
	.sportexx-metabox input[type="radio"],
	.sportexx-metabox input[type="checkbox"] {
	    margin: 4px 0 0;
	    margin-top: 1px \9;
	    line-height: normal;
	}
	.sportexx-metabox input[type="file"] {
	    display: block;
	}
	.sportexx-metabox input[type="range"] {
	    display: block;
	    width: 100%;
	}
	.sportexx-metabox select[multiple],
	.sportexx-metabox select[size] {
	    height: auto;
	}

	.sportexx-metabox output {
	    display: block;
	    padding-top: 7px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	}
	.sportexx-metabox .form-control {
	    display: block;
	    width: 100%;
	    height: 34px;
	    padding: 6px 12px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	    -webkit-transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
	    -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
	    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
	}
	.sportexx-metabox .form-control::-moz-placeholder {
	    color: #777;
	    opacity: 1;
	}
	.sportexx-metabox .form-control:-ms-input-placeholder {
	    color: #777;
	}
	.sportexx-metabox .form-control::-webkit-input-placeholder {
	    color: #777;
	}
	.sportexx-metabox .form-control[disabled],
	.sportexx-metabox .form-control[readonly],
	.sportexx-metabox fieldset[disabled] .form-control {
	    cursor: not-allowed;
	    background-color: #eee;
	    opacity: 1;
	}
	.sportexx-metabox textarea.form-control {
	    height: auto;
	}
	.sportexx-metabox input[type="search"] {
	    -webkit-appearance: none;
	}
	.sportexx-metabox input[type="date"],
	.sportexx-metabox input[type="time"],
	.sportexx-metabox input[type="datetime-local"],
	.sportexx-metabox input[type="month"] {
	    line-height: 34px;
	    line-height: 1.42857143 \0;
	}
	.sportexx-metabox input[type="date"].input-sm,
	.sportexx-metabox input[type="time"].input-sm,
	.sportexx-metabox input[type="datetime-local"].input-sm,
	.sportexx-metabox input[type="month"].input-sm {
	    line-height: 30px;
	}
	.sportexx-metabox input[type="date"].input-lg,
	.sportexx-metabox input[type="time"].input-lg,
	.sportexx-metabox input[type="datetime-local"].input-lg,
	.sportexx-metabox input[type="month"].input-lg {
	    line-height: 46px;
	}
	.sportexx-metabox .form-group {
	    margin-bottom: 15px;
	}
	.sportexx-metabox .radio,
	.sportexx-metabox .checkbox {
	    position: relative;
	    display: block;
	    min-height: 20px;
	    margin-top: 10px;
	    margin-bottom: 10px;
	}
	.sportexx-metabox .radio label,
	.sportexx-metabox .checkbox label {
	    padding-left: 20px;
	    margin-bottom: 0;
	    font-weight: normal;
	    cursor: pointer;
	}
	.sportexx-metabox .radio input[type="radio"],
	.sportexx-metabox .radio-inline input[type="radio"],
	.sportexx-metabox .checkbox input[type="checkbox"],
	.sportexx-metabox .checkbox-inline input[type="checkbox"] {
	    position: absolute;
	    margin-top: 4px \9;
	    margin-left: -20px;
	}
	.sportexx-metabox .radio + .radio,
	.sportexx-metabox .checkbox + .checkbox {
	    margin-top: -5px;
	}
	.sportexx-metabox .radio-inline,
	.sportexx-metabox .checkbox-inline {
	    display: inline-block;
	    padding-left: 20px;
	    margin-bottom: 0;
	    font-weight: normal;
	    vertical-align: middle;
	    cursor: pointer;
	}
	.sportexx-metabox .radio-inline + .radio-inline,
	.sportexx-metabox .checkbox-inline + .checkbox-inline {
	    margin-top: 0;
	    margin-left: 10px;
	}
	.sportexx-metabox input[type="radio"][disabled],
	.sportexx-metabox input[type="checkbox"][disabled],
	.sportexx-metabox input[type="radio"].disabled,
	.sportexx-metabox input[type="checkbox"].disabled,
	.sportexx-metabox fieldset[disabled] input[type="radio"],
	.sportexx-metabox fieldset[disabled] input[type="checkbox"] {
	    cursor: not-allowed;
	}
	.sportexx-metabox .radio-inline.disabled,
	.sportexx-metabox .checkbox-inline.disabled,
	.sportexx-metabox fieldset[disabled] .radio-inline,
	.sportexx-metabox fieldset[disabled] .checkbox-inline {
	    cursor: not-allowed;
	}
	.sportexx-metabox .radio.disabled label,
	.sportexx-metabox .checkbox.disabled label,
	.sportexx-metabox fieldset[disabled] .radio label,
	.sportexx-metabox fieldset[disabled] .checkbox label {
	    cursor: not-allowed;
	}
	.sportexx-metabox .form-control-static {
	    padding-top: 7px;
	    padding-bottom: 7px;
	    margin-bottom: 0;
	}
	.sportexx-metabox .form-control-static.input-lg,
	.sportexx-metabox .form-control-static.input-sm {
	    padding-right: 0;
	    padding-left: 0;
	}
	.sportexx-metabox .input-sm,
	.sportexx-metabox .form-horizontal .form-group-sm .form-control {
	    height: 30px;
	    padding: 5px 10px;
	    font-size: 12px;
	    line-height: 1.5;
	    border-radius: 3px;
	}
	.sportexx-metabox select.input-sm {
	    height: 30px;
	    line-height: 30px;
	}
	.sportexx-metabox textarea.input-sm,
	.sportexx-metabox select[multiple].input-sm {
	    height: auto;
	}
	.sportexx-metabox .input-lg,
	.sportexx-metabox .form-horizontal .form-group-lg .form-control {
	    height: 46px;
	    padding: 10px 16px;
	    font-size: 18px;
	    line-height: 1.33;
	    border-radius: 6px;
	}
	.sportexx-metabox select.input-lg {
	    height: 46px;
	    line-height: 46px;
	}
	.sportexx-metabox textarea.input-lg,
	.sportexx-metabox select[multiple].input-lg {
	    height: auto;
	}
	.sportexx-metabox .has-feedback {
	    position: relative;
	}
	.sportexx-metabox .has-feedback .form-control {
	    padding-right: 42.5px;
	}
	.sportexx-metabox .form-control-feedback {
	    position: absolute;
	    top: 25px;
	    right: 0;
	    z-index: 2;
	    display: block;
	    width: 34px;
	    height: 34px;
	    line-height: 34px;
	    text-align: center;
	}
	.sportexx-metabox .input-lg + .form-control-feedback {
	    width: 46px;
	    height: 46px;
	    line-height: 46px;
	}
	.sportexx-metabox .input-sm + .form-control-feedback {
	    width: 30px;
	    height: 30px;
	    line-height: 30px;
	}
	.sportexx-metabox .has-feedback label.sr-only ~ .form-control-feedback {
	    top: 0;
	}
	.sportexx-metabox .help-block {
	    display: block;
	    margin-top: 5px;
	    margin-bottom: 10px;
	    color: #737373;
	}
</style>