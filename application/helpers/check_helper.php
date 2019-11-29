<?php

function check()
{
    $_this = get_instance();
    $user_mail = $_this->session->userdata('email');

    if (!$user_mail) {
        redirect('User');
    }
}