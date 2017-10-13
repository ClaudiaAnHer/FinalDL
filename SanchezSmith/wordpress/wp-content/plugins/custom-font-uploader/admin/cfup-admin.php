<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Add admin page for displaying buddypress fitness settings
if( !class_exists( 'Cfup_AdminPage' ) ) {
	class Cfup_AdminPage{

		private $plugin_slug = 'custom-font-uploader-settings',
				$plugin_settings_tabs = array();

		//constructor
		function __construct() {
			add_action( 'admin_menu', array( $this, 'cfup_add_menu_page' ) );

			add_action('admin_init', array($this, 'cfup_register_general_settings'));
			add_action('admin_init', array($this, 'cfup_register_custom_font_settings'));
			add_action('admin_init', array($this, 'cfup_register_google_font_settings'));
			add_action('admin_init', array($this, 'cfup_register_support_settings'));
		}

		//Actions performed to create a custom menu on loading admin_menu
		function cfup_add_menu_page() {
			add_menu_page( __( 'Custom Font Uploader', CFUP_TEXT_DOMAIN ), __( 'Font Uploader', CFUP_TEXT_DOMAIN ), 'manage_options', $this->plugin_slug, array( $this, 'cfup_admin_settings_page' ), 'dashicons-editor-textcolor', 4 );
		}

		function cfup_admin_settings_page() {
			$tab = isset($_GET['tab']) ? $_GET['tab'] : 'cfup-general-settings';
			?>
			<div class="wrap">
				<h2><?php _e( 'Enqueue Your Fonts On Site', CFUP_TEXT_DOMAIN );?></h2>
				<p><?php _e( 'This plugin will manage the custom fonts uploaded.', CFUP_TEXT_DOMAIN );?></p>
				<?php $this->cfup_plugin_settings_tabs(); ?>
				<form action="" method="POST" id="<?php echo $tab;?>-settings-form" enctype="multipart/form-data">
				<?php do_settings_sections( $tab );?>
				</form>
			</div>
			<?php
		}

		function cfup_plugin_settings_tabs() {
			$current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'cfup-general-settings';
			echo '<h2 class="nav-tab-wrapper">';
			foreach ($this->plugin_settings_tabs as $tab_key => $tab_caption) {
				$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
				echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->plugin_slug . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';
			}
			echo '</h2>';
		}

		function cfup_register_general_settings() {
			$this->plugin_settings_tabs['cfup-general-settings'] = __( 'General', 'cfup' );
			register_setting('cfup-general-settings', 'cfup-general-settings');
			add_settings_section('section_general', ' ', array(&$this, 'cfup_general_settings_section'), 'cfup-general-settings');
		}

		function cfup_general_settings_section() {
			if (file_exists(dirname(__FILE__) . '/cfup-general-settings.php')) {
				require_once( dirname(__FILE__) . '/cfup-general-settings.php' );
			}
		}

		function cfup_register_custom_font_settings() {
			$this->plugin_settings_tabs['custom-font-uploader-settings'] = __( 'Custom Fonts', 'cfup' );
			register_setting('custom-font-uploader-settings', 'custom-font-uploader-settings');
			add_settings_section('section_custom_font', ' ', array(&$this, 'cfup_custom_fonts_section'), 'custom-font-uploader-settings');
		}

		function cfup_custom_fonts_section() {
			if (file_exists(dirname(__FILE__) . '/cfup-customfont-settings.php')) {
				require_once( dirname(__FILE__) . '/cfup-customfont-settings.php' );
			}
		}

		function cfup_register_google_font_settings() {
			$this->plugin_settings_tabs['google-font-uploader-settings'] = __( 'Google Fonts', 'cfup' );
			register_setting('google-font-uploader-settings', 'google-font-uploader-settings');
			add_settings_section('section_google_font', ' ', array(&$this, 'cfup_google_fonts_section'), 'google-font-uploader-settings');
		}

		function cfup_google_fonts_section() {
			if (file_exists(dirname(__FILE__) . '/cfup-googlefont-settings.php')) {
				require_once( dirname(__FILE__) . '/cfup-googlefont-settings.php' );
			}
		}

		function cfup_register_support_settings() {
			$this->plugin_settings_tabs['cfup-support'] = __( 'Support', 'cfup' );
			register_setting('cfup-support', 'cfup-support');
			add_settings_section('section_support', ' ', array(&$this, 'cfup_section_support'), 'cfup-support');
		}

		function cfup_section_support() {
			if (file_exists(dirname(__FILE__) . '/cfup-support.php')) {
				require_once( dirname(__FILE__) . '/cfup-support.php' );
			}
		}
	}
	new Cfup_AdminPage();
}