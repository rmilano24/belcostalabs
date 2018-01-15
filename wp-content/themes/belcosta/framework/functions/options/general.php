<?php
     $fields[] = array(
       'type'        => 'color',
       'settings'    => 'insomnia_theme_color',
       'label'       => __( 'Theme Main Color', 'insomnia' ),
       'section'     => 'insomnia_general',
       'default'     => '#5AC8FB',
       'priority'    => 10,
       'alpha'       => true,
    );

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_scroll_up',
        'label'       => __( 'Scroll Up', 'insomnia' ),
        'section'     => 'insomnia_general',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Show', 'insomnia' ),
            'off' => esc_attr__( 'Hide', 'insomnia' ),
        ),
);
    $fields[] = array(
        'type'        => 'text',
        'setting'     => 'insomnia_link_portfolio',
        'label'       => __( 'Link to Works', 'insomnia' ),
        'description' => __( 'Add link to "All Works" in Portfolio saction.', 'insomnia' ),
        'section'     => 'insomnia_general',
        'default'     => 'http://google.com',
        'priority'    => 10,
    );
     $fields[] = array(
    'type'        => 'code',
    'settings'    => 'insomnia_custom_css_code',
    'label'       => __( 'Custom CSS', 'insomnia' ),
    'section'     => 'insomnia_general',
    'default'     => '',
    'priority'    => 10,
    'choices'     => array(
        'language' => 'css',
        'theme'    => 'monokai',
        'height'   => 250,
    ),
);