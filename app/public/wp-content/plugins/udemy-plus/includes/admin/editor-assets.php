<?php

function up_enqueue_block_editor_assets() {
    $current_screen = get_current_screen();
    if($current_screen->base == "appearance_page_gutenberg-edit-site") {
        return;
    }

    wp_enqueue_script('up_editor');
}