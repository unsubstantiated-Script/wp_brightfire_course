<?php


function up_search_form_render_cb($atts)
{
    //escaping and sanitizing the data here with esc_attr to avoid hackable code...
    $bgColor = esc_attr($atts['bgColor']);
    $textColor = esc_attr($atts['textColor']);

    //Loading the style info into a var
    $styleAttr = "background-color:{$bgColor}; color:{$textColor};";


//    Output buffer is kinda like a useEffect or a Timeout
    ob_start();

    ?>
    <div style="<? echo $styleAttr; ?>"
         class="wp-block-udemy-plus-search-form"
    >
        <h1>
            <?php esc_html_e('Search', 'udemy-plus'); ?>:
            <?php the_search_query(); ?>
        </h1>
        <!--    Creating a URL to the home page while cleaning out characters with esc_url that aren't related to the URL  -->
        <form action="<?php echo esc_url(home_url('/')) ?>">
            <!--            name needs to be "s" here so that WP can query with the input  -->
            <input type="text" placeholder=" <?php esc_html_e('Search', 'udemy-plus'); ?>" name="s"
                   value="<?php the_search_query(); ?>"/>
            <div class="btn-wrapper">
                <button
                        type="submit"
                        style="<? echo $styleAttr; ?>"
                >  <?php esc_html_e('Search', 'udemy-plus'); ?>
                </button>
            </div>
        </form>
    </div>
    <?php

    $output = ob_get_contents();

    ob_end_clean();

    return $output;
}