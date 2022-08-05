<?php
/*
Plugin Name: Mail template
Description: Create mail template with customization
Version: 0.1
*/

//IMAGE CUSTOM SIZE
add_image_size( 'Email header', 640, 240, true );

//ADD BRANDA PRO CUSTOM MACROS
add_filter(
	'wp_mail',
	function( $args ) {
        $logo = get_field('options_email_logo', 'options')['sizes']['large'];
        $logoWidth = get_field('options_email_logo_width', 'options');
        $txtColor = get_field('options_email_text_color', 'options');
        $footerTxtColor = get_field('options_email_footer_text_color', 'options');
        $backgroundColor = get_field('options_email_bg_color', 'options');
        $bgHeader = get_field('options_email_header_bg_color', 'options');
        $bgContent = get_field('options_email_content_bg_color', 'options');
        $bgFooter = get_field('options_email_footer_bg_color', 'options');
        $css = get_field('options_email_css', 'options');
        $header = get_field('options_email_image', 'options')['sizes']['large'];
        $content = get_field('options_email_contenu', 'options');
        $footerContent = get_field('options_email_footer_content', 'options');

		$replacements = array(
            '{LOGO}' => $logo,
            '{LOGO_WIDTH}' => $logoWidth,
            '{HEADER}' => $header,
			'{GENERIC_CONTENT}' => $content,
            '{FOOTER_TXT}' => $footerContent,
            '{EMAIL_CSS}' => $css,
            '{MAIN_BG_COLOR}' => $backgroundColor,
            '{HEADER_BG_COLOR}' => $bgHeader,
            '{CONTENT_TXT_COLOR}' => $txtColor,
            '{CONTENT_BG_COLOR}' => $bgContent,
            '{FOOTER_TXT_COLOR}' => $footerTxtColor,
            '{FOOTER_BG_COLOR}' => $bgFooter,
		);

		$args[ 'message' ] = str_replace(
			array_keys( $replacements ),
			array_values( $replacements ),
			$args[ 'message' ]
		);

		return $args;
	},
	9999
);
