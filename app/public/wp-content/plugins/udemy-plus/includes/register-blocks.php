<?php

function up_register_blocks()
{
    $blocks = [
        ['name' => 'fancy-header'],
        ['name' => 'search-form', 'options' => [
            'render_callback' => 'up_search_form_render_cb'
        ]],

    ];

    foreach ($blocks as $block) {
        // Registering the Block we are developing
        register_block_type(UP_PLUGIN_DIR . 'build/blocks/' . $block['name'],
            $block['options'] ?? []
        );
    }

}