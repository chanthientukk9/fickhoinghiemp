<?php

/* Contact Form Shortcode -

Usage: Pls refer to http://portfoliotheme.org/austin/contact-form-shortcode/

[contact_form mail_to="receipient@mydomain.com" phone=true web_url=true subject=true button_color="default"]

Parameters -

class - Custom CSS class name to be set for the div element created (optional)
mail_to - A string field specifying the recipient email where all form submissions will be received.
web_url - Can be true or false. A boolean indicating that the user should be requested for Web URL via an input field.
phone - Can be true or false. Request for phone number of the user. A phone number field is displayed.
subject - Can be true or false. A mail subject field is displayed if the value is set to true.
button_color - Color of the submit button. Available colors are black, blue, cyan, green, orange, pink, red, teal, theme and trans.

*/

if (!function_exists('mo_contact_form_shortcode')) {

    function mo_contact_form_shortcode($atts, $content = null, $code) {
        extract(shortcode_atts(array(
            'class' => '',
            'mail_to' => '',
            'web_url' => true,
            'phone' => true,
            'subject' => true,
            'button_color' => 'default'
        ), $atts));

        if (empty($mail_to))
            $mail_to = get_bloginfo('admin_email');
        $mail_script_url = MO_THEME_URL . '/framework/scripts/sendmail.php';

        $output = '<div class="feedback"></div>';

        $output .= '<form class="contact-form ' . $class . '" action="' . $mail_script_url . '" method="post">';

        $output .= '<fieldset>';

        $output .= '<p><label>' . __('Họ Tên *', 'mo_theme') . '</label><input type="text" name="contact_name" placeholder="' . __("Họ Tên:", 'mo_theme') . '" class="text-input" required></p>';

        $output .= '<p><label>' . __('Email *', 'mo_theme') . '</label><input type="email" name="contact_email" placeholder="' . __("Email:", 'mo_theme') . '" class="text-input" required></p>';

        if (mo_to_boolean($phone))
            $output .= '<p><label>' . __('Số Điện Thoại', 'mo_theme') . '</label><input type="tel" name="contact_phone" placeholder="' . __("Số Điện Thoại:", 'mo_theme') . '"  class="text-input"></p>';

        if (mo_to_boolean($web_url))
            $output .= '<p><label>' . __('Web URL', 'mo_theme') . '</label><input type="url" name="contact_url" placeholder="' . __("URL:", 'mo_theme') . '" class="text-input"></p>';

        if (mo_to_boolean($subject))
            $output .= '<p class="subject"><label>' . __('Subject', 'mo_theme') . '</label><input type="text" name="subject" placeholder="' . __("Subject:", 'mo_theme') . '" class="text-input"></p>';

        $output .= '<p class="text-area"><label>' . __('Tin Nhắn *', 'mo_theme') . '</label><textarea name="message" placeholder="' . __("Tin Nhắn:", 'mo_theme') . '"  rows="6" cols="40"></textarea></p>';

        $output .= '<p class="trap-field"><label for="website">' . __('Leave Empty', 'mo_theme') . '</label><input type="text" name="website" placeholder="' . __("Leave Blank:", 'mo_theme') . '" class="text-input"></p>';

        $output .= '<button type="submit" class="button large ' . $button_color . '">' . __('Send the message', 'mo_theme') . '</button>';

        if (empty($mail_to)) {
            $mail_to = mo_get_theme_option('mo_contact_form_email');
        }

        update_option('mo_cf_email_recipient' , $mail_to);

        $output .= '</fieldset>';

        $output .= '</form>';

        return $output;
    }
}

add_shortcode('contact_form', 'mo_contact_form_shortcode');