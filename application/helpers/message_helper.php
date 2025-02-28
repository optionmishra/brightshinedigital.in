<?php

class MessageHelper {

    function ci() {
        $ci = & get_instance();
        return $ci;
    }

    function print_json($arr) {
        $ci = & get_instance();
        $ci->output->set_content_type('text/json');
        $ci->output->set_output(json_encode($arr));
//    print_r(json_encode($arr));
        $ci->output->_display();
        exit();
    }
    
    

}
