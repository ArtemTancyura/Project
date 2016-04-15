<?php
// $_POST['whatever']
// $_POST['action'] = 'my_action';
do_action('wp_ajax_' . $_POST['action']);
do_action('wp_ajax_send_letter_to_admin');
?>