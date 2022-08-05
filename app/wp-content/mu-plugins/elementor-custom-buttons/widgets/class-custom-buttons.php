<?php
/**
 * CustomButtons class.
 *
 * @category   Class
 * @package    ElementorCustomButtons
 * @subpackage WordPress
 * @author     Raoul Pérez
 * @copyright  2022 Kalysto
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://kalysto.ch/)
 * @since      1.0.0
 * php version 7.4
 */

namespace ElementorCustomButtons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * CustomButtons widget class.
 *
 * @since 1.0.0
 */
class CustomButtons extends \Elementor\Widget_Base {
	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'custom-buttons';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Bouton personnalisé', 'elementor-custom-buttons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}

	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'custom-buttons' );
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Données', 'elementor-custom-buttons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'btn-txt',
			array(
				'label'   => __( 'Texte du bouton', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Entrez votre texte', 'elementor-custom-buttons' ),
			)
		);

		$this->add_control(
			'btn-link',
			array(
				'label'   => __( 'Lien du bouton', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'https://…', 'elementor-custom-buttons' ),
			)
		);

		$this->add_control(
			'btn-type',
			array(
				'label'   => __( 'Type de bouton', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Par défaut', 'elementor-custom-buttons' ),
					'style2' => __( 'Style secondaire', 'elementor-custom-buttons' ),
					'inverse' => __( 'Inversé', 'elementor-custom-buttons' ),
					'frame' => __( 'Contouré', 'elementor-custom-buttons' ),
				],
				'default' => 'default',
			)
		);

		$this->add_control(
			'btn-width',
			array(
				'label'   => __( 'Largeur du bouton', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Par défaut', 'elementor-custom-buttons' ),
					'fullwidth' => __( 'Pleine largeur', 'elementor-custom-buttons' ),
				],
				'default' => 'default',
			)
		);

		$this->add_control(
			'btn-size',
			array(
				'label'   => __( 'Taille du bouton', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Par défaut', 'elementor-custom-buttons' ),
					'small' => __( 'Petit', 'elementor-custom-buttons' ),
					'big' => __( 'Grand', 'elementor-custom-buttons' ),
				],
				'default' => 'default',
			)
		);

		$this->add_control(
			'btn-position',
			array(
				'label' => __( 'Alignement du bouton', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Aligner à gauche', 'elementor-custom-buttons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Aligner au centre', 'elementor-custom-buttons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Aligner à droite', 'elementor-custom-buttons' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'default' => 'left',
			)
		);

		$this->add_control(
			'btn-title',
			array(
				'label'   => __( 'Titre du bouton', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'btn-target',
			array(
				'label' => __( 'Ouvrir le lien dans un nouvel onglet', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'oui' => [
						'title' => __( 'Ouvrir le lien dans un nouvel onglet', 'elementor-custom-buttons' ),
						'icon' => 'eicon-editor-external-link',
					]
				],
				'default' => '',
			)
		);

		$this->add_control(
			'btn-class',
			array(
				'label'   => __( 'Classe supplémentaire', 'elementor-custom-buttons' ),
				'type' => \Elementor\Controls_Manager::TEXT
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		echo do_shortcode(
			'[bouton
				text="'.$settings['btn-txt'].'"
				link="'.$settings['btn-link'].'"
				type="'.$settings['btn-type'].'"
				largeur="'.$settings['btn-width'].'"
				taille="'.$settings['btn-size'].'"
				cible="'.$settings['btn-target'].'"
				title="'.$settings['btn-title'].'"
				class="'.$settings['btn-class'].'"
				position="'.$settings['btn-position'].'"
			]'
		);
	}


}
