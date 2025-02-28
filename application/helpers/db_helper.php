<?php

class DataHelper {

    public $data;

    function __construct() {
        if ($this->scope) {
            $scopes = explode(",", $this->scope);
            jsonify($this, $scopes);
            unset($this->scope);
        }
    }

    function ci() {
        $ci = & get_instance();
        return $ci;
    }

    function db() {
        $db = &$this->ci->db;
        return $db;
    }

    function meta() {
        if ($this->meta) {
            return json_decode($this->meta);
        }
    }

    function __get($name) {
        if (method_exists($this, $name)) {
            return $this->{$name}();
        } else {
            return false;
        }
    }

    function __call($name, $arguments) {
        return false;
    }

    function constraint($table, $index, $helper = null, $class = null) {
        if (!empty($helper)) {
            $this->ci->load->helper($helper);
        }
        $res = $this->ci->db->where("id", $this->{$index})->get($table);
        if ($res->num_rows() == 1) {
            if (!empty($class)) {
                return $res->row(0, $class);
            } else {
                return $res->row(0);
            }
        } else {
            return new DataHelper;
        }
    }

}

function jsonify($object, array $scopes = []) {
    if (is_array($object)) {
        foreach ($object as &$value) {
            jsonify($value, $scopes);
        }
    } elseif (is_object($object)) {
        foreach ($scopes as $value) {
            $s = [];
            $limit = false;
            $offset = 0;
            if (is_string($value)) {
                $name = $value;
                $params = [];
            } elseif (is_array($value)) {
                if (isset($value['name'])) {
                    $name = $value['name'];
                    if (isset($value['params'])) {
                        $params = $value['params'];
                    } else {
                        $params = [];
                    }
                    if (isset($value['scopes'])) {
                        $s = $value['scopes'];
                    }
                    if (isset($value['limit'])) {
                        $limit = $value['limit'];
                    }
                } else {
                    $name = $value[0];
                    $params = $value[1];
                    if (isset($value[2]) && is_array($value[2])) {
                        $s = $value[2];
                    }
                }
            }
            if (is_callable([$object, $name])) {
                $result = call_user_func_array([$object, $name], $params);
                if ($limit) {
                    if (is_array($result)) {
                        $result = paginate_array($result, $limit, $offset);
                    }
                }
                if (isset($s)) {
                    $object->{$name} = jsonify($result, $s);
                } else {
                    $object->{$name} = $result;
                }
            }
        }
    }
    return $object;
}

function paginate_array($array, $limit = null, $offset = 0, array $scopes = []) {
    $total = count($array);
    if (empty($limit)) {
        $limit = $total;
    }
    $rows = array_slice($array, (int) $offset, (int) $limit);
    $rows = jsonify($rows, $scopes);
    return [
        "rows" => $rows,
        "total" => $total
    ];
}

function friendly_seo_string($vp_string) {

    $vp_string = trim($vp_string);

    $vp_string = html_entity_decode($vp_string);

    $vp_string = strip_tags($vp_string);

    $vp_string = strtolower($vp_string);

    $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);

    $vp_string = preg_replace('~ ~', '-', $vp_string);

    $vp_string = preg_replace('~-+~', '-', $vp_string);

    return $vp_string;
}

function nice_text($string, $capitalize_words = false) {
    $output = strtolower($string);
    if ($capitalize_words) {
        $output = ucwords($output);
    }
    return $output;
}

function nice_text_dash($string) {
    $output = str_replace("-", " ", $string);
    $output = nice_text($string);
    return $output;
}

function category_split($string) {
    $output = [];
    foreach (explode(",", $string) as $key => $value) {
        $a = preg_split("(:|>)", $value);
        $output[] = friendly_seo_string(end($a));
    }
    return $output;
}

function print_json($arr) {
    $ci = & get_instance();
    $ci->output->set_content_type('text/json');
    $ci->output->set_output(json_encode($arr));
//    print_r(json_encode($arr));
    $ci->output->_display();
    exit();
}

function table_name($name) {
    $ci = & get_instance();
    $ci->load->config('tables', true);
    $tname = $ci->config->item($name, 'tables');
    if (empty($tname)) {
        $tname = $name;
    }
    return $tname;
}
