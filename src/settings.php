<?php


function fpai_openai_key()
{
?>
    <input name="fpai_openai_key" type="password" value="<?php echo get_option("fpai_openai_key"); ?>" style="width: 50%;">

<?php
}

function display_fpai_panel_fields()
{
    // Floor Background Settings
    $fpai_plugin_option = 'fpai-plugin-options';
    $fpai_plugin_group = 'fpai-settings-group';
    add_settings_section("fpai-settings-group", "OpenAI Settings", null, $fpai_plugin_option);
    add_settings_field("fpai_openai_key", "API Key", "fpai_openai_key", $fpai_plugin_option, "fpai-settings-group");
    register_setting($fpai_plugin_group, "fpai_openai_key");
}

add_action("admin_init", "display_fpai_panel_fields");
