<?php
/**
 * The template for displaying pages with acf_template model selected
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
while ( have_posts()) :
	the_post();
	?>
	<div class="page-content">
		<?php
			//Sections
			$flex_sections = get_field('flex_sections');
			if ($flex_sections) {
				foreach ($flex_sections as $s => $section) {

					//Section width
					$container = 'container';
					$sWidth = $section['section_customize_group']['section_content_width'];
					$sCustomWidth = '';
					if ($sWidth == 'fullwidth') {
						$container = 'container-fluid';
					} else if ($sWidth == 'custom') {
						$sCustomWidth = $section['section_customize_group']['section_custom_width'];
					}

					//Section vertical align
					$sVAlign = $section['section_customize_group']['section_vertical_align'];

					//Section background
					$sBackground = 'section--default';
					$sBackgroundColor = '';
					$sBackgroundImg = '';
					if ( $section['section_customize_group']['section_background'] == 'primary' ) {
						$sBackground = 'section--primary';
					} elseif ( $section['section_customize_group']['section_background'] == 'secondary' ) {
						$sBackground = 'section--secondary';
					} elseif ( $section['section_customize_group']['section_background'] == 'custom' ) {
						$sBackground = 'section--color';
						$sBackgroundColor = 'style="background-color:'.$section['section_customize_group']['section_background_color'].';"';
					} elseif ( $section['section_customize_group']['section_background'] == 'image' ) {
						$sBackground = 'section--image';
						$sBackgroundImg = 'style="background-image:url('.$section['section_customize_group']['section_background_image']['url'].');"';
					}

					//Section content background
					$rBackground = 'row--default';
					$rBackgroundColor = '';
					$rBackgroundImg = '';
					if ( $section['section_customize_group']['section_content_background'] == 'primary' ) {
						$rBackground = 'row--primary';
					} elseif ( $section['section_customize_group']['section_content_background'] == 'secondary' ) {
						$rBackground = 'row--secondary';
					} elseif ( $section['section_customize_group']['section_content_background'] == 'custom' ) {
						$rBackground = 'row--color';
						$rBackgroundColor = 'style="background-color:'.$section['section_customize_group']['section_content_background_color'].';"';
					} elseif ( $section['section_customize_group']['section_content_background'] == 'image' ) {
						$rBackground = 'row--image';
						$rBackgroundImg = 'style="background-image:url("'.$section['section_customize_group']['section_content_background_image'].'");"';
					}

					if ( $section['acf_fc_layout'] == 'elementor_templates_list' ) {
						$container = 'container-fluid';
					}

					echo '<div class="section section--'.$section['acf_fc_layout'].' '.$sBackground.'" '.$sBackgroundColor.' '.$sBackgroundImg.'>';
						echo '<div class="'.$container.'">'; // Start of container
							if ($sWidth == 'custom') {
								echo '<div style="width:'.$sCustomWidth.'; margin: 0 auto;">';
							}
							echo '<div class="row '.$sVAlign.' '.$rBackground.'" '.$rBackgroundColor.' '.$rBackgroundImg.'>'; //Start of row

								//Sections simples
								if ( $section['acf_fc_layout'] != 'section' ) {
									set_query_var('fields', $section);
									get_template_part('partials/flex/'.$section['acf_fc_layout']);
								}

								//Sections en colonnes
								$flex_columns = $section['section_flex_columns'];
								if ($flex_columns) {
									foreach ($flex_columns as $c => $column) {

										//Section vertical align
										$cVAlign = $column['column_customize_group']['column_vertical_align'];

										//Column custom width
										$cWidthValue = $column['column_customize_group']['column_custom_width'];
										if ($cWidthValue != 'default') {
											$cWidth = $cWidthValue;
										} else {
											$cWidth = '';
										}

										//Column background
										$cBackground = 'columns--default';
										$cBackgroundColor = '';
										$cBackgroundImg = '';
										if ( $column['column_customize_group']['column_background'] == 'primary' ) {
											$cBackground = 'columns--primary';
										} elseif ( $column['column_customize_group']['column_background'] == 'secondary' ) {
											$cBackground = 'columns--secondary';
										} elseif ( $column['column_customize_group']['column_background'] == 'custom' ) {
											$cBackground = 'columns--color';
											$cBackgroundColor = ' background-color:'.$column['column_customize_group']['column_background_color'].';';
										} elseif ( $column['column_customize_group']['column_background'] == 'image' ) {
											$cBackground = 'columns--image';
											$cBackgroundImg = ' background-image:'.$column['column_customize_group']['column_background_image']['url'].';';
										}

										echo '<div class="columns col-md'.$cWidth.' '.$cVAlign.' '.$cBackground.'" style="'.$cBackgroundColor.''.$cBackgroundImg.'" >'; //Start of column
											$flex_elements = $column['column_flex_elements'] ;
											if (empty($flex_elements)) {
												return false;
											}
											foreach ($flex_elements as $k => $flex) {
												echo '<div class="element element-'.$flex['acf_fc_layout'].' ">'; // Start of element
													set_query_var('fields', $flex);
													get_template_part('partials/flex/'.$flex['acf_fc_layout']);
												echo '</div>'; //end of element
											}
										echo '</div>'; //end of column
									}
								}

							echo '</div>'; //end of row
							if ($sWidth == 'custom') {
								echo '</div>'; //end of custom width div
							}

						echo '</div>'; //end of container
					echo '</div>'; //end of section
				}
			}

		?>

	</div>
	<?php
endwhile;
