<?php

/*
Plugin Name: WP Fellowship Stream MyBible Plugin
Version: v1.1
Plugin URI: http://fellowshipstream.com/index.php?option=com_content&view=section&layout=blog&id=4&Itemid=17
Author: Fellowship Stream
Author URI: http://www.fellowshipstream.com.com/
Plugin Description: A simple Wordpress plugin to insert Fellowship Stream MyBible into posts, pages, sidebars.
*/

/*
    This program is free software; you can redistribute it
    under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

$wp_fs_myb_version = 1.1;


function show_fs_myb_1()
{
    $fs_myb_encoded_value_1 = get_option('wp_fs_myb_1_code');
    $fs_myb_decoded_value_1 = html_entity_decode($fs_myb_encoded_value_1, ENT_COMPAT);

    if(!empty($fs_myb_decoded_value_1))
    {
        $output .= " $fs_myb_decoded_value_1";
    }
    return $output;
}

function show_fs_myb_2()
{
    $fs_myb_encoded_value_2 = get_option('wp_fs_myb_2_code');
    $fs_myb_decoded_value_2 = html_entity_decode($fs_myb_encoded_value_2, ENT_COMPAT);

    if(!empty($fs_myb_decoded_value_2))
    {
        $output .= " $fs_myb_decoded_value_2";
    }
    return $output;
}

function show_fs_myb_3()
{
    $fs_myb_encoded_value_3 = get_option('wp_fs_myb_3_code');
    $fs_myb_decoded_value_3 = html_entity_decode($fs_myb_encoded_value_3, ENT_COMPAT);

    if(!empty($fs_myb_decoded_value_3))
    {
        $output .= " $fs_myb_decoded_value_3";
    }
    return $output;
}

function wp_fs_myb_process($content)
{
    if (strpos($content, "<!-- wp_fs_myb_1 -->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!-- wp_fs_myb_1 -->', show_fs_myb_1(), $content);
    }
    if (strpos($content, "<!-- wp_fs_myb_2 -->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!-- wp_fs_myb_2 -->', show_fs_myb_2(), $content);
    }
    if (strpos($content, "<!-- wp_fs_myb_3 -->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!-- wp_fs_myb_3 -->', show_fs_myb_3(), $content);
    }
    return $content;
}

// Displays Simple Ad Campaign Options menu
function fs_myb_add_option_page() {
    if (function_exists('add_options_page')) {
        add_options_page('MyBible Insertion', 'MyBible Insertion', 8, __FILE__, 'myb_insertion_options_page');
    }
}

function myb_insertion_options_page() {

    global $wp_fs_myb_version;

    if (isset($_POST['info_update']))
    {
        echo '<div id="message" class="updated fade"><p><strong>';

        $tmpCode1 = htmlentities(stripslashes($_POST['wp_fs_myb_1_code']) , ENT_COMPAT);
        update_option('wp_fs_myb_1_code', $tmpCode1);

        $tmpCode2 = htmlentities(stripslashes($_POST['wp_fs_myb_2_code']) , ENT_COMPAT);
        update_option('wp_fs_myb_2_code', $tmpCode2);

        $tmpCode3 = htmlentities(stripslashes($_POST['wp_fs_myb_3_code']) , ENT_COMPAT);
        update_option('wp_fs_myb_3_code', $tmpCode3);

        echo 'Options Updated!';
        echo '</strong></p></div>';
    }

    ?>

    <div class=wrap>

    <h2>MyBible Insertion Options v <?php echo $wp_fs_myb_version; ?></h2>

    <p>For information and updates, please visit:<br />
    <a href="http://fellowshipstream.com/index.php?option=com_content&view=section&layout=blog&id=4&Itemid=17">http://fellowshipstream.com/index.php?option=com_content&view=section&layout=blog&id=4&Itemid=17</a></p>

    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <input type="hidden" name="info_update" id="info_update" value="true" />

    <fieldset class="options">
    <legend><strong>Usage</strong></legend>
    <p>Use this plugin to quickly and easily insert Fellowship Stream MyBible to your posts, pages and sidebar.</p>
    <p>There are two ways you can use this plugin:</p>
    <ol>
    <li>Add the trigger text <strong>&lt;!-- wp_fs_myb_1 --&gt;</strong><br />or <strong>&lt;!-- wp_fs_myb_2 --&gt;</strong><br />or <strong>&lt;!-- wp_fs_myb_3 --&gt;</strong>  to your posts or pages</li>
    <li>Call the function from template files: <strong>&lt;?php echo show_fs_myb_1(); ?&gt;</strong><br />or <strong>&lt;?php echo show_fs_myb_2(); ?&gt;</strong><br />or <strong>&lt;?php echo show_fs_myb_3(); ?&gt;</strong></li>
    </ol>

    </fieldset>

    <fieldset class="options">
    <legend><strong>Options</strong></legend>

    <table width="100%" border="0" cellspacing="0" cellpadding="6">

    <tr valign="top"><td width="35%" align="left">
    <strong>Fellowship Stream MyBible 1 Code:</strong>
    <br /><i>Copy and Paste the Fellowship Stream MyBible code here. To show this add in your posts or pages use the token <br />&lt;!-- wp_fs_myb_1 --&gt;
    <br />or call the function from a template file <br />&lt;?php echo show_fs_myb_1(); ?&gt;</i>
    </td><td align="left">
    <textarea name="wp_fs_myb_1_code" rows="6" cols="35"><?php echo get_option('wp_fs_myb_1_code'); ?></textarea>
    </td></tr>

    <tr valign="top"><td width="35%" align="left">
    <strong>Fellowship Stream MyBible 2 Code:</strong>
    <br /><i>Copy and Paste the Fellowship Stream MyBible code here. To show this add in your posts or pages use the token <br />&lt;!-- wp_fs_myb_2 --&gt;
    <br />or call the function from a template file <br />&lt;?php echo show_fs_myb_2(); ?&gt;</i>
    </td><td align="left">
    <textarea name="wp_fs_myb_2_code" rows="6" cols="35"><?php echo get_option('wp_fs_myb_2_code'); ?></textarea>
    </td>
    </tr>

    <tr valign="top"><td width="35%" align="left">
    <strong>Fellowship Stream MyBible 3 Code:</strong>
    <br /><i>Copy and Paste the Fellowship Stream MyBible code here. To show this add in your posts or pages use the token <br />&lt;!-- wp_fs_myb_3 --&gt;
    <br />or call the function from a template file <br />&lt;?php echo show_fs_myb_3(); ?&gt;</i>
    </td><td align="left">
    <textarea name="wp_fs_myb_3_code" rows="6" cols="35"><?php echo get_option('wp_fs_myb_3_code'); ?></textarea>
    </td></tr>

    </table>
    </fieldset>

    <div class="submit">
        <input type="submit" name="info_update" value="<?php _e('Update options'); ?> &raquo;" />
    </div>

    </form>
    </div><?php
}

add_filter('the_content', 'wp_fs_myb_process');

// Insert the fs_myb_add_option_page in the 'admin_menu'
add_action('admin_menu', 'fs_myb_add_option_page');

?>
