<?php
/* Colorlib Coming Soon Customizer Options */


class CCSM_Customizer {

	public function __construct() {

		add_action( 'customize_register', array( $this, 'ccsm_customizer_controls' ) );
		add_action( 'customize_register', array( $this, 'ccsm_panels_initialize' ) );
		add_action( 'admin_menu', array( $this, 'add_menu_item' ) );
		add_action( 'admin_init', array( $this, 'redirect_customizer' ) );

	}

	public function ccsm_panels_initialize( $wp_customize ) {

		$wp_customize->add_panel( 'colorlib_coming_soon_general_panel', array(
				'priority' => 1,
				'title'    => esc_html__( 'Colorlib Coming Soon Settings', 'colorlib-coming-soon' ),
			)
		);


		/* Section - Coming Soon - Templates */
		$wp_customize->add_section( 'colorlib_coming_soon_section_templates', array(
				'title'    => esc_html__( 'Templates', 'colorlib-coming-soon' ),
				'panel'    => 'colorlib_coming_soon_general_panel',
				'priority' => 5,
				'type'     => 'outer'
			)
		);

		/* Section - Coming Soon - General */
		$wp_customize->add_section( 'colorlib_coming_soon_section_general', array(
				'title'    => esc_html__( 'General', 'colorlib-coming-soon' ),
				'panel'    => 'colorlib_coming_soon_general_panel',
				'priority' => 10,
			)
		);


		/* Section - Coming Soon - Subscribe Form */
		$wp_customize->add_section( 'colorlib_coming_soon_subscribe_form', array(
				'title'    => esc_html__( 'Subscribe Form', 'colorlib-coming-soon' ),
				'panel'    => 'colorlib_coming_soon_general_panel',
				'priority' => 30,
			)
		);

		/* Section - Coming Soon - Social Links */
		$wp_customize->add_section( 'colorlib_coming_soon_section_social_settings', array(
				'title'    => esc_html__( 'Social Links', 'colorlib-coming-soon' ),
				'panel'    => 'colorlib_coming_soon_general_panel',
				'priority' => 35,
			)
		);


		/* Section - Coming Soon - Custom CSS */
		$wp_customize->add_section( 'colorlib_coming_soon_custom_css_settings', array(
				'title'     => esc_html__( 'Custom CSS', 'colorlib-coming-soon' ),
				'panel'     => 'colorlib_coming_soon_general_panel',
				'priority'  => 40,
				'code_type' => 'text/css',
			)
		);

	}


	public function ccsm_customizer_controls( $wp_customize ) {

		require_once( CCSM_PATH . 'includes/controls/class-ccsm-control-text-editor.php' );
		require_once( CCSM_PATH . 'includes/controls/class-ccsm-control-toggle.php' );
		require_once( CCSM_PATH . 'includes/controls/class-ccsm-template-selection.php' );

		/* Setting - Coming Soon - Activation */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_activation]', array(
			'default'           => '1',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option',
		) );

		$wp_customize->add_control( new CCSM_Control_Toggle ( $wp_customize, 'ccsm_settings[colorlib_coming_soon_activation]', array(
				'label'       => esc_html__( 'Activate Colorlib Coming Soon Page?', 'colorlib-coming-soon' ),
				'description' => esc_html__( '', 'colorlib-coming-soon' ),
				'section'     => 'colorlib_coming_soon_section_general',
				'priority'    => 10,
			) )
		);


		/* Setting - Coming Soon - Custom CSS */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_page_custom_css]', array(
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( new WP_Customize_Code_Editor_Control ( $wp_customize, 'ccsm_settings[colorlib_coming_soon_page_custom_css]', array(
				'label'       => esc_html__( 'Custom CSS on Coming Soon Page', 'colorlib-coming-soon' ),
				'section'     => 'colorlib_coming_soon_custom_css_settings',
				'code_type'   => 'text/css',
				'priority'    => 20,
				'input_attrs' => array(
					'aria-describedby' => 'editor-keyboard-trap-help-1 editor-keyboard-trap-help-2 editor-keyboard-trap-help-3 editor-keyboard-trap-help-4',
				),
			) )
		);


		/* Setting - Coming Soon - Templates Selection */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_template_selection]', array(
			'default'           => 'template_01',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( new CCSM_Template_Selection( $wp_customize, 'ccsm_settings[colorlib_coming_soon_template_selection]', array(
				'label'    => esc_html__( 'Select Template', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_templates',
				'priority' => 30,
				'choices'  => array(
					'template_01' => esc_html__( 'Template 1', 'colorlib-coming-soon' ),
					'template_02' => esc_html__( 'Template 2', 'colorlib-coming-soon' ),
					'template_03' => esc_html__( 'Template 3', 'colorlib-coming-soon' ),
					'template_04' => esc_html__( 'Template 4', 'colorlib-coming-soon' ),
					'template_05' => esc_html__( 'Template 5', 'colorlib-coming-soon' ),
					'template_06' => esc_html__( 'Template 6', 'colorlib-coming-soon' ),
					'template_07' => esc_html__( 'Template 7', 'colorlib-coming-soon' ),
					'template_08' => esc_html__( 'Template 8', 'colorlib-coming-soon' ),
					'template_09' => esc_html__( 'Template 9', 'colorlib-coming-soon' ),
					'template_10' => esc_html__( 'Template 10', 'colorlib-coming-soon' ),
					'template_11' => esc_html__( 'Template 11', 'colorlib-coming-soon' ),
					'template_12' => esc_html__( 'Template 12', 'colorlib-coming-soon' ),
					'template_13' => esc_html__( 'Template 13', 'colorlib-coming-soon' ),
					'template_14' => esc_html__( 'Template 14', 'colorlib-coming-soon' ),
					'template_15' => esc_html__( 'Template 15', 'colorlib-coming-soon' ),
				),
			)
		) );

		/*Settings - General - Timer*/
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_timer_option]', array(
			'default'           => date( 'Y-m-d H:i:s', strtotime( '+1 month' ) ),
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( new WP_Customize_Date_Time_Control( $wp_customize, 'ccsm_settings[colorlib_coming_soon_timer_option]', array(
			'label'    => esc_html__( 'Time to opening', 'colorlib-coming-soon' ),
			'section'  => 'colorlib_coming_soon_section_general',
			'priority' => 10,
		) ) );


		/* Setting - General - Site Logo */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_plugin_logo]', array(
			'default'           => CCSM_URL . 'assets/images/logo.png',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ccsm_settings[colorlib_coming_soon_plugin_logo]', array(
				'label'       => esc_html__( 'Logo Image', 'colorlib-coming-soon' ),
				'description' => esc_html__( 'Recommended size: 80px by 80px', 'colorlib-coming-soon' ),
				'section'     => 'colorlib_coming_soon_section_general',
				'priority'    => 10,
			) )
		);

		/* Setting - Coming Soon - Page Content */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_page_heading]', array(
			'default'           => 'Something <strong>really good</strong> is coming <strong>very soon</strong>',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'transport'         => 'postMessage',
			'type'              => 'option'
		) );

		$wp_customize->add_control( new CCSM_Control_Text_Editor( $wp_customize, 'ccsm_settings[colorlib_coming_soon_page_heading]', array(
				'label'    => esc_html__( 'Heading', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_general',
				'priority' => 20,
			) )
		);


		/* Setting - Coming Soon - Page Content */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_page_content]', array(
			'default'           => 'If you have something new you’re looking to launch, you’re going to want to start building a community of people interested in what you’re launching.',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'transport'         => 'postMessage',
			'type'              => 'option'
		) );

		$wp_customize->add_control( new CCSM_Control_Text_Editor( $wp_customize, 'ccsm_settings[colorlib_coming_soon_page_content]', array(
				'label'    => esc_html__( 'Main Content', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_general',
				'priority' => 30,
			) )
		);

		/* Setting - Coming Soon - Page Content */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_page_footer]', array(
			'default'           => 'And don\'t worry, we hate spam too! You can unsubscribe at any time.',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'transport'         => 'postMessage',
			'type'              => 'option'
		) );

		$wp_customize->add_control( new CCSM_Control_Text_Editor( $wp_customize, 'ccsm_settings[colorlib_coming_soon_page_footer]', array(
				'label'    => esc_html__( 'Footer Text', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_general',
				'priority' => 40,
			) )
		);


		/* Setting - Coming Soon - Page Content */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_subscribe]', array(
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( new CCSM_Control_Toggle( $wp_customize, 'ccsm_settings[colorlib_coming_soon_subscribe]', array(
				'label'    => esc_html__( 'Disable Subscribe Form', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_subscribe_form',
				'priority' => 10,
			) )
		);


		/* Setting - Coming Soon - Page Content */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_subscribe_form_url]', array(
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( 'ccsm_settings[colorlib_coming_soon_subscribe_form_url]', array(
				'label'       => esc_html__( 'Subscribe Form Action URL', 'colorlib-coming-soon' ),
				'description' => __( 'You can get your form action URL by creating a sign-up form and copying the form action="" field.: <a href="http://kb.mailchimp.com/lists/signup-forms/add-a-signup-form-to-your-website" target="_blank">http://kb.mailchimp.com/lists/signup-forms/add-a-signup-form-to-your-website</a>', 'colorlib-coming-soon' ),
				'section'     => 'colorlib_coming_soon_subscribe_form',
				'type'        => 'text',
				'priority'    => 10,
			)
		);

		/* Setting - Coming Soon - Social Links */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_social_facebook]', array(
			'default'           => 'https://www.facebook.com/',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( 'ccsm_settings[colorlib_coming_soon_social_facebook]', array(
				'label'    => esc_html__( 'Facebook', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_social_settings',
				'type'     => 'text',
				'priority' => 10,
			)
		);


		/* Setting - Coming Soon - Social Links */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_social_twitter]', array(
			'default'           => 'https://www.twitter.com/',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( 'ccsm_settings[colorlib_coming_soon_social_twitter]', array(
				'label'    => esc_html__( 'Twitter', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_social_settings',
				'type'     => 'text',
				'priority' => 20,
			)
		);

		/* Setting - Coming Soon - Social Links */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_social_email]', array(
			'default'           => 'you@domain.com',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( 'ccsm_settings[colorlib_coming_soon_social_email]', array(
				'label'    => esc_html__( 'Email', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_social_settings',
				'type'     => 'text',
				'priority' => 30,
			)
		);

		/* Setting - Coming Soon - Social Links */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_social_youtube]', array(
			'default'           => 'https://youtube.com/',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( 'ccsm_settings[colorlib_coming_soon_social_youtube]', array(
				'label'    => esc_html__( 'Youtube', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_social_settings',
				'type'     => 'text',
				'priority' => 40,
			)
		);

		/* Setting - Coming Soon - Social Links */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_social_pinterest]', array(
			'default'           => 'https://pinterest.com/',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( 'ccsm_settings[colorlib_coming_soon_social_pinterest]', array(
				'label'    => esc_html__( 'Pinterest', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_social_settings',
				'type'     => 'text',
				'priority' => 50,
			)
		);

		/* Setting - Coming Soon - Social Links */
		$wp_customize->add_setting( 'ccsm_settings[colorlib_coming_soon_social_instagram]', array(
			'default'           => 'https://instagram.com/',
			'sanitize_callback' => 'ccsm_sanitize_text',
			'type'              => 'option'
		) );

		$wp_customize->add_control( 'ccsm_settings[colorlib_coming_soon_social_instagram]', array(
				'label'    => esc_html__( 'Instagram', 'colorlib-coming-soon' ),
				'section'  => 'colorlib_coming_soon_section_social_settings',
				'type'     => 'text',
				'priority' => 60,
			)
		);
	}

	public function add_menu_item() {
		$page = add_menu_page(
			esc_html__( 'Colorlib Coming Soon', 'colorlib-comin-soon' ), esc_html__( 'Coming Soon', 'colorlib-coming-soon' ), 'manage_options', 'ccsm_settings', array(
			$this,
			'settings_page',
		), 'dashicons-share-alt'
		);
	}

	/**
	 * Add settings link to plugin list table
	 *
	 * @param  array $links Existing links
	 *
	 * @return array        Modified links
	 */
	public function add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=ccsm__settings">' . __( 'Settings', 'colorlib-coming-soon' ) . '</a>';
		array_push( $links, $settings_link );

		return $links;
	}

	/**
	 * Hook to redirect the page for the Customizer.
	 *
	 * @access public
	 * @return void
	 */
	public function redirect_customizer() {
		if ( ! empty( $_GET['page'] ) ) { // Input var okay.
			if ( 'ccsm_settings' === $_GET['page'] ) { // Input var okay.

				// Generate the redirect url.
				$url = add_query_arg(
					array(
						'autofocus[panel]' => 'colorlib_coming_soon_general_panel',
					),
					admin_url( 'customize.php' )
				);

				wp_safe_redirect( $url );
			}
		}
	}

}

$cl = new CCSM_Customizer();

function ccsm_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

