<?php

function solovic_customize_register($wp_customize ) {
    $wp_customize->add_setting( HeaderImageSetting, array('type' => 'theme_mod',
        'default' => get_stylesheet_directory_uri() . '/img/branding/solovic-tm-logo.png',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'main_header_image_pick',
            array(
                'label' => __( 'Primary Homepage Image', 'solovic' ),
                'section' => 'title_tagline',
                'settings' => HeaderImageSetting,
                'priority' => 1,
                'mime_type' => 'image',
    )));

    $wp_customize->add_setting( MiniHeaderImages, array('type' => 'theme_mod',
        'default' =>
            get_stylesheet_directory_uri() . '/img/branding/cnn.png'
        ,
    ));

    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'mini_header_image_pick',
        array(
            'label' => __( 'Secondary Homepage Images', 'solovic' ),
            'section' => 'title_tagline',
            'settings' => MiniHeaderImages,
            'priority' => 1,
            'mime_type' => 'image',
        )));

    /*
    $wp_customize->add_control( 'setting_id', array(
        'type' => 'date',
        'priority' => 10, // Within the section.
        'section' => 'colors', // Required, core or custom.
        'label' => __( 'Date' ),
        'description' => __( 'This is a date control with a red border.' ),
        'input_attrs' => array(
            'class' => 'my-custom-class-for-js',
            'style' => 'border: 1px solid #900',
            'placeholder' => __( 'mm/dd/yyyy' ),
        ),
        'active_callback' => 'is_front_page',
    ) );*/
}

add_action( 'customize_register', 'solovic_customize_register' );

