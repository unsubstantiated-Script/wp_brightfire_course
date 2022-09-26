<?php

function up_plugins_options_alt_page()
{
    ?>
    <div class="wrap">
        <form action="options.php" method="POST">
            <?php
            settings_fields('up_options_group');
            ?>
        </form>
    </div>
    <?php
}