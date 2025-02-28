<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permission {

    public $error;

    public function is_allow($per_key) {
        $ci = &get_instance();
        $username = $ci->session->userdata('ausername');
        $level = $ci->session->userdata('level');
        $ci->db->where('username', $username);
        $user = $ci->db->get('user')->result();
        $user = $user[0];
        if ($user->level == 'Super Adminn') {
            return TRUE;
        } else {
            $permissions = explode(',', $user->permissions);
            if (in_array($per_key, $permissions)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}

