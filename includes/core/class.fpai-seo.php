<?php

class FPAI_SEO
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'fpai_enqueue_seo'));
        add_action('admin_menu', array($this, 'fpai_menus'));
        add_action('init', array($this, 'fpai_process_seo'));
    }
    public function fpai_enqueue_seo()
    {
        wp_enqueue_script('fpai-seo', FPAI_SEO_ASSETS_URL . 'js/fpai-seo.js', array('jquery'), FPAI_SEO_VERSION, true);
        wp_enqueue_style('fpai-seo', FPAI_SEO_ASSETS_URL . 'css/fpai-seo.css', array(), FPAI_SEO_VERSION, 'all');
    }

    public function fpai_process_seo()
    {

        require FPAI_SEO_INCLUDE_PATH . 'settings.php';
    }
    public function fpai_menus()
    {

        add_menu_page(
            'FPAI Plugin Settings',
            __('FPAI Plugin', FPAI_SEO_TEXTDOMAIN),
            'manage_options',
            'fpai_settings',
            [$this, 'fpai_settings_page'],
            'dashicons-code-standards',
            15
        );
    }
    public function fpai_settings_page()
    {
?>
        <style type="text/css">
            .br-shadow {
                border: 1px solid #ebebeb;
                padding: 5px 20px;
                background: #fff;
                margin-bottom: 40px;
                -webkit-box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);
                -moz-box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);
                box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.1);
            }

            .br-shadow .mapi_inputs {
                width: 50%;
            }
        </style>
        <div class="wrap">
            <h1><?php echo get_admin_page_title() ?></h1>
            <form method="post" action="options.php" class="br-shadow">

                <?php
                settings_fields("fpai-settings-group");
                do_settings_sections("fpai-plugin-options");
                submit_button();
                ?>
            </form>
        </div>
<?php
    }
}
